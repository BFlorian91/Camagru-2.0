<?php

  class ViewComment extends View
  {
    function body()
    { 
      $comment = new ModelGallery();
      $messages = $comment->fetchComment();
      $image = $comment->fetchCommentImage();
      echo "<pre class=\"text-white\">";
        print_r($image[0]);
      echo "</pre>";
      ?>
    <div class="container container-size full-height">

    <div class="col">
    <div class="row justify-content-center">
      <div class="col row justify-content-center">
        <div class=" pl-0 pr-0 mb-4 border border-info" style="max-width: 500px; box-shadow: 6px 6px 6px black;">

          <!-- IMAGE !  -->
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




    <!-- <img src="<?= $image[0][1] ?>" alt="photo"> -->
      <?php foreach($messages as $message) : ?>
        <p><?= $message[3] ?></p>
      <?php endforeach; ?>
      <form method="post">
        <textarea 
          type="text" 
          id="message" 
          name="message" 
          rows="2"
          placeholder="Your message..."
          class="form-control md-textarea bg-dark text-white border-dark"
        ></textarea>
        <input type="submit" class="btn btn-info w-25 rounded mt-2 float-right" value="send">
      </form>
      <h1>comment page</h1>
    </div>
     <?php
    }
  }