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
	<!-- Bootstrap CSS CDN -->
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"> -->
	<!-- Our Custom CSS -->

	<!-- Font Awesome JS -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
		integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
		crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
		integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
		crossorigin="anonymous"></script>
	<!-- <script src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script> -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
		integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
	<link rel="stylesheet" href="<?php echo FIELD;?>/app/webroot/css/stylesheet.php" type="text/css" />
	<?php
        //echo $this->Html->script('rule');
        echo $this->Html->css('bootstrap.min');
        //echo $this->Html->css('stylesheet');
        echo $this->Html->css('responsive');
        echo $this->Html->css('owl.carousel');
        echo $this->Html->css('owl.transitions');
        echo $this->Html->css('toast_jquery');
        echo $this->Html->css('iziModal.min');
        echo $this->Html->css('easy-autocomplete.min');
        echo $this->Html->css('easy-autocomplete.themes.min');
		//echo $this->Html->css('all');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<?php echo $this->element('top_main'); ?>
<div class="container" style="background: white; padding-left: 25px;padding-bottom: 40px;">
	<ul class="breadcrumb" style="background: white;">
		<li><a href="index.html"><i class="fa fa-home"></i></a></li>
		<li><a href="blog.html">News</a></li>
	</ul>
	<div class="row">
		<?php echo $this->Flash->render(); ?>

		<?php echo $this->fetch('content'); ?>
	</div>
</div>
<?php echo $this->element('footer_main'); ?>
<?php echo $this->element('modal_login'); ?>
<?php
echo $this->Html->script('dashboard');
echo $this->Html->script('angular');
echo $this->Html->script('toast_jquery');
echo $this->Html->script('jstree.min');
echo $this->Html->script('template');
echo $this->Html->script('common');
echo $this->Html->script('global');
echo $this->Html->script('owl.carousel.min');
echo $this->Html->script('bootstrap.min');
echo $this->Html->script('jquery.easy-autocomplete.min');
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.min.js"></script>
<script>
	$("#modal-custom").iziModal({
		overlayClose: false,
		overlayColor: 'rgba(0, 0, 0, 0.6)'
	});
	$("#modal-custom").on('click', 'header a', function (event) {
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

	$("#modal-custom").on('click', '.submit', function (event) {
		event.preventDefault();

		var fx = "wobble",  //wobble shake
			$modal = $(this).closest('.iziModal');

		if (!$modal.hasClass(fx)) {
			$modal.addClass(fx);
			setTimeout(function () {
				$modal.removeClass(fx);
			}, 100);
		}
	});
</script>
</body>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0&appId=456985718137023&autoLogAppEvents=1"></script>

</html>
