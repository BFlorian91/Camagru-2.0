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
  }