<?php

  class ModelMontage extends Model
  {
    private $_db;
    private $_outputfile;

    public function __construct()
    {
      parent::__construct();
      $this->_db = $this->connect();
      $this->_outputfile = null;
    }

    public function uploadImage()
    {
      if (empty($_FILES['imageUpload']['name'])) {
        return $this->message->error("No file chosen");
      }
      $imageExt = strtolower(end(explode('.', $_FILES['imageUpload']['name'])));
      $imageSize = $_FILES['imageUpload']['size'];
      $imageTmp = $_FILES['imageUpload']['tmp_name'];

      $imageExtAuth = ['jpg', 'jpeg', 'png'];

      if ($imageSize > 2097152) {
        return $this->message->error("This image is too large, file size must be 2MB or less");
      }
      if (in_array($imageExt, $imageExtAuth) === false) {
        return $this->message->error("Bad image format, only 'jpg' 'jpeg' and 'png' is accepted");
      }
      move_uploaded_file($imageTmp, "./lib/userImg/" . $_SESSION['username'] . "_" . date("Y-m-d_H:i:s") . "." . $imageExt);
      $this->_outputfile = "./lib/userImg/" . $_SESSION['username'] . "_" . date("Y-m-d_H:i:s") . "." . $imageExt;
    }

    public function getImage()
    {
      $this->_outputfile = "./lib/userImg/" . $_SESSION['username'] . str_replace(" ", "_", date("Y-m-d H:i:s")) . '.png';
      
      $base64_string = $_POST['img'];
      $ifp = fopen($this->_outputfile, 'wb'); 
      $data = explode( ',', $base64_string);
      fwrite($ifp, base64_decode($data[1] ));
      fclose($ifp);
    }

    public function pushImgToDb()
    {
      $stmt = $this->_db->prepare("INSERT INTO gallery(img, userId, imgDate) VALUES (:img, :userId, NOW())");
      $stmt->bindParam(":img", $this->_outputfile);
      $stmt->bindParam(":userId", $_SESSION['userId']);
      $stmt->execute();
    }
  }