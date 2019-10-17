<div class="col-sm-9" id="content">
      <h1>Checkout</h1>
      <div id="accordion" class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"><a class="accordion-toggle collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapse-checkout-option" aria-expanded="false">Step 1: Receiver Information<i class="fa fa-caret-down"></i></a></h4>
          </div>
          <div id="collapse-checkout-option"  role="heading" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-9">
                  <table style="width:100%">
                    <tr>
                      <th><h3>Username:</h3></th>
                      <td><h3><?php echo $user['name']?></h3><input type="text" value="<?php echo $user['name'] ?>" class="form-control d-none"></td>
                      <th style="padding-left: 20px;"><a onclick="edit_checkout($(this))"><i class="fas fa-pencil-alt"></a></i><a class="d-none" onclick="submit_edit_checkout_name($(this))"><i class="fas fa-check"></i></a></th>
                    </tr>
                    <tr>
                      <th><h3>Phone Number:</h3></th>
                      <td><h3><?php echo $user['phone']?></h3><input value="<?php echo $user['phone']?>" type="text" class="form-control d-none"></td>
                      <th style="padding-left: 20px;"><a onclick="edit_checkout($(this))"><i class="fas fa-pencil-alt"></a></i><a class="d-none" onclick="submit_edit_checkout_phone($(this))"><i class="fas fa-check"></i></a></th>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"><a class="accordion-toggle collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapse-payment-address" aria-expanded="false">Step 2: Address Details <i class="fa fa-caret-down"></i></a></h4>
          </div>
          <div id="collapse-payment-address" role="heading" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
            <div class="panel-body">
              <form class="form-horizontal">
                <div class="radio">
                  <label>
                    <input type="radio" checked="checked" value="existing" name="payment_address" data-id="payment-existing">
                    I want to use an existing address</label>
                </div>
                <div id="payment-existing">
                  <select class="form-control" id="address_id_exist">
                    <?php foreach ($arrayAddress as $key => $value) {?>
                    <option selected="selected" data-lat="<?php echo $value['lat']?>" data-lng="<?php echo $value['lng'] ?>" value="<?php echo $value['address'] ?>"><?php echo $value['address']?></option>
                    <?php }?>
                  </select>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" value="new" name="payment_address" data-id="payment-new">
                    I want to use a new address</label>
                </div>
                <div id="payment-new"  style="display: none;">
                  <div class="form-group required">
                        <label for="input-address-1" class="col-sm-2 control-label">Số nhà, ngõ, phố</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="sonha" placeholder="Số nhà, ngõ, phố">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-zone" class="col-sm-2 control-label">Tỉnh / Thành phố</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="hanhchinh" name="zone_id">
                                <option selected disabled> --- Please Select --- </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group required">
                        <label for="input-zone" class="col-sm-2 control-label">Huyện / Quận</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="huyen" name="zone_id">
                                <option selected disabled> --- Please Select --- </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-zone" class="col-sm-2 control-label">Xã / Phường</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="xa" name="zone_id">
                                <option selected disabled> --- Please Select --- </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                      <input type="button" class="btn btn-primary" data-loading-text="Loading..." id="button-payment-address" data-user="<?php echo $this->Session->read('id_user')?>" value="Add Address">
                    </div>
                </div>
              </form>
              <script type="text/javascript">
$('input[name=\'payment_address\']').on('change', function() {
    if (this.value == 'new') {
		$('#payment-existing').hide();
		$('#payment-new').show();
	} else {
		$('#payment-existing').show();
		$('#payment-new').hide();
	}
});

</script>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"><a class="accordion-toggle collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapse-shipping-method" aria-expanded="false">Step 3: Delivery Method <i class="fa fa-caret-down"></i></a></h4>
          </div>
          <div id="collapse-shipping-method" role="heading" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
            <div class="panel-body">
              <p>Please select the preferred shipping method to use on this order.</p>
              <p><strong>Flat Rate</strong></p>
              <div class="radio">
                <label>
                  <input type="radio" checked="checked" value="flat.flat" name="shipping_method">
                  Flat Shipping Rate - 20,000đ</label>
              </div>
              <p><strong>Add Comments About Your Order</strong></p>
              <p>
                <textarea class="form-control" rows="8" name="comment" id="comment_order"></textarea>
              </p>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"><a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapse-checkout-confirm" aria-expanded="true">Step 4: Confirm Order <i class="fa fa-caret-down"></i></a></h4>
          </div>
          <div id="collapse-checkout-confirm" role="heading" class="panel-collapse collapse in" aria-expanded="true" style="">
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <td class="text-left">Product Name</td>
                      <td class="text-left">Image</td>
                      <td class="text-right">Quantity</td>
                      <td class="text-right">Unit Price</td>
                      <td class="text-right">Total</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php for ($i=0; $i < count($cart); $i++) {?>
                    <tr>
                      <td class="text-left"><a><?php echo $cart[$i]['0']?></a></td>
                      <td class="text-left"><img id="img_product_confirm_order" src="<?php echo FIELD;?>/app/webroot/img/product/<?php echo $cart[$i]['2']?>"></td>
                      <td class="text-right"><?php echo $cart[$i]['amount']?></td>
                      <td class="text-right"><?php echo number_format($cart[$i]['1']).'đ' ?></td>
                      <td class="text-right"><?php echo number_format( $cart[$i]['amount']*$cart[$i]['1']).'đ' ?></td>
                    </tr>
                    <?php }?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td class="text-right" colspan="4"><strong>Sub-Total:</strong></td>
                      <td class="text-right"><?php echo number_format($total).'đ' ?></td>
                    </tr>
                    <tr>
                      <td class="text-right" colspan="4"><strong>VAT(10%):</strong></td>
                      <td class="text-right"><?php echo number_format($total*0.1).'đ' ?></td>
                    </tr>
                    <tr>
                      <td class="text-right" colspan="4"><strong>Flat Shipping Rate:</strong></td>
                      <td class="text-right">20,000đ</td>
                    </tr>
                    <tr>
                      <td class="text-right" colspan="4"><strong>Total:</strong></td>
                      <td class="text-right" id="total_order_online" data-total="<?php echo $total+$total*0.1+20000 ?>" ><?php echo number_format($total+$total*0.1+20000).'đ' ?></td>
                    </tr>
                  </tfoot>
                </table>
							</div>
							<div class="g-recaptcha" data-sitekey="6LdFy7EUAAAAADbU7cmmsCft89FsKqms9TVnNvVk"></div>
              <div class="buttons">
                <div class="pull-right">
                  <input type="button" data-user=<?php echo $this->Session->read('id_user')?> data-loading-text="Loading..." class="btn btn-primary" id="button-confirm_order" value="Confirm Order">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
