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
    <link rel="stylesheet" href="<?php echo FIELD;?>/app/webroot/css/stylesheet.php" type="text/css" />
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
    //echo $this->Html->script('template');
    echo $this->Html->script('common');
    echo $this->Html->script('global');
    echo $this->Html->script('jrate');
    echo $this->Html->script('parally');
    echo $this->Html->script('rateYo');
?>
<script src="https://apps.elfsight.com/p/platform.js" defer></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script>
    $("#modal-custom").iziModal({
      overlayClose: false,
      overlayColor: 'rgba(0, 0, 0, 0.6)'
  });
$('.parallax').parally({offset: -40});
$(".rating").each( function() {
    var rating = $(this).attr("data-id");
    $(this).rateYo(
        {
            rating: rating,
            fullStar: true,
            readOnly: true
        }
    );
});
</script>
</html>

