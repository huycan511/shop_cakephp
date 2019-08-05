<?php
class MailsController extends AppController
{
	public function subscribe(){
		$this->layout = null;
		$mail = new stdClass();
		$mail->email = $this->request->data['mail'];
		$this->Mail->save($mail);
	}
}
