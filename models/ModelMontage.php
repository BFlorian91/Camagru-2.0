<?php

  class ModelMontage extends Model
  {

    public function __construct()
    {
      parent::__construct();
      $this->_db = $this->connect();
      $this->_db->exec("USE " . getenv("DB_NAME"));
    }

    public function uploadImage($image)
    {
      if (empty($image['name'])) {
        return $this->message->error("No file chosen");
      }
      $imageExt = strtolower(end(explode('.', $image['name'])));
      $imageSize = $image['size'];
      $imageTmp = $image['tmp_name'];

      $imageExtAuth = ['jpg', 'jpeg', 'png'];

      if ($imageSize > 2097152) {
        return $this->message->error("This image is too large, file size must be 2MB or less");
      }
      if (in_array($imageExt, $imageExtAuth) === false) {
        return $this->message->error("Bad image format, only 'jpg' 'jpeg' and 'png' is accepted");
      }
      // echo $imageTmp . "</br>";
      // echo sys_get_temp_dir();
      move_uploaded_file($imageTmp, "/uploads/" . $_SESSION['username'] . "_" . date("Y-m-d_H:i:s") . "." . $imageExt);
    }
  }