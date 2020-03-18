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
      $file = $_FILES['imageUpload'];

      if (empty($file["name"])) {
        return $this->message->error("No file chosen");
      }
      $info = pathinfo($file["name"]);
      // $imageExt = strtolower(end(explode('.', $_FILES['imageUpload']['name'])));
      $imageExt = $info["extension"];
      $imageSize = $file["size"];
      $imageTmp = $file['tmp_name'];
      $imageExtAuth = ['jpg', 'jpeg', 'png'];

      if ($imageSize > 2000000) {
        echo $this->message->error("This image is too large, file size must be 2MB or less");
        return false;
      }
      if (in_array($imageExt, $imageExtAuth) == false) {
        echo $this->message->error("Bad image format, only 'jpg' 'jpeg' and 'png' is accepted");
        return false;
      }
      move_uploaded_file($imageTmp, "./lib/userImg/" . $this->userName . "_" . date("Y-m-d_H:i:s") . "." . $imageExt);
      $this->_outputfile = "./lib/userImg/" . $this->userName . "_" . date("Y-m-d_H:i:s") . "." . $imageExt;
      return true;
    }

    public function getImage()
    {
      $this->_outputfile = "./lib/userImg/" . $this->userName . str_replace(" ", "_", date("Y-m-d H:i:s")) . '.png';
      
      $base64String = filter_input(INPUT_POST, "img");
      $ifp = fopen($this->_outputfile, 'wb'); 
      $data = explode( ',', $base64String);
      fwrite($ifp, base64_decode($data[1]));
      fclose($ifp);
    }

    public function pushImgToDb()
    {
      $stmt = $this->_db->prepare("INSERT INTO gallery(img, userId, imgDate) VALUES (:img, :userId, NOW())");
      $stmt->bindParam(":img", $this->_outputfile);
      $stmt->bindParam(":userId", $this->userId);
      $stmt->execute();
    }
  }