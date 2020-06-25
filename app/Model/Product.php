<?php
	class Product extends AppModel{
		public $name = 'Product';
		public $belongsTo = array('genree' => array('className' => 'Genre', 'foreignKey' => 'id_genre'));
		public function getProductImg($id_product){
			$product = $this->find('first', array(
				'conditions' => array(
					'Product.id' => $id_product
			)));
			$img = explode(",", $product['Product']['image']);
			return $img[0];
		}
		public function getProductName($id_product){
			$product = $this->find('first', array(
				'conditions' => array(
					'Product.id' => $id_product
			)));
			return $product['Product']['name'];
		}
		public function getProductPrice($id_product){
			$product = $this->find('first', array(
				'conditions' => array(
					'Product.id' => $id_product
			)));
			return $product['Product']['price'];
		}
		public function getProductByID($id_product){
			$product = $this->find('first', array('conditions'=>array(
				'Product.id'=>$id_product
			)));
			return $product;
		}
		public function getRelateProduct($id_genre){
			$related = $this->find('all', array('conditions'=>array(
				'Product.id_genre'=> $id_genre
			)));
			return $related;
		}
		public function updateRating($id_product, $rating){
			$product = new stdClass();
			$product->id = $id_product;
			$product->rating = $rating;
			$this->save($product);
		}
		public function searchProducst($name, $price){
			switch ($price) {
				case 1:
					$price_range = [0, 20000];
					break;
				case 2:
					$price_range = [20000, 50000];
					break;
				case 3:
					$price_range = [50000, 100000];
					break;
				case 4:
					$price_range = [100000, 99999999999999999];
					break;
				default:
					$price_range = array(0, 99999999999999999);
					break;
			}
			$products = $this->find('all', array('conditions'=>array(
				'Product.name LIKE' => '%'. $name . '%',
				'Product.price >= ' => $price_range[0],
				'Product.price < ' => $price_range[1],
			),'order'=>array('Product.price')));
			return $products;
		}
	}
?>
