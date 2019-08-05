<?php  
	class Comment extends AppModel{
		public $name = 'Comment';
		public $belongsTo = array('userr' => array('className' => 'User', 'foreignKey' => 'id_user'));
		public function getCommentID($id_product){
			$comments = $this->find('all',array('conditions'=>array(
				'Comment.id_commented'=>$id_product,
				'Comment.type'=>1
			)));
			return $comments;
		}
	}
?>