<div id="myCarousel" class="carousel slide" data-ride="carousel" style="height:100%;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" style="width:100%; height:100%">

      <div class="item active">
        <img src="<?php echo base_url(); ?>/assets/images/db/nhahang1.jpg" alt="New York" style="width:100%">
      </div>

      <div class="item">
        <img src="<?php echo base_url(); ?>/assets/images/db/nhahang2.jpg" alt="New York" style="width:100%">
      </div>
    
      <div class="item">
        <img src="<?php echo base_url(); ?>/assets/images/db/nhahang3.jpg" alt="New York" style="width:100%">
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>