<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
	<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.4.0/css/bootstrap4-toggle.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
	<script src="https://js.pusher.com/5.0/pusher.min.js"></script>
	<?php
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
		echo $this->Html->css('sb-admin-2.min');
		echo $this->Html->css('vendor/fontawesome-free/css/all.min');
		echo $this->Html->css('vendor/datatables/dataTables.bootstrap4.min');
		echo $this->Html->css('sbadmin');
		echo $this->Html->css('toast_jquery');
		echo $this->Html->css('all');
		echo $this->Html->css('iziModal.min');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>
<body id = "page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<?php echo $this->element('sidebar',  array('id_admin'=> $this->Session->read('id_admin'))); ?>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<?php echo $this->element('topbar'); ?>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid" data_id_store=<?php echo $this->Session->read('id_admin'); ?>>
					<?php echo $this->Flash->render();?>
					<?php echo $this->fetch('content');?>
				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->
			<?php echo $this->element('footer'); ?>

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="<?php echo Router::url(array("controller" => "login", "action" => "index"))?>">Logout</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="row" style="position: relative">
						<i class="fas fa-info-circle fa-7x"></i>
						<h5 class="modal-title" id="exampleModalLongTitle" style="position: absolute; top:45%; left: 30%;">Check In: <label id="time_checkin"></label></h5>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php
	echo $this->Html->script('jquery/jquery.min');
	echo $this->Html->script('bootstrap/js/bootstrap.bundle.min');
	echo $this->Html->script('jquery-easing/jquery.easing.min');
	echo $this->Html->script('js/sb-admin-2.min');
	echo $this->Html->script('rule');
	echo $this->Html->script('sbadmin');
	if($_SERVER['REQUEST_URI']=="/admin" || $_SERVER['REQUEST_URI']=="/admin/index"){
		echo $this->Html->script('chart');
		echo $this->Html->script('js/demo/datatables-demo');
	    echo $this->Html->script('js/demo/chart-bar-demo');
	}
	echo $this->Html->script('datatables/jquery.dataTables.min');
	echo $this->Html->script('datatables/dataTables.bootstrap4.min');
	echo $this->Html->script('table');
	echo $this->Html->script('toast_jquery');
	echo $this->Html->script('iziModal.min');
	echo $this->Html->script('pagination');

?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="<?php echo FIELD;?>/app/webroot/ckeditor/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.4.0/js/bootstrap4-toggle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
