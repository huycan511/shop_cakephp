<?php
class Store extends AppModel{
    public $name = 'Store';
    public function getStoreName($id_store){
		$store = $this->find('first',array('conditions'=>array(
			'Store.id'=>$id_store
		)));
		return $store['Store']['name'];
	}
	public function checkPassAndMail($mail,$pass){
		$store = $this->find('first', array(
			'conditions' => array(
				'Store.email' => $mail,
				'Store.password' => $pass
		)));
		return $store;
	}
	public function getStoreByID($id_store){
		$store = $this->find('first', array(
			'conditions' => array(
				'Store.id' => $id_store
		)));
		return $store;
	}
	public function checkStoreExist($id_store){
		$store = $this->find('first', array(
			'conditions' => array(
				'Store.id' => $id_store
		)));
		if($store){
			return 1;
		}else{
			return 0;
		}
	}
	public function getAnotherStore($id_store){
		$stores = $this->find('all', array(
		    'conditions' => array(
		        "NOT" => array( "Store.id" => $id_store)
		    )
		));
		return $stores;
	}
}