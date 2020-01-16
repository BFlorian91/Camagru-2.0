<?php

class ViewMontage extends View
{
  public function body()
  { ?>
    <div class="container container-settings">
      <div class="row">
        <div class="col-12">
          <video id="video" autoplay="true"></video>
          <img style="display: none" alt="photo" id="photo">
          <button id="capture">capture</button>
          <canvas id="canvas" width="640" height="480"></canvas>
        </div>
      </div>
    </div>
    <script src="/lib/javascript/camera.js"></script>
    <?php
  }
}