<div class="card shadow mb-4 mt-2">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table_product" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                        <th width="20%">Store</th>
                        <td width="20%">
                            <span><?php echo $store['name'] ?></span>
                            <input value="<?php echo $store['name'] ?>" type="text" class="col-sm-3 form-control d-none" style="max-width: 100%;">
                        </td>
                        <td>
                            <a onclick="edit_store($(this))">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="d-none" data-id="<?php echo $store['id'] ?>" onclick="submit_edit_name_store($(this))">
                                <i class="fas fa-check"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th width="20%">Address</th>
                        <td width="20%">
                            <span><?php echo $store['address'] ?></span>
                            <input value="<?php echo $store['address'] ?>" type="text" class="col-sm-3 form-control d-none" style="max-width: 100%;">
                        </td>
                        <td>
                            <a onclick="edit_store($(this))">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="d-none" data-id="<?php echo $store['id'] ?>" onclick="submit_edit_addr_store($(this))">
                                <i class="fas fa-check"></i>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <th width="20%">Phone</th>
                        <td width="20%">
                            <span><?php echo $store['phone'] ?></span>
                            <input value="<?php echo $store['phone'] ?>" type="text" class="col-sm-3 form-control d-none" style="max-width: 100%;">
                        </td>
                        <td>
                            <a onclick="edit_store($(this))">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="d-none" data-id="<?php echo $store['id'] ?>" onclick="submit_edit_phone_store($(this))">
                                <i class="fas fa-check"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th width="20%">URL Image</th>
                        <td width="70%">
                            <span style="width: 500px;display: block;overflow: hidden;"><?php echo $store['image'] ?></span>
                            <input type="text" class="col-sm-3 form-control d-none" style="max-width: 100%;" value="<?php echo $store['image'] ?>">
                        </td>
                        <td>
                            <a onclick="edit_url_store($(this))">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="d-none" data-id="<?php echo $store['id'] ?>" onclick="submit_edit_image_store($(this))">
                                <i class="fas fa-check"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th width="20%">Latitude</th>
                        <td width="70%">
                            <span style="width: 500px;display: block;overflow: hidden;"><?php echo $store['lat'] ?></span>
                            <input type="text" class="col-sm-3 form-control d-none" style="max-width: 100%;" value="<?php echo $store['lat'] ?>">
                        </td>
                        <td>
                            <a onclick="edit_lat_store($(this))">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="d-none" data-id="<?php echo $store['id'] ?>" onclick="submit_edit_lat_store($(this))">
                                <i class="fas fa-check"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th width="20%">Longitude</th>
                        <td width="70%">
                            <span style="width: 500px;display: block;overflow: hidden;"><?php echo $store['lng'] ?></span>
                            <input type="text" class="col-sm-3 form-control d-none" style="max-width: 100%;" value="<?php echo $store['lng'] ?>">
                        </td>
                        <td>
                            <a onclick="edit_lat_store($(this))">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="d-none" data-id="<?php echo $store['id'] ?>" onclick="submit_edit_lng_store($(this))">
                                <i class="fas fa-check"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Products</th>
                    <th scope="col">Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i=0; $i < count($product); $i++) {?>
                    <tr>
                        <th scope="row"><?php echo $i+1?></th>
                        <td><a href="<?php echo FIELD.'/products/details/'.$product[$i]['Product_store']['id_product']?>"><?php echo $product[$i]['0']?></a></td>
                        <td><?php echo $product[$i]['Product_store']['amount'] ?></td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>