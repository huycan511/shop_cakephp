<?php  
	class Product_store extends AppModel{
		public $useTable = 'product_store';
		public $name = 'Product_store';
		public function getAllStoreProduct($id_store){
			$products = $this->find('all', array(
				'conditions' => array(
					'Product_store.id_store' => $id_store
			)));
			return $products;
		}
		public function getProductOfStore($id_store,$id_product){
			$data = $this->find('first', array(
				'conditions' => array(
					'Product_store.id_store' => $id_store,
					'Product_store.id_product'=> $id_product
				)
			));
			return $data;
		}
	}
?>