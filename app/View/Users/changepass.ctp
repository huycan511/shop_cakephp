<div class="col-sm-9" id="content">
<h1 class="text-center">Change password</h1>
  <table class="table borderless">

  <tbody>
    <?php if($user['User']['password']){?> 
      <tr>
        <th scope="row">Current password</th>
        <td>
          <input type="password" class="form-control" id="current_pass">
        </td>
      </tr>
    <?php }?>
    <tr>
      <th scope="row">New password</th>
      <td>
        <input type="password" class="form-control" id="new_pass">
      </td>
    </tr>
    <tr>
      <th scope="row">Confirm password</th>
      <td><input type="password" class="form-control" id="confirm_pass"></td>
    </tr>
  </tbody>
</table>
<button class="btn btn-primary btn-block" data-user="<?php echo $user['User']['id']; ?>" id="change_pass" data-type="<?php if($user['User']['password']){echo 'old';}else{ echo 'new'; }?>">Submit</button>
</div>