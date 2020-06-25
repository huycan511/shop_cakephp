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
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>

	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<?php
	echo $this->Html->script('jquery.easy-autocomplete.min');
	echo $this->Html->css('easy-autocomplete.min');
	echo $this->Html->css('easy-autocomplete.themes.min');
	?>
	<!-- Bootstrap CSS CDN -->
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"> -->
	<!-- Our Custom CSS -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
	<!-- Font Awesome JS -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<!-- <script src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
	<link rel="stylesheet" href="<?php echo FIELD; ?>/app/webroot/css/stylesheet1.php" type="text/css" />
	<?php
	//echo $this->Html->script('rule');
	echo $this->Html->script('dashboard');
	echo $this->Html->css('bootstrap.min');
	echo $this->Html->script('angular');
	//echo $this->Html->css('stylesheet1');
	echo $this->Html->css('responsive');
	echo $this->Html->css('owl.carousel');
	echo $this->Html->css('owl.transitions');
	echo $this->Html->script('toast_jquery');
	echo $this->Html->script('jstree.min');
	echo $this->Html->script('template');
	echo $this->Html->script('common');
	echo $this->Html->script('global');
	echo $this->Html->script('owl.carousel.min');
	echo $this->Html->css('toast_jquery');
	echo $this->Html->script('bootstrap.min');
	echo $this->Html->css('iziModal.min');
	echo $this->Html->css('bootstrap-social');
	echo $this->Html->css('ion.range');
	//echo $this->Html->css('all');

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/js/ion.rangeSlider.min.js"></script>
</head>

<body class="col-2">
	<?php echo $this->element('top_main'); ?>
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="index.html"><i class="fa fa-home"></i></a></li>
			<li><a href="category.html">Product</a></li>
		</ul>
		<div class="row">
			<div id="column-left" class="col-sm-3 hidden-xs column-left">
				<div class="column-block">
					<div class="columnblock-title">Categories</div>
					<div class="category_block">
						<ul class="box-category treeview-list treeview">

							<?php for ($i = 0; $i < count($categories); $i++) { ?>
								<li><a href="<?php echo FIELD . '/categories/index/' . $categories[$i]['Categories']['id'] ?>"><?php echo $categories[$i]['Categories']['name'] ?></a>
									<ul>
										<?php for ($j = 0; $j < count($categories[$i]['genree']); $j++) { ?>
											<li><a href="<?php echo FIELD . '/products/genre/' . $categories[$i]['genree'][$j]['id'] ?>"><?php echo $categories[$i]['genree'][$j]['name'] ?></a></li>
										<?php } ?>
									</ul>
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>

				<div class="panel panel-default filter">
					<div class="panel-heading columnblock-title">Video</div>
					<iframe width="100%" src="https://www.youtube.com/embed/K0TXwVHW3rM?start=31" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
				<div class="panel panel-default filter">
				<div class="fb-page"
  					data-href="https://www.facebook.com/Fresh-Food-Shop-108927717488563"
  					data-width="340"
  					data-hide-cover="false"
  					data-show-facepile="true"></div>
				</div>
			</div>
			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>

		</div>
	</div>
	<footer id="footer_id">
		<div class="container">
			<div class="row">
				<div class="footer-top-cms">
					<div class="col-sm-7">
						<div class="newslatter">
							<form>
								<h5>Newsletter</h5>
								<div class="input-group">
									<input type="text" class=" form-control" placeholder="Email Here......">
									<button type="submit" value="Sign up" class="btn btn-large btn-primary">Subscribe</button>
								</div>
							</form>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="footer-social">
							<h5>Social</h5>
							<ul>
								<li class="facebook"><a href="#"><i class="fab fa-facebook"></i></a></li>
								<li class="linkedin"><a href="#"><i class="fab fa-linkedin"></i></a></li>
								<li class="twitter"><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li class="gplus"><a href="#"><i class="fab fa-google-plus"></i></a></li>
								<li class="youtube"><a href="#"><i class="fab fa-youtube"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3 footer-block">
					<h5 class="footer-title">Information</h5>
					<ul class="list-unstyled ul-wrapper">
						<li><a href="about-us.html">About Us</a></li>
						<li><a href="checkout.html">Delivery Information</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Terms &amp; Conditions</a></li>
					</ul>
				</div>
				<div class="col-sm-3 footer-block">
					<h5 class="footer-title">Customer Service</h5>
					<ul class="list-unstyled ul-wrapper">
						<li><a href="contact.html">Contact Us</a></li>
						<li><a href="#">Returns</a></li>
						<li><a href="#">Site Map</a></li>
						<li><a href="#">Wish List</a></li>
					</ul>
				</div>
				<div class="col-sm-3 footer-block">
					<h5 class="footer-title">Extras</h5>
					<ul class="list-unstyled ul-wrapper">
						<li><a href="#">Brands</a></li>
						<li><a href="gift.html">Gift Vouchers</a></li>
						<li><a href="affiliate.html">Affiliates</a></li>
						<li><a href="#">Specials</a></li>
					</ul>
				</div>
			</div>
		</div>
		<a id="scrollup">Scroll</a>
	</footer>
	<div class="footer-bottom">
		<div class="container">
			<div class="copyright">Powered By &nbsp;<a class="yourstore" href="http://www.lionode.com/">lionode &copy; 2017 </a> </div>
			<div class="footer-bottom-cms">
				<div class="footer-payment">
					<ul>
						<li class="mastero"><a href="#"><img alt="" src="<?php echo FIELD; ?>/app/webroot/img/payment/mastero.jpg"></a></li>
						<li class="visa"><a href="#"><img alt="" src="<?php echo FIELD; ?>/app/webroot/img/payment/visa.jpg"></a></li>
						<li class="currus"><a href="#"><img alt="" src="<?php echo FIELD; ?>/app/webroot/img/payment/currus.jpg"></a></li>
						<li class="discover"><a href="#"><img alt="" src="<?php echo FIELD; ?>/app/webroot/img/payment/discover.jpg"></a></li>
						<li class="bank"><a href="#"><img alt="" src="<?php echo FIELD; ?>/app/webroot/img/payment/bank.jpg"></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php echo $this->element('modal_login');
		echo $this->element('buy_now');
	?>
	<script>
		$("#modal-custom").iziModal({
			overlayClose: false,
			overlayColor: 'rgba(0, 0, 0, 0.6)'
		});
		$("#modal-custom").on('click', 'header a', function(event) {
			event.preventDefault();
			var index = $(this).index();
			$(this).addClass('active').siblings('a').removeClass('active');
			$(this).parents("div").find("section").eq(index).removeClass('hide').siblings('section').addClass('hide');

			if ($(this).index() === 0) {
				$("#modal-custom .iziModal-content .icon-close").css('background', '#ddd');
			} else {
				$("#modal-custom .iziModal-content .icon-close").attr('style', '');
			}
		});

		$("#modal-custom").on('click', '.submit', function(event) {
			event.preventDefault();

			var fx = "wobble", //wobble shake
				$modal = $(this).closest('.iziModal');

			if (!$modal.hasClass(fx)) {
				$modal.addClass(fx);
				setTimeout(function() {
					$modal.removeClass(fx);
				}, 1500);
			}
		});
	</script>
	<script type="text/javascript"
    	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDb4PrrQE-OwauwV5bn2fGovSF8e1NUc5I">
    </script>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0&appId=285158789315292&autoLogAppEvents=1"></script>
</body>

</html>
