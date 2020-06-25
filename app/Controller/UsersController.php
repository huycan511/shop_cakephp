<?php
App::uses('SmtpTransport', '../../lib/Cake/Network/Email');
App::uses('CakeEmail', '../../lib/Cake/Network/Email');
App::import('Vendor', 'vendor', array('file' => 'autoload.php'));

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
class UsersController extends AppController
{
	public $uses = array('Store', 'Categories', 'Genre', 'Product', 'User', 'Cart', 'Invoice', 'Product_invoice', 'Like');

	private $pusher = null;
	private $options = null;

	public function beforeFilter()
	{
		$this->__createPusher();
	}

	private function __createPusher()
	{
		$this->options = array(
			'cluster' => 'ap1',
			'useTLS' => true
		);

		$this->pusher = new Pusher\Pusher(
			'f552927cd047ec3e0bcb',
			'1ea37ba3fa9c67a6f9b4',
			'692338',
			$this->options
		);

		return $this->pusher;
	}

	function contact()
	{
		$start = $this->params['url']['start'];
		$end = $this->params['url']['end'];
		$type = $this->params['url']['type'];
		$result = [];
		if($type == 1){
			$arr = $this->getDatesFromRange($start, $end);
			$conditions = array(
				'fields' => array('Invoice.date, sum(Invoice.price) as total'),
				'group' => 'Invoice.date',
				'conditions' => array(
				'Invoice.type' => array(3,4),
				'Invoice.id_send' => $this->Session->read('id_store'),
				'and' => array(
								array('Invoice.date >= ' => $start,
									'Invoice.date <= ' => $end
									)
					)));
			$data = $this->Invoice->find('all',$conditions );
			for ($i=0; $i < count($arr); $i++) {
				$el = [
					'date' => $arr[$i],
					'total' => $this->getTotalOfDate($arr[$i], $data),
				];
				array_push($result, $el);
			}
			$title = 'DOANH THU CỬA HÀNG';
			$title1 = 'Ngày';
			$title2 = 'Doanh thu bán';
		}else if($type == 2){
			$data = $this->Invoice->getProductReport($start, $end);
			for($i = 0; $i < count($data); $i++){
				$el = [
					'date' => $data[$i]['products']['name'],
					'total' => $data[$i]['0']['total'],
				];
				array_push($result, $el);
			}
			$title = 'DOANH SỐ SẢN PHẨM';
			$title1 = 'Sản phẩm';
			$title2 = 'Doanh số bán';
		}
		$styleArray = [
			'borders' => [
				'outline' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
					'color' => ['argb' => '000'],
				],
			],
		];



        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        //set default font
        $spreadsheet->getDefaultStyle()->getFont()->setName('Arial')->setSize(16);

        //Heading
        $spreadsheet->getActiveSheet()->setCellValue('A1', $title);
        $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        //Merge Heading
        $spreadsheet->getActiveSheet()->mergeCells('A1:C1');

        //Set font Heading
        $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(24);

        //Set cell alignment
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        //Set With
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(60);

        //Set Text and Font Style Heading
        $spreadsheet->getActiveSheet()->setCellValue('A2', 'STT')->setCellValue('B2', $title1)->setCellValue('C2', $title2);
        $spreadsheet->getActiveSheet()->getStyle('A2:C2')->getFont()->setSize(18);
        $spreadsheet->getActiveSheet()->getStyle('A2:C2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('A2:C2')->getFont()->setBold(true);
        $count_data = count($result);
        // The content
        $datteTimeNow = time();
        for ($i = 0; $i < $count_data; $i++) {
            $vitri = $i + 3;
            // Column A
            $spreadsheet->getActiveSheet()->setCellValue('A' . $vitri, $i);
			$spreadsheet->getActiveSheet()->getStyle('A' . $vitri)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);


            // Column B
            $spreadsheet->getActiveSheet()->setCellValue('B' . $vitri, $result[$i]['date']);
            $spreadsheet->getActiveSheet()->getStyle('B' . $vitri)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_DATE_DDMMYYYY);
            $spreadsheet->getActiveSheet()->getStyle('B' . $vitri)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

            // Column C
            $spreadsheet->getActiveSheet()->setCellValue('C' . $vitri, $result[$i]['total']);
            $spreadsheet->getActiveSheet()->getStyle('C' . $vitri)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        }

        //$SUMRANGE = 'B3:B12';
        $row_total  = $count_data + 3;
		$spreadsheet->getActiveSheet()->getStyle('A1:C1')->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('A2:A'. ($row_total - 1))->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('B2:B'. ($row_total - 1))->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->getStyle('C2:C'. ($row_total - 1))->applyFromArray($styleArray);
		$spreadsheet->getActiveSheet()->mergeCells('A' . $row_total . ':B' . $row_total);
        if($type == 1){
			$spreadsheet->getActiveSheet()->setCellValue('A'. $row_total , 'Total:');
			$spreadsheet->getActiveSheet()->getStyle('A' . $row_total)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
			$spreadsheet->getActiveSheet()->getStyle('A1:C'. $row_total)->applyFromArray($styleArray);
			$spreadsheet->getActiveSheet()->getCell('C' . $row_total)->setValue('=SUM(C3:C' . ($row_total - 1) . '))');
			$spreadsheet->getActiveSheet()->getStyle('C' . $row_total)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

			$spreadsheet->getActiveSheet()->getStyle('A' . $row_total . ':C' . $row_total)->getFont()->setSize(20);
			$spreadsheet->getActiveSheet()->getStyle('A' . $row_total . ':C' . $row_total)->getFont()->setBold(true);
		}


        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $xls_filename = mb_convert_encoding('namefile.xlsx','SJIS','UTF-8');

        $writer->save($xls_filename);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; ');
        header('Content-Disposition: attachment; filename="' . $xls_filename . '"');
        header('Chache-Control: public');
        header('Pragma: public');
        header('Content-Type: application/xls; name="' . $xls_filename. '"');
        header('Content-Length: '.filesize($xls_filename));
        $writer->save('php://output');
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
			$this->render('/Admin/json');
		} else {
			$this->set("data", 0);
			$this->render('/Admin/json');
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
		$this->render('/Admin/json');
	}
	public function checkout()
	{
		$this->checkUser();
		$this->layout = 'account';
		$cart = $this->Cart->getMyCart($this->Session->read('id_user'));
		if ($cart['Cart']['detail'] != '' || $cart['Cart']['detail'] != '[]') {
			$total = 0;
			$array_cart_id = array();
			$array_cart_amount = array();
			$data = json_decode($cart['Cart']['detail'], TRUE);
			for ($i = 0; $i < count($data); $i++) {
				array_push($data[$i], $this->Product->getProductName($data[$i]['id_product']));
				array_push($data[$i], $this->Product->getProductPrice($data[$i]['id_product']));
				array_push($data[$i], $this->Product->getProductImg($data[$i]['id_product']));
				$total += intval($this->Product->getProductPrice($data[$i]['id_product'])) * intval($data[$i]['amount']);
				array_push($array_cart_id, $data[$i]['id_product']);
				array_push($array_cart_amount, $data[$i]['amount']);
			}
			$this->set('total', $total);
			$this->set('cart', $data);
			$this->set('array_id_cart', $array_cart_id);
			$this->set('array_cart_amount', $array_cart_amount);
		} else {
			$this->set('cart', 0);
		}
		$like = $this->Like->getMyLike($this->Session->read('id_user'));
		$this->set('like', $like);
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
	public function buyNow(){
		$this->layout = null;
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
		$bill = new stdClass();
		$index = array_search(min($list), $list);
		$bill->note = $this->request->data('info');
		$bill->id_send = $stores[$index]['Store']['id'];
		$bill->id_receive = 0;
		$bill->type = 4;
		$bill->status = 0;
		$bill->price = $this->request->data['dongia'];
		$bill->address = $this->request->data['address'];
		$bill->date = date("Y-m-d");
		$this->Invoice->create();

		if ($this->Invoice->save($bill)) {
			$id_invoice = $this->Invoice->getLastInsertID();
			$newFeed = new stdClass();
			$newFeed->id_invoice = $id_invoice;
			$newFeed->create_at = date("Y-m-d");
			$id_store_show = 'Show_Noti_Comment_' . $stores[$index]['Store']['id'];
			$this->pusher->trigger('Notification', $id_store_show, $newFeed);

			$invoice_product = new stdClass();
			$invoice_product->id_invoice = $id_invoice;
			$invoice_product->id_product = $this->request->data('id_product');
			$invoice_product->amount = $this->request->data('amount');
			$this->Product_invoice->create();
			$this->Product_invoice->save($invoice_product);
			$this->set('data', $bill);
			$this->render('/Admin/json');
		}
		$this->render('/Admin/json');
	}
	public function addOnlineBill()
	{
		if ($this->Session->read('id_user')) {
			$this->layout = null;
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
			$bill->price = $this->request->data('price');
			$this->Invoice->create();

			if ($this->Invoice->save($bill)) {
				$id_invoice = $this->Invoice->getLastInsertID();
				$newFeed = new stdClass();
				$newFeed->id_invoice = $id_invoice;
				$newFeed->create_at = date("Y-m-d");
				$id_store_show = 'Show_Noti_Comment_' . $stores[$index]['Store']['id'];
				$this->pusher->trigger('Notification', $id_store_show, $newFeed);
				$arr_product = $this->request->data('arr');
				$arr_amount = $this->request->data('arr1');
				for ($i = 0; $i < count($arr_product); $i++) {
					$invoice_product = new stdClass();
					$invoice_product->id_invoice = $id_invoice;
					$invoice_product->id_product = $arr_product[$i];
					$invoice_product->amount = $arr_amount[$i];
					$this->Product_invoice->create();
					$this->Product_invoice->save($invoice_product);
				}
				$this->set('data', $bill);
			}else{
				$this->set('data', false);
			}
			$this->render('/Admin/json');
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
		$this->log($invoice);
		if ($invoice['Invoice']['status'] == 0) {
			$this->log('1111111');
		}else{
			$this->log('000000000');
		}
		if ($invoice['Invoice']['status'] == 0) {
			$this->Invoice->delete($invoice['Invoice']['id']);
			$product_invoice = $this->Product_invoice->find('all', array('conditions' => array('Product_invoice.id_invoice' => $id_invoice)));
			for ($i = 0; $i < count($product_invoice); $i++) {
				$this->Product_invoice->delete($product_invoice[$i]['Product_invoice']['id']);
			}
			$this->set('data', $invoice);
			$this->render('/Admin/json');
		} else {
			$this->set('data', false);
			$this->render('/Admin/json');
		}
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
		$this->render('/Admin/json');
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
			$this->render('/Admin/json');
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
			$this->render('/Admin/json');
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
		$this->render('/Admin/json');
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
			$this->render('/Admin/json');
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
		$this->render('/Admin/json');
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
			$this->render('/Admin/json');
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
			$this->render('/Admin/json');
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
				$this->render('/Admin/json');
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
			$this->render('/Admin/json');
		}
	}
	public function editName()
	{
		$this->layout = null;
		$update = new stdClass();
		$update->id = $this->Session->read('id_user');
		$update->name = $this->request->data['name'];
		if ($this->User->save($update)) {
			$this->set('data', 'ok');
			$this->render('/Admin/json');
		};
	}
	public function editPhone()
	{
		$this->layout = null;
		$update = new stdClass();
		$update->id = $this->Session->read('id_user');
		$update->phone = $this->request->data['phone'];
		if ($this->User->save($update)) {
			$this->set('data', 'ok');
			$this->render('/Admin/json');
		};
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
		$this->render('/Admin/json');
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
	function getDatesFromRange($start, $end, $format = 'Y-m-d') {
		$array = array();
		$interval = new DateInterval('P1D');

		$realEnd = new DateTime($end);
		$realEnd->add($interval);

		$period = new DatePeriod(new DateTime($start), $interval, $realEnd);

		foreach($period as $date) {
			$array[] = $date->format($format);
		}

		return $array;
	}
	function getTotalOfDate($date, $arr){
		for($i=0; $i <count($arr); $i++){
			if($arr[$i]['Invoice']['date'] == $date){
				return $arr[$i]['0']['total'];
			}
		}
		return 0;
	}
}
