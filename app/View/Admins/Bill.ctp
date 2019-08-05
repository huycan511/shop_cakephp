
                   <a class="btn btn-secondary btn-lg" href="#myModal" rel="modal:open">New Bill</a>
                        <!-- Modal -->
                        <div class="table-responsive mt-2">
                            <table class="table" id="datatable">
                                <thead>
                                    <tr>
                                        <th width="10%" scope="col">ID</th>
                                        <th width="30%" scope="col">Store</th>
                                        <th width="20%" scope="col">Customer ID</th>
                                        <th width="20%" scope="col">Date</th>
                                        <th width="10%" scope="col">Price</th>
                                        <th width="10%" scope="col">Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i=0; $i < count($bill); $i++) {?>
                                        <tr>
                                            <td><?php echo $bill[$i]['Invoice']['id']?></td>
                                            <td><?php echo $this->Session->read('name_store')?></td>
                                            <td><?php if($bill[$i]['Invoice']['id_receive']==null){echo 'Khách vãng lai';}else{echo $bill[$i]['Invoice']['id_receive'];}?></td>
                                            <td><?php echo $bill[$i]['Invoice']['date']?></td>
                                            <td><?php echo $bill[$i]['Invoice']['price']?></td>
                                            <td><a href="../invoices/detail/<?php echo $bill[$i]['Invoice']['id'] ?>"><i class="fas fa-edit"></i></a></td>
                                        </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>

        <div id="myModal" class="modal">
          <!-- Modal content-->
                <div class="modal-header">
                    <h4 class="modal-title">New Bill</h4>                     
                </div>
                <div class="modal-body">
                        <label class="my-1 ">Store: <?php echo $this->Session->read('name_store')?></label>
                        <br>
                        <label class="my-1 ">Customer ID</label>
                        <input type="text" class="form-control" id="customer_id" list="cityname">
                        <datalist id="cityname">
                          <option value="Khách vãng lai">
                        </datalist>
                        <label >Date</label>
                        <input class="form-control date_bill" type="date" />
                        <form id="form_product" onsubmit="return false" class="form">
                            <label>Product</label>
                            <select class="custom-select my-1 mr-sm-2" id="one_product" name="name_product">
                                <option selected>Choose...</option>
                                <?php for ($i=0; $i < count($products); $i++) {?>
                                    <option disabled><?php echo $products[$i]['Genre']['name']?></option>
                                    <?php for ($j=0; $j < count($products[$i]['productt']) ; $j++) { ?>
                                        <option value="<?php echo $products[$i]['productt'][$j]['id'] ?>"><?php echo $products[$i]['productt'][$j]['name'] ?></option>
                                    <?php }?>
                                <?php } ?>
                            </select>
                            <label >Amout</label>
                            <input type="number" class="form-control" name="amount_product">
                        </form>
                        <a onclick="moreProduct()" style="margin-left: 190px; font-size: 20px;"><i class="fas fa-plus-circle"></i></a>
                        <input type="text" class="form-control d-none" value="<?php echo $this->Session->read('id_store')?>" >
                        <button type="submit" class="btn btn-secondary btn-block new_bill">Submit</button>
                </div>
        </div>
        <script type="text/javascript">
            // $("#datepicker").datepicker({ 
            //     autoclose: true, 
            //     todayHighlight: true
            // }).datepicker('update', new Date());
            $('#datatable').DataTable();
        </script>

        
                
 
