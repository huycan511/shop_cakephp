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
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php echo $this->Html->charset(); 
  ?>
  <title>
    Fresh Food Shop
  </title>
  <!-- <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> -->
  <?php           
        echo $this->Html->css('easy-autocomplete.min');
        echo $this->Html->css('easy-autocomplete.themes.min');
        ?>
    <!-- Bootstrap CSS CDN -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"> -->
    <!-- Our Custom CSS -->

    <!-- Font Awesome JS -->
   <!--  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css"> -->
    <!-- <script src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.min.js"></script> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"> -->
   <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" /> -->
    <link rel="stylesheet" href="<?php echo FIELD;?>/app/webroot/css/stylesheet.php" type="text/css" />
    <?php
        //echo $this->Html->script('rule');
        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('rateyo');
        echo $this->Html->css('fontgoogle');
        //echo $this->Html->css('stylesheet');
        echo $this->Html->css('bootstrap-social');
        echo $this->Html->css('responsive');
        echo $this->Html->css('owl.carousel');
        echo $this->Html->css('owl.transitions');
        echo $this->Html->css('toast_jquery');
    //echo $this->Html->css('all');

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
    <?php
    echo $this->fetch('script');
    echo $this->Html->script("jquery-111");
    echo $this->Html->script('jquery-ui');
    echo $this->Html->script('jquery.easy-autocomplete.min');
    // echo $this->Html->script('angular');
    echo $this->Html->script('bootstrap.min');
    echo $this->Html->script('dashboard');
    echo $this->Html->script('iziModal.min');
    echo $this->Html->script('owl.carousel.min');
    echo $this->Html->script('toast_jquery');
    // echo $this->Html->script('jstree.min');
    echo $this->Html->script('template');
    echo $this->Html->script('common');
    echo $this->Html->script('global');
    echo $this->Html->script('jrate');
    echo $this->Html->script('parally');
    echo $this->Html->script('rateYo');
?>
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script> -->
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script> -->
   <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script> -->
    <!-- Load Facebook SDK for JavaScript -->
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
</body>
</html>

