<?php

class ViewUserGallery extends View
{
  public function body()
  { ?>
    <div class="container" style="max-width: 1000px">
      <div class="row justify-content-md-center">
        <div class="offset-md-1 col-xs-12 col-1">
          <img src="https://i.pravatar.cc/100" alt="avatar" class="rounded-circle mx-auto d-block">
        </div>
        <div class="col-md-2 col-xs-12 ml-4 my-auto">
          <h1 class="text-center"><?= $_SESSION['userName']?></h1>
        </div>
        <div class="offset-md-4 col-md-1 col-xs-6 mt-4">
          <a href="index.php?url="><i class="text-center text-white fas fa-cog" style="font-size: 25px"></i></a>
        </div>
        <div class="col-md-1 col-xs-6 mt-4">
          <a href="index.php?url="><i class="text-white text-center fas fa-plus" style="font-size: 25px"></i></a>
        </div>
        <div class="col-8">
          <p class="text-center mt-4 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid culpa a molestiae eaque voluptates incidunt neque omnis, qui porro minus temporibus aspernatur libero numquam voluptatem nihil cum animi dolores at.</p>
        </div>
        </div>
        <hr class="bg-light mb-4" style="opacity: 0.6">grey-opacity

      <!-- Card -->
        <div class="row mb-4 ml-1 justify-content-center">
          <?php for($i = 0; $i < 8; $i++): ?>
          <!--Card image-->
          <div class="col-md-3 pl-0 pr-0 mr-4 mb-4 border border-info" style="max-width: 300px; box-shadow: 6px 6px 6px black;">
            <img class="w-100" src="<?= "https://i.picsum.photos/id/" . ($i * 3) . "/300/300.jpg" ?>" alt="Card image cap">
            <a href="#!">
              <div class="mask rgba-white-slight"></div>
            </a>
            <i class="fas fa-heart position-absolute heart-like <?= $i % 2 == 0 ? 'text-muted' : 'text-danger';?>"></i>
            <!-- Card footer -->
            <div class="rounded-bottom bg-unique-color lighten-3 text-center pt-3 pb-1">
              <ul class="list-unstyled list-inline font-small">
                <li class="list-inline-item pr-2 white-text"><i class="far fa-clock pr-1 text-warning"></i>05/10/2015</li>
                <li class="list-inline-item pr-2"><a href="#" class="white-text"><i class="far fa-comments pr-1 text-info"></i><?= ($i * 17 % 7)  ?></a></li>
                <li class="list-inline-item pr-2"><a href="#" class="white-text"><i class="fas fa-heart pr-1 text-danger"> </i><?= ($i * 16 % 9)  ?></a></li>
              </ul>
            </div>
          </div>
        <?php endfor; ?>
        </div>
    </div>
      </div>
 
<?php
  }
}
