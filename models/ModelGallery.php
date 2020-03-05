<?php

  class ModelGallery extends Model
  {

    public function __construct()
    {
      parent::__construct();
      $this->_db = $this->connect();
    }

    public function fetchAllImg()
    {
      $stmt = $this->_db->prepare("SELECT id, img FROM gallery ORDER BY id DESC");
      $stmt->execute();
      $i = 0;
      while ($row = $stmt->fetch()) {
        ?>
          <div class="row justify-content-center">
            <div class="col row justify-content-center">
              <div class=" pl-0 pr-0 mb-4 border border-info" style="max-width: 550px; box-shadow: 6px 6px 6px black;">
                <div class="overflow-hidden w-100">
                  <img class="w-100 thumb-zoom" src="<?= $row['img'] ?>" alt="Card image">
                </div>
                <!-- <a href="#!">
                  <div class="mask rgba-white-slight"></div>
                </a> -->
                <!-- Card footer -->
                <div class="rounded-bottom bg-unique-color lighten-3 text-center pt-3 pb-1">
                  <ul class="list-unstyled list-inline font-small">
                    <li class="list-inline-item pr-2 white-text"><i class="far fa-clock pr-1 text-warning"></i>12/01/2020</li>
                    <li class="list-inline-item pr-2"><a href="#" class="white-text"><i class="far fa-comments pr-1 text-info"></i>7</a></li>
                    <li class="list-inline-item pr-2"><a href="#" class="white-text"><i class="fas fa-heart pr-1 text-danger"> </i>9</a></li>
                  </ul> 
                </div>
              </div>
            </div>
          </div>
        <?php
        $i++;
      }
    }
  }