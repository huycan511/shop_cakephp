<?php  
	class Rating extends AppModel{
		public $name = 'Rating';
		public function getRatingByID($id_product){
			$rating = $this->find('all', array('conditions'=>array(
				'Rating.id_product'=>$id_product
			)));
			$count = count($rating);
			if($rating){
				$totalRate = 0;
				for ($k=0; $k < $count ; $k++) { 
					$totalRate = $totalRate + $rating[$k]['Rating']['rate'];
				}
				$average = $totalRate/$count;	
			}else{
				$average = 0;
			}
			return $average;
		}
		public function getMyRate($id_user,$id_product){
			$myRate = $this->find('first', array('conditions'=>array(
				'Rating.id_product'=>$id_product,
				'Rating.id_user'=>$id_user
			)));
			return $myRate;
		}
	}
?>