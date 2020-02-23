<?php

class ViewMontage extends View
{

  public function body()
  { ?>
    <div class="container container-settings">
    <h1 class="text-center font-poppins">PhotoLab</h1>
      <div class="row justify-content-center">
          <video class="col-12" style="max-width: 640px; display: block" id="video" autoplay="true"></video>
          <canvas class="col-12" style="max-width: 640px; max-height: 480px; display: none"></canvas>
      </div>
      <div class="row justify-content-center mt-4 mb-4">
        <a onclick="takeSnapshot()" class="col-3 icon-effect" id="takeSnap"><i class="fas fa-camera-retro text-center col" style="font-size: 35px;"></i></a>
        <a onclick="reloadCamera()" class="col-3 icon-effect" id="reload" style="display: none;"><i class="fas fa-sync-alt text-center col" style="font-size: 35px;"></i></a>
        <a class="col-3 icon-effect" id="save" style="display: none;"><i class="fas fa-save text-center col" style="font-size: 35px;"></i></a>
        <a onclick="toggleDiv('showUpload')" id="uploader" class="col-3 icon-effect"><i class="fas fa-cloud-upload-alt text-center col" style="font-size: 35px;"></i></a>
        <a onclick="reloadCamera()" class="col-3" style="display: none;" id="delete"><i class="fas fa-trash-alt text-center col" style="font-size: 35px;"></i></a>
      </div>
      <div class="file-upload-wrapper" id="showUpload" style="display: none">
        <hr>
        <div class="row justify-content-center">
          <form method="post" enctype="multipart/form-data">
            <input type="file" name="photoUpload" id="input-file-now" class="file-upload rounded" />
            <input type="submit" class="rounded">
          </form>
        </div>
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
    <script src="/lib/javascript/toggle.js"></script>
    <?php
  }
}