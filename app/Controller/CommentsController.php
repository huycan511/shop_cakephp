<?php
class CommentsController extends AppController
{
	public $uses = array('Rule', 'Question', 'Event', 'Homes', 'Comment');
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
				return json_encode($new_comment['Comment']);
			}
		}
	}
}
