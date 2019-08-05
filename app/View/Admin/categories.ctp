<div class="row">
    <h4 class="col-sm-2">Category </h4>
    <input type="text" class="col-sm-3 form-control">
    <div class="btn btn-primary col-sm-2 add_cate" style="margin-left:16px;">Add</div>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4 mt-2">  
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
                <tr>
                    <th width="10%" scope="col">STT</th>
                    <th width="60%" scope="col">Category</th>
                    <th width="10%" scope="col">Edit</th>
                    <th width="10%" scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i=0; $i < count($categories); $i++) {?>
                    <tr>
                        <th scope="row"><?php echo $i+1?></th>
                        <td> <span class="content" ><?php echo $categories[$i]['Categories']['name']?></span> <input style="max-width: 100%;" type="text" class="col-sm-3 edit_question form-control d-none" value="<?php echo $categories[$i]['Categories']['name']?>"></td>
                        <td><a class="edit" onclick="edit_cate_btn($(this))"><i class="fas fa-edit"></i></a><a class="d-none" data-id="<?php echo $categories[$i]['Categories']['id']?>" onclick="submit_edit_cate($(this))"><i class="fas fa-check"></i></a></td>
                        <td><i class="fas fa-trash-alt" data-id="<?php echo $categories[$i]['Categories']['id']?>" onclick="delete_cate($(this))" ></i></td>
                    </tr>
                <?php } ?>
            </tbody>
      </table>
    </div>
  </div>
</div>
<!-- /.container-fluid -->