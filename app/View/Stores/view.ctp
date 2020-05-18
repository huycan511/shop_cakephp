<div class="mainbanner">
	<iframe height="550px" width="100%" allowfullscreen="true"
src="<?php echo $store['image']?>"> </iframe>

</div>
<div class="container">
      <div class="row">
        <div class="col-sm-12">
        	<h1 class="text-center"><?php echo $store['name']?></h1>
        	<h2 class="text-center"><i class="far fa-clock"></i> Opening: 8.00am - Closing: 10.00pm</h2>
        	<h2 class="text-center"><i class="fas fa-phone"></i><?php echo ' Phone: '.$store['phone']?></h2>
        	<h2 class="text-center"><i class="fas fa-envelope"></i> Email: <?php echo $store['email']?></h2>
        	<h2 class="text-center"><i class="fas fa-map-marker-alt"></i> Address: <?php echo $store['address']?></h2>
        </div>
      </div>
</div>
<h2 class="text-center" style="padding-top: 10px;"><i class="fas fa-map-pin" style="color: red;"></i> GOOGLE MAP</h2>
<div class="container">
	<div class="row">
        <div class="col-sm-12 text-center" id="map" data-lat="<?php echo $store['lat']?>" data-lng="<?php echo $store['lng']?>" style="height: 600px;">
</div>
</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="accordion">
				<h2 class="text-center" style="padding-top: 10px;"><i class="fas fa-images" style="color: red;"></i> GALLERY</h2>
  <ul>
    <li tabindex="1">
      <div>
        <a href="#">
          <h2>Thịt Sạch</h2>
          <p>Chất lượng luôn luôn được đảm bảo, được kiểm chứng an toàn</p>
        </a>
      </div>
    </li>
    <li tabindex="2">
      <div>
        <a href="#">
          <h2>Hoa Quả Sạch</h2>
          <p>Chất lượng luôn luôn được đảm bảo, được kiểm chứng an toàn</p>
        </a>
      </div>
    </li>
    <li tabindex="3">
      <div>
        <a href="#">
          <h2>Thủy-Hải Sản Tươi Sống</h2>
          <p>Chất lượng luôn luôn được đảm bảo, được kiểm chứng an toàn</p>
        </a>
      </div>
    </li>
    <li tabindex="4">
      <div>
        <a href="#">
          <h2>Ngũ Cốc Sạch</h2>
          <p>Chất lượng luôn luôn được đảm bảo, được kiểm chứng an toàn</p>
        </a>
      </div>
    </li>
    <li tabindex="5">
      <div>
        <a href="#">
          <h2>Rau-Củ Sạch</h2>
          <p>Chất lượng luôn luôn được đảm bảo, được kiểm chứng an toàn</p>
        </a>
      </div>
    </li>
    <li tabindex="6">
      <div>
        <a href="#">
          <h2>Sữa Tiệt Trùng</h2>
          <p>Chất lượng luôn luôn được đảm bảo, được kiểm chứng an toàn</p>
        </a>
      </div>
    </li>
  </ul>
</div>
		</div>
	</div>
</div>
<div class="container" style="padding-right: 30px;padding-left: 30px;">
	<div class="row">
		<h2 class="text-center" style="padding-top: 10px;"><i class="fab fa-youtube" style="color: red;"></i> VIDEO</h2>
		<div class="col-sm-6">
		<iframe width="100%" height="315" src="https://www.youtube.com/embed/D-hX-gj0pqI?start=68" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
		<div class="col-sm-6">
			<iframe width="100%" height="315" src="https://www.youtube.com/embed/HD7T8xyxc6A" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
	</div>
</div>
