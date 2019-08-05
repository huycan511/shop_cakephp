
                        <a class="btn btn-secondary btn-lg" href="#myModal" rel="modal:open">New Product</a>
                        <!-- Modal -->
                        <div class="table-responsive mt-2">
                            <table class="table" id="datatable">
                                <thead>
                                    <tr>
                                        <th width="5%" scope="col">STT</th>
                                        <th width="30%" scope="col">Product</th>
                                        <th width="10%" scope="col">Price</th>
                                        <th width="25%">Genre</th>
                                        <th width="15%" scope="col">Status</th>
                                        <th width="10%" scope="col">Edit</th>
                                        <th width="5%" scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i=0; $i < count($products); $i++) {?>
                                        <tr>
                                            <th scope="row"><?php echo $i+1?></th>
                                            <td><?php echo $products[$i]['Product']['name']?></td>
                                            <td><?php echo $products[$i]['Product']['price'] ?></td>
                                            <td><?php echo $products[$i]['genree']['name']?></td>
                                            <td>
                                                <label class="switch">
                                                    <input data-show="<?php echo $products[$i]['Product']['id']?>" class="preenty-switch" type="checkbox" v-model="preenty_switch"<?php if($products[$i]['Product']['status']==1){echo'checked';}?>>
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td><a href="../products/detail/<?php echo $products[$i]['Product']['id']?>"><i class="fas fa-edit"></i></a></td>
                                            <td><i class="fas fa-trash-alt" onclick="delete_product($(this))" data-id="" ></i></td>
                                        </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>

        <div id="myModal" class="modal">
          <!-- Modal content-->
                <div class="modal-header">
                    <h4 class="modal-title">New Product</h4>                     
                </div>
                <div class="modal-body">
                        <label class="my-1 ">Product name</label>
                        <input type="text" class="form-control name_product">
                        <label class="my-1 ">Category</label>
                        <select class="custom-select my-1 mr-sm-2 cate_product">
                            <option selected disabled>Choose...</option>
                            <?php for ($i=0; $i < count($categories); $i++) {?>
                                <optgroup label="<?php echo $categories[$i]['Categories']['name']?>">
                                    <?php for ($j=0; $j < count($categories[$i]['genree']); $j++) { ?>
                                        <option value="<?php echo $categories[$i]['genree'][$j]['id'] ?>">
                                            <?php echo $categories[$i]['genree'][$j]['name'] ?>
                                        </option>
                                    <?php }?>
                                </optgroup>
                            <?php } ?>
                        </select>
                        <label >Short description</label>
                        <textarea type="text" class="form-control short_description"></textarea>  
                        <label >Price</label>
                        <input type="number" class="form-control price_product">

                        <form class="form-group" id="file-catcher">
                            <input type="file" id="pro-image" name="pro-image"  multiple/>
                            
                            <div id="preview-images-zone" class="preview-images-zone form-control"> </div>
                            
                            <div id="file-list-display" class="d-none"> </div>
                        
                            <button type="submit">
                                SubMit
                            </button>
                        </form>
                </div>
        </div>
        <script type="text/javascript">
            $('#datatable').DataTable();
        </script>

        
                
