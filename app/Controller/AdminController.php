<?php
App::import('Vendor', 'vendor', array('file' => 'autoload.php'));
App::import('Vendor', 'tfpdf', array('file' => 'tfpdf/tfpdf.php'));
class AdminController extends AppController
{
	public $uses = array('Categories', 'Product', 'Store', 'Genre', 'News', 'Manage', 'Admin', 'Product_store', 'Supplier', 'Invoice', 'Product_invoice');
	public function serverPusher()
	{
		$this->autoRender = false;
		$options = array(
			'cluster' => 'ap1',
			'useTLS' => true
		);
		$pusher = new Pusher\Pusher(
			'88e4574e34357fdaf587',
			'c883abc5006b0a157255',
			'685875',
			$options
		);

		$data = $this->request->data['id_product'];
		$pusher->trigger('my-channel' . $this->request->data['id_cuahang'], 'my-event', $data);
	}
	public function index()
	{
		$this->checkAdmin();
		$this->layout = 'sbadmin';
		$products = $this->Product_store->getAllStoreProduct($this->Session->read('id_store'));
		$pending = $this->Invoice->getPending($this->Session->read('id_store'));
		$this->set('pending', count($pending));
		$total_earn = $this->Invoice->getTotalEarn($this->Session->read('id_store'));
		$count_total_earn = count($total_earn);
		$money_all = 0;
		$money_month = 0;
		$money_day = 0;
		for ($i = 0; $i < $count_total_earn; $i++) {
			$money_all += $total_earn[$i]['Invoice']['price'];
			if (date("Y-m", strtotime($total_earn[$i]['Invoice']['date'])) == date('Y-m')) {
				$money_month += $total_earn[$i]['Invoice']['price'];
			}
			if (strtotime($total_earn[$i]['Invoice']['date']) === strtotime(date("Y-m-d"))) {
				$money_day += $total_earn[$i]['Invoice']['price'];
			}
		}
		$this->set('total_month', $money_month);
		$this->set('total_earn', $money_all);
		$this->set('today_earn', $money_day);
		for ($i = 0; $i < count($products); $i++) {
			array_push($products[$i], $this->Product->getProductByID($products[$i]['Product_store']['id_product']));
		}
		$this->set('products', $products);
	}
	public function login()
	{
		$this->layout = 'login';
	}
	public function invoices()
	{
		$this->layout = 'admin';
		if ($this->Session->read('id_admin')) {
			$invoices = $this->Invoice->find('all', array('conditions' => array(
				'Invoice.id_send' => $this->Session->read('id_store'),
				'OR' => array(
					array('Invoice.type' => 3),
					array('Invoice.type' => 4)
				),
				'OR' => array(
					array('Invoice.status' => 2),
					array('Invoice.status' => null)
				)
			)));
			for ($i = 0; $i < count($invoices); $i++) {
				array_push($invoices[$i], $this->Store->getStoreName($invoices[$i]['Invoice']['id_send']));
			}
			$this->set('invoices', $invoices);
		}
	}
	public function categories()
	{
		$this->checkBigAdmin();
		$this->layout = 'sbadmin';
		$categories = $this->Categories->find("all");
		$this->set('categories', $categories);
		$products = $this->Product->find('all');
		$this->set('products', $products);
	}
	public function bill()
	{
		$this->checkAdmin();
		$this->layout = 'admin';
		$products = $this->Genre->find('all');
		$this->set('products', $products);
		$bill = $this->Invoice->find('all', array(
			'conditions' => array(
				'Invoice.id_send' => $this->Session->read('id_store'),
				'Invoice.type' => 3
			)
		));
		$this->set('bill', $bill);
	}
	public function onlinebill()
	{
		$this->checkAdmin();
		$this->layout = 'sbadmin';
		$onlinebill = $this->Invoice->getOnlineBill($this->Session->read('id_store'));
		$this->set('bill', $onlinebill);
	}
	public function products()
	{
		$this->checkBigAdmin();
		$this->layout = 'sbadmin';
		$categories = $this->Categories->find("all");
		$this->set('categories', $categories);
		$products = $this->Product->find('all');
		$this->set('products', $products);
	}
	public function supplier()
	{
		$this->checkBigAdmin();
		$this->layout = 'sbadmin';
		$supplier = $this->Supplier->find('all');
		$this->set('supplier', $supplier);
	}
	public function genre()
	{
		$this->checkBigAdmin();
		$this->layout = 'sbadmin';
		$categories = $this->Categories->find("all");
		$this->set('categories', $categories);
		$genres = $this->Genre->find('all');
		$this->set('genres', $genres);
	}
	public function stores()
	{
		$this->checkBigAdmin();
		$this->layout = 'sbadmin';
		$stores = $this->Store->find('all');
		$this->set('stores', $stores);
	}
	public function news()
	{
		$this->checkBigAdmin();
		$this->layout = 'sbadmin';
		$news = $this->News->find('all');
		$this->set('news', $news);
	}
	public function addStore()
	{
		$this->layout = null;
		$store = new stdClass();
		$store->name = $this->request->data['name'];
		$store->phone = $this->request->data['phone'];
		$store->email = $this->request->data['email'];
		$store->address = $this->request->data['address'];
		$store->image = $this->request->data['image'];
		$store->lat = $this->request->data['lat'];
		$store->lng = $this->request->data['lng'];
		$store->password = $this->request->data['pass'];
		$this->Store->create();
		$this->Store->save($store);
		$id_store = $this->Store->getLastInsertId();
		$products = $this->Product->find('all');
		for ($i = 0; $i < count($products); $i++) {
			$product_store = new stdClass();
			$product_store->id_store = $id_store;
			$product_store->id_product = $products[$i]['Product']['id'];
			$product_store->amount = 0;
			$this->Product_store->create();
			$this->Product_store->save($product_store);
		}
		$this->set('data', $store);
		$this->render('json');
	}
	public function addProduct()
	{
		$this->layout = null;
		$product = new stdClass();
		$product->name = $this->request->data['name'];
		$product->id_genre = $this->request->data['category'];
		$product->description = $this->request->data['description'];
		$product->price = $this->request->data['price'];
		$product->image = implode(",", $_FILES["file"]['name']);
		for ($i = 0; $i < count($_FILES["file"]['name']); $i++) {
			move_uploaded_file($_FILES['file']['tmp_name'][$i], $_SERVER['DOCUMENT_ROOT'] . '/app/webroot/img/product/' . $_FILES['file']['name'][$i]);
		}
		$this->Product->save($product);
		$id_product = $this->Product->getLastInsertID();
		$store = $this->Store->find('all');
		for ($i = 0; $i < count($store); $i++) {
			$new = new stdClass();
			$new->id_product = $id_product;
			$new->id_store = $store[$i]['Store']['id'];
			$new->amount = 0;
			$this->Product_store->create();
			$this->Product_store->save($new);
		}
		$this->set('data', $product);
		$this->render('json');
	}
	public function addBill()
	{
		$this->layout = null;
		$name_product = array();
		$amount_product = array();
		$price = 0;
		$invoice = new stdClass();
		$invoice->id_send = $this->request->data['id_sent'];
		if ($this->request->data['id_receive'] != 'Khách vãng lai') {
			$invoice->id_receive = $this->request->data['id_receive'];
		}
		$invoice->type = 3;
		$invoice->date = $this->request->data['date'];
		$dataform = $this->request->data['dataform'];
		for ($i = 0; $i < count($dataform); $i++) {
			if (($dataform[$i]['name'] == 'name_product') && ($dataform[$i]['value'] != 'Choose...')) {
				array_push($name_product, $dataform[$i]['value']);
			} else if (($dataform[$i]['name'] == 'amount_product') && ($dataform[$i]['value'] != '')) {
				array_push($amount_product, $dataform[$i]['value']);
			}
		}
		for ($i = 0; $i < count($name_product); $i++) {
			$product = $this->Product->find('first', array(
				'conditions' => array(
					'Product.id' => $name_product[$i]
				)
			));
			$price += $product['Product']['price'] * $amount_product[$i];
		}
		for ($i = 0; $i < count($name_product); $i++) {
			$data = $this->Product_store->find('first', array(
				'conditions' => array(
					'Product_store.id_store' => $this->request->data['id_sent'],
					'Product_store.id_product' => $name_product[$i]
				)
			));
			$amount = $data['Product_store']['amount'] - $amount_product[$i];
			$update = new stdClass();
			$update->id = $data['Product_store']['id'];
			$update->amount = $amount;
			$this->Product_store->save($update);
		}
		$invoice->price = $price;
		$this->Invoice->save($invoice);
		$id_invoice = $this->Invoice->getLastInsertId();
		for ($i = 0; $i < count($name_product); $i++) {
			$data = new stdClass();
			$data->id_invoice = $id_invoice;
			$data->id_product = $name_product[$i];
			$data->amount = $amount_product[$i];
			$this->Product_invoice->create();
			$this->Product_invoice->save($data);
		}
		$this->set('data', $invoice);
		$this->render('/Admins/json');
	}
	public function addCategory()
	{
		$this->layout = null;
		$category = new stdClass();
		$category->name = $this->request->data['category'];
		$this->Categories->create();
		$this->Categories->save($category);
		$this->set('data', $category);
		$this->render('json');
	}
	public function addGenre()
	{
		$this->layout = null;
		$genre = new stdClass();
		$genre->name = $this->request->data['name'];
		$genre->id_cate = $this->request->data['id_cate'];
		$this->Genre->create();
		$this->Genre->save($genre);
		$this->set('data', $genre);
		$this->render('json');
	}
	public function editCate()
	{
		$this->layout = null;
		$category = new stdClass();
		$category->id = $this->request->data['id'];
		$category->name = $this->request->data['category'];
		$this->Categories->save($category);
		$this->set('data', $category);
		$this->render('json');
	}
	public function deleteCate($id_cate)
	{
		$this->Categories->delete($id_cate);
		$this->set('data', $id_question);
		$this->render('json');
	}
	public function addSupplier()
	{
		$this->layout = null;
		$supplier = new stdClass();
		$supplier->name = $this->request->data['name'];
		$supplier->email = $this->request->data['mail'];
		$supplier->phone = $this->request->data['phone'];
		$supplier->address = $this->request->data['address'];
		$this->Supplier->create();
		$this->Supplier->save($supplier);
		$this->set('data', $supplier);
		$this->render('json');
	}
	public function checkLogin()
	{
		$this->layout = null;
		$store = $this->Store->checkPassAndMail($this->request->data['mail'], $this->request->data['pass']);
		if ($store) {
			$this->Session->write('name_store', $store['Store']['name']);
			$this->Session->write('id_admin', $store['Store']['id']);
			$this->Session->write('id_store', $store['Store']['id']);
			$this->Session->write('type', $store['Store']['type']);
			$this->set('data', 'success');
		} else {
			$this->set('data', 'error');
		}
		$this->render('json');
	}
	public function exportPDF()
	{
		$this->autoRender = false;
		$invoice = $this->Invoice->find('first', array(
			'conditions' => array(
				'Invoice.id' => $_GET['id']
			)
		));
		if ($invoice['Invoice']['type'] == 1) {
			array_push($invoice, $this->getSupplierName($invoice['Invoice']['id_send']));
		} else {
			array_push($invoice, $this->Store->getStoreName($invoice['Invoice']['id_send']));
		}
		if (($invoice['Invoice']['type'] == 1) || ($invoice['Invoice']['type'] == 2)) {
			array_push($invoice, $this->Store->getStoreName($invoice['Invoice']['id_receive']));
		}
		$products = $this->Product_invoice->find('all', array(
			'conditions' => array(
				'Product_invoice.id_invoice' => $_GET['id']
			)
		));
		for ($i = 0; $i < count($products); $i++) {
			array_push($products[$i], $this->Product->getProductByID($products[$i]['Product_invoice']['id_product']));
		}
		if ($invoice['Invoice']['type'] == 4) {
			$this->set('username', $this->getUserName($invoice['Invoice']['id_receive']));
			$this->set('phone', $this->getUserPhone($invoice['Invoice']['id_receive']));
		}
		$date = $invoice['Invoice']['date'];
		list($year, $month, $day) = split('[/.-]', $date);
		$pdf = new tFPDF();
		$pdf->AddPage();
		$pdf->AddFont('DejaVu', '', 'tahoma.ttf', true);
		$pdf->AddFont('DejaVu', 'B', 'tahomabd.ttf', true);
		$pdf->SetFont('DejaVu', 'B', 16);
		$pdf->Cell(190, 10, 'HÓA ĐƠN XUẤT KHO', 0, 1, 'C');
		$pdf->SetFont('DejaVu', '', 12);

		$pdf->Cell(190, 10, "Ngày " . $day . " tháng " . $month . " năm " . $year, 0, 1, 'C');

		$pdf->Cell(78, 10, 'Cửa Hàng Xuất:', 0);
		$pdf->Cell(100, 10, $invoice['0'], 0, 1, 'l');

		$pdf->Cell(78, 10, 'Cửa Hàng Nhập:', 0);
		$pdf->Cell(100, 10, $invoice['1'], 0, 1, 'l');

		$pdf->Cell(78, 10, 'Mã số hóa đơn:', 0);
		$pdf->SetFont('Times', 'BI', 12);
		$pdf->Cell(100, 10, $_GET['id'], 0, 1, 'l');

		$pdf->SetFont('DejaVu', 'B', 11);
		$w = array(15, 55, 55, 30, 35); // columm width
		$header = array('STT', 'Mã sản phẩm', 'Tên sản phẩm', 'Số lượng', 'Ghi chú'); // header content
		// create header
		for ($i = 0; $i < 5; $i++) {
			$pdf->Cell($w[$i], 8., $header[$i], 1, 0, 'C');
		}
		$pdf->Ln();
		// create body
		$pdf->SetFont('DejaVu', '', 10);
		for ($i = 0; $i < count($products); $i++) {
			$pdf->Cell($w[0], 7, $i + 1, 1, 0, 'C');
			$pdf->Cell($w[1], 7, $products[$i]['Product_invoice']['id_product'], 1, 0, 'C');
			$pdf->Cell($w[2], 7, $products[$i]['0']['Product']['name'], 1, 0, 'C');
			$pdf->Cell($w[3], 7, $products[$i]['Product_invoice']['amount'], 1, 0, 'C');
			$pdf->SetFont('DejaVu', '', 10);
			$pdf->Cell($w[4], 7, '', 1, 1);
		}



		$pdf->Cell(190, 10, '', 0, 1);

		$pdf->SetFont('DejaVu', 'B', 14);
		$pdf->Cell(85, 10, 'NV NHẬN HÀNG', 0, 0, 'C');
		$pdf->Cell(85, 10, 'NV XUẤT HÀNG', 0, 1, 'C');
		$fileName = WWW_ROOT . "dsd.pdf";
		$pdf->Output($fileName, "F");
		$this->response->file($fileName, array('download' => true));
		return true;
	}
	function editGenre()
	{
		$this->layout = null;
		$genre = new stdClass();
		$genre->id = $this->request->data['id'];
		$genre->name = $this->request->data['genre'];
		$this->Genre->save($genre);
		$this->set('data', $genre);
		$this->render('json');
	}
	function deleteGenre()
	{
		$this->Genre->delete($this->request->data['id']);
		$this->set('data', $this->request->data['id']);
		$this->render('json');
	}
	public function getBarChat()
	{
		$this->layout = null;
		for ($i = 0; $i <= 5; $i++) {
			$months[] = date("Y-m", strtotime(date('Y-m-01') . " -$i months"));
			$name[] = date("F", strtotime(date('Y-m-01') . " -$i months"));
		}
		$data = $this->Invoice->getTotalEarn($this->Session->read('id_store'));
		$money = array();
		for ($i = 0; $i < count($months); $i++) {
			$money[$i]['name'] = $name[$i];
			$_1month = 0;
			for ($j = 0; $j < count($data); $j++) {
				if (date("Y-m", strtotime($data[$j]['Invoice']['date'])) == $months[$i]) {
					$_1month += $data[$j]['Invoice']['price'];
				}
			}
			$money[$i]['earn'] = $_1month;
		}
		//echo $money;
		$this->set('data', $money);
		$this->render('json');
		//$this->set('months',$months);
		//$this->set('name',$name);
	}
}
