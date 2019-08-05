<div id="content" class="col-sm-9">
    <div class="row">
      <div class="card">
      <div class="container-fliud">
        <div class="wrapper row">
          <div class="preview col-md-6">
            <div id="myCarousel" class="preview-pic tab-content carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="tab-pane active item" id="pic-0"><img src="<?php echo FIELD;?>/app/webroot/img/product/<?php echo $img[0]?>" /></div>
              <?php for ($i=1; $i < count($img); $i++) {?>
              <div class="tab-pane item" id="pic-<?php echo $i?>"><img src="<?php echo FIELD;?>/app/webroot/img/product/<?php echo $img[$i]?>" /></div>
              <?php }?>
              </div>
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="sr-only">Next</span>
              </a>
            </div>
            <ul class="preview-thumbnail nav nav-tabs">
              <li class="active"><a data-target="#pic-0" data-toggle="tab"><img src="<?php echo FIELD;?>/app/webroot/img/product/<?php echo $img[0]?>" /></a></li>
              <?php for ($i=1; $i < count($img); $i++) {?>
              <li><a data-target="#pic-<?php echo $i?>" data-toggle="tab"><img src="<?php echo FIELD;?>/app/webroot/img/product/<?php echo $img[$i]?>" /></a></li>
              <?php }?>
            </ul>
          </div>
          <div class="details col-md-6">
            <h3 class="product-title"><?php echo $product['Product']['name']; ?></h3>
            <div style="position: relative;"><span class="rating" data-id="<?php echo $average?>"></span><span style="position: absolute;top:0;right: 35%;"> | <?php echo count($comments)?> customer reviews</span></div>
            <p class="product-description"><?php echo $product['Product']['description']?></p>
            <h4 class="price">Price: <span></span><?php echo number_format($product['Product']['price'])?>d</span></h4>
            <div class="action">
              <button class="add-to-cart btn btn-default add_cart" onclick="<?php if($this->Session->read('id_user')){echo 'addcart($(this))';}?>" data-user="<?php echo $this->Session->read('id_user') ?>" data-product="<?php echo $product['Product']['id']?>" type="button">Add to cart</button>
              <button class="like btn btn-default like_product" data-product="<?php echo $product['Product']['id'] ?>" type="button"><span class="fa fa-heart"></span></button>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

      <div class="productinfo-tab">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab-description" data-toggle="tab">Description</a></li>
          <li><a href="#tab-review" data-toggle="tab">Reviews (<?php echo count($comments)?>)</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab-description">
            <div class="cpt_product_description ">
              <div>
                <p> <strong>More room to move.</strong></p>
                <p> With 80GB or 160GB of storage and up to 40 hours of battery life, the new lorem ippsum dolor dummy lets you enjoy up to 40,000 songs or up to 200 hours of video or any combination wherever you go.</p>
                <p> <strong>Cover Flow.</strong></p>
                <p> Browse through your music collection by flipping through album art. Select an album to turn it over and see the track list.</p>
                <p> <strong>Enhanced interface.</strong></p>
                <p> Experience a whole new way to browse and view your music and video.</p>
                <p> <strong>Sleeker design.</strong></p>
                <p> Beautiful, durable, and sleeker than ever, lorem ippsum dolor dummy now features an anodized aluminum and polished stainless steel enclosure with rounded edges.</p>
              </div>
            </div>
            </div>
          <div class="tab-pane" id="tab-review">
            <div id="rateYo" class="<?php if(!$hasBuy){ echo 'd-none';}?>" data-id="<?php echo $product['Product']['id']?>" data-rated="<?php  if(isset($myRate)){echo $myRate;}else{echo '0';}?>" style="padding: 0 0 !important; margin-bottom: 10px;"></div>
            <form class="form-horizontal">
              <?php if($this->Session->read('id_user')){?>
              <div id="review"></div>
              <h2>Write a review</h2>
              <div class="form-group required">
                <div class="col-sm-12">
                  <textarea name="text" rows="5" id="input_review" class="form-control"></textarea>
                </div>
              </div>
              <div class="buttons clearfix">
                <div class="pull-right">
                  <button type="button" data-id="<?php echo $product['Product']['id']?>" id="button-review" data-loading-text="Loading..." onclick="commentProduct($(this))" class="btn btn-primary">Continue</button>
                </div>
              </div>
              <?php }?>
              <h2>Reviews</h2>
              <div class="form-group">
                <div class="col-sm-12">
                  <?php for ($i=0; $i < count($comments); $i++) {?>
                  <p style="margin-bottom: -7px;"><?php echo $comments[$i]['Comment']['content']?></p>
                  <span><b><i><?php echo $comments[$i]['userr']['name']?></i></b>-<?php echo $comments[$i]['Comment']['date']?></span>
                  <hr>
                <?php }?>
              </div>
            </form>
          </div>
        </div>
      </div>
      <h3 class="productblock-title">Related Products</h3>
      <div class="box">
        <div id="related-slidertab" class="row owl-carousel product-slider">
          <?php for ($i=0; $i < count($related); $i++) {?>
          <div class="item">
            <div class="product-thumb transition">
              <div class="image product-imageblock"> <a href="#"> <img src="<?php echo FIELD;?>/app/webroot/img/product/<?php $img=explode(",", $related[$i]['Product']['image']); echo $img[0]?>" class="img-responsive" /> </a>
                <div class="button-group">
                  <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fas fa-heart" style="color:white;"></i></button>
                  <button type="button" class="addtocart-btn">Add to Cart</button>
                </div>
              </div>
              <div class="caption product-detail">
                <h4 class="product-name"><a href="product.html" title="women's clothing"><?php echo $related[$i]['Product']['name']?></a></h4>
                <p class="price product-price"> <span class="price-new"><?php echo number_format($related[$i]['Product']['price']).'đ'; ?></span></p>
              </div>
            </div>
          </div>
        <?php }?>
        </div>
      </div>
    </div>
</div>
<script type="text/javascript">
  $(function(){
  $("#rateYo").rateYo({
      starWidth: "40px",
      rating: $('#rateYo').attr('data-rated'),
      fullStar: true,
      onSet: function (rating, rateYoInstance) {
      $.ajax({
        url: location.protocol + "//" + document.domain +"/ratings/addRate",
        type: 'POST',
        data: {
          id_product: $(this).attr('data-id'),
          rate: rating
        }
      })
      .done(function() {
        console.log("success");
      })
      .fail(function() {
        console.log("error");
      });
      }
    });
  $('.rating').rateYo({
    starWidth: "20px",
    rating: $('.rating').attr('data-id'),
      readOnly: true
  });
  $(".js-range-slider").ionRangeSlider({
      skin: "sharp",
      type: "double",
        grid: true,
        min: 0,
        max: 500000,
        step: 50000,
        from: 2000,
        to: 250000,
        prefix: "đ"
    }); 
});
</script>