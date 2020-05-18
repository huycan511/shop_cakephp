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
            <div style="position: relative;"><span class="rating" data-id="<?php echo $product['Product']['rating']?>"></span></div>
            <p class="product-description"><?php echo $product['Product']['description']?></p>
            <h4 class="price">Price: <span></span><?php echo number_format($product['Product']['price'])?>d</span></h4>
            <div class="action">
							<button
							data-izimodal-open="<?php if(!$this->Session->read('id_user')){
              echo "#modal-custom";
          } ?>" class="add-to-cart btn btn-default add_cart" onclick="<?php if($this->Session->read('id_user')){echo 'addcart($(this))';}?>" data-user="<?php echo $this->Session->read('id_user') ?>" data-product="<?php echo $product['Product']['id']?>" type="button">Add to cart</button>
              <button class="like btn btn-default <?php if($this->Session->read('id_user')){echo 'like_product';}?>" data-product="<?php echo $product['Product']['id'] ?>" type="button"><span class="fa fa-heart"></span></button>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

      <div class="productinfo-tab">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab-description" data-toggle="tab">Description</a></li>
          <li><a href="#tab-review" data-toggle="tab">Reviews</a></li>
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
          <div class="tab-pane ui comments" id="tab-review">
            <div id="rateYo" class="<?php if(!$hasBuy){ echo 'd-none';}?>" data-id="<?php echo $product['Product']['id']?>" data-rated="<?php  if(isset($myRate)){echo $myRate;}else{echo '0';}?>" style="padding: 0 0 !important; margin-bottom: 10px;"></div>

            <div class="row">
						<div class="fb-comments" data-href="https://www.facebook.com/108927717488563/photos/a.110479024000099/110478994000102/?type=3&amp;theater" data-numposts="5" data-width="850"></div>
            </div>
        </div>
      </div>
      <h3 class="productblock-title">Related Products</h3>
      <div class="box">
        <div id="related-slidertab" class="row owl-carousel product-slider">
          <?php for ($i=0; $i < count($related); $i++) {?>
          <div class="item">
            <div class="product-thumb transition">
              <div class="image product-imageblock"> <a href="<?php echo FIELD.'/home/product/'.$related[$i]['Product']['id']?>"> <img src="<?php echo FIELD;?>/app/webroot/img/product/<?php $img=explode(",", $related[$i]['Product']['image']); echo $img[0]?>" class="img-responsive" /> </a>
                <div class="button-group">
                  <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fas fa-heart" style="color:white;"></i></button>
                  <button data-izimodal-open="<?php if(!$this->Session->read('id_user')){
              echo "#modal-custom";
          } ?>" type="button" class="addtocart-btn">Add to Cart</button>
                </div>
              </div>
              <div class="caption product-detail">
                <h4 class="product-name"><a href="<?php echo FIELD.'/home/product/'.$related[$i]['Product']['id']?>"><?php echo $related[$i]['Product']['name']?></a></h4>
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
    $sum_comment = $('#div_of_comment').attr('sum_comment');
    $option_number_show = $('#custom_number_comment').val();
    reloadShowComment($sum_comment, $option_number_show);
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
$("#custom_number_comment").change(function() {
    $sum_comment = $('#div_of_comment').attr('sum_comment');
    reloadShowComment($sum_comment, $(this).val());
});
function reloadShowComment($sum_comment, $option_number_show) {
    $(".comment").each(function() {
        $(this).show();
        if (parseInt($(this).attr('stt_comment')) > parseInt($option_number_show)) {
            $(this).hide();
        }
    });
    $('.see_all_comment').text('');
    if (parseInt($sum_comment) > parseInt($option_number_show)) {
        $('.see_all_comment').text('See All Comment').attr({ onclick : 'showAllCommet()'});
    }
};
function showAllCommet() {
    $("#custom_number_comment").val('all');
    $('.see_all_comment').text('');
    $(".comment").each(function() {
        $(this).show();
    });
}
function showTextArea(obj) {
    $id = obj.attr('data_id_parent');
    $('.div_textarea_reple_' + $id).show();
};

function hideTextArea(obj) {
    $id = obj.attr('data_id_parent');
    $('.div_textarea_reple_' + $id).hide();
};
function showDivRep($obj, $id_div) {
    $obj.parent().hide();
    $('.div_rep_' + $id_div).show();
}
</script>
