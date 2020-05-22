<?php
class ProductsController extends AppController
{
	public $uses = array('Categories', 'Product', 'Product_store', 'Genre', 'Store', 'Cart', 'Like', 'Supplier', 'Rating');

	public function index()
	{
		$this->layout = 'admin';
		if ($this->Session->read('type') == '3') {
			$products = $this->Product->find('all');
		} else {
			$products = $this->Product_store->find('all', array(
				'conditions' => array(
					'Product_store.id_store' => $this->Session->read('id')
				)
			));
			for ($i = 0; $i < count($products); $i++) {
				array_push($products[$i], $this->Product->getProductName($products[$i]['Product']['id']));
			}
		}
		$this->set('products', $products);
	}
	public function genre($id_genre)
	{
		if ($this->Session->read('id_user')) {
			$this->getDataCart();
		} else {
			$this->set('cart', 0);
		}
		$this->layout = 'category';
		$this->set('id_genre', $id_genre);
		$genre = $this->Genre->getGenreByID($id_genre);
		$this->set('genre', $genre);
		$this->getDataMenu();
	}
	public function details($id_product)
	{
		$this->checkBigAdmin();
		$this->layout = 'sbadmin';
		$product = $this->Product->getProductByID($id_product);
		$genres = $this->Genre->find('all');
		$categories = $this->Categories->find('all');
		$this->set('product', $product['Product']);
		$this->set('category', $product['genree']);
		$this->set('categories', $categories);
		$this->set('genres', $genres);
		$stores = $this->Store->find('all');
		foreach ($stores as &$value) {
			$amount = $this->Product_store->getProductOfStore($value['Store']['id'], $id_product);
			array_push($value, $amount['Product_store']['amount']);
		}
		$this->set('stores', $stores);
	}
	public function getProduct()
	{
		$this->layout = null;
		$genre = $this->Genre->getGenreByID($this->request->data['id_genre']);
		$data = array();
		$count = count($genre['productt']);
		for ($j = 0; $j < $count; $j++) {
			array_push($data, $genre['productt'][$j]);
		}
		$this->set('data', $data);
		$this->render('/Admins/json');
	}
	public function editName()
	{
		$this->layout = null;
		$product = new stdClass();
		$product->id = $this->request->data['id'];
		$product->name = $this->request->data['name'];
		$this->Product->save($product);
		$this->set('data', $product);
		$this->render('json');
	}
	public function editPrice()
	{
		$this->layout = null;
		$product = new stdClass();
		$product->id = $this->request->data['id'];
		$product->price = $this->request->data['price'];
		$this->Product->save($product);
		$this->set('data', $product);
		$this->render('json');
	}
	public function getAllProduct()
	{
		$this->layout = null;
		$products = $this->Product->find('all');
		$data = array();
		for ($i = 0; $i < count($products); $i++) {
			$product = new stdClass();
			$product->name = $products[$i]['Product']['name'];
			$img = explode(",", $products[$i]['Product']['image']);
			$product->icon = FIELD . "/app/webroot/img/product/" . $img[0];
			$product->link = FIELD . "/home/product/" . $products[$i]['Product']['id'];
			array_push($data, $product);
		}
		$this->set('data', $data);
		$this->render('json');
	}

	public function editDescription()
	{
		$this->layout = null;
		$product = new stdClass();
		$product->id = $this->request->data['id'];
		$product->description = $this->request->data['description'];
		$this->Product->save($product);
		$this->set('data', $product);
		$this->render('json');
	}
	public function editCategory()
	{
		$this->layout = null;
		$product = new stdClass();
		$product->id = $this->request->data['id'];
		$product->id_genre = $this->request->data['category'];
		$this->Product->save($product);
		$product->name_genre = $this->Genre->getGenreName($this->request->data['category']);
		$this->set('data', $product);
		$this->render('json');
	}
	public function editImg()
	{
		$this->layout = null;
		$data = new stdClass();
		$product = $this->Product->getProductByID($this->request->data['id']);
		if ($product['Product']['image'] != null) {
			$img = explode(",", $product['Product']['image']);
			for ($i = 0; $i < count($_FILES["file"]['name']); $i++) {
				array_push($img, $_FILES["file"]['name'][$i]);
				move_uploaded_file($_FILES['file']['tmp_name'][$i], $_SERVER['DOCUMENT_ROOT'] . '/app/webroot/img/product/' . $_FILES['file']['name'][$i]);
			}
			$data->image = implode(",", $img);
		} else {
			$img = array();
			for ($i = 0; $i < count($_FILES["file"]['name']); $i++) {
				array_push($img, $_FILES["file"]['name'][$i]);
				move_uploaded_file($_FILES['file']['tmp_name'][$i], $_SERVER['DOCUMENT_ROOT'] . '/app/webroot/img/product/' . $_FILES['file']['name'][$i]);
			}
			$data->image = implode(",", $img);
		}
		$data->id = $this->request->data['id'];
		$this->Product->save($data);
		$this->set('data', $this->request->data['id']);
		$this->render('json');
	}
	public function deleteImg()
	{
		$this->layout = null;
		$product = $this->Product->getProductByID($this->request->data['id']);
		$img = explode(",", $product['Product']['image']);
		for ($i = 0; $i < count($img); $i++) {
			if ($img[$i] == $this->request->data['img']) {
				unset($img[$i]);
			}
		}
		$data = new stdClass();
		$data->image = implode(",", $img);
		$data->id = $this->request->data['id'];
		$this->Product->save($data);
		$this->set('data', $data);
		$this->render('json');
	}
}
