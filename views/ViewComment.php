<?php

  class ViewComment extends View
  {
    function body()
    { 
      $comment = new ModelGallery();
      $messages = $comment->fetchComment();
      $image = $comment->fetchCommentImage();
      // echo "<pre class=\"text-white\">";
      //     print_r($messages);
      //   echo "</br>";
      // echo "</pre>";
      ?>
<div class="container container-size full-height">

  <!-- IMAGE -->
  <div class="col">
    <div class="row justify-content-center">
      <div class="col row justify-content-center">
        <div class=" pl-0 pr-0 mb-4 border border-info" style="max-width: 500px; box-shadow: 6px 6px 6px black;">

          <div class="overflow-hidden w-100">
            <img class="w-100 thumb-zoom" alt="Card image" id="img" src="<?= $image[0][1] ?>">
          </div>
          <div class="rounded-bottom bg-unique-color lighten-3 text-center pt-3 pb-1">
            <ul class="list-unstyled list-inline font-small">
              <li class="list-inline-item white-text">
                <div id="imgDate">
                  <i class="far fa-clock text-warning"></i>
                  <?= $image[0][3] ?>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- -- -->

  <!-- DISPLAY MESSAGES -->
  <div class="">
    <?php foreach($messages as $message) : ?>
      <?php $user = $comment->fetchUsername($message[1]); ?>
        <div class="card mb-2 rounded">
          <div class="card-body bg-dark text-white">
            <h4 class="card-title"><?= $user ?></h4>
            <p class="card-text"><?= $message[3] ?></p>
          </div>
        </div>
    <?php endforeach; ?>
  </div>
  <!-- -- -->

  <!-- SEND MESSAGE -->
  <div class="mt-4 mb-4">
    <form method="post">
      <input type="hidden" name="imageId" value="<?= $image[0][0] ?>">
      <textarea type="text" id="message" name="comment" rows="4" 
        style="resize: none"  
        placeholder="Your message..."
        maxlength="255"
        class="form-control md-textarea bg-dark text-white border-dark"></textarea>
      <input type="submit" class="btn btn-info rounded mt-2 float-right" value="send">
    </form>
  </div>
  <div style="height: 50px"></div>
  <!-- -- -->

</div>
<?php
    }
  }