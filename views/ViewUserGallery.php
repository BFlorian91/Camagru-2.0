<?php

class ViewUserGallery extends View
{
  public function body()
  { 
    $gallery = new ModelGallery();
    $rows = $gallery->fetchUserImg();
    // echo "<pre class=\"text-white\">";
    // print_r($rows);
    // echo "</pre>";
    ?>
<div class="container container-settings">
  <div class="row justify-content-md-center m-0">
    <div class="col-lg-2 col-xs-12 col-sm-12 col-md-3">
      <img src="https://i.pravatar.cc/100" alt="avatar" class="rounded-circle mx-auto d-block">
    </div>
    <div class="col-lg-1 col-md-3 col-sm-12 col-xs-12 my-auto text-center">
      <h1 class="text-center"><?= $_SESSION['userName'] ?></h1>
    </div>
    <div class="offset-md-4 col-md-1 col-sm-6 col-xs-3">
      <a href="edit-account"><i class="text-white fas fa-cog text-center col mt-4 icon-effect"
          style="font-size: 25px"></i></a>
    </div>
    <div class="col-md-1 col-sm-6 col-xs-3">
      <a href="personal-montage"><i class="text-white fas fa-plus text-center col mt-4 icon-effect"
          style="font-size: 25px"></i></a>
    </div>
    <div class="col-12">
      <p class="text-center mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid culpa a molestiae
        eaque voluptates incidunt neque omnis, qui porro minus temporibus aspernatur libero numquam voluptatem nihil cum
        animi dolores at.</p>
    </div>
  </div>
  <hr class="bg-light mb-4 w-50" style="opacity: 0.6">

  <!-- Card -->
  <?php foreach($rows as $row) :?>
  <div class="col">
    <div class="row justify-content-center">
      <div class="col row justify-content-center">
        <div class=" pl-0 pr-0 mb-4 border border-info" style="max-width: 500px; box-shadow: 6px 6px 6px black;">

          <!-- IMAGE !  -->
          <div class="overflow-hidden w-100">
            <img class="w-100 thumb-zoom" alt="Card image" id="img" src="<?= $row[1] ?>">
          </div>
          <div class="rounded-bottom bg-unique-color lighten-3 text-center pt-3 pb-1">
            <ul class="list-unstyled list-inline font-small">
              <li class="list-inline-item white-text">
                <div id="imgDate">
                  <i class="far fa-clock text-warning"></i>
                  <?= $row[2] ?>
                </div>
              </li>

              <!-- COMMENT ! -->
              <li class="list-inline-item">
                <form method="post">
                  <input type="hidden" name="userId" value="<?= $_POST['userId'] ?>">
                  <input type="hidden" name="imageId" value="<?= $row[0] ?>">
                  <button type="submit" value="1" name="comment" style="background-color: rgba(0,0,0,0); border: none;">
                    <i class="far fa-comments text-info"></i>
                  </button>
                </form>
              </li>

              <?php  $like = $gallery->getStyleLiked($row[0]); ?>
              <!-- LIKE !  -->
              <li class="list-inline-item">
                <form method="post">
                  <input type="hidden" name="imageId" value="<?= $row[0] ?>">
                  <button type="submit" value="1" name="like" style="background-color: rgba(0,0,0,0); border: none;">
                    <i id="like" class="mt-1 fas fa-heart <?=  $like == 0 ? '' : ' text-danger' ?>">
                    </i>
                  </button>
                  <?= $gallery->getNbLike($row[0]) ?>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
  <script>
  // const ajax = new XMLHttpRequest();
  // ajax.open("GET", "getUserImg", true)

  // //recieve response
  // ajax.onreadystatechange = () => {
  //   if (ajax.readyState == 4 && ajax.status == 200) {
  //     document.getElementById('imgUserFetch').innerHTML = ajax.responseText
  //   }
  // }
  // //sending request
  // ajax.send()
  </script>
</div>
</div>

<?php
  }
}