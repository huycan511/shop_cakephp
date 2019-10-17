<div class="col-sm-9" id="content">
  <h1>Shopping Cart</h1>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <td class="text-center">Image</td>
            <td class="text-left">Product Name</td>
            <td class="text-left">Quantity</td>
            <td class="text-right">Unit Price</td>
            <td class="text-right">Total</td>
          </tr>
        </thead>
        <tbody>
          <?php for ($i=0; $i < count($cart); $i++) {?>
            <tr>
              <td class="text-center"><a href="<?php echo FIELD;?>/home/product/<?php echo $cart[$i]['id_product'];?>"><img style="height: 40px;" class="img-thumbnail" src="<?php echo "/app/webroot/img/product/".$cart[$i]['2']?>"></a></td>
              <td class="text-left"><a href="<?php echo FIELD;?>/home/product/<?php echo $cart[$i]['id_product'];?>"><?php echo $cart[$i]['0']?></a></td>
              <td class="text-left"><div style="max-width: 200px;" class="input-group btn-block">
                  <input type="number" class="form-control quantity" size="1" value="<?php echo $cart[$i]['amount']?>" name="quantity" style="width: 65px;">
                  <span class="input-group-btn">
                  <button class="btn btn-primary update_cart" data-id="<?php echo $cart[$i]['id_product']?>"  data-toggle="tooltip" data-original-title="Update"><i class="fas fa-sync-alt"></i></button>
                  <button  class="btn btn-danger remove_in_cart" data-toggle="tooltip" type="button" data-original-title="Remove"><i style="color:white;" class="fas fa-times"></i></button>
                  </span></div></td>
              <td class="text-right"><?php echo $cart[$i]['1']?>đ</td>
              <td class="text-right"><?php echo $cart[$i]['amount']*$cart[$i]['1'] ?>đ</td>
            </tr>
          <?php }?>
        </tbody>
      </table>
    </div>
  <br>
  <div class="row">
    <div class="col-sm-4 col-sm-offset-8">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td class="text-right"><strong>Sub-Total:</strong></td>
            <td class="text-right"><?php echo $total;?>đ</td>
          </tr>
          <tr>
            <td class="text-right"><strong>VAT (10%):</strong></td>
            <td class="text-right"><?php echo 0.1*$total;?>đ</td>
          </tr>
          <tr>
            <td class="text-right"><strong>Total:</strong></td>
            <td class="text-right"><?php echo 1.1*$total?>đ</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="buttons">
    <div class="pull-left"><a class="btn btn-default" href="<?php echo FIELD;?>">Continue Shopping</a></div>
    <div class="pull-right"><a class="btn btn-primary" href="checkout">Checkout</a></div>
  </div>
</div>
