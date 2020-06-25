
<?php ; ?>
<div id="content" class="col-sm-12">
	<?php for($i=0; $i < count($products); $i++){?>
	<div class='col-xs-6 col-md-3 khoisp' style='height: 300px;margin-bottom: 10px;cursor: pointer;overflow: hidden;'>
		<a href="/home/product/<?php echo $products[$i]['Product']['id'] ?>">
			<div class="1sp" style='position: relative;width: 100%;height: 85%;' onmouseover="hoversp(this)" onmouseout="outhoversp(this)">
				<img src="/app/webroot/img/product/<?php $img = explode(",", $products[$i]['Product']['image']);
					echo $img[0] ?> " style='width:100%;height:100%;max-width: 100%;position: absolute;top:0;right: 0;'>
				<div style='width: 100%;height: 100%;position: absolute;top:0;right: 0;max-width: 100%;'></div>
				<div class="btn_sp_group" style='position: absolute;bottom:0px;right: 0;width: 100%;height: 18%;'>
					<button class='btn-outline-danger like_sp' style='width: 33.3%;height: 100%;float: left;background-color: #040404b5;opacity: 0;'>
						<i class='fas fa-heart' style='font-size: 15px;color: white;'></i>
					</button>
					<button class='btn-outline-danger add_sp' style='width: 33.3%;height: 100%;float: left;background-color: #040404b5;opacity: 0;'>
						<i class='fas fa-cart-plus' style='font-size: 15px;color: white;'></i>
					</button>
					<button class='btn-outline-danger buy_now'
						style='width: 33.3%;height: 100%;background-color: #040404b5;opacity: 0;'
						data-price='<?php echo $products[$i]['Product']['price'] ?>'
						data-id='<?php echo $products[$i]['Product']['id'] ?>'>
						<i class='fa fa-check' style='font-size: 15px;color: white;'></i>
					</button>
				</div>
			</div>
		</a>
		<div class='tt' style='width: 100%;height: 15%;'>
			<h4 style='display: block; width: 100%;height: 50%;margin: 0;padding-top: 2px;'>
				<?php echo $products[$i]['Product']['name']?>
			</h4>
			<h4 class='text-right' style='display: block; width: 50%;height: 50%;margin: 0;padding: 0;float:right;'>
				<?php echo $products[$i]['Product']['price'].'đ' ?>
			</h4>
			<div style="width:50%; height: 50%; margin: 0; padding:0;">
				<span class='rating' data-id='<?php echo $products[$i]['Product']['rating']?>'
					id='<?php echo $products[$i]['Product']['id']?>'></span>
			</div>
		</div>
	</div>
<?php } ?>
</div>
<div class='col-sm-12 text-right'>
	<nav aria-label='Page navigation example'>
		<ul class='pagination'>
			<?php for($i=0; $i < $number; $i++){?>
				<li class='page-item'>
					<a href="<?php echo substr($_SERVER['REQUEST_URI'],0,-1).$i ?>" class='page-link'><?php echo $i + 1;?></a>
				</li>
			<?php }?>
		</ul>
	</nav>
</div>
<script type="text/javascript">
	$('.rating').each(function(){
		$(this).jRate({
			rating: $(this).attr('data-id'),
			readOnly: true
		});
	})
</script>
