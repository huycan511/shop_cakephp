<div class="row">
    <h4 class="col-sm-2">Genre </h4>
    <input type="text" class="col-sm-3 form-control">
    <select class="col-sm-3 form-control">
        <option selected>Choose...</option>
        <?php for ($i=0; $i < count($categories); $i++) {?>
            <option value="<?php echo $categories[$i]['Categories']['id']?>"><?php echo $categories[$i]['Categories']['name']?></option>
        <?php } ?>
    </select>
    <div class="btn btn-secondary col-sm-2 add_genre">Add</div>
</div>
<div class="card shadow mb-4 mt-2">  
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width="10%" scope="col">STT</th>
                <th width="60%" scope="col">Genre</th>
                <th width="10%" scope="col">Edit</th>
                <th width="10%" scope="col">Delete</th>
            </tr>
        </thead>
        <tbody id="table_cate">
            <?php for ($i=0; $i < count($genres); $i++) {?>
                <tr>
                    <th scope="row"><?php echo $i+1?></th>
                    <td> <span class="content" ><?php echo $genres[$i]['Genre']['name']?></span> <input style="max-width: 100%;" type="text" class="col-sm-3 edit_question form-control d-none" value="<?php echo $genres[$i]['Genre']['name']?>"></td>
                    <td>
                        <a class="edit" onclick="edit_genre_btn($(this))"><i class="fas fa-edit"></i></a>
                        <a class="d-none" data-id="<?php echo $genres[$i]['Genre']['id']?>" onclick="submit_edit_genre($(this))"><i class="fas fa-check"></i></a>
                    </td>
                    <td><i class="fas fa-trash-alt" data-id="<?php echo $genres[$i]['Genre']['id']?>" onclick="delete_genre($(this))" ></i></td>
                </tr>
            <?php } ?>
        </tbody>
        </table>
    </div>
  </div>
</div>