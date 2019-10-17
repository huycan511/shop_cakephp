<?php
class CategoriesController extends AppController
{
	public $uses = array('User', 'Store', 'Categories', 'Genre', 'Store', 'Cart', 'Like', 'Product', 'Rating');

	public function beforeFilter() {
		$this->getNotificationUser();
	}

	public function index($id_category)
	{
		$this->layout = 'category';
		if ($this->Session->read('id_user')) {
			$this->getDataCart();
		} else {
			$this->set('cart', 0);
		}
		$this->getDataMenu();
		$this->set('id_cate', $id_category);
	}
	public function getProduct()
	{
		$this->layout = null;
		$genre = $this->Genre->getGenreByIdCate($this->request->data('id_cate'));
		$data = array();
		$count_genre = count($genre);
		for ($i = 0; $i < $count_genre; $i++) {
			$count_genre_i = count($genre[$i]['productt']);
			for ($j = 0; $j < $count_genre_i; $j++) {
				array_push($genre[$i]['productt'][$j], $this->Rating->getRatingByID($genre[$i]['productt'][$j]['id']));
				array_push($data, $genre[$i]['productt'][$j]);
			}
		}

		$this->set('data', $data);
		$this->render('/Admins/json');
	}
}
