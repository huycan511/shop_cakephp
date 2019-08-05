<?php  
	class Genre extends AppModel{
		public $name = 'Genre';
		public $hasMany = array('productt' => array('className' => 'Product', 'foreignKey' => 'id_genre'));
		public function getGenreByIdCate($id_cate){
			$genre = $this->find('all', array(
				'conditions' => array(
					'Genre.id_cate' => $id_cate
			)));
			return $genre;
		}
		public function getGenreByID($id_genre){
			$genre = $this->find('first',array('conditions'=>array(
				'Genre.id'=>$id_genre
			)));
			return $genre;
		}
		public function getGenreName($id_genre){
			$genre = $this->find('first', array(
				'conditions' => array(
					'Genre.id' => $id_genre
			)));
			return $genre['Genre']['name'];
		}
	}
?>