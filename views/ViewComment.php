<?php

class ViewComment extends View
{
  function body()
  {
?>
<div class="container container-size full-height">

  <!-- IMAGE -->
  <div class="col mb-4">
    <div class="row justify-content-center">
      <div class="col row justify-content-center">
        <div class=" pl-0 pr-0 mb-4 border border-info" style="max-width: 500px; box-shadow: 6px 6px 6px black;">

          <div class="overflow-hidden w-100">
            <img class="w-100 thumb-zoom" id="img" alt="Card image" src="">
          </div>
          <div class="rounded-bottom bg-unique-color lighten-3 text-center pt-3 pb-1">
            <ul class="list-unstyled list-inline font-small">
              <div class="row">

                <!-- DATE -->
                <div class="col-6">
                  <li class="list-inline-item white-text">
                    <i class="far fa-clock text-warning">
                      <span class="text-white font-poppins" id="imgDate">
                      </span>
                    </i>
                  </li>
                </div>

                <!-- USER -->
                <div class="col-6">
                  <li class="list-inline-item white-text">
                    <i class="text-white fas fa-user text-info mr-2" style="font-size: 15px;"></i><span class="font-roboto" id="imgAuthor"></span></p>
                  </li>
                </div>
              </div>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- -- -->

  <!-- DISPLAY MESSAGES -->

  <div id="displayMessages"></div>

  <!-- -- -->

  <!-- SEND MESSAGE -->
  <div class="<?= trim($_SESSION['token']) == '' ? 'd-block' : 'd-none' ?> mt-4">
    <div class="row justify-content-center">
      <h5 class="text-center">You must be connected for send a comment</h5>
    </div>
    <div class="row justify-content-center">
      <a href="signin" class="btn btn-info">Connect</a>
    </div>
  </div>

  <!-- MESSAGE BOX -->
  <div class="<?= trim($_SESSION['token']) != '' ? 'd-block' : 'd-none' ?> mb-4 mt-4">
    <form action="" method="post" id="commentForm">
      <input type="hidden" name="imageId" value="">
      <textarea type="text" id="message" name="comment" rows="4" style="resize: none" placeholder="Your message..."
        maxlength="255" class="form-control md-textarea bg-dark text-white border-dark"></textarea>
      <input type="submit" class="btn btn-info rounded mt-3 float-right" value="send">
    </form>
  </div>
  <div style="height: 50px"></div>
  <!-- -- -->
  <script src="/lib/javascript/comments.js"></script>
</div>
<?php
  }
}