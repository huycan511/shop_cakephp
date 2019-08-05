<?php
class CategoriesController extends AppController
{
	public $uses = array('User', 'Store', 'Categories', 'Genre', 'Store', 'Cart', 'Like', 'Product', 'Rating');
	public function index($id_category)
	{
		$this->layout = 'category';
		if ($this->Session->read('id_user')) {
			$this->getDataCart();
		} else {
			$this->set('cart', 0);
		}
		$data = $this->Genre->getGenreByIdCate($id_category);
		$count_data = count($data);
		$products = array();
		for ($i = 0; $i < $count_data; $i++) {
			$count_data_i = count($data[$i]['productt']);
			for ($j = 0; $j < $count_data_i; $j++) {
				array_push($products, $data[$i]['productt'][$j]);
			}
		}
		$count_product = count($products);
		for ($i = 0; $i < $count_product; $i++) {
			$img = explode(",", $products[$i]['image']);
			array_push($products[$i], $img[0]);
		}
		for ($i = 0; $i < $count_product; $i++) {
			$average = $this->Rating->getRatingByID($products[$i]['id']);
			array_push($products[$i], 0);
		}
		$this->getDataMenu();
		$this->set('id_cate', $id_category);
		$this->set('products', $products);
	}
	public function getProduct()
	{
		$this->layout = null;
		$genre = $this->Genre->getGenreByIdCate($this->request->data['id_cate']);
		$data = array();
		$count_genre = count($genre);
		for ($i = 0; $i < $count_genre; $i++) {
			$count_genre_i = count($genre[$i]['productt']);
			for ($j = 0; $j < $count_genre_i; $j++) {
				array_push($data, $genre[$i]['productt'][$j]);
			}
		}
		$this->set('data', $data);
		$this->render('/Admins/json');
	}
}
