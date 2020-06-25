<div class="row">
	<h4 class="col-sm-2">Dashboard </h4>
</div>

<!-- DataTales Example -->
<div class="row">
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Earnings</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_earn . " VND"; ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Month Earnings</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_month . " VND"; ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-info shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Today Earnings</div>
						<div class="row no-gutters align-items-center">
							<div class="col-auto">
								<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $today_earn . " VND"; ?></div>
							</div>
						</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-warning shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pending; ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-comments fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xl-8 col-lg-7">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
			</div>
			<div class="card-body">
				<div class="chart-bar">
					<canvas id="myBarChart"></canvas>
				</div>
				<hr>
				Styling for the bar chart can be found in the <code>/js/demo/chart-bar-demo.js</code> file.
			</div>
		</div>
	</div>
</div>
<div class="card shadow mb-4 mt-2">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th width="5%" scope="col">STT</th>
						<th width="30%" scope="col">Product</th>
						<th width="10%" scope="col">Price</th>
						<th width="30%">Genre</th>
						<th width="15%" scope="col">Status</th>
						<th width="10%" scope="col">Amount</th>
					</tr>
				</thead>
				<tbody>
					<?php for ($i = 0; $i < count($products); $i++) { ?>
						<tr>
							<th scope="row"><?php echo $i + 1 ?></th>
							<td><a href="<?php echo FIELD . '/products/details/' . $products[$i]['0']['Product']['id']; ?>"><?php echo $products[$i]['0']['Product']['name'] ?></a></td>
							<td><?php echo $products[$i]['0']['Product']['price'] ?></td>
							<td><?php echo $products[$i]['0']['genree']['name'] ?></td>
							<td>
								<?php if ($products[$i]['Product_store']['amount'] > 0) { ?>
									<span class="badge badge-success">Selling</span>
								<?php } else { ?>
									<span class="badge badge-danger">Out of stock</span>
								<?php } ?>
							</td>
							<td><?php echo $products[$i]['Product_store']['amount']; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="card shadow mb-4 mt-2">
	<div class="card-header py-3 d-flex align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary">Thống Kê</h6>
		<select class="custom-select w-25" id="typeReport">
			<option value="1" selected>Thống kê doanh thu</option>
			<option value="2">Sản phẩm bán chạy</option>
		</select>
		<div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
			<i class="fa fa-calendar"></i>&nbsp;
			<span></span> <i class="fa fa-caret-down"></i>
		</div>
		<button class="btn btn-primary" id="getTable">Thống kê</button>
		<button class="btn btn-primary" id="exportBtn">Export Excel</button>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
				<thead id="headerTable">
				</thead>
				<tfoot id="footerTable">
				</tfoot>
				<tbody id="bodyTable">
				</tbody>
			</table>
		</div>
	</div>
</div>
