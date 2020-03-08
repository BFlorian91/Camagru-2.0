<?php

class ViewUserGallery extends View
{
  public function body()
  { ?>
    <div class="container container-settings">
      <div class="row justify-content-md-center m-0">
        <div class="col-lg-2 col-xs-12 col-sm-12 col-md-3">
          <img src="https://i.pravatar.cc/100" alt="avatar" class="rounded-circle mx-auto d-block">
        </div>
        <div class="col-lg-1 col-md-3 col-sm-12 col-xs-12 my-auto text-center">
          <h1 class="text-center"><?= $_SESSION['userName'] ?></h1>
        </div>
        <div class="offset-md-4 col-md-1 col-sm-6 col-xs-3">
          <a href="edit-account"><i class="text-white fas fa-cog text-center col mt-4 icon-effect" style="font-size: 25px"></i></a>
        </div>
        <div class="col-md-1 col-sm-6 col-xs-3">
          <a href="personal-montage"><i class="text-white fas fa-plus text-center col mt-4 icon-effect" style="font-size: 25px"></i></a>
        </div>
        <div class="col-12">
          <p class="text-center mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid culpa a molestiae eaque voluptates incidunt neque omnis, qui porro minus temporibus aspernatur libero numquam voluptatem nihil cum animi dolores at.</p>
        </div>
      </div>
      <hr class="bg-light mb-4 w-50" style="opacity: 0.6">

      <!-- Card -->
      <div id="imgUserFetch"></div>
      <script>
      const ajax = new XMLHttpRequest();
      ajax.open("GET", "getUserImg", true)

      //recieve response
      ajax.onreadystatechange = () => {
        if (ajax.readyState == 4 && ajax.status == 200) {
          document.getElementById('imgUserFetch').innerHTML = ajax.responseText
        }
      }
      //sending request
      ajax.send()
    </script>
    </div>
    </div>

<?php
  }
}
