<?php
class ErrorController extends AppController
{

	public function page_404()
	{
		$this->layout = 'error';
	}
}
