<!-- Topbar -->
<style>
    .color_uncheck {
        background-color : lavender;
    }
</style>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
  <i class="fa fa-bars"></i>
</button>

<!-- Topbar Search -->
<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
  <div class="input-group">
    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="btn btn-primary" type="button">
        <i class="fas fa-search fa-sm"></i>
      </button>
    </div>
  </div>
</form>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

  <!-- Nav Item - Search Dropdown (Visible Only XS) -->
  <li class="nav-item dropdown no-arrow d-sm-none">
    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-search fa-fw"></i>
    </a>
    <!-- Dropdown - Messages -->
    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
      <form class="form-inline mr-auto w-100 navbar-search">
        <div class="input-group">
          <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </li>

  <!-- Nav Item - Alerts -->
  <li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
      <!-- Counter - Alerts -->
      <?php if($number_not_check >= 0) { ?>
            <span id='count_noti' number_noti="<?php echo $number_not_check ?>" class="badge badge-danger badge-counter">
                <?php echo $number_not_check; ?>
            </span>
       <?php } ?>
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
            Alerts Center
        </h6>
        <div id='div_of_notification' sum_notification="<?php echo count($notifications); ?>">
            <?php if (count($notifications) == 0) { ?>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-12" id="a_not_notification">
                        <div>
                            <span class="font-weight-bold">None Notification</span>
                        </div>
                    </div>
                </a>
            <?php } else { foreach ($notifications as $notifications) { ?>
							<div class='itemnoti'>
                    <a target="_blank" rel="noopener noreferrer" class="dropdown-item d-flex align-items-center" href="/invoices/details/<?php echo $notifications['Invoice']['id']; ?> ">
                        <div class="mr-3">
												<div class="icon-circle bg-success">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                        </div>

                        <div>
                            <div class="small text-gray-500"><?php echo $notifications['Invoice']['date']; ?></div>
														<span class="font-weight-bold">Có đơn hàng mới</span>
                        </div>
                    </a>
                </div>
            <?php } } ?>
        </div>
    </div>
  </li>
</ul>

</nav>
<!-- End of Topbar -->
