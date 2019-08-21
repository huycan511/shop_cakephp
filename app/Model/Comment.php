<?php
	class Comment extends AppModel{
		public $name = 'Comment';
		public $belongsTo = array('userr' => array('className' => 'User', 'foreignKey' => 'id_user'));
		public function getCommentID($id_product){
			$comments = $this->find('all',array('conditions'=>array(
				'Comment.id_commented' => $id_product,
				'Comment.id_parent' => ''
			)));
			return $comments;
		}

		public function getCommentChild($id_product, $id_parent){
			$comments = $this->find('all',array('conditions'=>array(
				'Comment.id_commented' => $id_product,
				'Comment.id_parent' => $id_parent
			)));
			return $comments;
		}
	}
?>