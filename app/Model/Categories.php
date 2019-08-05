<?php  
	class Categories extends AppModel{
		public $useTable = 'categories';
		public $name = 'Categories';
		public $hasMany = array('genree' => array('className' => 'Genre', 'foreignKey' => 'id_cate'));
	}
?>