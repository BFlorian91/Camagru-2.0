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
      $stmt = $this->_db->prepare(
        "SELECT id, img, imgDate FROM gallery ORDER BY id DESC");
      $stmt->execute();
      while ($row = $stmt->fetch()) {
          $rows[] = $row;
      }
        return ($rows);
    }

    public function fetchUserImg()
    {
      $stmt = $this->_db->prepare("SELECT id, img, userId FROM gallery WHERE userId = :userId ORDER BY id DESC");
      $stmt->bindParam(":userId", $_SESSION['userId']);
      $stmt->execute();
      while ($row = $stmt->fetch()) {
        $rows[] = $row;
      }
      return ($rows);
    }

    public function likeGestion()
    {
      $stmt = $this->_db->prepare("SELECT * FROM `like` WHERE imageId = :imageId");
      $stmt->bindParam(":imageId", $_POST['imageId']);
      $stmt->execute();
      $row = $stmt->fetch();
      die($row);
    }

    public function comment()
    {
      // fetch img target and fetch all comment return to an array and parse in php to view EZ MONEY
    }
  }