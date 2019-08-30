<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
	public $uses = array('Product', 'Like', 'Invoice', 'Cart', 'Notification');
	public function getDataCart()
	{
		$cart = $this->Cart->getMyCart($this->Session->read('id_user'));
		if ($cart['Cart']['detail'] != '' || $cart['Cart']['detail'] != '[]') {
			$total = 0;
			$array_cart_id = array();
			$data = json_decode($cart['Cart']['detail'], TRUE);
			for ($i = 0; $i < count($data); $i++) {
				array_push($data[$i], $this->Product->getProductName($data[$i]['id_product']));
				array_push($data[$i], $this->Product->getProductPrice($data[$i]['id_product']));
				array_push($data[$i], $this->Product->getProductImg($data[$i]['id_product']));
				$total += intval($this->Product->getProductPrice($data[$i]['id_product'])) * intval($data[$i]['amount']);
				array_push($array_cart_id, $data[$i]['id_product']);
			}
			$this->set('total', $total);
			$this->set('cart', $data);
			$this->set('array_id_cart', $array_cart_id);
		} else {
			$this->set('cart', 0);
		}
		$like = $this->Like->getMyLike($this->Session->read('id_user'));
		$this->set('like', $like);
	}
	public function getWishList()
	{
		$wishlist = $this->Like->getMyLike($this->Session->read('id_user'));
		if ($this->request->is('ajax')) {
			$this->layout = null;
			$this->set('data', count($wishlist));
			$this->render('/Admin/json');
		} else {
			return count($wishlist);
		}
	}
	public function checkAdmin()
	{
		if ($this->Session->read('id_admin') == null) {
			$this->redirect(array('controller' => 'admins', 'action' => 'login'));
		}
	}
	public function checkUser()
	{
		if (!$this->Session->read('id_user')) {
			$this->redirect(array('controller' => 'home', 'action' => 'index'));
		}
	}
	public function checkBigAdmin()
	{
		if ($this->Session->read('id_admin') == null || $this->Session->read('type') != 2) {
			$this->redirect(array('controller' => 'admins', 'action' => 'login'));
		}
	}
	public function getDataMenu()
	{
		$stores = $this->Store->find('all', array('conditions' => array('NOT' => array('Store.id' => 1))));
		$this->set('stores', $stores);
		$wishlist = $this->getWishList();
		$this->set('wishlist', $wishlist);
		$categories = $this->Categories->find('all');
		$this->set('categories', $categories);
	}

	public function getNotification() {
		$this->layout = null;
		$number_notification_not_check = $this->Notification->find('all', array(
			'conditions' => array(
				'Notification.status' => '',
				'Notification.id_store' => $this->Session->read('id_store'),
				'OR' => array(
					array('Notification.type' => 1),
					array('Notification.type' => 2),
					array('Notification.type' => 3)
				)
			)
		));
		$this->set('number_not_check', count($number_notification_not_check));

		$numberNewComment = $this->Notification->find('all', array('conditions' => array(
			'Notification.status' => '',
			'Notification.id_store' => $this->Session->read('id_store'),
				'OR' => array(
					array('Notification.type' => 1),
					array('Notification.type' => 2)
				)
			)
		));
		$this->set('number_new_comment', count($numberNewComment));

		$notifications = $this->Notification->find('all', array(
			'order' => array('Notification.create_at' => 'desc'),
			'conditions' => array(
				'Notification.id_store' => $this->Session->read('id_store'),
				'OR' => array(
					array('Notification.type' => 1),
					array('Notification.type' => 2),
					array('Notification.type' => 3)
				)
			)
		));

		$this->set('notifications', $notifications);
	}

	public function getNotificationUser() {
		$notisUser = $this->Notification->find('all', array(
			'order' => array('Notification.create_at' => 'desc'),
			'conditions' => array(
				'Notification.id_store' => $this->Session->read('id_user'),
				'Notification.type' => 4,
				'OR' => array(
					array('Notification.status' => ''),
					//array('Notification.status' => 2),
				)
			)
		));

		$this->set('notisUser', $notisUser);
	}
}
