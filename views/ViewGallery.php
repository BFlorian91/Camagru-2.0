<?php

class ViewGallery extends View
{
  public function body()
  { ?>
  <div class="container container-size" id="imgFetch">
      <!-- Card -->
    <script>
      let ajax = new XMLHttpRequest();
      ajax.open("GET", "getAllImg", true)

      //recieve response
      ajax.onreadystatechange = () => {
        if (ajax.readyState == 4 && ajax.status == 200) {
          document.getElementById('imgFetch').innerHTML = ajax.responseText
        }
      }
      //sending request
      ajax.send()
    </script>
  </div>
 
<?php
  }
}
