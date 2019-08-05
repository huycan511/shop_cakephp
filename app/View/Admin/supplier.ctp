<h1 class="h3 mb-2 text-gray-800">Suppliers</h1>
<!-- DataTales Example -->
<a class="btn btn-primary btn-lg mb-2" href="#" data-izimodal-open="#modal" data-izimodal-transitionin="fadeInDown">New Supplier</a>
<div class="card shadow mb-4">  
	<div class="card-body">
    	<div class="table-responsive">
        	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
  	</div>
</div>
<div id="modal" class="checkModal">
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
        <button class="btn btn-primary btn-block" onclick="add_supplier()">Submit</button>
    </div>
</div>