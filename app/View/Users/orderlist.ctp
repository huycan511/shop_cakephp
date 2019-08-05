<div class="col-sm-9" id="content">
 <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Đang chờ xử lý</a></li>
  <li><a data-toggle="tab" href="#menu1">Đang giao</a></li>
  <li><a data-toggle="tab" href="#menu2">Đã giao</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <?php
        if(isset($bill_wait)){?>
            <div class="table-responsive" style="margin-top: 5px;">
                <?php for ($i=0; $i < count($bill_wait); $i++) {?>
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
                        <?php for ($j=0; $j <count($bill_wait[$i]['0']); $j++) {?>
                        <tr>
                          <td class="text-left"><a><?php echo $bill_wait[$i]['0'][$j]['0']?></a></td>
                          <td class="text-left"><img id="img_product_confirm_order" src="<?php echo FIELD;?>/app/webroot/img/product/<?php echo $bill_wait[$i]['0'][$j]['2']?>"></td>
                          <td class="text-right"><?php echo $bill_wait[$i]['0'][$j]['Product_invoice']['amount']?></td>
                          <td class="text-right"><?php echo number_format($bill_wait[$i]['0'][$j]['1']).'đ' ?></td>
                          <td class="text-right"><?php echo number_format( $bill_wait[$i]['0'][$j]['1']*$bill_wait[$i]['0'][$j]['Product_invoice']['amount']).'đ' ?></td>
                        </tr>
                        <?php }?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td class="text-right" colspan="4"><strong>Sub-Total:</strong></td>
                          <td class="text-right"><?php echo number_format(($bill_wait[$i]['Invoice']['price']-20000)/1.1).'đ' ?></td>
                        </tr>
                        <tr>
                          <td class="text-right" colspan="4"><strong>VAT(10%):</strong></td>
                          <td class="text-right"><?php echo number_format((($bill_wait[$i]['Invoice']['price']-20000)/1.1)*0.1).'đ' ?></td>
                        </tr>
                        <tr>
                          <td class="text-right" colspan="4"><strong>Flat Shipping Rate:</strong></td>
                          <td class="text-right">20,000đ</td>
                        </tr>
                        <tr>
                          <td class="text-right" colspan="4"><strong>Total:</strong></td>
                          <td class="text-right"><?php echo number_format($bill_wait[$i]['Invoice']['price']).'đ' ?></td>
                        </tr>
                        <tr>
                          <td class="text-right" colspan="4"><strong>Date:<?php echo $bill_wait[$i]['Invoice']['date']?></strong></td>
                          <td class="text-right" ><button class="btn btn-danger" id="destroy_order" data-invoice="<?php echo $bill_wait[$i]['Invoice']['id']?>" style="background-color: #f18811;color:white;">Hủy đơn hàng</button></td>
                        </tr>
                      </tfoot>
                    </table>
                <?php }?>
            </div>
        <?php }else{ echo '<h4>You have no order!</h4>'; }
    ?>
  </div>
  <div id="menu1" class="tab-pane fade">
    <?php
        if(isset($bill_process)){?>
            <div class="table-responsive" style="margin-top: 5px;">
                <?php for ($i=0; $i < count($bill_process); $i++) {?>
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
                        <?php for ($j=0; $j <count($bill_process[$i]['0']); $j++) {?>
                        <tr>
                          <td class="text-left"><a><?php echo $bill_process[$i]['0'][$j]['0']?></a></td>
                          <td class="text-left"><img id="img_product_confirm_order" src="<?php echo FIELD;?>/app/webroot/img/product/<?php echo $bill_process[$i]['0'][$j]['2']?>"></td>
                          <td class="text-right"><?php echo $bill_process[$i]['0'][$j]['Product_invoice']['amount']?></td>
                          <td class="text-right"><?php echo number_format($bill_process[$i]['0'][$j]['1']).'đ' ?></td>
                          <td class="text-right"><?php echo number_format( $bill_process[$i]['0'][$j]['1']*$bill_process[$i]['0'][$j]['Product_invoice']['amount']).'đ' ?></td>
                        </tr>
                        <?php }?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td class="text-right" colspan="4"><strong>Sub-Total:</strong></td>
                          <td class="text-right"><?php echo number_format(($bill_process[$i]['Invoice']['price']-20000)/1.1).'đ' ?></td>
                        </tr>
                        <tr>
                          <td class="text-right" colspan="4"><strong>VAT(10%):</strong></td>
                          <td class="text-right"><?php echo number_format((($bill_process[$i]['Invoice']['price']-20000)/1.1)*0.1).'đ' ?></td>
                        </tr>
                        <tr>
                          <td class="text-right" colspan="4"><strong>Flat Shipping Rate:</strong></td>
                          <td class="text-right">20,000đ</td>
                        </tr>
                        <tr>
                          <td class="text-right" colspan="4"><strong>Total:</strong></td>
                          <td class="text-right"><?php echo number_format($bill_process[$i]['Invoice']['price']).'đ' ?></td>
                        </tr>
                        <tr>
                            <td class="text-right" colspan="4"></td>
                            <td class="text-right" colspan="4"><strong>Date:<?php echo $bill_process[$i]['Invoice']['date']?></strong></td>
                        </tr>
                      </tfoot>
                    </table>
                <?php }?>
            </div>
        <?php }else{
            echo '<h4>You have no order!</h4>';
        }
    ?>
  </div>
  <div id="menu2" class="tab-pane fade">
    <?php
        if(isset($bill_success)){?>
            <div class="table-responsive" style="margin-top: 5px;">
                <?php for ($i=0; $i < count($bill_success); $i++) {?>
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
                        <?php for ($j=0; $j <count($bill_success[$i]['0']); $j++) {?>
                        <tr>
                          <td class="text-left"><a><?php echo $bill_success[$i]['0'][$j]['0']?></a></td>
                          <td class="text-left"><img id="img_product_confirm_order" src="<?php echo FIELD;?>/app/webroot/img/product/<?php echo $bill_success[$i]['0'][$j]['2']?>"></td>
                          <td class="text-right"><?php echo $bill_success[$i]['0'][$j]['Product_invoice']['amount']?></td>
                          <td class="text-right"><?php echo number_format($bill_success[$i]['0'][$j]['1']).'đ' ?></td>
                          <td class="text-right"><?php echo number_format( $bill_success[$i]['0'][$j]['1']*$bill_success[$i]['0'][$j]['Product_invoice']['amount']).'đ' ?></td>
                        </tr>
                        <?php }?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td class="text-right" colspan="4"><strong>Total:</strong></td>
                          <td class="text-right"><?php echo number_format($bill_success[$i]['Invoice']['price']).'đ' ?></td>
                        </tr>
                        <tr>
                            <td class="text-right" colspan="4"></td>
                            <td class="text-right" colspan="4"><strong>Date:<?php echo $bill_success[$i]['Invoice']['date']?></strong></td>
                        </tr>
                      </tfoot>
                    </table>
                <?php }?>
            </div>
        <?php }else{
            echo '<h4>You have no order!</h4>';
        }
    ?>
  </div>
</div>
</div>