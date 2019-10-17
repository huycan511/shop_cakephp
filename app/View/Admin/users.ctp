<h1 class="h3 mb-2 text-gray-800">Users</h1>
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Created</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
		  	<th>ID</th>
            <th>Username</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Created</th>
          </tr>
        </tfoot>
        <tbody>
          <?php for ($i=0; $i < count($users); $i++) {?>
          <tr>
            <td><?php echo $i?></td>
            <td><a href="<?php FIELD."/products/details/".$users[$i]['User']['id']?>"><?php echo $users[$i]['User']['name']?></a></td>
            <td><?php echo $users[$i]['User']['phone']?></td>
            <td><?php echo $users[$i]['User']['email']?></td>
            <td><?php echo $users[$i]['User']['create_at']?></td>
          </tr>
          <?php }?>
        </tbody>
      </table>
    </div>
  </div>
</div>
