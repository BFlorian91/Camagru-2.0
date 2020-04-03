<?php

class ViewGallery extends View
{
  public function body()
  {
    $gallery = new ModelGallery();
    $rows = $gallery->fetchAllImg();
?>
<div class="container container-size full-height">
    <!-- Card -->
    <div id="container"></div>
    <?php foreach ($rows as $row) : ?>
    <div class="col gallery">
        <div class="row justify-content-center">
            <div class="col row justify-content-center">
                <div class=" pl-0 pr-0 mb-4 border border-info"
                    style="max-width: 500px; box-shadow: 6px 6px 6px black;">

                    <!-- IMAGE -->
                    <div class="overflow-hidden w-100">
                        <img class="w-100 thumb-zoom imgGal" alt="Card image" id="img" src="">
                    </div>
                    <div
                        class="row justify-content-center rounded-bottom bg-unique-color lighten-3 text-center pt-3 pb-1">
                        <ul class="w-75 list-unstyled list-inline font-small">
                            <div class="row">

                                <!-- DATE -->
                                <div class="col-6">
                                    <li class="list-inline-item white-text">
                                        <div>
                                            <i class="far fa-clock text-warning">
                                                <span class="imgDate text-white"></span>
                                            </i>
                                        </div>
                                    </li>
                                </div>


                                <!-- COMMENT -->
                                <div class="col-3">
                                    <li class="list-inline-item">
                                        <div class="row justify-content-center">
                                        <form action="explore" method="POST" class="commentForm">
                                            <input type="hidden" name="imageCommentedId" value="<?= $row[0] ?>">
                                            <button type="submit" style="background-color: rgba(0,0,0,0); border: none">
                                                    <i class="far fa-comments mr-2 text-info"></i>
                                                </button>
                                            </form>
                                            <p class="commentsCount mr-2 text-white text-center">
                                            </p>
                                        </div>
                                    </li>
                                </div>


                                <!-- LIKE -->
                                <div class="col-3">

                                    <li class="list-inline-item">
                                        <form action="explore" class="likesForm">
                                            <input type="hidden" name="imageId" value="<?= $row[0] ?>">
                                            <button type="submit" style="background-color: rgba(0,0,0,0); border: none">
                                                <div class="row justify-content-center">
                                                    <i class="likeStyle mt-1 mr-2 fas fa-heart">
                                                    </i>
                                                    <p class="likeCount text-white"></p>
                                                </div>
                                            </button>
                                        </form>
                                    </li>
                                </div>


                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <script src="/lib/javascript/gallery.js"></script>
</div>

<?php
  }
}