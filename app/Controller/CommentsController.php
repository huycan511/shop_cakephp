<?php
class CommentsController extends AppController
{
	public $uses = array('Rule', 'Question', 'Event', 'Homes', 'Comment');
	public function addCommentProduct()
	{
		$comment = new stdClass();
		$comment->id_user = 1;
		$comment->id_commented = $this->request->data['id_commented'];
		$comment->content = $this->request->data['content'];
		$comment->type = 1;
		$this->Comment->create();
		$this->Comment->save($comment);
	}
}
