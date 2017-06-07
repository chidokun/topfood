<div id="myCarousel" class="carousel slide" data-ride="carousel" style="height:100%;">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" style="width:100%; height:100%">
    
    <?php foreach ($diadiemmoi_data as  $diaDiem) : ?>
      <div class="item" style="height:100%">
        <div style="background-image: url('./assets/images/db/<?php echo $diaDiem['AnhDaiDienDD']; ?>'); width:100%; height:100%; background-size: cover; background-position: center;"></div>
        <div class="carousel-caption" >
          <h3><?php echo $diaDiem['TenDiaDiem']; ?></h3>
          <p><?php echo $diaDiem['MoTaDD']; ?></p>
        </div>
      </div>
    <?php endforeach; ?>
    <script>
      $(".item:first-of-type").addClass("active");
    </script>
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