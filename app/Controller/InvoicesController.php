<?php
class InvoicesController extends AppController
{
	public $uses = array('Categories', 'Notification', 'Product', 'Store', 'Product_invoice', 'Product_store', 'Invoice', 'Supplier', 'Genre', 'User');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->getNotification();
	}

	public function index()
	{
		$this->layout = 'admin';
	}
	public function exports()
	{
		$this->checkAdmin();
		$this->layout = 'sbadmin';
		$stores = $this->Store->getAnotherStore($this->Session->read('id_store'));
		$products = $this->Genre->find('all');
		$this->set('products', $products);
		$this->set('stores', $stores);
		$invoices = $this->Invoice->getExport($this->Session->read('id_store'));
		for ($i = 0; $i < count($invoices); $i++) {
			array_push($invoices[$i], $this->Store->getStoreName($invoices[$i]['Invoice']['id_send']));
			array_push($invoices[$i], $this->Store->getStoreName($invoices[$i]['Invoice']['id_receive']));
		}
		$this->set('invoices', $invoices);
	}
	public function imports()
	{
		$this->checkAdmin();
		$this->layout = 'sbadmin';
		$invoices = $this->Invoice->getImport($this->Session->read('id_store'));
		$count_invoices = count($invoices);
		for ($i = 0; $i < $count_invoices; $i++) {
			if ($invoices[$i]['Invoice']['type'] == 1) {
				array_push($invoices[$i], $this->Supplier->getSupplierName($invoices[$i]['Invoice']['id_send']));
			} else {
				array_push($invoices[$i], $this->Store->getStoreName($invoices[$i]['Invoice']['id_send']));
			}
			array_push($invoices[$i], $this->Store->getStoreName($invoices[$i]['Invoice']['id_receive']));
		}
		$this->set('invoices', $invoices);
		$supplier = $this->Supplier->find('all');
		$this->set('supplier', $supplier);
		$genre = $this->Genre->find('all');
		$this->set('genres', $genre);
	}
	public function addExport()
	{
		$this->layout = null;
		$name_product = array();
		$amount_product = array();
		$check = 1;

		$dataform = $this->request->data['dataform'];
		for ($i = 0; $i < count($dataform); $i++) {
			if (($dataform[$i]['name'] == 'name_product') && ($dataform[$i]['value'] != 'Choose...')) {
				array_push($name_product, $dataform[$i]['value']);
			} else if (($dataform[$i]['name'] == 'amount_product') && ($dataform[$i]['value'] != '')) {
				array_push($amount_product, $dataform[$i]['value']);
			}
		}
		$count_name_product = count($name_product);
		for ($i = 0; $i < $count_name_product; $i++) {
			$data = $this->Product_store->getProductOfStore($this->request->data['id_sent'], $name_product[$i]);
			if ($data['Product_store']['amount'] < $amount_product[$i]) {
				$check = 0;
				break;
			}
		}
		if ($check) {
			$invoice = new stdClass();
			$invoice->id_send = $this->request->data['id_sent'];
			$invoice->id_receive = $this->request->data['id_receive'];
			$invoice->date = $this->request->data['date'];
			$invoice->type = 2;
			$invoice->status = 0;

			for ($i = 0; $i < $count_name_product; $i++) {
				$data = $this->Product_store->getProductOfStore($this->request->data['id_sent'], $name_product[$i]);
				$amount = $data['Product_store']['amount'] - $amount_product[$i];
				$update = new stdClass();
				$update->id = $data['Product_store']['id'];
				$update->amount = $amount;
				$this->Product_store->save($update);
			}
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
		}
		$this->set('data', $check);
		$this->render('/Admins/json');
	}
	public function addImport()
	{
		$this->layout = null;
		$name_product = array();
		$amount_product = array();
		$invoice = new stdClass();
		$invoice->id_send = $this->request->data['id_sent'];
		$invoice->id_receive = $this->request->data['id_receive'];
		$invoice->date = $this->request->data['date'];
		$invoice->type = 1;
		$invoice->status = 2;
		$dataform = $this->request->data['dataform'];
		for ($i = 0; $i < count($dataform); $i++) {
			if (($dataform[$i]['name'] == 'name_product') && ($dataform[$i]['value'] != 'Choose...')) {
				array_push($name_product, $dataform[$i]['value']);
			} else if (($dataform[$i]['name'] == 'amount_product') && ($dataform[$i]['value'] != '')) {
				array_push($amount_product, $dataform[$i]['value']);
			}
		}

		$invoice->price = $this->request->data('price');
		if($this->Invoice->save($invoice)){
			$id_invoice = $this->Invoice->getLastInsertId();
			for ($i = 0; $i < count($name_product); $i++) {
				$data = new stdClass();
				$data->id_invoice = $id_invoice;
				$data->id_product = $name_product[$i];
				$data->amount = $amount_product[$i];
				$this->Product_invoice->create();
				$this->Product_invoice->save($data);
			}
			for ($i = 0; $i < count($name_product); $i++) {
				$product_store = $this->Product_store->getProductOfStore($this->request->data['id_receive'], $name_product[$i]);
				$update = new stdClass();
				$update->id = $product_store['Product_store']['id'];
				$update->amount = $product_store['Product_store']['amount'] + $amount_product[$i];
				$this->Product_store->save($update);
			}
			$this->set('data', $invoice);
			$this->render('/Admins/json');
		};

	}

	public function addImportOffline(){
		$this->layout = null;
		$name_product = array();
		$amount_product = array();
		$check = 1;
		$dataform = $this->request->data['dataform'];
		for ($i = 0; $i < count($dataform); $i++) {
			if (($dataform[$i]['name'] == 'name_product') && ($dataform[$i]['value'] != 'Choose...')) {
				array_push($name_product, $dataform[$i]['value']);
			} else if (($dataform[$i]['name'] == 'amount_product') && ($dataform[$i]['value'] != '')) {
				array_push($amount_product, $dataform[$i]['value']);
			}
		}
		$count_name_product = count($name_product);
		for ($i = 0; $i < $count_name_product; $i++) {
			$data = $this->Product_store->getProductOfStore($this->request->data['id_sent'], $name_product[$i]);
			if ($data['Product_store']['amount'] < $amount_product[$i]) {
				$check = 0;
				break;
			}
		}
		if ($check) {
			$invoice = new stdClass();
			$invoice->id_send = $this->request->data['id_sent'];
			$invoice->id_receive = 0;
			$invoice->date = $this->request->data['date'];
			$invoice->type = 3;
			$invoice->status = 1;
			$invoice->price = $this->request->data('price');
			if($this->Invoice->save($invoice)){
				$id_invoice = $this->Invoice->getLastInsertId();
				for ($i = 0; $i < $count_name_product; $i++) {
					$data = $this->Product_store->getProductOfStore($this->request->data['id_sent'], $name_product[$i]);
					$amount = $data['Product_store']['amount'] - $amount_product[$i];
					$update = new stdClass();
					$update->id = $data['Product_store']['id'];
					$update->amount = $amount;
					$this->Product_store->save($update);
				}
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
			}else{
				$this->set('data', false);
				$this->render('/Admins/json');
			}
		}else{
			$this->set('data', false);
			$this->render('/Admins/json');
		}
	}

	public function confirmInvoice()
	{
		$this->layout = null;
		$array = array();
		$check = $this->Invoice->checkExistInvoice($this->request->data['id_invoice']);
		if ($check) {
			$invoice = new stdClass;
			$invoice->id = $check['Invoice']['id'];
			$invoice->status = 1;
			$this->Invoice->save($invoice);
			$products = $this->Product_invoice->getProductOfInvoice($check['Invoice']['id']);
			$count_product = count($products);
			for ($i = 0; $i < $count_product; $i++) {
				$data = new stdClass();
				$data->id_product = $products[$i]['Product_invoice']['id_product'];
				$data->amount = $products[$i]['Product_invoice']['amount'];
				array_push($array, $data);
			}
			$array = json_decode(json_encode($array), True);

			for ($i = 0; $i < count($array); $i++) {
				$product_store = $this->Product_store->getProductOfStore($this->request->data['id_store'], $array[$i]['id_product']);
				$amount = $product_store['Product_store']['amount'];
				$update = new stdClass();
				$update->id = $product_store['Product_store']['id'];
				$update->amount = $amount + $array[$i]['amount'];
				$this->Product_store->save($update);
			}
			$this->set('data', $array);
			$this->render('/Admins/json');
		}
	}
	public function cancelInvoice()
	{
		$this->layout = null;
		$check = $this->Invoice->checkExistInvoice($this->request->data['id_invoice']);
		if ($check['Invoice']['status'] == 0) {
			$invoice = $this->Product_invoice->getProductOfInvoice($this->request->data['id_invoice']);
			$count_invoice = count($invoice);
			for ($i = 0; $i < $count_invoice; $i++) {
				$data = $this->Product_store->getProductOfStore($this->request->data['id_store'], $invoice[$i]['Product_invoice']['id_product']);
				$update = new stdClass();
				$update->id = $data['Product_store']['id'];
				$update->amount = $data['Product_store']['amount'] + $invoice[$i]['Product_invoice']['amount'];
				$this->Product_store->save($update);
				$this->Product_invoice->delete($invoice[$i]['Product_invoice']['id']);
			}

			$this->Invoice->delete($this->request->data['id_invoice']);
			$this->set('data', $invoice);
			$this->render('/Admins/json');
		}else{
			$this->set('data', false);
			$this->render('/Admins/json');
		}
	}
	public function handleOrder() {
		$this->layout = null;
		$array = array();
		$check = 1;
		$invoiceCheck = $this->Invoice->find('first', array('conditions' => array('Invoice.id' => $this->request->data['id_invoice'])));
		if($invoiceCheck){
			$products = $this->Product_invoice->getProductOfInvoice($this->request->data['id_invoice']);
			$count_product = count($products);
			for ($i = 0; $i < $count_product; $i++) {
				$data = new stdClass();
				$data->id_product = $products[$i]['Product_invoice']['id_product'];
				$data->amount = $products[$i]['Product_invoice']['amount'];
				array_push($array, $data);
			}
			$array = json_decode(json_encode($array), True);
			for ($i = 0; $i < count($array); $i++) {
				$product_store = $this->Product_store->getProductOfStore($this->request->data['id_store'], $array[$i]['id_product']);
				$amount = $product_store['Product_store']['amount'];
				if ($amount < $array[$i]['amount']) {
					$check = 0;
					break;
				}
			}
			if ($check) {
				for ($i = 0; $i < count($array); $i++) {
					$product_store = $this->Product_store->getProductOfStore($this->request->data['id_store'], $array[$i]['id_product']);
					$amount = $product_store['Product_store']['amount'];
					$update = new stdClass();
					$update->id = $product_store['Product_store']['id'];
					$update->amount = $amount - $array[$i]['amount'];
					$this->Product_store->save($update);
				}
				$invoice = new stdClass();
				$invoice->id = $this->request->data['id_invoice'];
				$invoice->status = 1;
				$this->Invoice->save($invoice);
			}
			$this->set('data', $check);
			$this->render('/Admins/json');
		}else{
			$this->set('data', 0);
			$this->render('/Admins/json');
		}

	}
	public function cancelOrder()
	{
		$this->layout = null;
		$invoice = $this->Product_invoice->getProductOfInvoice($this->request->data['id_invoice']);
		$count_invoice = count($invoice);
		if($count_invoice){
			$status = $this->Invoice->getStatusOrder($this->request->data['id_invoice']);

			for ($i = 0; $i < $count_invoice; $i++) {
				if($status == 1){
					$data = $this->Product_store->getProductOfStore($this->request->data['id_store'], $invoice[$i]['Product_invoice']['id_product']);
					$update = new stdClass();
					$update->id = $data['Product_store']['id'];
					$update->amount = $data['Product_store']['amount'] + $invoice[$i]['Product_invoice']['amount'];
					$this->Product_store->save($update);
				}

				$this->Product_invoice->delete($invoice[$i]['Product_invoice']['id']);
			}

			$this->Invoice->delete($this->request->data['id_invoice']);
			$this->set('data', $invoice);
		}else{
			$this->set('data', false);
		}
		$this->render('/Admins/json');
	}
	public function confirmOrder()
	{
		$this->layout = null;
		$update = new stdClass();
		$update->id = $this->request->data['id_invoice'];
		$update->status = 2;
		$this->Invoice->save($update);

		$this->set('data', $update);
		$this->render('/Admins/json');
	}
	public function details($id_invoice)
	{
		$this->checkAdmin();
		$this->layout = 'sbadmin';
		$invoice = $this->Invoice->checkExistInvoice($id_invoice);
		if($invoice){
			if ($invoice['Invoice']['type'] == 1) {
				array_push($invoice, $this->Supplier->getSupplierName($invoice['Invoice']['id_send']));
			} else {
				array_push($invoice, $this->Store->getStoreName($invoice['Invoice']['id_send']));
			}
			if (($invoice['Invoice']['type'] == 1) || ($invoice['Invoice']['type'] == 2)) {
				array_push($invoice, $this->Store->getStoreName($invoice['Invoice']['id_receive']));
			}
			$this->set('invoice', $invoice);
			$products = $this->Product_invoice->getProductOfInvoice($id_invoice);
			for ($i = 0; $i < count($products); $i++) {
				array_push($products[$i], $this->Product->getProductName($products[$i]['Product_invoice']['id_product']));
			}
			$this->set('products', $products);
		}else{
			$this->redirect('/admin/onlinebill');
		}
	}
	public function getDataInvoice()
	{
		$this->layout = null;
		$numberOfPosts = $this->Invoice->find('all', array(
			'recursive' => -1,
			'fields' => array('Sum(Invoice.price)', 'date'),
			'group' => array("DATE_FORMAT(Invoice.date, '%YYYY-%mm')")
		));
		$data = array();
		for ($i = 0; $i < count($numberOfPosts); $i++) {
			$new = new stdClass();
			$new->price = intval($numberOfPosts[$i][0]['Sum(`Invoice`.`price`)']);
			$new->date =  $numberOfPosts[$i]['Invoice']['date'];
			array_push($data, $new);
		}
		$this->set('data', $data);
		$this->render('/Admins/json');
	}
}
