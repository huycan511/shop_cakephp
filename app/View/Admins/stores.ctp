
                        <a class="btn btn-secondary btn-lg" href="#myModal" rel="modal:open">New Store</a>
                        <!-- Modal -->
                        <div class="table-responsive mt-2">
                            <table class="table" id="datatable">
                                <thead>
                                    <tr>
                                        <th width="15%" scope="col">STT</th>
                                        <th width="20%" scope="col">Name store</th>
                                        <th width="20%" scope="col">Address</th>
                                        <th width="10%" scope="col">Phone</th>
                                        <th width="15%">Email</th>
                                        <th width="15%" scope="col">Edit</th>
                                        <th width="5%" scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i=0; $i < count($stores); $i++) {?>
                                        <tr>
                                            <th scope="row"><?php echo $i+1?></th>
                                            <td><?php echo $stores[$i]['Store']['name']?></td>
                                            <td><?php echo $stores[$i]['Store']['address'] ?></td>
                                            <td><?php echo $stores[$i]['Store']['phone'] ?></td>
                                            <td><?php echo $stores[$i]['Store']['email']?></td>
                                            <td><a href="../stores/detail/<?php echo $stores[$i]['Store']['id']?>"><i class="fas fa-edit"></i></a></td>
                                            <td><i class="fas fa-trash-alt" onclick="delete_store($(this))" data-id="" ></i></td>
                                        </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>

        <div id="myModal" class="modal">
          <!-- Modal content-->
                <div class="modal-header">
                    <h4 class="modal-title">New Store</h4>                     
                </div>
                <div class="modal-body">
                        <label class="my-1 ">Name store</label>
                        <input type="text" class="form-control name_store">
                        <label >Address</label>
                        <input type="text" class="form-control addr_store">
                        <label >Phone</label>
                        <input type="text" class="form-control phone_store">
                        <label >Email</label>
                        <input type="email" class="form-control mail_store">
                        <label >URL Image</label>
                        <input type="text" class="form-control image_store">
                        <button class="btn btn-outline-primary btn-block add_store">Submit</button>
                </div>
        </div>

        
                
