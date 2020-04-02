<style>
    .content_commet{
        padding: 15px;
        margin: 4px;
        background: mintcream;border-radius: 8px;
    }
    .content_commets{
        display: none;
    }
    .content_commets, .count_rep_comment{
        padding: 15px;
        background: mintcream;
        border-radius: 8px;
        margin-left: 7%;
        margin-top: 5px;
    }
    .count_rep_comment{
        padding: 0px;
        text-align: center;
        font-size: unset;
        font-weight: 600;
        color: black;
        padding: 3px;
        margin-right: 5px;
    }
    .count_rep_comment:hover, .actions_comment:hover, .see_all_comment:hover{
        color: blue;
    }
    .author{
        float: left;
        font-size: large;
        font-weight: 600;
        margin-left: 10px;
        padding-bottom: 5px;
        margin-right: 15px;
        color: black;
    }
    .text_comment{
        padding-left: 30px;
        color: black;
    }
    .actions_comment{
        text-align: center;
        float: left;
        font-weight: 600;
        cursor: pointer;
    }
    .see_all_comment{
        font-weight: 900;
        cursor: pointer;
        font-size: large;
        color: brown;
        margin: 5px;
        margin-left: 15px;
    }

    textarea {
        margin-top: 10px;
        margin-left: 50px;
        width: 92%;
        -moz-border-bottom-colors: none !important;;
        -moz-border-left-colors: none !important;;
        -moz-border-right-colors: none !important;;
        -moz-border-top-colors: none !important;;
        background: none repeat scroll 0 0 rgba(0, 0, 0, 0.07);
        border-color: #93b3ea #FFFFFF !important;;
        border-image: none;
        border-radius: 6px 6px 6px 6px;
        border-style: none solid solid none;
        border-width: medium 1px 1px medium;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.12) inset;
        color: #555555;
        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
        font-size: 1em;
        line-height: 1.4em;
        padding: 5px 8px;
        transition: background-color 0.2s ease 0s;
    }
    textarea:focus {
        background: none repeat scroll 0 0 #FFFFFF;
        outline-width: 0;
    }

</style>
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
          <div class="tab-pane ui comments" id="tab-review">
            <div id="rateYo" class="<?php if(!$hasBuy){ echo 'd-none';}?>" data-id="<?php echo $product['Product']['id']?>" data-rated="<?php  if(isset($myRate)){echo $myRate;}else{echo '0';}?>" style="padding: 0 0 !important; margin-bottom: 10px;"></div>
            <form class="form-horizontal">
              <?php if($this->Session->read('id_user')){?>
              <div id="review"></div>
              <h2>Write a review</h2>
              <div class="form-group required">
                <div class="col-sm-12">
                  <textarea name="text" rows="5" id="input_review" style="width: 95%;" class="form-control"></textarea>
                </div>
              </div>
              <div class="buttons clearfix">
                <div class="pull-right">
                  <button type="button" data-id="<?php echo $product['Product']['id']?>" id="button-review" data-loading-text="Loading..." onclick="commentProduct($(this), 'type_1')" class="btn btn-primary">Continue</button>
                </div>
              </div>
              <?php }?>
            </form>
            <div class="row" style="margin: 5px;">
                <div class="col-sm-7"><h3 class="ui dividing header">Comments</h3></div>

                <div class="col-sm-5">
                    <div style="float: right;">Option:
                        <select class="custom-select custom-select-lg mb-3" id="custom_number_comment" style="font-size: medium;">
                            <option selected value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row see_all_comment"></div>
            <div class="row">
                <div class="col-sm-12" id='div_of_comment' sum_comment="<?php echo count($comments); ?>">
                    <?php for ($i = 0; $i < count($comments); $i++) {?>
                        <div class="comment" stt_comment="<?php echo (count($comments)-$i); ?>">
                            <div class="content_commet">
                                <div class="row_conten_1 row">
                                    <div class="author" >
                                        Name : <?php echo $comments[$i]['userr']['name']; ?>
                                    </div>
                                    <div class="data_comment">
                                        <?php echo $comments[$i]['Comment']['date']; ?>
                                    </div>
                                </div>
                                <div class="row_conten_2 row">
                                    <div class="text_comment col-sm-11">
                                       <?php echo $comments[$i]['Comment']['content'] ?>
                                    </div>
                                    <?php if ($this->Session->read('id_user')) { ?>
                                        <div class="actions_comment col-sm-1" onclick="showTextArea($(this))" data_id_parent="<?php echo $comments[$i]['Comment']['id']; ?>">Reply</div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="multi_dev_of_rep multi_dev_num_<?php echo $comments[$i]['Comment']['id']; ?>">
                                <?php if (count($comments[$i]['Comment']['0']) >= 1) { ?>
                                    <div class="count_rep_comment"><p onclick="showDivRep($(this), <?php echo $comments[$i]['Comment']['id'];  ?>)" style="cursor: pointer;">Have <?php echo count($comments[$i]['Comment']['0']); ?> Reply!</p></div>
                                <?php foreach ($comments[$i]['Comment']['0'] as $comment_child) { ?>
                                    <div class="content_commets div_rep_<?php echo $comment_child['Comment']['id_parent']; ?>">
                                        <div class="row_conten_1 row">
                                            <div class="author">
                                                Name : <?php echo $comment_child['userr']['name']; ?>
                                            </div>
                                            <div class="data_comment">
                                                <?php echo $comment_child['Comment']['date']; ?>
                                            </div>
                                        </div>
                                        <div class="row_conten_2 row">
                                            <div class="text_comment col-sm-11">
                                               <?php echo $comment_child['Comment']['content']; ?>
                                            </div>
                                            <?php if ($this->Session->read('id_user')) { ?>
                                                <div class="actions_comment col-sm-1" onclick="showTextArea($(this))" data_id_parent="<?php echo $comments[$i]['Comment']['id']; ?>">Reply
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php } } ?>
                            </div>
                            <div class="row div_textarea_reple_<?php echo $comments[$i]['Comment']['id']; ?>" style="display: none;">
                                <div class="row">
                                    <textarea name="rep_comment" class="rep_comment" id="rep_comment_<?php echo $comments[$i]['Comment']['id']; ?>" placeholder="Write something here..." rows="4"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6"><div style="float: right;">
                                        <button type="button" data-id="<?php echo $product['Product']['id']?>" onclick="commentProduct($(this), '<?php echo $comments[$i]['Comment']['id']; ?>')"  class="btn btn-primary btn-sm">Reply</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="button" onclick="hideTextArea($(this))" data_id_parent="<?php echo $comments[$i]['Comment']['id']; ?>" class="btn btn-secondary btn-sm cancel_rep">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </div>
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
