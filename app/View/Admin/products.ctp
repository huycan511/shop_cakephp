<!-- Begin Page Content -->
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Products</h1>
<!-- DataTales Example -->
<a class="btn btn-primary btn-lg" href="#" data-izimodal-open="#modal" data-izimodal-transitionin="fadeInDown">New Product</a>
<div class="card shadow mb-4">  
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>STT</th>
            <th>Product</th>
            <th>Price</th>
            <th>Genre</th>
            <th>Status</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>STT</th>
            <th>Product</th>
            <th>Price</th>
            <th>Genre</th>
            <th>Status</th>
          </tr>
        </tfoot>
        <tbody>
          <?php for ($i=0; $i < count($products); $i++) {?>
          <tr>
            <td><?php echo $i?></td>
            <td><a href="<?php echo FIELD."/products/details/".$products[$i]['Product']['id']?>"><?php echo $products[$i]['Product']['name']?></a></td>
            <td><?php echo $products[$i]['Product']['price']?></td>
            <td><?php echo $products[$i]['genree']['name']?></td>
            <td>
              <label class="switch" data-status="<?php echo $products[$i]['Product']['id'];?>">
                <input type="checkbox" id="checkbox" <?php if($products[$i]['Product']['status']==1){echo 'checked';}?>/>
                <div class="slider round"></div>
              </label>
            </td>
          </tr>
          <?php }?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
<div id="modal" class="checkModal">
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
                        
                            <button type="submit" class="btn btn-primary btn-block">
                                SubMit
                            </button>
                        </form>
                </div>
        </div>