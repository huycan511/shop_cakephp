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
     <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"/>  -->
    <?php
        echo $this->Html->script("jquery-111");
        //echo $this->Html->script('jquery-ui');
        ?>
         <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
         <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"/></script>
         
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js" /></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"/></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"/></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"/></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"/></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"/></script>
	<!-- <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <script src="<?php echo FIELD;?>/app/webroot/ckeditor/ckeditor.js"></script>
    
    <!-- Our Custom CSS -->

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <?php
        echo $this->Html->script('rule');
        echo $this->Html->script('table');
        echo $this->Html->script('angular');
        echo $this->Html->script('toast_jquery');
        echo $this->Html->css('toast_jquery');
    ?>
	<?php
		echo $this->Html->css('all');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
<div class="wrapper">
	<nav id="sidebar">
            <div class="sidebar-header">
                <a href="<?php echo FIELD;?>/admins"><h3>DASHBOARD</h3></a>
            </div>

            <ul class="list-unstyled components">
                <p>MENU</p>
                <li class="<?php if($this->Session->read('type') == 2){ echo 'd-none';}?>">
                    <a href="<?php echo FIELD;?>/admins/bill" >BILL</a>
                </li>
                <li class="<?php if($this->Session->read('type') == 2){ echo 'd-none';}?>">
                    <a href="<?php echo FIELD;?>/admins/onlinebill" >ONLINE BILL</a>
                </li>
                <li>
                    <a href="<?php echo FIELD;?>/invoices/import" >IMPORT</a>
                </li>
                <li>
                    <a href="<?php echo FIELD;?>/invoices/export" >EXPORT</a>
                </li>
                <li class="<?php if($this->Session->read('type') != 2){ echo 'd-none';}?>">
                    <a href="<?php echo FIELD;?>/admins/products" >Products</a>
                </li>
                <li class="<?php if($this->Session->read('type') != 2){ echo 'd-none';}?>">
                    <a href="<?php echo FIELD;?>/admins/categories" >Categories</a>
                </li>
                <li class="<?php if($this->Session->read('type') != 2){ echo 'd-none';}?>">
                    <a href="<?php echo FIELD;?>/admins/genre">Genres</a>
                </li>
                <li class="<?php if($this->Session->read('type') != 2){ echo 'd-none';}?>">
                    <a href="<?php echo FIELD;?>/admins/manager">Managers</a>
                </li>
                <li class="<?php if($this->Session->read('type') != 2){ echo 'd-none';}?>">
                    <a href="<?php echo FIELD;?>/admins/news">News</a>
                </li>
                <li >
                    <a href="#pageSubmenu"  aria-expanded="false" class="dropdown-toggle">ADMIN</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">PROFILE</a>
                        </li>
                        <li>
                            <a href="#">LOGOUT</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
		
		<div id="content">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </nav>
            <div class="tab-content"><div class="container">
			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
			</div></div>
		</div>
</div>

</body>
</html>
