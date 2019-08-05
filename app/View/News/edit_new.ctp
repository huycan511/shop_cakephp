<h2 style="text-decoration: underline;">Edit News</h2>
<div class="form-group row">
<div class="card shadow mb-4">  
  <div class="card-body">
    <div class="table-responsive">
<table class="table" style="border: none;">
    <tbody>
        <tr>
          <th>Title</th>
            <td> 
              <span><?php echo $new['News']['title']?></span>
              <input type="text" class="form-control d-none" value="<?php echo $new['News']['title']?>">  
            </td>
            <td>
              <a style="cursor: pointer;" class="edit_new" ><i class="fas fa-pencil-alt"></i></a>
              <a style="cursor: pointer;" class="submit_edit_title_new d-none" data-id="<?php echo $new['News']['id']?>" ><i class="fas fa-check"></i></a>
            </td>
        </tr>
        <tr>
          <th>Short Content</th>
            <td> 
              <span><?php echo $new['News']['short_content']?></span>
              <input type="text" class="form-control d-none" value="<?php echo $new['News']['short_content']?>">  
            </td>
            <td>
              <a style="cursor: pointer;" class="edit_new" ><i class="fas fa-pencil-alt"></i></a>
              <a style="cursor: pointer;" class="submit_edit_short_content_new d-none" data-id="<?php echo $new['News']['id']?>" ><i class="fas fa-check"></i></a>
            </td>
        </tr>
        <tr>
          <th>Date</th>
            <td>
              <span><?php echo $new['News']['date']?></span>
              <input type="date" class="form-control d-none" value="<?php echo $new['News']['date']?>">
            </td>
            <td>
              <a style="cursor: pointer;" class="edit_new"><i class="fas fa-pencil-alt"></i></a>
              <a style="cursor: pointer;" class="submit_edit_date_new d-none" data-id="<?php echo $new['News']['id']?>"><i class="fas fa-check"></i></a>
            </td>
        </tr>
        <tr>
          <th>Image</th>
            <td>
              <img src="<?php echo FIELD;?>/app/webroot/img/news/<?php echo $new['News']['img']?>" width="200px;" >
              <input class="form-control d-none" type="file" id="image_edit_new" />
            </td>
            <td>
              <a style="cursor: pointer;" class="edit_img_new"><i class="fas fa-pencil-alt"></i></a>
              <a style="cursor: pointer;" class="submit_edit_img_new d-none" data-id="<?php echo $new['News']['id']?>"><i class="fas fa-check"></i></a>
            </td>
        </tr>
    </tbody>
</table>
</div></div></div>
</div>
    <textarea name='name_txt_edit_content' id="id_txt_edit_content" style="width: 100%;"></textarea>
    <button id="submit_edit_content_new" data-id="<?php echo $new['News']['id']?>" class="btn btn-outline-primary form-control" style="cursor: pointer;">Submit</button>
    <div id="div_content" class="d-none"><?php echo $new['News']['content'] ?></div>
<script>
 $(function() { 
 	CKEDITOR.replace('name_txt_edit_content');
  CKEDITOR.instances['id_txt_edit_content'].setData($('#div_content').html());
 });
</script>