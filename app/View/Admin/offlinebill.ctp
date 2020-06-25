<a class="btn btn-primary btn-lg" href="#" data-izimodal-open="#modal" data-izimodal-transitionin="fadeInDown">New Invoice</a>
<div class="card shadow mb-4 mt-2">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th width="5%" scope="col">ID</th>
						<th width="30%" scope="col">Store</th>
						<th width="15%" scope="col">Customer ID</th>
						<th width="15%" scope="col">Date</th>
						<th width="10%" scope="col">Price</th>
						<th width="15%" scope="col">Status</th>
						<th width="10%" scope="col">Detail</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th width="5%" scope="col">ID</th>
						<th width="30%" scope="col">Store</th>
						<th width="15%" scope="col">Customer ID</th>
						<th width="15%" scope="col">Date</th>
						<th width="10%" scope="col">Price</th>
						<th width="15%" scope="col">Status</th>
						<th width="10%" scope="col">Detail</th>
					</tr>
				</tfoot>
				<tbody>
					<?php for ($i = 0; $i < count($bill); $i++) { ?>
						<tr>
							<td><?php echo $bill[$i]['Invoice']['id'] ?></td>
							<td><?php echo $this->Session->read('name_store') ?></td>
							<td><?php if ($bill[$i]['Invoice']['id_receive'] == null) {
									echo 'Khách vãng lai';
								} else {
									echo $bill[$i]['Invoice']['id_receive'];
								} ?></td>
							<td><?php echo $bill[$i]['Invoice']['date'] ?></td>
							<td><?php echo $bill[$i]['Invoice']['price'] ?></td>
							<td>
							<span class="badge badge-success">Completed</span>
							</td>
							<td><a href="../invoices/details/<?php echo $bill[$i]['Invoice']['id'] ?>"><i class="fas fa-edit"></i></a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div id="modal" class="checkModal">
	<!-- Modal content-->
	<div class="modal-header">
		<h4 class="modal-title">New Invoice</h4>
	</div>
	<div class="modal-body">
		<label class="my-1 ">Store</label>
		<h6> <?php echo $this->Session->read('name_store') ?></h6>
		<label>Date</label>
		<input class="form-control import_date mb-2" type="date" />
		<div style="display: flex;align-items: center;justify-content: space-between;">
		<label>Product & Amount</label>
		<a style="cursor:pointer;" onclick="moreProductOfflinebill()"><i class="fas fa-plus-circle" style="font-size: 30px;"></i></a>
		</div>
		<form id="form_product" onsubmit="return false" class="form" required>
			<div style="display: flex;align-items: center;justify-content: space-between;">
				<select onchange="selectProduct($(this))" style="width: 115px;" class="custom-select my-1 mr-sm-2 select_product" id="one_product" name="name_product">
					<option selected>Choose...</option>
					<?php for ($i = 0; $i < count($genres); $i++) { ?>
						<option disabled><?php echo $genres[$i]['Genre']['name'] ?></option>
						<?php for ($j = 0; $j < count($genres[$i]['productt']); $j++) { ?>
							<option data-unit="<?php echo $genres[$i]['productt'][$j]['price'] ?>" value="<?php echo $genres[$i]['productt'][$j]['id'] ?>"><?php echo $genres[$i]['productt'][$j]['name'] ?></option>
						<?php } ?>
					<?php } ?>
				</select>
				<div>x</div>
				<input onchange="changeUnit($(this))" value="0" style="width: 115px;" required type="number" class="form-control ml-2 mr-2" name="amount_product">
				<div>=</div>
				<div class="ml-2 total_one">00.00d</div>
			</div>
		</form>
		<div style="display: flex;align-items: center;justify-content: space-between;">
		<label>Total</label>
		<label id="total_offline">00.00d</label>
		</div>
		<div class="btn btn-primary btn-block" data-id="<?php echo $this->Session->read('id_store') ?>" onclick="addImportOffline($(this))">Submit</div>
	</div>
</div>
