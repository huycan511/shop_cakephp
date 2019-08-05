<?php
class NewsController extends AppController
{
	public $uses = array('Categories', 'Product', 'Store', 'Genre', 'News', 'Cart');
	public function index()
	{
		$this->layout = 'new';
		$categories = $this->Categories->find('all');
		$this->set('categories', $categories);
		if ($this->Session->read('id_user')) {
			$this->getDataCart();
		} else {
			$this->set('cart', 0);
		}
		$this->getDataMenu();
		$news = $this->News->find('all');
		$this->set('news', $news);
	}
	public function detail($id_new)
	{
		$this->layout = 'new';
		if ($this->Session->read('id_user')) {
			$this->getDataCart();
		} else {
			$this->set('cart', 0);
		}
		$this->getDataMenu();
		$new = $this->News->find('first', array(
			'conditions' => array(
				'News.id' => $id_new
			)
		));
		$this->set('new', $new);
	}
	public function addNew()
	{
		$new = new stdClass();
		$new->title = $this->request->data['title'];
		$new->date = $this->request->data['date'];
		$new->content = $this->request->data['content'];
		$new->img = $_FILES['image']['name'];
		move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/app/webroot/img/news/' . $_FILES['image']['name']);
		$this->News->create();
		$this->News->save($new);
	}
	public function editNew($id_new)
	{
		$this->layout = 'sbadmin';
		$new = $this->News->find('first', array(
			'conditions' => array(
				'News.id' => $id_new
			)
		));
		$this->set('new', $new);
	}
	public function editDate()
	{
		$update = new stdClass();
		$update->id = $this->request->data['id'];
		$update->date = $this->request->data['date'];
		$this->News->save($update);
	}
	public function editImgNew()
	{
		$update = new stdClass();
		$update->id = $this->request->data['id'];
		$update->img = $_FILES['img']['name'];
		move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/app/webroot/img/news/' . $_FILES['img']['name']);
		$this->News->save($update);
	}
	public function editContentNew()
	{
		$update = new stdClass();
		$update->id = $this->request->data['id'];
		$update->content = $this->request->data['content'];
		$this->News->save($update);
	}
	public function editShortContent()
	{
		$update = new stdClass();
		$update->id = $this->request->data['id'];
		$update->short_content = $this->request->data['short_content'];
		$this->News->save($update);
	}
	public function editTitle()
	{
		$update = new stdClass();
		$update->id = $this->request->data['id'];
		$update->title = $this->request->data['title'];
		$this->News->save($update);
	}
	function getProductImg($id_product)
	{
		$product = $this->Product->find('first', array(
			'conditions' => array(
				'Product.id' => $id_product
			)
		));
		$img = explode(",", $product['Product']['image']);
		return $img[0];
	}
	function getProductName($id_product)
	{
		$product = $this->Product->find('first', array(
			'conditions' => array(
				'Product.id' => $id_product
			)
		));
		return $product['Product']['name'];
	}
	function getProductPrice($id_product)
	{
		$product = $this->Product->find('first', array(
			'conditions' => array(
				'Product.id' => $id_product
			)
		));
		return $product['Product']['price'];
	}
}
