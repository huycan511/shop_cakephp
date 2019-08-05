<?php  
	class Product_invoice extends AppModel{
		public $useTable = 'product_invoice';
		public $name = 'Product_invoice';
		public function checkProductInInvoice($id_invoice,$id_product){
			$check = $this->find('all', array(
				'conditions' => array(
					'Product_invoice.id_invoice' => $id_invoice,
					'Product_invoice.id_product'=> $id_product
			)));
			return $check;
		}
		public function getProductOfInvoice($id_invoice){
			$products = $this->find('all', array(
				'conditions' => array('Product_invoice.id_invoice' => $id_invoice)
			));
			return $products;
		}
	}
?>