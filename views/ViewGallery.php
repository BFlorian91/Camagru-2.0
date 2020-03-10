<?php

class ViewGallery extends View
{
  public function body()
  { 
    $gallery = new ModelGallery();
    $rows = $gallery->fetchAllImg();
    print_r($rows);
    ?>
<div class="container container-size full-height" id="imgFetch">
  <!-- Card -->
  <?php foreach($rows as $row) :?>
  <div class="col">
    <div class="row justify-content-center">
      <div class="col row justify-content-center">
        <div class=" pl-0 pr-0 mb-4 border border-info" style="max-width: 500px; box-shadow: 6px 6px 6px black;">
          <div class="overflow-hidden w-100">
            <img class="w-100 thumb-zoom" alt="Card image" id="img" src="<?= $row[1] ?>">
          </div>
          <div class="rounded-bottom bg-unique-color lighten-3 text-center pt-3 pb-1">
            <ul class="list-unstyled list-inline font-small">
              <li class="list-inline-item pr-2 white-text">
                <div id="imgDate">
                  <i class="far fa-clock pr-1 text-warning"></i>
                  <?= $row[2] ?>
                </div>
              </li>
              <li class="list-inline-item pr-2">
                <a href="#" class="white-text">
                  <?= "7" ?>
                  <i class="far fa-comments pr-1 text-info"></i>
                </a>
              </li>
              <li class="list-inline-item pr-2">
                <form method="post">
                  <i onclick="postLike()" id="like" class="fas fa-heart pr-1 text-danger"></i>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>
<script>
  function postLike() {
    document.getElementById('like').onclick = () => { console.log("hello world") }
  }
// let ajax = new XMLHttpRequest();
// ajax.open("GET", "getAllImg", true)

// //recieve response
// ajax.onreadystatechange = () => {
//   if (ajax.readyState == 4 && ajax.status == 200) {
//     let response = JSON.parse(ajax.responseText)
//     const img = document.getElementById('img')
//     const date = document.getElementById('imgDate')

//     Object.keys(response).forEach((key, index) => {
//       console.log(key, response[key])
//       img.src = response[key].img
//       date.innerHTML = '<i class="far fa-clock pr-1 text-warning"></i>' + response[key].imgDate

//     })
//   }
// }
// //sending request
// ajax.send()
</script>
</div>

<?php
  }
}