<?php
class RatingsController extends AppController
{
	public function addRate()
	{
		$this->layout = null;
		$rate = new stdClass();
		$rate->id_product = $this->request->data['id_product'];
		$rate->rate = $this->request->data['rate'];
		$rate->id_user = $this->Session->read('id_user');
		$hasRate = $this->Rating->getMyRate($this->Session->read('id_user'), $this->request->data['id_product']);
		if ($hasRate) {
			$rate->id = $hasRate['Rating']['id'];
			$this->Rating->save($rate);
		} else {
			$this->Rating->create();
			$this->Rating->save($rate);
		}
	}
}
