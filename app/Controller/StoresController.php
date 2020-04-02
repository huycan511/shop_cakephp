<?php
class StoresController extends AppController
{
	public $uses = array('Categories', 'Product', 'Store', 'Cart', 'Like', 'Product_store');
	public function index()
	{ }
	public function details($id_store)
	{
		$this->layout = 'sbadmin';
		$store = $this->Store->find('first', array(
			'conditions' => array(
				'Store.id' => $id_store
			)
		));
		$this->set('store', $store['Store']);
		$products = $this->Product_store->getAllStoreProduct($id_store);
		foreach ($products as &$value) {
			array_push($value, $this->Product->getProductName($value['Product_store']['id_product']));
		}
		$this->set('product', $products);
	}
	public function view($id_store)
	{
		$this->layout = 'store';
		$stores = $this->Store->find('all');
		$this->set('stores', $stores);
		$categories = $this->Categories->find('all', array('recursive' => 2));
		$this->set('categories', $categories);
		if ($this->Session->read('id_user')) {
			$this->getDataCart();
		} else {
			$this->set('cart', 0);
		}
		$this->getNotificationUser();
		if (!$this->Store->checkStoreExist($id_store)) {
			$this->redirect(array('controller' => 'home', 'action' => 'index'));
		}
		$store = $this->Store->getStoreByID($id_store);
		$this->set('store', $store['Store']);
		$this->getDataMenu();
	}
	public function editNameStore()
	{
		$update = new stdClass();
		$update->id = $this->request->data['id'];
		$update->name = $this->request->data['name'];
		$this->Store->save($update);
	}
	public function editAddrStore()
	{
		$update = new stdClass();
		$update->id = $this->request->data['id'];
		$update->address = $this->request->data['address'];
		$this->Store->save($update);
	}
	public function editLatStore()
	{
		$update = new stdClass();
		$update->id = $this->request->data['id'];
		$update->lat = $this->request->data['lat'];
		$this->Store->save($update);
	}
	public function editLngStore()
	{
		$update = new stdClass();
		$update->id = $this->request->data['id'];
		$update->lng = $this->request->data['lng'];
		$this->Store->save($update);
	}
	public function editPhoneStore()
	{
		$update = new stdClass();
		$update->id = $this->request->data['id'];
		$update->phone = $this->request->data['phone'];
		$this->Store->save($update);
	}
	public function editImgStore()
	{
		$update = new stdClass();
		$update->id = $this->request->data['id'];
		$update->image = $this->request->data['image'];
		$this->Store->save($update);
	}
}
