<?php  
	class Invoice extends AppModel{
		public $name = 'Invoice';
		public function checkExistInvoice($id_invoice){
			$check = $this->find('first', array(
				'conditions' => array(
					'Invoice.id' => $id_invoice
			)));
			return $check;
		}
		public function getDoneOrder($id_user){
			$invoice = $this->find('all', array(
				'conditions' => array(
					'Invoice.type' => 4,
					'Invoice.id_receive'=>$id_user,
					'Invoice.status'=>2
			)));
			return $invoice;
		}
		public function getPending($id_store){
			$pending = $this->find('all',  array(
				'conditions' => array(
					'Invoice.id_send' => $id_store,
					'Invoice.status' => 0,
					'Invoice.type'=>4
			)));
			return $pending;
		}
		public function getTotalEarn($id_store){
			$total_earn = $this->find('all',  array(
				'conditions' => array(
					'Invoice.id_send' => $id_store,
					'Invoice.status' => 2,
					'Invoice.type'=>4
			)));
			return $total_earn;
		}
		public function getAllInvoice(){
			$invoices = $this->find('all',array('conditions'=>array(
				'Invoice.id_send'=>$this->Session->read('id_store'),
				'OR' => array(
		            array('Invoice.type' => 3),
		            array('Invoice.type' => 4)
		        ),
		        'OR' => array(
		        	array('Invoice.status' =>2),
		        	array('Invoice.status' => null)
		        )
			)));
			return $invoices;
		}
		public function getOnlineBill($id_store){
			$onlinebill = $this->find('all',array('conditions'=>array(
				'Invoice.id_send'=>$id_store,
				'Invoice.type'=>4
			)));
			return $onlinebill;
		}
		public function getExport($id_store){
			$invoices = $this->find('all', array(
				'conditions' => array(
					'Invoice.id_send' => $id_store,
					'Invoice.type'=> 2
			)));
			return $invoices;
		}
		public function getImport($id_store){
			$invoices = $this->find('all', array(
				'conditions' => array(
					'Invoice.id_receive' => $id_store,
					'OR' => array(
		            array('Invoice.type' => 1),
		            array('Invoice.type' => 2)
		        )
			)));
			return $invoices;
		}
	}
?>