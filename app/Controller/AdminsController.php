<?php
class AdminsController extends AppController
{
	public $uses = array('Categories', 'Product', 'Store', 'Genre', 'News', 'Manage', 'Admin', 'Product_store', 'Supplier', 'Invoice', 'Product_invoice');
	public function index()
	{
		if ($this->Session->read('id_admin') == null) {
			$this->redirect(array('controller' => 'admins', 'action' => 'login'));
		}
		$this->layout = 'admin';
		$products = $this->Product_store->find('all', array(
			'conditions' => array(
				'Product_store.id_store' => $this->Session->read('id_store')
			)
		));
		for ($i = 0; $i < count($products); $i++) {
			array_push($products[$i], $this->getProductName($products[$i]['Product_store']['id_product']));
		}
		$this->set('products', $products);
	}
	function getProductName($id_product)
	{
		$product = $this->Product->find('first', array(
			'conditions' => array(
				'Product.id' => $id_product
			)
		));
		return $product;
	}
	public function login()
	{
		$this->layout = 'login';
	}
	public function invoices()
	{
		$this->layout = 'admin';
		if ($this->Session->read('id_admin')) {
			$invoices = $this->Invoice->find('all', array('conditions' => array(
				'Invoice.id_send' => $this->Session->read('id_store'),
				'OR' => array(
					array('Invoice.type' => 3),
					array('Invoice.type' => 4)
				),
				'OR' => array(
					array('Invoice.status' => 2),
					array('Invoice.status' => null)
				)
			)));
			for ($i = 0; $i < count($invoices); $i++) {
				array_push($invoices[$i], $this->getStoreName($invoices[$i]['Invoice']['id_send']));
			}
			$this->set('invoices', $invoices);
		}
	}
	public function categories()
	{
		if ($this->Session->read('id_admin') == null || $this->Session->read('type') != '2') {
			$this->redirect(array('controller' => 'admins', 'action' => 'login'));
		}
		$this->layout = 'admin';
		$categories = $this->Categories->find("all");
		$this->set('categories', $categories);
	}
	public function bill()
	{
		if ($this->Session->read('id_admin') == null) {
			$this->redirect(array('controller' => 'admins', 'action' => 'login'));
		}
		$this->layout = 'admin';
		$products = $this->Genre->find('all');
		$this->set('products', $products);
		$bill = $this->Invoice->find('all', array(
			'conditions' => array(
				'Invoice.id_send' => $this->Session->read('id_store'),
				'Invoice.type' => 3
			)
		));
		$this->set('bill', $bill);
	}
	public function onlinebill()
	{
		if ($this->Session->read('id_admin') == null) {
			$this->redirect(array('controller' => 'admins', 'action' => 'login'));
		}
		$this->layout = 'admin';
		$onlinebill = $this->Invoice->find('all', array('conditions' => array(
			'Invoice.id_send' => $this->Session->read('id_store'),
			'Invoice.type' => 4
		)));
		$this->set('bill', $onlinebill);
	}
	public function products()
	{
		if ($this->Session->read('id_admin') == null || $this->Session->read('type') != '2') {
			$this->redirect(array('controller' => 'admins', 'action' => 'login'));
		}
		$this->layout = 'admin';
		$categories = $this->Categories->find("all");
		$this->set('categories', $categories);
		$products = $this->Product->find('all');
		$this->set('products', $products);
	}
	public function supplier()
	{
		$this->layout = 'admin';
		$supplier = $this->Supplier->find('all');
		$this->set('supplier', $supplier);
	}
	public function manager()
	{
		if ($this->Session->read('id_admin') == null || $this->Session->read('type') != '2') {
			$this->redirect(array('controller' => 'admins', 'action' => 'login'));
		}
		$this->layout = 'admin';
		$manager = $this->Manage->find('all', array(
			'conditions' => array(
				'Manage.type' => 1
			)
		));
		$this->set('manager', $manager);
		$stores = $this->Store->find('all', array(
			'conditions' => array("NOT" => array("Store.id" => 4))
		));
		$this->set('stores', $stores);
	}
	public function genre()
	{
		if ($this->Session->read('id_admin') == null || $this->Session->read('type') != '2') {
			$this->redirect(array('controller' => 'admins', 'action' => 'login'));
		}
		$this->layout = 'admin';
		$categories = $this->Categories->find("all");
		$this->set('categories', $categories);
		$genres = $this->Genre->find('all');

		$this->set('genres', $genres);
	}
	public function stores()
	{
		if ($this->Session->read('id_admin') == null || $this->Session->read('type') != '2') {
			$this->redirect(array('controller' => 'admins', 'action' => 'login'));
		}
		$this->layout = 'admin';
		$stores = $this->Store->find('all');
		$this->set('stores', $stores);
	}
	public function news()
	{
		if ($this->Session->read('id_admin') == null || $this->Session->read('type') != '2') {
			$this->redirect(array('controller' => 'admins', 'action' => 'login'));
		}
		$this->layout = 'admin';
		$news = $this->News->find('all');
		$this->set('news', $news);
	}
	public function addStore()
	{
		$this->layout = null;
		$store = new stdClass();
		$store->name = $this->request->data['name'];
		$store->phone = $this->request->data['phone'];
		$store->email = $this->request->data['email'];
		$store->address = $this->request->data['address'];
		$store->image = $this->request->data['image'];
		$store->password = $this->request->data['pass'];
		$this->Store->create();
		$this->Store->save($store);
		$id_store = $this->Store->getLastInsertId();
		$products = $this->Product->find('all');
		for ($i = 0; $i < count($products); $i++) {
			$product_store = new stdClass();
			$product_store->id_store = $id_store;
			$product_store->id_product = $products[$i]['Product']['id'];
			$product_store->amount = 0;
			$this->Product_store->create();
			$this->Product_store->save($product_store);
		}
		$this->set('data', $store);
		$this->render('json');
	}
	public function addProduct()
	{
		$this->layout = null;
		$product = new stdClass();
		$product->name = $this->request->data['name'];
		$product->id_genre = $this->request->data['category'];
		$product->description = $this->request->data['description'];
		$product->price = $this->request->data['price'];
		$product->image = implode(",", $_FILES["file"]['name']);
		for ($i = 0; $i < count($_FILES["file"]['name']); $i++) {
			move_uploaded_file($_FILES['file']['tmp_name'][$i], $_SERVER['DOCUMENT_ROOT'] . '/app/webroot/img/product/' . $_FILES['file']['name'][$i]);
		}
		$this->Product->save($product);
		$id_product = $this->Product->getLastInsertID();
		$store = $this->Store->find('all');
		for ($i = 0; $i < count($store); $i++) {
			$new = new stdClass();
			$new->id_product = $id_product;
			$new->id_store = $store[$i]['Store']['id'];
			$new->amount = 0;
			$this->Product_store->create();
			$this->Product_store->save($new);
		}
		$this->set('data', $product);
		$this->render('json');
	}
	public function addBill()
	{
		$this->layout = null;
		$name_product = array();
		$amount_product = array();
		$price = 0;
		$invoice = new stdClass();
		$invoice->id_send = $this->request->data['id_sent'];
		if ($this->request->data['id_receive'] != 'Khách vãng lai') {
			$invoice->id_receive = $this->request->data['id_receive'];
		}
		$invoice->type = 3;
		$invoice->date = $this->request->data['date'];
		$dataform = $this->request->data['dataform'];
		for ($i = 0; $i < count($dataform); $i++) {
			if (($dataform[$i]['name'] == 'name_product') && ($dataform[$i]['value'] != 'Choose...')) {
				array_push($name_product, $dataform[$i]['value']);
			} else if (($dataform[$i]['name'] == 'amount_product') && ($dataform[$i]['value'] != '')) {
				array_push($amount_product, $dataform[$i]['value']);
			}
		}
		for ($i = 0; $i < count($name_product); $i++) {
			$product = $this->Product->find('first', array(
				'conditions' => array(
					'Product.id' => $name_product[$i]
				)
			));
			$price += $product['Product']['price'] * $amount_product[$i];
		}
		for ($i = 0; $i < count($name_product); $i++) {
			$data = $this->Product_store->find('first', array(
				'conditions' => array(
					'Product_store.id_store' => $this->request->data['id_sent'],
					'Product_store.id_product' => $name_product[$i]
				)
			));
			$amount = $data['Product_store']['amount'] - $amount_product[$i];
			$update = new stdClass();
			$update->id = $data['Product_store']['id'];
			$update->amount = $amount;
			$this->Product_store->save($update);
		}
		$invoice->price = $price;
		$this->Invoice->save($invoice);
		$id_invoice = $this->Invoice->getLastInsertId();
		for ($i = 0; $i < count($name_product); $i++) {
			$data = new stdClass();
			$data->id_invoice = $id_invoice;
			$data->id_product = $name_product[$i];
			$data->amount = $amount_product[$i];
			$this->Product_invoice->create();
			$this->Product_invoice->save($data);
		}
		$this->set('data', $invoice);
		$this->render('/Admins/json');
	}
	public function addCategory()
	{
		$this->layout = null;
		$category = new stdClass();
		$category->name = $this->request->data['category'];
		$this->Categories->create();
		$this->Categories->save($category);
		$this->set('data', $category);
		$this->render('json');
	}
	public function addGenre()
	{
		$this->layout = null;
		$genre = new stdClass();
		$genre->name = $this->request->data['name'];
		$genre->id_cate = $this->request->data['id_cate'];
		$this->Genre->create();
		$this->Genre->save($genre);
		$this->set('data', $genre);
		$this->render('json');
	}
	public function editCate()
	{
		$this->layout = null;
		$category = new stdClass();
		$category->id = $this->request->data['id'];
		$category->name = $this->request->data['category'];
		$this->Categories->save($category);
		$this->set('data', $category);
		$this->render('json');
	}

	public function addManage()
	{
		$this->layout = null;
		$manage = new stdClass();
		$manage->name = $this->request->data['name'];
		$manage->phone = $this->request->data['phone'];
		$manage->mail = $this->request->data['mail'];
		$manage->id_store = $this->request->data['id_store'];
		$manage->pass = $this->request->data['pass'];
		$this->Manage->create();
		$this->Manage->save($manage);
		$this->set('data', $manage);
		$this->render('json');
	}
	public function addSupplier()
	{
		$this->layout = null;
		$supplier = new stdClass();
		$supplier->name = $this->request->data['name'];
		$supplier->email = $this->request->data['mail'];
		$supplier->phone = $this->request->data['phone'];
		$supplier->address = $this->request->data['address'];
		$this->Supplier->create();
		$this->Supplier->save($supplier);
		$this->set('data', $supplier);
		$this->render('json');
	}
	public function checkLogin()
	{
		$this->layout = null;
		$store = $this->Store->find('first', array(
			'conditions' => array(
				'Store.email' => $this->request->data['mail'],
				'Store.password' => $this->request->data['pass']
			)
		));
		if ($store) {
			$this->Session->write('name_store', $store['Store']['name']);
			$this->Session->write('id_admin', $store['Store']['id']);
			$this->Session->write('id_store', $store['Store']['id']);
			$this->Session->write('type', $store['Store']['type']);
			$this->set('data', 'success');
		} else {
			$this->set('data', 'error');
		}
		$this->render('json');
	}
	private function __checkSession()
	{
		if (!$this->Session->read('id_admin')) {
			return false;
		}
		return true;
	}
	function getStoreName($id_store)
	{
		$store = $this->Store->find('first', array('conditions' => array('Store.id' => $id_store)));
		return $store['Store']['name'];
	}
}
