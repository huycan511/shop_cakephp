<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Chi Tiết Sản Phẩm</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $product['name'] ?></h6>
        </div>
        <div class="card-body">
            <table class="table table_product" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                        <th width="20%">Product</th>
                        <td width="20%">
                            <span><?php echo $product['name'] ?></span>
                            <input value="<?php echo $product['name'] ?>" type="text" class="col-sm-3 form-control d-none" style="max-width: 100%;">
                        </td>
                        <td>
                            <a onclick="edit_protype_product($(this))">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="d-none" data-id="<?php echo $product['id'] ?>" onclick="submit_edit_name($(this))">
                                <i class="fas fa-check"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th width="20%">Genre</th>
                        <td width="20%">
                            <span class="catego"><?php echo $category['name'] ?></span>
                            <select class="d-none">
                                <?php for ($i = 0; $i < count($genres); $i++) { ?>
                                    <option <?php if ($category['id'] == $genres[$i]['Genre']['id']) {
                                                echo 'selected';
                                            } ?> value="<?php echo $genres[$i]['Genre']['id'] ?>"><?php echo $genres[$i]['Genre']['name'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <a onclick="edit_category_product($(this))">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="d-none" data-id="<?php echo $product['id'] ?>" onclick="submit_edit_category($(this))">
                                <i class="fas fa-check"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th width="20%">Price</th>
                        <td width="20%">
                            <span><?php echo $product['price'] . ' VND' ?></span>
                            <input value="<?php echo $product['price'] ?>" type="text" class="col-sm-3 form-control d-none" style="max-width: 100%;">
                        </td>
                        <td>
                            <a onclick="edit_protype_product($(this))">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="d-none" data-id="<?php echo $product['id'] ?>" onclick="submit_edit_price($(this))">
                                <i class="fas fa-check"></i>
                            </a>
                        </td>
                    </tr>
                    <!--  <tr>
          	<th width="20%">Source</th>
            <td width="20%">
            	<span><?php echo $product['0'] ?></span>
            	<input value="<?php echo $product['source'] ?>" type="text" class="col-sm-3 form-control d-none" style="max-width: 100%;">
            </td>
            <td>
            	<a onclick="edit_protype_product($(this))">
            		<i class="fas fa-edit"></i>
            	</a>
            	<a class="d-none" data-id="<?php echo $product['id'] ?>" onclick="submit_edit_source($(this))">
                    <i class="fas fa-check"></i>
                </a>
            </td>
        </tr> -->
                    <tr>
                        <th width="20%">Description</th>
                        <td width="60%">
                            <span><?php echo $product['description'] ?></span>
                            <textarea type="text" class="col-sm-3 form-control d-none" style="max-width: 100%;"><?php echo $product['description'] ?></textarea>
                        </td>
                        <td>
                            <a onclick="edit_protype_sdescription($(this))">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="d-none" data-id="<?php echo $product['id'] ?>" onclick="submit_edit_sdescription($(this))">
                                <i class="fas fa-check"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-body">
            <input id="idproduct" class="d-none" type="text" value="<?php echo $product['id'] ?>">
            <h5 style="padding-left: 12px;">Images</h5>
            <div>
                <i class="fas fa-cloud-upload-alt" onclick="showUpload($(this))" style="font-size: 50px;padding-left: 12px;"></i>
            </div>
            <form class="form-group d-none" id="file-catcher">
                <input class="form-control" type="file" id="pro-image" name="pro-image" multiple />

                <div class="preview-images-zone form-control"> </div>

                <div id="file-list-display" class="d-none"> </div>

                <button class="btn btn-secondary edit_img" type="submit">
                    Submit
                </button>
            </form>
            <?php
            if ($product['image'] != null) {
                $img = explode(",", $product['image']);
                for ($i = 0; $i < count($img); $i++) { ?>
                    <div style="position: relative; width: 150px; float:left; margin-right: 15px;">
                        <i data-id="<?php echo $product['id'] ?>" data-text="<?php echo $img[$i] ?>" class="fas fa-times-circle" style="position: absolute;top:-15px;right: -15px;" onclick="deleteImg($(this))"></i>
                        <img width="100%" src="../../app/webroot/img/product/<?php echo $img[$i] ?>">
                    </div>
                <?php }
        } ?>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Store</th>
                        <th scope="col">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i=0; $i < count($stores); $i++){?>
                        <tr>
                                <th scope="row"><?php echo $i+1?></th>
                                <td><a href="<?php echo FIELD.'/stores/details/'.$stores[$i]['Store']['id']?>"><?php echo $stores[$i]['Store']['name'];?></a></td>
                                <td><?php echo $stores[$i]['0'];?></td>                            
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>