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


	public function addCommentProduct() {
		$this->autoRender = false;
		if ($this->request->is('post')) {
			$comment = new stdClass();
			$comment->id_user = $this->Session->read('id_user');
			$comment->id_commented = $this->request->data['id_commented'];
			$comment->content = $this->request->data['content'];
			$comment->id_parent = $this->request->data['id_comment_parent'];
			$this->Comment->create();
			if ($this->Comment->save($comment)) {
				$last_id = $this->Comment->getLastInsertId();
				$new_comment = $this->Comment->find('first', array('conditions' => array('Comment.id' => $last_id)));
				array_push($new_comment['Comment'], $this->Session->read('name_user'));

				$notificate = new stdClass();
				$notificate->id_key_notication = $this->request->data['id_commented'];
				if ($new_comment['Comment']['id_parent'] != '') {
					$notificate->type = 2;
				}
				$this->Notification->create();

				if ($this->Notification->save($notificate)) {
					$last_id_notifiction = $this->Notification->getLastInsertId();
					$new_notification = $this->Notification->find('first', array('conditions' => array('Notification.id' => $last_id_notifiction)));
					$this->pusher1->trigger('Notification', 'Show_Noti_Comment_1', $new_notification);
				}

				return json_encode($new_comment['Comment']);
			}
		}
	}
}
