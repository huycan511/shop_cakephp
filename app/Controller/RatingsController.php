<?php
class RatingsController extends AppController
{
	public $uses = array('Product', 'Rating');
	public function addRate()
	{
		$this->layout = null;
		$id_product = $this->request->data['id_product'];
		$rate = new stdClass();
		$rate->id_product = $id_product;
		$rate->rate = $this->request->data['rate'];
		$rate->id_user = $this->Session->read('id_user');
		$hasRate = $this->Rating->getMyRate(12, $id_product);
		if ($hasRate) {
			$rate->id = $hasRate['Rating']['id'];
			$this->Rating->save($rate);
		} else {
			$this->Rating->create();
			$this->Rating->save($rate);
		}
		$averageRating = $this->Rating->getRatingByID($id_product);
		$this->Product->updateRating($id_product, $averageRating);
	}
}
