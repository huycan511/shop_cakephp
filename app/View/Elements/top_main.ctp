<style>
.div_noti_of_user{
  cursor: pointer;
}
.div_noti_of_user:hover{
  color: black;
}
</style>
<header>
  <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="top-right pull-right">
            <div class="pull-left" style="position: relative;">
              <input type="text" class="form-control " id="searchText">
              <span style="float: right;position: absolute;font-size: 20px;top:10px;right: 26px;" class="fas fa-search"></span>
            </div>
            <div id="top-links" class="nav pull-right">
              <ul class="list-inline">
                <li class="dropdown"><a href="#" title="My Account" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user" style="margin-right: 4px;"></i><span><?php if($this->Session->read('id_user')){echo $this->Session->read('name_user');}else{ echo 'My Account';}?></span> <span class="caret"></span></a>
                  <ul class="dropdown-menu dropdown-menu-right">
                    <li class="<?php if(!$this->Session->read('id_user')){echo'd-none';}?>"><a href="<?php echo FIELD;?>/users" style="cursor: pointer;width: 100%;">Account</a></li>
                    <li><a style="cursor: pointer; width: 100%;" data-izimodal-open="#modal-custom">Register</a></li>
                    <li class="<?php if($this->Session->read('id_user')){echo'd-none';}?>"><a style="cursor: pointer;width: 100%;" data-izimodal-open="#modal-custom">Login</a></li>
                    <li class="<?php if(!$this->Session->read('id_user')){echo'd-none';}?>"><a href="<?php echo FIELD;?>/users/logout" style="cursor: pointer; width: 100%;">Logout</a></li>
                  </ul>
                </li>
                <li><a href="<?php if($this->Session->read('id_user')){echo FIELD.'/users/wishlist';}?>" id="wishlist-total" title="Wish List (0)"><i class="fa fa-heart"></i><span> Wish List </span><span id="span_wishtlist"><?php echo "(".$wishlist.")";?> </span></a></li>

                  <?php if ($this->Session->read('id_user')) { ?>
                    <li class="dropdown"><a href="#"class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-bell"></i><span> My Notifications <?php echo "(" . count($notisUser) . ")";?> </span></a>
                      <?php if (count($notisUser) > 0 ){ ?>
                        <ul class="dropdown-menu">
                        <?php foreach ($notisUser as $notiUser) { ?>
                          <li style='font-size: 16px;'><a href="/users/orderlist" style="cursor: pointer; width: 100%;">
                            <i class="fa fa-ambulance" style='font-size: 22px; color:violet;'></i> Your order number <?php echo $notiUser['Notification']['id_key_notication'] ?> is on the road <i style='font-size: 20px; color:red;' class="far fa-angry"></i>
                          </a></li>
                        <?php } ?>
                        </ul>
                      <?php } ?>
                    <li>
                  <?php } ?>

              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="header-inner">
      <div class="col-sm-4 col-xs-6 header-left">
        <div class="shipping">
          <div class="shipping-img"></div>
          <div class="shipping-text">+91(000)1234-1234<span class="shipping-detail">Week From 9:00am To 7:00pm</span></div>
        </div>
      </div>
      <div class="col-sm-4 col-xs-12 header-middle">
        <div class="header-middle-top">
          <div id="logo"> <a href="<?php echo FIELD;?>"><img src="<?php echo FIELD;?>/app/webroot/img/logo.png" title="E-Commerce" alt="E-Commerce" class="img-responsive" /></a> </div>
        </div>
      </div>
      <div class="col-sm-4 col-xs-12 header-right">
        <div id="cart" class="btn-group btn-block">
          <button type="button" data-izimodal-open="<?php if(!$this->Session->read('id_user')){
              echo "#modal-custom";
          } ?>" class="btn btn-inverse btn-block btn-lg dropdown-toggle <?php 
            if($this->Session->read('id_user')) {
              echo "cart-dropdown-button";
          }
          ?>"> <span id="cart-total">
            <span class="cart-title">Shopping Cart</span><br>
            <span id="span_amount_product_cart"><?php if($cart){ echo count($cart);}else{echo '0';} ?></span> <span>item(s) -</span>
              <span id="span_price_cart"> <?php if(isset($total)){ echo number_format(0.1*$total + $total).'đ';} else{echo '0đ';} ?></span>
             </span></button>
          <ul class="dropdown-menu pull-right cart-dropdown-menu">
          <?php
            if(!$cart){?>
            <li>
              <div>
              <h1>Nothing here!</h1>
              </div>
            </li>
            <?php }else{
          ?>
            <li>
              <table class="table table-striped">
                <tbody>
                  <?php for ($i=0; $i < count($cart) ; $i++) { ?>
                    <tr class="tr_cart">
                    <td class="text-center"><a href="#"><img class="img-thumbnail" src="<?php echo FIELD;?>/app/webroot/img/product/<?php echo $cart[$i]['2']?>" style="width:60px;" ></a></td>
                    <td class="text-left"><a href="#"><?php echo $cart[$i]['0']?></a>
                      <i class="fas fa-minus-square" data-id="<?php echo $cart[$i]['id_product']?>" onclick="minus($(this))" style="font-size: 20px;margin-right: 10px;"></i>
                      <i class="fas fa-plus-square" data-id="<?php echo $cart[$i]['id_product']?>" onclick="add($(this))" style="font-size: 20px;"></i>
                    </td>
                    <td class="text-left">x <span style="width: 10px;"><?php echo $cart[$i]['amount']?></span></td>
                    <td class="text-left" data-unit="<?php echo $cart[$i]['1']?>"><span class="price_per_product" data-total="<?php echo intval($cart[$i]['1']) * intval($cart[$i]['amount'])?>"><?php echo number_format(intval($cart[$i]['1']) * intval($cart[$i]['amount'])).'đ' ?></span></td>
                    <td class="text-center"><button class="btn btn-danger btn-xs" style="color: red;" onclick="remove_product($(this))" data-id="<?php echo $cart[$i]['id_product'] ?>"  data-user="<?php echo $this->Session->read('id_user')?>" title="Remove" type="button"><i class="fa fa-times" style="font-size: 10px;"></i></button></td>
                  </tr>
                  <?php }?>
                </tbody>
              </table>
            </li>
            <li id="li_price">
              <div>
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td class="text-right"><strong>Sub-Total</strong></td>
                      <td class="text-right" id="total_cart" data-price="<?php echo $total?>"><?php echo number_format($total).'đ'?></td>
                    </tr>
                    <tr>
                      <td class="text-right"><strong>VAT (10%)</strong></td>
                      <td class="text-right" id="vat_price" data-price="<?php echo 0.1*$total ?>"><?php echo number_format(0.1 * $total).'đ'?></td>
                    </tr>
                    <tr>
                      <td class="text-right"><strong>Total</strong></td>
                      <td class="text-right" id="total_price" data-price="<?php echo 0.1*$total + $total?>"><?php echo number_format(0.1*$total + $total).'đ'?></td>
                    </tr>
                  </tbody>
                </table>
                <p class="text-right"> <span class="btn-viewcart"><a href="<?php echo FIELD;?>/users/basket"><strong><i class="fa fa-shopping-cart"></i> View Cart</strong></a></span> <span class="btn-checkout"><a href="<?php echo FIELD;?>/users/checkout"><strong><i class="fa fa-share"></i> Checkout</strong></a></span> </p>
              </div>
            </li> <?php }?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>
<nav id="menu" class="navbar">
  <div class="nav-inner container">
    <div class="navbar-header"><span id="category" class="visible-xs">Menu</span>
      <button type="button" class="btn btn-navbar navbar-toggle" ><i class="fa fa-bars"></i></button>
    </div>
    <div class="navbar-collapse">
      <ul class="main-navigation">
        <li><a href="<?php echo FIELD;?>"   class="parent">Home</a> </li>
        <li><a href="" class="active parent" >Products</a>
            <ul>
                <?php for ($i=0; $i < count($categories) ; $i++) {?>
                <li><a href="<?php echo FIELD;?>/categories/index/<?php echo $categories[$i]['Categories']['id'] ?>"><?php echo $categories[$i]['Categories']['name']?></a>
                    <ul>
                        <?php for ($j=0; $j < count($categories[$i]['genree']); $j++) { ?>
                        <li><a href="<?php echo FIELD;?>/products/genre/<?php echo $categories[$i]['genree'][$j]['id']?>"><?php echo $categories[$i]['genree'][$j]['name'] ?></a></li>
                        <?php }?>
                    </ul>
                </li>
                <?php }?>
            </ul>
        </li>
        <li><a href=""   class="parent"  >Stores</a>
          <ul>
                <?php for ($i=0; $i < count($stores) ; $i++) { ?>
                <li><a href="<?php echo FIELD;?>/stores/view/<?php echo $stores[$i]['Store']['id']?>"><?php echo $stores[$i]['Store']['name']?></a>
                </li>
                <?php }?>
            </ul>
        </li>
        <li><a href="<?php echo FIELD;?>/news" class="parent"  >News</a></li>
        <li><a href="about-us.html" >About us</a></li>
      </ul>
    </div>
  </div>
</nav>