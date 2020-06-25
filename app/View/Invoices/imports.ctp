<a class="btn btn-primary btn-lg" href="#" data-izimodal-open="#modal" data-izimodal-transitionin="fadeInDown">New Invoice</a>
<!-- Modal -->
<div class="card shadow mb-4 mt-2">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th width="10%" scope="col">ID</th>
						<th width="20%" scope="col">Store send</th>
						<th width="30%" scope="col">Store receive</th>
						<th width="10%" scope="col">Date</th>
						<th width="10%" scope="col">Price</th>
						<th width="10%" scope="col">Status</th>
						<th width="10%" scope="col">Detail</th>
					</tr>
				</thead>
				<tbody>
					<?php for ($i = 0; $i < count($invoices); $i++) { ?>
						<tr>
							<td><?php echo $invoices[$i]['Invoice']['id'] ?></td>
							<td><a href="<?php echo FIELD . "/stores/details/" . $invoices[$i]['Invoice']['id_send'] ?>"><?php echo $invoices[$i]['0'] ?></a></td>
							<td><a href="<?php echo FIELD . "/stores/details/" . $invoices[$i]['Invoice']['id_receive'] ?>"><?php echo $invoices[$i]['1'] ?></a></td>
							<td><?php echo $invoices[$i]['Invoice']['date'] ?></td>
							<td><?php echo $invoices[$i]['Invoice']['price'] ?></td>
							<td>
								<?php if ($invoices[$i]['Invoice']['type'] == 1) { ?>
									<span class="badge badge-success">Completed</span>
								<?php } else if ($invoices[$i]['Invoice']['status'] == 1) { ?>
									<span class="badge badge-success">Completed</span>
								<?php } else { ?>
									<span class="badge badge-danger">In processing</span>
								<?php } ?>
							</td>
							<td><a href="details/<?php echo $invoices[$i]['Invoice']['id'] ?>"><i class="fas fa-edit"></i></a></td>
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
		<label class="my-1 ">Supplier</label>
		<select class="custom-select my-1 mr-sm-2 import_supplier_id">
			<option selected>Choose...</option>
			<?php for ($i = 0; $i < count($supplier); $i++) { ?>
				<option value="<?php echo $supplier[$i]['Supplier']['id'] ?>"><?php echo $supplier[$i]['Supplier']['name'] ?></option>
			<?php } ?>
		</select>
		<label class="my-1 ">Store receive</label>
		<h6> <?php echo $this->Session->read('name_store') ?></h6>
		<label>Date</label>
		<input class="form-control import_date" type="date" />
		<label>Price</label>
		<input class="form-control import_price" type="number" />
		<form id="form_product" onsubmit="return false" class="form" required>
			<label>Product</label>
			<select class="custom-select my-1 mr-sm-2 select_product" id="one_product" name="name_product">
				<option selected>Choose...</option>
				<?php for ($i = 0; $i < count($genres); $i++) { ?>
					<option disabled><?php echo $genres[$i]['Genre']['name'] ?></option>
					<?php for ($j = 0; $j < count($genres[$i]['productt']); $j++) { ?>
						<option value="<?php echo $genres[$i]['productt'][$j]['id'] ?>"><?php echo $genres[$i]['productt'][$j]['name'] ?></option>
					<?php } ?>
				<?php } ?>
			</select>
			<label>Amout</label>
			<input required type="number" class="form-control" name="amount_product">
		</form>
		<div class="d-flex justify-content-center">
			<a onclick="moreProduct()"><i class="fas fa-plus-circle" style="font-size: 30px;"></i></a>
		</div>
		<input type="text" class="form-control d-none" value="<?php echo $this->Session->read('id_store') ?>">
		<div class="btn btn-primary btn-block" onclick="addImport($(this))">Submit</div>
	</div>
</div>
