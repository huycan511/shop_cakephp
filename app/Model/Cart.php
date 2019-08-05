<?php
	class Cart extends AppModel{
		public $name = 'Cart';
		public function getMyCart($id_user){
			$cart = $this->find('first', array(
				'conditions' => array(
					'Cart.id_user' => $id_user
			)));
			return $cart;
		}
	}
?>