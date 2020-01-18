<?php

class ViewMontage extends View
{

  // private $_filters = array_slice(scandir('/lib/img/filters/'), 2);

  public function body()
  { ?>
    <div class="container container-settings">
    <h1 class="text-center font-poppins">PhotoLab</h1>
      <div class="row justify-content-center">
          <video class="col-12" style="max-width: 640px;" id="video" autoplay="true"></video>
          <!-- <img class="col-12" style="display: none" alt="photo" id="photo"> -->
      </div>
      <div class="row justify-content-center mt-4 mb-4">
        <a class="col-3" id="delete"><i class="fas fa-trash-alt text-center col" style="font-size: 35px;"></i></a>
        <a class="col-3 icon-effect" id="capture"><i class="fas fa-camera-retro text-center col" style="font-size: 35px;"></i></a>
        <a class="col-3 icon-effect" id="filter"><i class="fas fa-edit text-center col" style="font-size: 35px;"></i></a>
      </div>
      <hr >
      <h4 class="text-center font-poppins">Filters</h4>
      <div class="row justify-content-center mb-4">
        <!-- <div class="btn-group col" role="group" aria-label="Basic example"> -->
          <button type="button" class="btn rounded mr-3"><img width="30px" src="/lib/img/filters/bender.png" alt="bender"></button>
          <button type="button" class="btn rounded mr-3"><img width="30px" src="/lib/img/filters/glasses.png" alt="glasses"></button>
          <button type="button" class="btn rounded mr-3"><img width="30px" src="/lib/img/filters/homer.png" alt="homer"></button>
          <button type="button" class="btn rounded mr-3"><img width="30px" src="/lib/img/filters/magi.png" alt="magi"></button>
          <button type="button" class="btn rounded mr-3"><img width="30px" src="/lib/img/filters/marge.png" alt="marge"></button>
          <button type="button" class="btn rounded mr-3"><img width="30px" src="/lib/img/filters/rick.png" alt="rick"></button>
        <!-- </div> -->
      </div>
          <!-- <canvas id="canvas" class="col-12"></canvas> -->
    </div>
    <script src="/lib/javascript/camera.js"></script>
    <?php
  }
}