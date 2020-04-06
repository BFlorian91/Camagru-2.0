<?php

class ViewGallery extends View
{
  public function body()
  {
?>
<div class="container container-size full-height">
    <div id="alert"></div>
    <div id="container"></div>
    <script src="/lib/javascript/gallery.js"></script>
</div>

<?php
  }
}