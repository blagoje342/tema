<div class="container">
<!--  Carousel - consult the Twitter Bootstrap docs at
      http://twitter.github.com/bootstrap/javascript.html#carousel -->
<div id="this-carousel-id" class="carousel slide effect8"><!-- class of slide for animation -->
  <div class="carousel-inner">
    <div class="item">
      <img src="<?php echo get_template_directory_uri()?>/assets/img/carousel/slika1.jpg" >
 <!--      <div class="carousel-caption">
        <p>Caption text here</p> 
      </div> -->
   </div> 
    <div class="item active">
      <img src="<?php echo get_template_directory_uri()?>/assets/img/carousel/slika2.jpg" >
    </div>   
    <div class="item">
      <img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/carousel/slika3.jpg" >
    </div>  
    <div class="item">
      <img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/carousel/slika4.jpg" >
    </div>  
    <div class="item">
      <img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/carousel/slika5.jpg" >
    </div>   
    <div class="item">
      <img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/carousel/slika6.jpg" >
    </div>   
     <div class="item">
      <img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/carousel/slika7.jpg" >
    </div>   
    <div class="item">
      <img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/carousel/slika8.jpg" >
    </div>
  <!--  Next and Previous controls below
        href values must reference the id for this carousel 
    <a class="carousel-control left" href="#this-carousel-id" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#this-carousel-id" data-slide="next">&rsaquo;</a> -->


  </div> <!--/.carousel--> 
</div>
</div>


<script>
$('#this-carousel-id').carousel({
	interval: 8000
});
</script>

