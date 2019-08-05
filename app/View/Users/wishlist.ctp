<div class="col-sm-9" id="content_wishlist">
	<h1>My Wishlist</h1>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <td class="text-center">Image</td>
            <td class="text-left">Product Name</td>
            <td class="text-right">Price</td>
            <td class="text-right">Remove</td>
          </tr>
        </thead>
        <tbody>
        	<?php for ($i=0; $i < count($like); $i++) {?>
        		<tr>
	              <td class="text-center"><a href="product.html"><img style="height: 40px;" class="img-thumbnail" src="<?php $img=explode(",",$like[$i]['productt']['image'] );  echo "/app/webroot/img/product/".$img[0]?>"></a></td>
	              <td class="text-left"><a href="product.html"><?php echo $like[$i]['productt']['name']?></a></td>
	              <td class="text-right"><?php echo $like[$i]['productt']['price']?>đ</td>
	              <td class="text-right"><button data-id="<?php echo $like[$i]['productt']['id']?>" class="btn-danger remove_wishlist">X</button></td>
	            </tr>
        	<?php }?>
        </tbody>
       </table>
    </div>
</div>