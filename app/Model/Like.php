<?php
	class Like extends AppModel{
		public $name = 'Like';
		public $belongsTo = array('productt' => array('className' => 'Product', 'foreignKey' => 'id_product'));
		public function getMyLike($id_user){
			$like = $this->find('all',array('conditions'=>array(
				'Like.id_user'=> $id_user
			)));
			return $like;
		}
		public function getLikeProduct($id_user, $id_product){
			$like = $this->find('first',array('conditions'=>array(
				'Like.id_user'=> $id_user,
				'Like.id_product'=> $id_product
			)));
			return $like;
		}
	}
?>