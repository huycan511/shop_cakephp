<div class="col-sm-9" id="content">
<h1 class="text-center">User Information</h1>
  <table class="table borderless">

  <tbody>
    <tr>
      <th scope="row">Username</th>
      <td>
        <h3><?php echo $user['User']['name']?></h3>
        <input type="text" class="form-control d-none" value="<?php echo $user['User']['name']?>">
        </td>
      <td><a class="pointer edit_user_name"><i class="fas fa-pencil-alt"></i></a><a class="pointer d-none" onclick="submit_edit_checkout_name($(this))"><i class="fas fa-check"></i></a></td>
    </tr>
    <tr>
      <th scope="row">Phone</th>
      <td>
        <h3><?php echo $user['User']['phone']?></h3>
        <input type="text" class="form-control d-none" value="<?php echo $user['User']['phone']?>">
      </td>
      <td><a class="pointer edit_user_phone"><i class="fas fa-pencil-alt"></i></a><a class="pointer d-none" onclick="submit_edit_checkout_phone($(this))"><i class="fas fa-check"></i></a></td>
    </tr>
    <tr>
      <th scope="row">Email</th>
      <td><?php echo $user['User']['email']?><input type="text" class="form-control d-none"></td>
      <td></td>
    </tr>
  </tbody>
</table>
</div>