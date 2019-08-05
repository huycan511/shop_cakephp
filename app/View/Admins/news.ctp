<h2 style="text-decoration: underline;">Add News</h2>
  <div class="form-group row">
    <label for="staticTitle" class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="staticTitle">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticDate" class="col-sm-2 col-form-label" >Date</label>
    <div class="col-sm-10">
    	<input class="form-control date_invoice" type="date" id="staticDate" />
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label" >Image</label>
    <div class="col-sm-10">
      <input class="form-control" type="file" id="imageNew" />
    </div>
  </div>
  <div class="form-group row">
  <label class="col-sm-2 col-form-label" >Content</label>
</div>
    <textarea name='ckedit' id="test_ck" style="width: 100%;"></textarea>
    <button id="btn_a" class="btn btn-primary form-control" style="cursor: pointer;" onclick="addNew()">Submit</button>
<hr>
<h2 style="text-decoration: underline;">List News</h2>
<table class="table table-sm table-dark">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Title</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i=0; $i < count($news) ; $i++) {?>
      <tr>
        <th scope="row"><?php echo $i+1 ?></th>
        <td><?php echo $news[$i]['News']['title']?></td>
        <td>
          <a style="cursor: pointer;" href="../news/editNew/<?php echo $news[$i]['News']['id']?>"><i class="fas fa-pencil-alt"></i></a>
        </td>
      </tr>
    <?php }?>
  </tbody>
</table>
<script>
 $(function() { 
 	CKEDITOR.replace('ckedit');
 $('#btn_a').click(function(event) {
 	console.log(CKEDITOR.instances['test_ck'].getData()); });
 });
</script>