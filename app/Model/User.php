<?php
class User extends AppModel{
    public $name = 'User';
    public function getUserByEmail($email){
    	$user = $this->find('first',array(
		'conditions' => array(
			'User.email' => $email
		)));
		return $user;
    }
    public function getUserName($id_user){
		$user = $this->find('first',array('conditions'=>array(
			'User.id'=>$id_user
		)));
		return $user['User']['name'];
	}
	public function getUserPhone($id_user){
		$user = $this->find('first',array('conditions'=>array(
			'User.id'=>$id_user
		)));
		return $user['User']['phone'];
	}
}