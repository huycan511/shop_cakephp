<?php
App::uses('SmtpTransport', '../../lib/Cake/Network/Email');
App::uses('CakeEmail', '../../lib/Cake/Network/Email');
App::import('Vendor', 'vendor', array('file' => 'autoload.php'));
class MailsController extends AppController
{
	public function subscribe(){
		$this->layout = null;
		$mail = new stdClass();
		$mail->email = $this->request->data['mail'];
		$this->Mail->save($mail);
	}

	public function sendMail(){
		$this->layout = null;
		$emails = $this->Mail->find('all');
		$from ='huynq@tmh-techlab.vn';
		$subject = $this->request->data['subject'];
		$message = $this->request->data['msg'];
		$Email = new CakeEmail('gmail');
		$Email->subject($subject);
		$Email->from($from);
		for ($i=0; $i < count($emails); $i++) {
			$to = $emails[$i]['Mail']['email'];
			$Email->to($to);
			$Email->send($message);
		}
		echo "success";
	}
}
