<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="google-signin-client_id" content="199959814720-qi8o301gerh47kcv8kli7s2eq64c2c76.apps.googleusercontent.com">
	<title>Document</title>
	<?php echo $this->Html->charset();
	?>
	<title>
		Fresh Food Shop
	</title>
	<?php
	echo $this->Html->css('easy-autocomplete.min');
	echo $this->Html->css('easy-autocomplete.themes.min');
	?>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo FIELD; ?>/app/webroot/css/stylesheet.php" type="text/css" />
	<?php
	echo $this->Html->css('bootstrap.min');
	echo $this->Html->css('rateyo');
	echo $this->Html->css('fontgoogle');
	echo $this->Html->css('bootstrap-social');
	echo $this->Html->css('responsive');
	echo $this->Html->css('owl.carousel');
	echo $this->Html->css('owl.transitions');
	echo $this->Html->css('toast_jquery');
	echo $this->Html->css('iziModal.min');
	echo $this->fetch('meta');
	echo $this->fetch('css');
	?>
</head>

<body>
	<?php echo $this->element('top_main'); ?>
	<?php echo $this->Flash->render(); ?>
	<?php echo $this->fetch('content'); ?>
	<?php echo $this->element('footer_main'); ?>
	<?php echo $this->element('modal_login'); ?>
	<?php echo $this->element('buy_now'); ?>
	<div class="fb-customerchat" page_id="108927717488563" minimized="true"></div>
</body>
<?php
echo $this->fetch('script');
echo $this->Html->script("jquery-111");
echo $this->Html->script('jquery-ui');
echo $this->Html->script('jquery.easy-autocomplete.min');
echo $this->Html->script('bootstrap.min');
echo $this->Html->script('dashboard');
echo $this->Html->script('iziModal.min');
echo $this->Html->script('owl.carousel.min');
echo $this->Html->script('toast_jquery');
echo $this->Html->script('template');
echo $this->Html->script('common');
echo $this->Html->script('global');
echo $this->Html->script('jrate');
echo $this->Html->script('parally');
echo $this->Html->script('rateYo');
?>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script>
	$("#modal-custom").iziModal({
		overlayClose: false,
		overlayColor: 'rgba(0, 0, 0, 0.6)'
	});
	$('.parallax').parally({
		offset: -40
	});
	$(".rating").each(function() {
		var rating = $(this).attr("data-id");
		$(this).rateYo({
			rating: rating,
			fullStar: true,
			readOnly: true
		});
	});
</script>
<script type="text/javascript"
    	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDb4PrrQE-OwauwV5bn2fGovSF8e1NUc5I">
    </script>
<script>
	window.fbAsyncInit = function() {
		FB.init({
			appId: '456985718137023',
			autoLogAppEvents: true,
			xfbml: true,
			version: 'v2.11'
		});
	};
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s);
		js.id = id;
		js.src = "https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>

</html>
