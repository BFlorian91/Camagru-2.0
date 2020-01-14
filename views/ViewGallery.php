<?php

class ViewGallery extends View
{
  public function body()
  { ?>
    <div class="main-container">
        <!-- Card -->
        <div class="row mb-4 ml-1 justify-content-center">
          <?php for($i = 0; $i < 8; $i++): ?>
          <!--Card image-->
          <div class="col-md-3 pl-0 pr-0 mr-4 mb-4 border border-info" style="box-shadow: 6px 6px 6px black;">
            <img class="w-100" src="<?php echo "https://i.picsum.photos/id/" . ($i * 14) . "/300/300.jpg" ?>" alt="Card image cap">
            <a href="#!">
              <div class="mask rgba-white-slight"></div>
            </a>
            <i class="fas fa-heart position-absolute heart-like <?php echo $i % 2 == 0 ? 'text-muted' : 'text-danger';?>"></i>
            <!-- Card footer -->
            <div class="rounded-bottom bg-unique-color lighten-3 text-center pt-3 pb-1">
              <ul class="list-unstyled list-inline font-small">
                <li class="list-inline-item pr-2 white-text"><i class="far fa-clock pr-1 text-warning"></i>05/10/2015</li>
                <li class="list-inline-item pr-2"><a href="#" class="white-text"><i class="far fa-comments pr-1 text-info"></i><?php echo ($i * 17 % 7)  ?></a></li>
                <li class="list-inline-item pr-2"><a href="#" class="white-text"><i class="fas fa-heart pr-1 text-danger"> </i><?php echo ($i * 16 % 9)  ?></a></li>
              </ul>
            </div>
          </div>
        <?php endfor; ?>
        </div>
    </div>
 
<?php
  }
}
