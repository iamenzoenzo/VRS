<title>VRS Home</title>
<!-- start of carousel -->
<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="3"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="img-fluid" src="<?php echo base_url();?>assets/images/homepage_carousel/cbmwm3.jpg" alt="BMW M3" width="1100" height="400">
      <div class="carousel-caption">
        <h3>BMW M3</h3>
        <p>The BMW M3 is a high-performance version of the BMW 3 Series, developed by BMW's in-house motorsport division, BMW M GmbH. ... Since 2015 the M3 has been solely produced in the sedan body style, due to the coupé and convertible models being rebranded as the 4 Series range, making the high-performance variant the M4.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="img-fluid" src="<?php echo base_url();?>assets/images/homepage_carousel/cbmwz4.jpg" alt="BMW Z4" width="1100" height="400">
      <div class="carousel-caption">
        <h3>BMW Z4</h3>
        <p>The BMW Z models are a line of roadsters manufactured by German automaker BMW. The Z stands for zukunft (German for future),[1] and has been produced in four different series with six generations consisting of roadster, coupé, sports car, and concept variants. </p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="img-fluid" src="<?php echo base_url();?>assets/images/homepage_carousel/cgrandia.jpg" alt="Toyota Grandia" width="1100" height="400">
      <div class="carousel-caption">
        <h3>Toyota Hiace Grandia</h3>
        <p>EXPERIENCE A HIGHER LEVEL OF LUXURY</p>
        <p>Sleek, refined lines, and a polished exterior cut a formidable figure on the road.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="img-fluid" src="<?php echo base_url();?>assets/images/homepage_carousel/ctucson.jpg" alt="Hyundai Tucson" width="1100" height="400">
      <div class="carousel-caption">
        <h3>Hyundai Tucson</h3>
        <p>The Hyundai Tucson (Korean: 현대 투싼) (pronounced Tu-són) is a compact crossover SUV produced by the South Korean manufacturer Hyundai since 2004. In the brand's lineup, the Tucson fits below the Santa Fe and Veracruz. It is named after the city of Tucson, Arizona.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<!-- end of carousel -->
<div class="container">
  <br>
  <hr>
  <br>
</div>
<div class="card-deck">
  <div class="card">
  <div class="card-body">
    <h4 class="card-title">Address</h4>
    <p class="card-text"><?php echo $address['value'];?></p>
    <h4 class="card-title">Telephone</h4>
    <p class="card-text"><?php echo $phone['value'];?></p>
    <h4 class="card-title">Mobile</h4>
    <p class="card-text"><?php echo $mobile['value'];?></p>
    <h4 class="card-title">Email</h4>
    <a target="_top" class="card-link"><?php echo $email['value'];?></a>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <!--Google map-->
		<div id="map-container-google-1" class="z-depth-1-half map-container embed-responsive embed-responsive-16by9" style="height: 500px">
  		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.644837747284!2d125.09699398386061!3d7.932112005223026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32ff1bb97c3c12f5%3A0x39de9db706c79999!2sWheels%20Auto%20Market%20%26%20Car%20Rental!5e0!3m2!1sen!2ssg!4v1587032070308!5m2!1sen!2ssg" class="embed-responsive-item" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		</div>

		<!--Google Maps-->
  </div>
</div>
</div>
