<?php

class ViewGallery extends View
{
  public function body()
  {
    $gallery = new ModelGallery();
    $rows = $gallery->fetchAllImg();
?>
    <div class="container container-size full-height" id="imgFetch">
      <!-- Card -->
      <?php foreach ($rows as $row) : ?>
        <div class="col">
          <div class="row justify-content-center">
            <div class="col row justify-content-center">
              <div class=" pl-0 pr-0 mb-4 border border-info" style="max-width: 500px; box-shadow: 6px 6px 6px black;">

                <!-- IMAGE -->
                <div class="overflow-hidden w-100">
                  <img class="w-100 thumb-zoom" alt="Card image" id="img" src="<?= $row[1] ?>">
                </div>
                <div class="rounded-bottom bg-unique-color lighten-3 text-center pt-3 pb-1">
                  <ul class="list-unstyled list-inline font-small">

                    <!-- DATE -->
                    <li class="list-inline-item white-text">
                      <div id="imgDate">
                        <i class="far fa-clock text-warning"></i>
                        <?= $row[2] ?>
                      </div>
                    </li>
                    
                    <!-- COMMENT -->
                    <li class="list-inline-item">
                      <form action="comments" method="post">
                        <input type="hidden" name="imageId" value="<?= $row[0] ?>">
                        <button type="submit" style="background-color: rgba(0,0,0,0); border: none;">
                          <i class="far fa-comments text-info"></i>
                          <p class="commentCount text-white"></p>
                        </button>
                        <?= $gallery->getNbComment($row[0]); ?>
                      </form>
                    </li>
                    
                    <!-- LIKE -->
                    <!-- <?php $like = $gallery->getStyleLiked($row[0]); ?> -->
                    <li class="list-inline-item">
                      <form action="explore" class="likeForm">
                        <input id="test" type="hidden" name="imageId" value="<?= $row[0] ?>">
                        <button 
                        type="submit" 
                        style="background-color: rgba(0,0,0,0); border: none"
                        >
                        <div class="row justify-content-center">
                          <i class="likeStyle mt-1 ml-2 mr-2 fas fa-heart">
                          </i>
                          <p class="likeCount text-white"></p>
                        </div>
                      </button>
                      <!-- <?= $gallery->getNbLike($row[0]) ?> -->
                    </form>
                  </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <script src="/lib/javascript/like.js"></script>
    </div>

<?php
  }
}
