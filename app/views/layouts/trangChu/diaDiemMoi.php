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
          <a href="<?php echo base_url('diaDiem/cacDanhGia/'.$diaDiem['MaDiaDiem'] ); ?>">
            <img src="<?php echo base_url('assets/images/db/'.$diaDiem['AnhDaiDienDD']); ?>" alt="New York" style="width:100%;height:100%;object-fit:cotain ; ">
          </a>
          <div class="carousel-caption" >
            <a href="<?php echo base_url('diaDiem/cacDanhGia/'.$diaDiem['MaDiaDiem'] ); ?>" style="color:white; text-decoration: none;">
              <h3 style="text-shadow:2px 2px 4px black"><?php echo $diaDiem['TenDiaDiem']; ?></h3>
              <p style="text-shadow:2px 2px 4px black"><?php echo $diaDiem['MoTaDD']; ?></p>
            </a>
          </div>
        </div>
    <?php endforeach; ?>
    <!--Chèn class active vào item đầu tiên-->
    <script>
      $(".item:first-of-type").addClass("active");
    </script>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev" style="color:white">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next" style="color:white">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>

</div>