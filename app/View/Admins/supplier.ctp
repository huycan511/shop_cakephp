
                        <a class="btn btn-secondary btn-lg" href="#myModal" rel="modal:open">New Supplier</a>
                        <!-- Modal -->
                        <div class="table-responsive mt-2">
                            <table class="table" id="datatable">
                                <thead>
                                    <tr>
                                        <th width="5%" scope="col">STT</th>
                                        <th width="20%" scope="col">Name</th>
                                        <th width="30%" scope="col">Address</th>
                                        <th width="20%" scope="col">Phone</th>
                                        <th width="20%" scope="col">Email</th>
                                        <th width="5%" scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i=0; $i < count($supplier); $i++) {?>
                                        <tr>
                                            <th scope="row"><?php echo $i+1?></th>
                                            <td><?php echo $supplier[$i]['Supplier']['name']?></td>
                                            <td><?php echo $supplier[$i]['Supplier']['address'] ?></td>
                                            <td><?php echo $supplier[$i]['Supplier']['phone'] ?></td>
                                            <td><?php echo $supplier[$i]['Supplier']['email']?></td>
                                            <td><i class="fas fa-trash-alt" onclick="delete_supplier($(this))" data-id="<?php echo $supplier[$i]['Supplier']['id'] ?>" ></i></td>
                                        </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>

        <div id="myModal" class="modal">
          <!-- Modal content-->
                <div class="modal-header">
                    <h4 class="modal-title">New Supplier</h4>                     
                </div>
                <div class="modal-body">
                        <label class="my-1 ">Supplier name</label>
                        <input type="text" class="form-control name_supplier">
                        <label class="my-1 ">Address</label>
                        <input type="text" class="form-control address_supplier">
                        <label >Phone</label>
                        <input type="text" class="form-control phone_supplier">
                        <label >Email</label>
                        <input type="email" class="form-control mail_supplier">
                        <button class="btn btn-outline-primary btn-block add_supplier_btn">Submit</button>
                </div>
        </div>

        
                
