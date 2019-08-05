<?php
App::uses('SmtpTransport', '../../lib/Cake/Network/Email');
App::uses('CakeEmail', '../../lib/Cake/Network/Email');
App::import('Vendor', 'vendor', array('file' => 'autoload.php'));

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Helper;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class UsersController extends AppController
{
	public $uses = array('Store', 'Categories', 'Genre', 'Product', 'User', 'Cart', 'Invoice', 'Product_invoice', 'Like');

	function contact()
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Hello World !');

		$writer = new Xlsx($spreadsheet);
		$writer->save('hello world.xlsx');
		// $to = "huyn09136@gmail.com"; // this is your Email address
		// $from ='huynq@tmh-techlab.vn'; // this is the sender's Email address
		// $first_name = 'huy';
		// $last_name = 'nguyen';
		// $message = 'test';
		// $Email = new CakeEmail('gmail');
		// $Email->from($from);
		// $Email->to($to);
		// $Email->subject('Thư khách hàng '. $first_name . $last_name . ' liên hệ');
		// $Email->send($message);
		// echo "send mail success";

	}
	public function index()
	{
		$this->checkUser();
		$this->layout = 'account';
		$this->getDataCart();
		$this->getDataMenu();
		$user = $this->User->find('first', array('conditions' => array('User.id' => $this->Session->read('id_user'))));
		$this->set('user', $user);
	}
	public function logout()
	{
		$this->Session->destroy();
		$this->redirect(array('controller' => 'home', 'action' => 'index'));
	}
	public function basket()
	{
		$this->checkUser();
		$this->layout = 'account';
		$this->getDataCart();
		$this->getDataMenu();
	}
	public function wishlist()
	{
		$this->checkUser();
		$this->layout = 'account';
		$this->getDataCart();
		$this->getDataMenu();
	}
	public function changepass()
	{
		$this->checkUser();
		$this->layout = 'account';
		$this->getDataCart();
		$this->getDataMenu();
		$user = $this->User->find('first', array('conditions' => array('User.id' => $this->Session->read('id_user'))));
		$this->set('user', $user);
	}

	public function change_old_pass()
	{
		$this->layout = null;
		$user = $this->User->find('first', array(
			'conditions' => array(
				'User.id' => $this->request->data['id_user']
			)
		));
		if ($user['User']['password'] == $this->request->data['current_pass']) {
			$user = array(
				"id" => $this->request->data['id_user'],
				"password" => $this->request->data['new_pass']
			);
			$this->User->save($user);
			$this->set("data", 1);
			$this->render('/Admins/json');
		} else {
			$this->set("data", 0);
			$this->render('/Admins/json');
		}
	}
	public function set_new_pass()
	{
		$this->layout = null;
		$user = array(
			"id" => $this->request->data['id_user'],
			"password" => $this->request->data['new_pass']
		);
		$this->User->save($user);
		$this->set("data", 1);
		$this->render('/Admins/json');
	}
	public function checkout()
	{
		$this->checkUser();
		$this->layout = 'account';
		$this->getDataCart();
		$this->getDataMenu();
		$user = $this->User->find('first', array(
			'conditions' => array(
				'User.id' => $this->Session->read('id_user')
			)
		));
		$oldAddress = $user['User']['address'];
		$arrayAddress = json_decode($oldAddress, TRUE);
		$this->set('arrayAddress', $arrayAddress);
		$this->set('user', $user['User']);
	}
	public function addOnlineBill()
	{
		if ($this->Session->read('id_user')) {
			$this->layout = null;
			$cart = $this->Cart->find('first', array('conditions' => array('Cart.id_user' => $this->Session->read('id_user'))));
			$total = 0;
			$detail = json_decode($cart['Cart']['detail'], TRUE);
			for ($i = 0; $i < count($detail); $i++) {
				$total += intval($this->Product->getProductPrice($detail[$i]['id_product'])) * intval($detail[$i]['amount']);
			}
			$stores = $this->Store->find('all', array(
				'conditions' => array(
					'Store.type !=' => 2
				)
			));
			$list = [];
			for ($i = 0; $i < count($stores); $i++) {
				$dist = $this->distance($stores[$i]['Store']['lat'], $stores[$i]['Store']['lng'], $this->request->data['lat'], $this->request->data['lng']);
				array_push($list, $dist);
			}
			$index = array_search(min($list), $list);
			$bill = new stdClass();
			$bill->id_send = $stores[$index]['Store']['id'];
			$bill->id_receive = $this->Session->read('id_user');
			$bill->note = $this->request->data('note');
			$bill->address = $this->request->data('address');
			$bill->type = 4;
			$bill->status = 0;
			$bill->date = date("Y-m-d");
			$bill->price = $total + 0.1 * $total + 20000;
			$this->Invoice->create();
			$this->Invoice->save($bill);
			$id_invoice = $this->Invoice->getLastInsertID();
			for ($i = 0; $i < count($detail); $i++) {
				$invoice_product = new stdClass();
				$invoice_product->id_invoice = $id_invoice;
				$invoice_product->id_product = $detail[$i]['id_product'];
				$invoice_product->amount = $detail[$i]['amount'];
				$this->Product_invoice->create();
				$this->Product_invoice->save($invoice_product);
			}
			$this->set('data', $bill);
			$this->render('/Admins/json');
		}
	}
	public function orderlist()
	{
		$this->checkUser();
		$this->getDataCart();
		$this->getDataMenu();
		$this->layout = 'account';
		$bill_wait = $this->Invoice->find('all', array('conditions' => array(
			'Invoice.id_receive' => $this->Session->read('id_user'),
			'Invoice.type' => 4,
			'Invoice.status' => 0
		)));
		$bill_process = $this->Invoice->find('all', array('conditions' => array(
			'Invoice.id_receive' => $this->Session->read('id_user'),
			'Invoice.type' => 4,
			'Invoice.status' => 1
		)));
		$bill_success = $this->Invoice->find('all', array('conditions' => array(
			'Invoice.id_receive' => $this->Session->read('id_user'),
			'Invoice.type' => 4,
			'Invoice.status' => 2
		)));
		if ($bill_wait) {
			for ($i = 0; $i < count($bill_wait); $i++) {
				$product = $this->Product_invoice->find('all', array('conditions' => array(
					'Product_invoice.id_invoice' => $bill_wait[$i]['Invoice']['id']
				)));
				for ($j = 0; $j < count($product); $j++) {
					array_push($product[$j], $this->Product->getProductName($product[$j]['Product_invoice']['id_product']));
					array_push($product[$j], $this->Product->getProductPrice($product[$j]['Product_invoice']['id_product']));
					array_push($product[$j], $this->Product->getProductImg($product[$j]['Product_invoice']['id_product']));
				}
				array_push($bill_wait[$i], $product);
			}
			$this->set('bill_wait', $bill_wait);
		}
		if ($bill_process) {
			for ($i = 0; $i < count($bill_process); $i++) {
				$product = $this->Product_invoice->find('all', array('conditions' => array(
					'Product_invoice.id_invoice' => $bill_process[$i]['Invoice']['id']
				)));
				for ($j = 0; $j < count($product); $j++) {
					array_push($product[$j], $this->Product->getProductName($product[$j]['Product_invoice']['id_product']));
					array_push($product[$j], $this->Product->getProductPrice($product[$j]['Product_invoice']['id_product']));
					array_push($product[$j], $this->Product->getProductImg($product[$j]['Product_invoice']['id_product']));
				}
				array_push($bill_process[$i], $product);
			}
			$this->set('bill_process', $bill_process);
		}
		if ($bill_success) {
			for ($i = 0; $i < count($bill_success); $i++) {
				$product = $this->Product_invoice->find('all', array('conditions' => array(
					'Product_invoice.id_invoice' => $bill_success[$i]['Invoice']['id']
				)));
				for ($j = 0; $j < count($product); $j++) {
					array_push($product[$j], $this->Product->getProductName($product[$j]['Product_invoice']['id_product']));
					array_push($product[$j], $this->Product->getProductPrice($product[$j]['Product_invoice']['id_product']));
					array_push($product[$j], $this->Product->getProductImg($product[$j]['Product_invoice']['id_product']));
				}
				array_push($bill_success[$i], $product);
			}
			$this->set('bill_success', $bill_success);
		}
	}
	public function destroyBill($id_invoice)
	{
		$this->layout = null;
		$invoice = $this->Invoice->find('first', array('conditions' => array('Invoice.id' => $id_invoice)));
		$this->Invoice->delete($invoice['Invoice']['id']);
		$product_invoice = $this->Product_invoice->find('all', array('conditions' => array('Product_invoice.id_invoice' => $id_invoice)));
		for ($i = 0; $i < count($product_invoice); $i++) {
			$this->Product_invoice->delete($product_invoice[$i]['Product_invoice']['id']);
		}
		$this->set('data', $invoice);
		$this->render('/Admins/json');
	}
	public function login()
	{
		$this->layout = null;
		$acc = $this->User->find('first', array(
			'conditions' => array(
				'User.email' => $this->request->data['email'],
				'User.password' => $this->request->data['pass']
			)
		));
		if (!$acc) {
			$this->set('data', 0);
		} else {
			$this->Session->write('name_user', $acc['User']['name']);
			$this->Session->write('id_user', $acc['User']['id']);
			$this->set('data', 1);
		}
		$this->render('/Admins/json');
	}
	public function address()
	{
		$this->checkUser();
		$this->layout = 'account';
		$user = $this->User->find('first', array(
			'conditions' => array(
				'User.id' => $this->Session->read('id_user')
			)
		));
		$oldAddress = $user['User']['address'];
		$arrayAddress = json_decode($oldAddress, TRUE);
		$this->set('arrayAddress', $arrayAddress);
		$this->getDataCart();
		$this->getDataMenu();
	}
	public function addAddress()
	{
		if ($this->Session->read('id_user')) {
			$this->layout = null;
			$address = $this->request->data['address'];
			$user = $this->User->find('first', array(
				'conditions' => array(
					'User.id' => $this->Session->read('id_user')
				)
			));
			$oldAddress = $user['User']['address'];
			$arrayAddress = json_decode($oldAddress, TRUE);
			$this->set('arrayAddress', $arrayAddress);
			$newAddress = array();
			if ($oldAddress == null || $oldAddress == '[]' || $oldAddress == '') {
				$oneAddress = array(
					'id' => 1,
					'address' => $address,
					'lat' => $this->request->data['lat'],
					'lng' => $this->request->data['lng']
				);
				array_push($newAddress, $oneAddress);
				$update = new stdClass();
				$update->id = $user['User']['id'];
				$update->address = json_encode($newAddress);
			} else {
				$decodeAdd = json_decode($oldAddress, TRUE);
				$num = count($decodeAdd) - 1;
				$oneAddress = array(
					'id' => $decodeAdd[$num]['id'] + 1,
					'address' => $address,
					'lat' => $this->request->data['lat'],
					'lng' => $this->request->data['lng']
				);
				array_push($decodeAdd, $oneAddress);
				$update = new stdClass();
				$update->id = $user['User']['id'];
				$update->address = json_encode($decodeAdd);
			}
			$this->User->save($update);
			$this->set('data', $update);
			$this->render('/Admins/json');
		}
	}
	public function deleteAddress()
	{
		$this->layout = null;
		if ($this->Session->read('id_user')) {
			$id = $this->request->data['id'];
			$user = $this->User->find('first', array(
				'conditions' => array(
					'User.id' => $this->Session->read('id_user')
				)
			));
			$oldAddress = $user['User']['address'];
			$arrayAddress = json_decode($oldAddress, TRUE);
			for ($i = 0; $i < count($arrayAddress); $i++) {
				if ($id == $arrayAddress[$i]['id']) {
					unset($arrayAddress[$i]);
				}
			}
			$new = new stdClass();
			$new->id = $this->Session->read('id_user');
			$new->address = json_encode($arrayAddress);
			$this->User->save($new);
			$this->set('data', $new);
			$this->render('/Admins/json');
		}
	}

	public function cart()
	{
		$this->layout = null;
		if ($this->Session->read('id_user') !== null) {
			$res = 1;
		} else {
			$res = 0;
		}
		$this->set('data', $res);
		$this->render('/Admins/json');
	}
	public function removeProduct()
	{
		$this->layout = null;
		if ($this->Session->read('id_user')) {
			$cart = $this->Cart->getMyCart($this->Session->read('id_user'));
			$data = json_decode($cart['Cart']['detail'], TRUE);
			for ($i = 0; $i < count($data); $i++) {
				if ($data[$i]['id_product'] == $this->request->data['id_product']) {
					unset($data[$i]);
				}
			}
			$new = array();
			foreach ($data as $key => $value) {
				array_push($new, $value);
			}
			$update = new stdClass();
			$update->id = $cart['Cart']['id'];
			$update->detail = json_encode($new);
			$this->Cart->save($update);
			print_r($data);
			$this->set('data', $data);
			$this->render('/Admins/json');
		}
	}
	public function addToCart()
	{
		$this->layout = null;
		$cart = $this->Cart->find('first', array(
			'conditions' => array(
				'Cart.id_user' => $this->request->data['id_user']
			)
		));
		if ($cart['Cart']['detail'] != '') {
			$detail = json_decode($cart['Cart']['detail'], TRUE);
			$isExist = 0;
			for ($i = 0; $i < count($detail); $i++) {
				if ($detail[$i]['id_product'] == $this->request->data['id_product']) {
					$isExist = 1;
				}
			}
			if (!$isExist) {
				$addProduct = array(
					'id_product' => $this->request->data['id_product'],
					'amount' => 1
				);
				array_push($detail, $addProduct);
			}
		} else {
			$detail = array();
			$addProduct = array(
				'id_product' => $this->request->data['id_product'],
				'amount' => 1
			);
			array_push($detail, $addProduct);
		}
		// array_push($detail, $addProduct);
		$encode = json_encode($detail);
		$data = new stdClass();
		$data->id = $cart['Cart']['id'];
		$data->detail = $encode;
		$this->Cart->save($data);
		$this->set('data', $data);
		$this->render('/Admins/json');
	}

	public function updateCart()
	{
		$this->layout = null;
		if ($this->Session->read('id_user')) {
			$cart = $this->Cart->getMyCart($this->Session->read('id_user'));
			$data = json_decode($cart['Cart']['detail'], TRUE);
			for ($i = 0; $i < count($data); $i++) {
				if ($data[$i]['id_product'] == $this->request->data['id_product']) {
					$data[$i]['amount'] = $this->request->data['amount'];
				}
			}
			$encode = json_encode($data);
			$update = new stdClass();
			$update->id = $cart['Cart']['id'];
			$update->detail = $encode;
			$this->Cart->save($update);
			$this->set('data', $data);
			$this->render('/Admins/json');
		}
	}
	public function moreAmount()
	{
		$this->layout = null;
		if ($this->Session->read('id_user')) {
			$cart = $this->Cart->find('first', array(
				'conditions' => array(
					'Cart.id_user' => $this->Session->read('id_user')
				)
			));
			$data = json_decode($cart['Cart']['detail'], TRUE);
			for ($i = 0; $i < count($data); $i++) {
				if ($data[$i]['id_product'] == $this->request->data['id_product']) {
					$data[$i]['amount'] += 1;
				}
			}
			$encode = json_encode($data);
			$update = new stdClass();
			$update->id = $cart['Cart']['id'];
			$update->detail = $encode;
			$this->Cart->save($update);
			$this->set('data', $data);
			$this->render('/Admins/json');
		}
	}
	public function likeProduct()
	{
		$this->layout = null;
		if ($this->Session->read('id_user')) {
			$check = $this->Like->find('first', array('conditions' => array(
				'Like.id_product' => $this->request->data['id_product'],
				'Like.id_user' => $this->Session->read('id_user')
			)));
			if (!$check) {
				$like = new stdClass();
				$like->id_product = $this->request->data['id_product'];
				$like->id_user = $this->Session->read('id_user');
				$this->Like->create();
				$this->Like->save($like);
				$this->set('data', $like);
				$this->render('/Admins/json');
			}
		}
	}
	public function lessAmount()
	{
		$this->layout = null;
		if ($this->Session->read('id_user')) {
			$cart = $this->Cart->find('first', array(
				'conditions' => array(
					'Cart.id_user' => $this->Session->read('id_user')
				)
			));
			$data = json_decode($cart['Cart']['detail'], TRUE);
			for ($i = 0; $i < count($data); $i++) {
				if (($data[$i]['id_product'] == $this->request->data['id_product']) && ($data[$i]['amount'] > 0)) {
					$data[$i]['amount'] -= 1;
					$encode = json_encode($data);
					$update = new stdClass();
					$update->id = $cart['Cart']['id'];
					$update->detail = $encode;
					$this->Cart->save($update);
				}
			}
			$this->set('data', $data);
			$this->render('/Admins/json');
		}
	}
	public function editName()
	{
		$update = new stdClass();
		$update->id = $this->Session->read('id_user');
		$update->name = $this->request->data['name'];
		$this->User->save($update);
	}
	public function editPhone()
	{
		$update = new stdClass();
		$update->id = $this->Session->read('id_user');
		$update->phone = $this->request->data['phone'];
		$this->User->save($update);
	}
	public function removeWishlist()
	{
		$id_product = $this->request->data['id_product'];
		$row = $this->Like->getLikeProduct($this->Session->read('id_user'), $id_product);
		$this->Like->delete($row['Like']['id']);
		$this->redirect(array(
			"controller" => "users",
			"action" => "wishlist"
		));
	}
	public function register()
	{
		$this->layout = null;
		$acc = new stdClass();
		$acc->name = $this->request->data['name'];
		$acc->email = $this->request->data['email'];
		$acc->password = $this->request->data['password'];
		$this->User->create();
		$this->User->save($acc);
		$id_user = $this->User->getLastInsertId();
		$new_cart = array(
			"id_user" => $id_user
		);
		$this->Cart->create();
		$this->Cart->save($new_cart);
		// $to = $this->request->data['email'];
		//       $from ='huynq@tmh-techlab.vn';
		//       $message = "http://localhost:8080/expertsystem/users/confirmaccount/".$acc->code;
		//       $Email = new CakeEmail('gmail');
		//       $Email->from($from);
		//       $Email->to($to);
		//       $Email->subject('Vui lòng xác minh tài khoản của bạn');
		//       $Email->send($message);
		$this->set('data', $acc);
		$this->render('/Admins/json');
	}
	function distance($lat1, $lon1, $lat2, $lon2)
	{
		if (($lat1 == $lat2) && ($lon1 == $lon2)) {
			return 0;
		} else {
			$theta = $lon1 - $lon2;
			$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
			$dist = acos($dist);
			$dist = rad2deg($dist);
			$miles = $dist * 60 * 1.1515;
			return $miles;
		}
	}
}
