<a class="btn btn-primary btn-lg" href="#" data-izimodal-open="#modal" data-izimodal-transitionin="fadeInDown">New Store</a>
<div class="card shadow mb-4 mt-2">  
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width="15%" scope="col">STT</th>
                <th width="20%" scope="col">Name store</th>
                <th width="20%" scope="col">Address</th>
                <th width="10%" scope="col">Phone</th>
                <th width="15%">Email</th>
                <th width="5%" scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i=0; $i < count($stores); $i++) {?>
                <tr>
                    <th scope="row"><?php echo $i+1?></th>
                    <td><a href="<?php echo FIELD."/stores/details/".$stores[$i]['Store']['id']?>"><?php echo $stores[$i]['Store']['name']?></a></td>
                    <td><?php echo $stores[$i]['Store']['address'] ?></td>
                    <td><?php echo $stores[$i]['Store']['phone'] ?></td>
                    <td><?php echo $stores[$i]['Store']['email']?></td>
                    <td><i class="fas fa-trash-alt" onclick="delete_store($(this))" data-id="" ></i></td>
                </tr>
            <?php }?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<div id="modal" class="checkModal">
    <div class="modal-header">
        <h4 class="modal-title">New Store</h4>                     
    </div>
    <div class="modal-body">
            <label class="my-1 ">Name store</label>
            <input type="text" class="form-control name_store">
            <label class="my-1">Address</label>
            <input type="text" class="form-control addr_store">
            <label >Phone</label>
            <input type="text" class="form-control phone_store">
            <label >Email</label>
            <input type="email" class="form-control mail_store">
            <label >Password</label>
            <input type="password" class="form-control pass_store">
            <label >URL Image</label>
            <input type="text" class="form-control image_store">
            <label >Latitude</label>
            <input type="text" class="form-control lat_store">
            <label >Longitude</label>
            <input type="text" class="form-control lng_store">
            <button class="btn btn-primary btn-block" onclick="add_store()">Submit</button>
    </div>
</div>  