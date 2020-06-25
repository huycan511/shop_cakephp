	<?php
	class HomeController extends AppController
	{
		public $components = array('Facebook');

		public $uses = array('User', 'Store', 'Categories', 'Genre', 'Product', 'News', 'Rating', 'Cart', 'Like', 'Product_invoice', 'Invoice');

		public function index()
		{
			$this->layout = 'main';
			$stores = $this->Store->find('all', array('conditions' => array('NOT' => array('Store.id' => 1))));
			$this->set('stores', $stores);
			$categories = $this->Categories->find('all', array('recursive' => 2));
			$this->set('categories', $categories);
			$products = $this->Product->find('all');
			shuffle($products);
			$this->set('products', $products);
			$wishlist = $this->getWishList();
			$this->set('wishlist', $wishlist);
			$news = $this->News->find('all');
			if ($this->Session->read('id_user')) {
				$this->getDataCart();
			} else {
				$this->set('cart', 0);
			}
			$this->set('news', $news);
		}
		public function authFacebook()
		{
			$this->autoRender = false;
			if ($this->request->is('ajax')) {
				return json_encode($this->Facebook->authFacebook());
			}
		}

		public function reAuth()
		{
			$this->autoRender = false;
			if (isset($this->request->query['state'])) {
				$check_auth = $this->Facebook->callbackAuth($this->request->query['state']);
				if ($check_auth) {
					$this->Facebook->setDefaultAccessToken($this->Session->read('access_token'));
					$data = $this->Facebook->getApi('me?fields=id,email,name');
					$user = $this->User->getUserByEmail($data['email']);
					if ($user) {
						$this->Session->write('name_user', $user['User']['name']);
						$this->Session->write('id_user', $user['User']['id']);
					} else {
						$new_user = array(
							"name" => $data['name'],
							"email" => $data['email']
						);
						$this->User->create();
						$this->User->save($new_user);
						$id_user = $this->User->getLastInsertId();
						$new_cart = array(
							"id_user" => $id_user
						);
						$this->Cart->create();
						$this->Cart->save($new_cart);
						$this->Session->write('name_user', $data['name']);
						$this->Session->write('id_user', $id_user);
						$this->log($id_user);
					}
					$this->redirect('/');
				}
			}
			return false;
		}

		public function product($id_product)
		{
			$this->layout = 'product';
			$product = $this->Product->getProductByID($id_product);
			if($product){
				$this->getDataMenu();
				$hasBuy = false;
				if ($this->Session->read('id_user')) {
					$this->getDataCart();
					$invoice = $this->Invoice->getDoneOrder($this->Session->read('id_user'));
					$count_invoice = count($invoice);
					for ($i = 0; $i < $count_invoice; $i++) {
						$check = $this->Product_invoice->checkProductInInvoice($invoice[$i]['Invoice']['id'], $id_product);
						if ($check) {
							$hasBuy = true;
							break;
						}
					}
				} else {
					$this->set('cart', 0);
				}
				$this->set('hasBuy', $hasBuy);
				$related = $this->Product->getRelateProduct($product['Product']['id_genre']);
				$this->set('related', $related);
				$this->set('product', $product);
				$img = explode(",", $product['Product']['image']);
				$this->set('img', $img);
				$myRate = $this->Rating->getMyRate($this->Session->read('id_user'), $id_product);
				if ($myRate) {
					$this->set('myRate', $myRate['Rating']['rate']);
				}
			}else{
				$this->redirect('/home');
			}
		}
		public function getCart()
		{
			$this->layout = null;
			$cart = $this->Cart->find('first', array(
				'conditions' => array(
					'Cart.id_user' => $this->request->data['id_user']
				)
			));
			if ($cart['Cart']['detail'] != '' || $cart['Cart']['detail'] != '[]') {
				$total = 0;
				$data = json_decode($cart['Cart']['detail'], TRUE);
				for ($i = 0; $i < count($data); $i++) {
					array_push($data[$i], $this->Product->getProductName($data[$i]['id_product']));
					array_push($data[$i], $this->Product->getProductPrice($data[$i]['id_product']));
					array_push($data[$i], $this->Product->getProductImg($data[$i]['id_product']));
					$total += intval($this->Product->getProductPrice($data[$i]['id_product'])) * intval($data[$i]['amount']);
				}
				$this->set('data', $data);
			} else {
				$this->set('data', 0);
			}
			$this->render('/Admin/json');
		}
	}
