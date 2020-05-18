<?php
App::import('Vendor', 'vendor', array('file' => 'autoload.php'));
class CommentsController extends AppController
{
	public $uses = array('Rule', 'Question', 'Event', 'Homes', 'Comment', 'Notification');
	private $pusher1 = null;
	private $options = null;

	public function beforeFilter() {
		$this->__createPusher();
	}

	private function __createPusher() {
		$this->options = array(
			'cluster' => 'ap1',
			'useTLS' => true
		);

		$this->pusher1 = new Pusher\Pusher (
			'5fd26f415e2c6b54fd0f',
			'81f3d51f133dcc9f5db0',
			'789449',
			$this->options
		);

		return $this->pusher1;
	}
}
