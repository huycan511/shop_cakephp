<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Detail</h1>
</div>
<?php if ($invoice['Invoice']['type'] == 2 || $invoice['Invoice']['type'] == 4) { ?>
	<?php if (($invoice['Invoice']['status'] == 0) && ($this->Session->read('id_store') == $invoice['Invoice']['id_send']) && ($invoice['Invoice']['type'] == 2)) { ?>
		<button class="btn btn-danger cancel_invoice" data-store="<?php echo $this->Session->read('id_store') ?>" data-id="<?php echo $invoice['Invoice']['id'] ?>">Cancel</button>
	<?php } else if (($invoice['Invoice']['status'] == 0) && ($this->Session->read('id_store') == $invoice['Invoice']['id_receive']) && ($invoice['Invoice']['type'] == 2)) { ?>
		<button class="btn btn-success confirm_invoice" data-store="<?php echo $this->Session->read('id_store') ?>" data-id="<?php echo $invoice['Invoice']['id'] ?>">Confirm</button>
		<button class="btn btn-outline-primary d-none">Success</button>
	<?php } else if (($invoice['Invoice']['status'] == 0) && ($this->Session->read('id_store') == $invoice['Invoice']['id_send']) && ($invoice['Invoice']['type'] == 4)) { ?>
		<button class="btn btn-success" onclick="handle_order($(this))" data-store="<?php echo $this->Session->read('id_store') ?>" data-id="<?php echo $invoice['Invoice']['id'] ?>">Handle Order</button>
		<button class="btn btn-danger cancel_order" data-store="<?php echo $this->Session->read('id_store') ?>" data-id="<?php echo $invoice['Invoice']['id'] ?>">Cancel Order</button>
		<button class="btn btn-success d-none confirm_order" data-id="<?php echo $invoice['Invoice']['id'] ?>">Confirm Order</button>
	<?php } else if (($invoice['Invoice']['status'] == 1) && ($this->Session->read('id_store') == $invoice['Invoice']['id_send']) && ($invoice['Invoice']['type'] == 4)) { ?>
		<button class="btn btn-danger cancel_order" data-store="<?php echo $this->Session->read('id_store') ?>" data-id="<?php echo $invoice['Invoice']['id'] ?>">Cancel Order</button>
		<button class="btn btn-success confirm_order" data-id="<?php echo $invoice['Invoice']['id'] ?>">Confirm Order</button>
<?php }
} ?>
<div class="card shadow mb-4 mt-2">
	<div class="card-body">
		<table class="table table_product" border="0" cellspacing="0" cellpadding="0">
			<tbody>
				<tr>
					<th width="20%">ID Invoice</th>
					<td width="20%">
						<span><?php echo $invoice['Invoice']['id'] ?></span>
					</td>
				</tr>
				<tr>
					<th width="20%"><?php if ($invoice['Invoice']['type'] == 1) {
														echo 'Supplier';
													} else {
														echo 'Store send';
													} ?></th>
					<td width="20%">
						<span class="catego"><?php echo $invoice['0'] ?></span>
					</td>
				</tr>
				<tr>
					<th width="20%"><?php
													if (($invoice['Invoice']['type'] == 1) || ($invoice['Invoice']['type'] == 2)) {
														echo 'Store receive';
													}
													?>
					</th>
					<td width="20%">
						<span><?php if (($invoice['Invoice']['type'] == 1) || ($invoice['Invoice']['type'] == 2)) {
										echo $invoice['1'];
									}
									?></span>
					</td>
				</tr>
				<?php if ($invoice['Invoice']['type'] == 4) { ?>
					<tr>
						<th width="20%">Address</th>
						<td width="20%">
							<span><?php echo $invoice['Invoice']['address'] ?></span>
						</td>
					</tr>
					<tr>
						<th width="20%">Note</th>
						<td width="20%">
							<span><?php if ($invoice['Invoice']['note'] == '') {
											echo 'Null';
										} else {
											echo $invoice['Invoice']['note'];
										} ?></span>
						</td>
					</tr>
				<?php } ?>
				<tr>
					<th width="20%">Date</th>
					<td width="20%">
						<span><?php echo $invoice['Invoice']['date'] ?></span>
					</td>
				</tr>
				<tr>
					<th width="20%">Price</th>
					<td width="20%">
						<span><?php echo number_format($invoice['Invoice']['price']) . 'đ' ?></span>
					</td>
				</tr>
				<?php if ($invoice['Invoice']['type'] == 2 || $invoice['Invoice']['type'] == 4) { ?>
					<tr>
						<th width="20%">Status</th>
						<td width="20%" class="status_invoice"><?php
																										if ($invoice['Invoice']['status'] == 0 && $invoice['Invoice']['type'] == 2) {
																											echo "<span class='badge badge-danger'>In processing</span>";
																										} else if ($invoice['Invoice']['status'] == 1 && $invoice['Invoice']['type'] == 2) {
																											echo "<span class='badge badge-success'>Completed</span>";
																										} else if ($invoice['Invoice']['status'] == 0 && $invoice['Invoice']['type'] == 4) {
																											echo "<span class='badge badge-primary'>Pending</span>";
																										} else if ($invoice['Invoice']['status'] == 1 && $invoice['Invoice']['type'] == 4) {
																											echo "<span class='badge badge-danger'>In processing</span>";
																										} else {
																											echo "<span class='badge badge-success'>Completed</span>";
																										}
																										?></td>
					</tr>
				<?php } ?>
				<tr>
					<td width="20%">
				<tr>
					<th>Product</th>
					<th>Amount</th>
				</tr>
				<?php for ($i = 0; $i < count($products); $i++) { ?>
					<tr>
						<td><?php echo $products[$i]['0'] ?></td>
						<td><?php echo $products[$i]['Product_invoice']['amount'] ?></td>
					</tr>
				<?php } ?>
				</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
