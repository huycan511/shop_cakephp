<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<?php
	//echo $this->Html->script('rule');
	echo $this->Html->css('bootstrap.min');
	echo $this->Html->css('easy-autocomplete.min');
	echo $this->Html->css('easy-autocomplete.themes.min');
	?>
	<link rel="stylesheet" href="<?php echo FIELD; ?>/app/webroot/css/stylesheet.php" type="text/css" />
	<?php
	echo $this->Html->css('responsive');
	echo $this->Html->css('owl.carousel');
	echo $this->Html->css('owl.transitions');
	echo $this->Html->css('toast_jquery');
	echo $this->Html->css('iziModal.min');
	echo $this->Html->css('bootstrap-social');

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	echo $this->Html->script("jquery-111");
	echo $this->Html->script('jquery-ui');
	echo $this->Html->script('dashboard');
	echo $this->Html->script('angular');
	echo $this->Html->script('toast_jquery');
	echo $this->Html->script('jstree.min');
	echo $this->Html->script('template');
	echo $this->Html->script('common');
	echo $this->Html->script('global');
	echo $this->Html->script('owl.carousel.min');
	echo $this->Html->script('bootstrap.min');
	echo $this->Html->script('jrate');
	echo $this->Html->script('jquery.easy-autocomplete.min');
	echo $this->Html->script('rateYo');
	echo $this->Html->css('ion.range');
	?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/js/ion.rangeSlider.min.js"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.min.js"></script>
</head>

<body class="col-2">
	<?php echo $this->element('top_main'); ?>
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="index.html"><i class="fa fa-home"></i></a></li>
			<li><a href="">Products</a></li>
		</ul>
		<div class="row">
			<div id="column-left" class="col-sm-3 hidden-xs column-left">
				<div class="column-block">
					<div class="columnblock-title">Categories</div>
					<div class="category_block">
						<ul class="box-category treeview-list treeview">
							<?php for ($i = 0; $i < count($categories); $i++) { ?>
								<li><a href="<?php echo FIELD.'/categories/index/'.$categories[$i]['Categories']['id'] ?>"><?php echo $categories[$i]['Categories']['name'] ?></a>
									<ul>
										<?php for ($j = 0; $j < count($categories[$i]['genree']); $j++) { ?>
											<li><a href="<?php echo FIELD.'/products/genre/'.$categories[$i]['genree'][$j]['id'] ?>"><?php echo $categories[$i]['genree'][$j]['name'] ?></a></li>
										<?php } ?>
									</ul>
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<div id="fb-root"></div>
				<div class="panel panel-default filter">
					<div class="panel-heading columnblock-title">Search</div>
					<div class="filter-block">
						<input type="text" class="js-range-slider" name="my_range" value="" />
						<button id="search_price">Search</button>
					</div>
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
	<?php echo $this->element('footer_main'); ?>
	<?php echo $this->element('modal_login'); ?>
</body>
<script>
		$(".expandable-hitarea").each( function() {
			var i = $("<i>");
			console.log("a");
		});
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
				}, 100);
			}
		});
	</script>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=285158789315292&autoLogAppEvents=1"></script>
</html>
