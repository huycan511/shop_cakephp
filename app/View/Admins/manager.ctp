
                        <a class="btn btn-secondary btn-lg" href="#myModal" rel="modal:open">New Manager</a>
                        <!-- Modal -->
                        <div class="table-responsive mt-2">
                            <table class="table" id="datatable">
                                <thead>
                                    <tr>
                                        <th width="5%" scope="col">STT</th>
                                        <th width="20%" scope="col">Name</th>
                                        <th width="20%" scope="col">Phone</th>
                                        <th width="10%" scope="col">Mail</th>
                                        <th width="30%" scope="col">Store Mangage</th>
                                        <th width="1%" scope="col">Password</th>
                                        <th width="5%" scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i=0; $i < count($manager); $i++) {?>
                                        <tr>
                                            <th scope="row"><?php echo $i+1?></th>
                                            <td><?php echo $manager[$i]['Manage']['name']?></td>
                                            <td><?php echo $manager[$i]['Manage']['phone'] ?></td>
                                            <td><?php echo $manager[$i]['Manage']['mail'] ?></td>
                                            <td><?php echo $manager[$i]['Manage']['id_store']?></td>
                                            <td><?php echo $manager[$i]['Manage']['pass']?></td>
                                            <td><i class="fas fa-trash-alt" onclick="delete_manager($(this))" data-id="" ></i></td>
                                        </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>

        <div id="myModal" class="modal">
          <!-- Modal content-->
                <div class="modal-header">
                    <h4 class="modal-title">New Manager</h4>                     
                </div>
                <div class="modal-body">
                        <label class="my-1 ">Name</label>
                        <input type="text" class="form-control name_manage">
                        <label class="my-1 ">Phone</label>
                        <input type="text" class="form-control phone_manage">
                        <label class="my-1 ">Email</label>
                        <input type="email" class="form-control mail_manage">
                        <label class="my-1 ">Password</label>
                        <input type="password" class="form-control pass_manage_1">
                        <label class="my-1 ">Confirm Password</label>
                        <input type="password" class="form-control pass_manage_2">
                        <label class="my-1 ">Store Manage</label>
                        <select class="custom-select my-1 mr-sm-2 store_manage">
                            <option selected disabled>Choose...</option>
                            <?php for ($i=0; $i < count($stores); $i++) {?>
                                <option value="<?php echo $stores[$i]['Store']['id']?>"><?php echo $stores[$i]['Store']['name']?></option>
                            <?php }?>
                        </select>
                        <button class="btn btn-outline-primary btn-block add_manage">Submit</button>
                </div>
        </div>

        
                
