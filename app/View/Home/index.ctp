<div class="mainbanner">
	<div id="main-banner" class="owl-carousel home-slider">
		<div class="item"> <a href="#"><img src="img/banners/banner3.jpg" alt="main-banner1" class="img-responsive" /></a> </div>
		<div class="item"> <a href="#"><img src="img/banners/banner2.jpg" alt="main-banner2" class="img-responsive" /></a> </div>
		<div class="item"> <a href="#"><img src="img/banners/banner1.jpg" alt="main-banner3" class="img-responsive" /></a> </div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div id="content" class="col-sm-12">
			<div class="customtab">
				<div id="tabs" class="customtab-wrapper">
					<ul class='customtab-inner'>
						<li class='tab'><a href="#tab-latest">All Productt</a></li>
						<?php if ($this->Session->read('id_user')) {
							echo '<li class="tab"><a href="#tab-special">Favorite Product</a></li>';
						} ?>
					</ul>
				</div>
				<div id="tab-latest" class="tab-content">
					<div class="box">
						<div id="latest-slidertab" class="row owl-carousel product-slider">
							<?php for ($i = 0, $max = count($products); $i < $max; $i++) {
								$img = explode(",", $products[$i]['Product']['image']); ?>
								<div class="item">
									<div class="product-thumb transition">
										<div class="image product-imageblock"> <a href="home/product/<?php echo $products[$i]['Product']['id'] ?>"><img src="app/webroot/img/product/<?php echo $img[0] ?>" class="img-responsive" /> </a>
											<div class="button-group">
												<button type="button" class="wishlist <?php if ($this->Session->read('id_user')) {
																										echo 'like_product';
																									} ?>" data-product="<?php echo $products[$i]['Product']['id'] ?>" data-toggle="tooltip" title="Add to Wish List"><i class="fas fa-heart" style="color: white;"></i></button>
												<button type="button" data-izimodal-open="<?php if (!$this->Session->read('id_user')) {
																											echo "#modal-custom";
																										} ?>" class="addtocart-btn" onclick="<?php if ($this->Session->read('id_user')) {
																			echo 'addcart($(this))';
																		} ?>" data-user="<?php echo $this->Session->read('id_user') ?>" data-product="<?php echo $products[$i]['Product']['id'] ?>">Add To Cart</button>
												<button type="button" class="open_buy_modal addtocart-btn" data-price="<?php echo $products[$i]['Product']['price'] ?>">Buy now</button>
											</div>
										</div>
										<div class="caption product-detail">
											<h4 class="product-name"><a href="home/product/<?php echo $products[$i]['Product']['id'] ?>" title="lorem ippsum dolor dummy"><?php echo $products[$i]['Product']['name']; ?></a></h4>
											<span style="float:left;" class="rating" data-id="<?php echo $products[$i]['Product']['rating'] ?>"></span>
											<p style="float:right;" class="price product-price"><?php echo number_format($products[$i]['Product']['price']) . 'đ' ?></p>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<!-- tab-latest-->
				<div id="tab-special" class="tab-content">
					<div class="box">
						<div id="special-slidertab" class="row owl-carousel product-slider">
							<?php if (isset($like)) {
								for ($i = 0, $max = count($like); $i < $max; $i++) { ?>
									<div class="item">
										<div class="product-thumb transition">
											<div class="image product-imageblock"> <a href="home/product/<?php echo $like[$i]['productt']['id'] ?>"><img src="app/webroot/img/product/<?php $img = explode(",", $like[$i]['productt']['image']);
																																																									echo $img[0] ?>" class="img-responsive" /> </a>
												<div class="button-group">
													<button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fas fa-heart" style="color: white;"></i></button>
													<button type="button" class="addtocart-btn" data-izimodal-open="<?php if (!$this->Session->read('id_user')) {
																																				echo "#modal-custom";
																																			} ?>" onclick="<?php if ($this->Session->read('id_user')) {
										echo 'addcart($(this))';
									} ?>" data-user="<?php echo $this->Session->read('id_user') ?>" data-product="<?php echo $like[$i]['productt']['id'] ?>">Add To Cart</button>
													<button type="button" class="addtocart-btn open_buy_modal" data-price="<?php echo $like[$i]['productt']['price'] ?>">Buy now</button>
												</div>
											</div>
											<div class="caption product-detail">
												<h4 class="product-name"><a href="home/product/<?php echo $like[$i]['productt']['id'] ?>" title="lorem ippsum dolor dummy"><?php echo $like[$i]['productt']['name']; ?></a></h4>
												<span style="float:left;" class="rating" data-id="2"></span>
												<p style="float: right;" class="price product-price"><?php echo number_format($like[$i]['productt']['price']) . 'đ' ?></p>
											</div>
										</div>
									</div>
							<?php }
							} ?>
						</div>
					</div>
				</div>

				<h3 class="productblock-title"><?php echo $categories[1]['Categories']['name'] ?></h3>
				<div class="box">
					<div id="Weekly-slider" class="row owl-carousel product-slider">
						<?php for ($i = 0, $max = count($categories[1]['genree']); $i < $max; $i++) {
							for ($j = 0, $max1 = count($categories[1]['genree'][$i]['productt']); $j < $max1; $j++) {
						?>
								<div class="item product-slider-item">
									<div class="product-thumb transition">
										<div class="image product-imageblock"> <a href="home/product/<?php echo $categories[1]['genree'][$i]['productt'][$j]['id'] ?>"> <img src="app/webroot/img/product/<?php $img = explode(",", $categories[1]['genree'][$i]['productt'][$j]['image']);
																																																																echo $img[0] ?>" class="img-responsive" /> </a>
											<div class="button-group">
												<button type="button" class="wishlist <?php if ($this->Session->read('id_user')) {
																										echo 'like_product';
																									} ?>" data-product="<?php echo $categories[1]['genree'][$i]['productt'][$j]['id'] ?>" data-toggle="tooltip" title="Add to Wish List"><i class="fas fa-heart" style="color: white;"></i></button>
												<button type="button" data-izimodal-open="<?php if (!$this->Session->read('id_user')) {
																											echo "#modal-custom";
																										} ?>" class="addtocart-btn" onclick="<?php if ($this->Session->read('id_user')) {
																	echo 'addcart($(this))';
																} ?>" data-user="<?php echo $this->Session->read('id_user') ?>" data-product="<?php echo $categories[1]['genree'][$i]['productt'][$j]['id'] ?>">Add To Cart</button>
												<button type="button" class="addtocart-btn open_buy_modal" data-price="<?php echo $categories[1]['genree'][$i]['productt'][$j]['price'] ?>">Buy now</button>
											</div>
										</div>
										<div class="caption product-detail">
											<h4 class="product-name"><a href="home/product/<?php echo $categories[1]['genree'][$i]['productt'][$j]['id'] ?>"><?php echo $categories[1]['genree'][$i]['productt'][$j]['name'] ?></a></h4>
											<span style="float:left;" class="rating" data-id="<?php echo $categories[1]['genree'][$i]['productt'][$j]['rating'] ?>"></span>
											<p style="float: right;" class="price product-price"> <span class="price-new"><?php echo number_format($categories[1]['genree'][$i]['productt'][$j]['price']) . 'đ' ?>
													<!-- </span> <span class="price-old">$272.00</span> <span class="price-tax">Ex Tax: $210.00</span> </p> -->
										</div>
									</div>
								</div>
						<?php }
						} ?>
					</div>
				</div>



			</div>

			<h3 class="productblock-title"><?php echo $categories[0]['Categories']['name'] ?></h3>
			<div class="box">
				<div id="feature-slider" class="row owl-carousel product-slider">
					<?php for ($i = 0, $max = count($categories[0]['genree']); $i < $max; $i++) {
						for ($j = 0, $max1 = count($categories[0]['genree'][$i]['productt']); $j < $max1; $j++) {
					?>
							<div class="item product-slider-item">
								<div class="product-thumb transition">
									<div class="image product-imageblock">
										<a href="home/product/<?php echo $categories[0]['genree'][$i]['productt'][$j]['id'] ?>">
											<img src="app/webroot/img/product/<?php $img = explode(",", $categories[0]['genree'][$i]['productt'][$j]['image']);
												echo $img[0] ?>" class="img-responsive" /> </a>
										<div class="button-group">
											<button type="button" class="wishlist <?php if ($this->Session->read('id_user')) {
																									echo 'like_product';
																								} ?>" data-product="<?php echo $categories[0]['genree'][$i]['productt'][$j]['id'] ?>" data-toggle="tooltip" title="Add to Wish List"><i class="fas fa-heart" style="color: white;"></i></button>
											<button type="button" data-izimodal-open="<?php if (!$this->Session->read('id_user')) {
																										echo "#modal-custom";
																									} ?>" class="addtocart-btn" onclick="<?php if ($this->Session->read('id_user')) {
																	echo 'addcart($(this))';
																} ?>" data-user="<?php echo $this->Session->read('id_user') ?>" data-product="<?php echo $categories[0]['genree'][$i]['productt'][$j]['id'] ?>">Add To Cart</button>
											<button type="button" class="open_buy_modal addtocart-btn" data-price="<?php echo $categories[0]['genree'][$i]['productt'][$j]['price']  ?>">Buy now</button>
										</div>
									</div>
									<div class="caption product-detail">
										<h4 class="product-name"><a href="home/product/<?php echo $categories[0]['genree'][$i]['productt'][$j]['id'] ?>"><?php echo $categories[0]['genree'][$i]['productt'][$j]['name'] ?></a></h4>
										<span style="float:left;" class="rating" data-id="<?php echo $categories[0]['genree'][$i]['productt'][$j]['rating'] ?>"></span>
										<p style="float: right;" class="price product-price"> <span class="price-new"><?php echo number_format($categories[0]['genree'][$i]['productt'][$j]['price']) . 'đ' ?>
									</div>

								</div>
							</div>
					<?php }
					} ?>

				</div>
			</div>
			<h3 class="productblock-title">Tìm Kiếm</h3>
			<div class="box">
				<label style="margin-right: 10px; margin-left: 10px;">Tên sản phẩm</label><input type="text">
				<select style="height: 28px;">
					<option selected value="0">Chọn mức giá</option>
					<option value="1">Dưới 20 nghìn</option>
					<option value="2">20 nghìn - 50 nghìn</option>
					<option value="3">50 nghìn - 100 nghìn</option>
					<option value="4">Trên 100 nghìn</option>
				</select>
				<button class="btn-primary" style="height: 28px;" id="search_products">Tìm kiếm</button>
			</div>
			<div class="blog">
				<div class="blog-heading">
					<h3>Latest Blogs</h3>
				</div>
				<div class="blog-inner box">
					<ul class="list-unstyled blog-wrapper" id="latest-blog">
						<?php for ($i = 0; $i < count($news); $i++) { ?>
							<li class="item blog-slider-item" style="width: 400px; float: left;">
								<div class="panel-default">
									<div class="blog-image"> <a href="#" class="blog-imagelink"><img src="app/webroot/img/news/<?php echo $news[$i]['News']['img'] ?>" style="width: 100%; height: 280px; min-height: 280px;"></a> <span class="blog-hover"></span> <span class="blog-date"><?php echo $news[$i]['News']['date'] ?></span> <span class="blog-readmore-outer"><a href="news/detail/<?php echo $news[$i]['News']['id'] ?>" class="blog-readmore">Read More</a></span> </div>
									<div class="blog-content"> <a href="news/detail/<?php echo $news[$i]['News']['id'] ?>" class="blog-name">
											<h2><?php echo $news[$i]['News']['title'] ?></h2>
										</a>
										<div class="blog-desc"><?php echo $news[$i]['News']['short_content'] ?></div>
										<a href="/news/detail/<?php echo $news[$i]['News']['id'] ?>" class="blog-readmore">Read More</a> <span class="blog-date">06/07/2015</span>
									</div>
								</div>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div id="brand_carouse" class="owl-carousel brand-logo">
				<div class="item text-center"><img src="<?php echo FIELD; ?>/app/webroot/img/brand/brand1.png" class="img-responsive" /> </div>
				<div class="item text-center"><img src="<?php echo FIELD; ?>/app/webroot/img/brand/brand2.png" class="img-responsive" /></div>
				<div class="item text-center"><img src="<?php echo FIELD; ?>/app/webroot/img/brand/brand3.png" class="img-responsive" /> </div>
				<div class="item text-center"> <img src="<?php echo FIELD; ?>/app/webroot/img/brand/brand4.png" class="img-responsive" /></div>
				<div class="item text-center">><img src="<?php echo FIELD; ?>/app/webroot/img/brand/brand5.png" class="img-responsive" /> </div>
				<div class="item text-center"><img src="<?php echo FIELD; ?>/app/webroot/img/brand/brand6.png" class="img-responsive" /> </div>
				<div class="item text-center"> <img src="<?php echo FIELD; ?>/app/webroot/img/brand/brand7.png" class="img-responsive" /> </div>
				<div class="item text-center"> <img src="<?php echo FIELD; ?>/app/webroot/img/brand/brand8.png" class="img-responsive" /></div>
				<div class="item text-center"><img src="<?php echo FIELD; ?>/app/webroot/img/brand/brand9.png" class="img-responsive" /></div>
				<div class="item text-center"><img src="<?php echo FIELD; ?>/app/webroot/img/brand/brand5.png" class="img-responsive" /></div>
			</div>
		</div>
	</div>
</div>
