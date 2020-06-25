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
						<th width="10%" scope="col">Status</th>
						<th width="10%" scope="col">Price</th>
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
							<td><?php
								if ($invoices[$i]['Invoice']['status'] == 0) { ?>
									<span class="badge badge-danger">In processing</span>
								<?php } else { ?>
									<span class="badge badge-success">Completed</span>
								<?php } ?>
							</td>
							<td><?php echo $invoices[$i]['Invoice']['price'] ?></td>
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
		<label class="my-1 ">Store send: <?php echo $this->Session->read('name_store') ?></label>
		<br>
		<label class="my-1 ">Store receive</label>
		<select class="custom-select my-1 mr-sm-2 id_store_receive">
			<option selected>Choose...</option>
			<?php for ($i = 0; $i < count($stores); $i++) { ?>
				<option value="<?php echo $stores[$i]['Store']['id'] ?>"><?php echo $stores[$i]['Store']['name'] ?></option>
			<?php } ?>
			<option value="0">Huỷ</option>
		</select>
		<label>Date</label>
		<input class="form-control date_export_invoice" type="date" />
		<form id="form_product" onsubmit="return false" class="form">
			<label>Product</label>
			<select class="custom-select my-1 mr-sm-2" id="one_product" name="name_product">
				<option selected>Choose...</option>
				<?php for ($i = 0; $i < count($products); $i++) { ?>
					<option disabled><?php echo $products[$i]['Genre']['name'] ?></option>
					<?php for ($j = 0; $j < count($products[$i]['productt']); $j++) { ?>
						<option value="<?php echo $products[$i]['productt'][$j]['id'] ?>"><?php echo $products[$i]['productt'][$j]['name'] ?></option>
					<?php } ?>
				<?php } ?>
			</select>
			<label>Amout</label>
			<input type="number" class="form-control" name="amount_product">
		</form>
		<div class="d-flex justify-content-center">
			<a onclick="moreProduct()"><i class="fas fa-plus-circle" style="font-size:30px;"></i></a>
		</div>
		<input type="text" class="form-control d-none" value="<?php echo $this->Session->read('id_store') ?>">
		<button type="submit" class="btn btn-primary btn-block" onclick="new_invoice_export($(this))">Submit</button>
	</div>
</div>
