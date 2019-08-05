<?php  
	class Supplier extends AppModel{
		public $name = 'Supplier';
		public function getSupplierName($id_supplier){
			$supplier = $this->find('first', array(
				'conditions' => array(
					'Supplier.id' => $id_supplier
			)));
			return $supplier['Supplier']['name'];
		}
	}
?>