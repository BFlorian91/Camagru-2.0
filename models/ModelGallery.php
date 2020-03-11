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
      $stmt = $this->_db->prepare("SELECT * FROM `like` WHERE imageId = :imageId AND userId = :userId");
      $stmt->bindParam(":imageId", $_POST['imageId']);
      $stmt->bindParam(":userId", $_SESSION['userId']);
      $stmt->execute();

      $liked = $this->getLikedStatus();
      
      if ($stmt->rowCount() < 1) {
        $liked = 1;
        $stmt = $this->_db->prepare("INSERT INTO `like`(userId, imageId, liked) VALUE (:userId, :imageId, :liked)");
        $stmt->bindParam(":userId", $_SESSION['userId']);
        $stmt->bindParam(":imageId", $_POST['imageId']);
        $stmt->bindParam(":liked", $liked);
        $stmt->execute();
      } else {
        if ($liked) {
          $stmt = $this->_db->prepare("UPDATE `like` SET liked = 0 WHERE userId = " . $_SESSION['userId'] . " AND imageId = " . $_POST['imageId']);
          $stmt->execute();

          $liked = 0;
          return $liked;
        }
          $stmt = $this->_db->prepare("UPDATE `like` SET liked = 1  WHERE userId = " . $_SESSION['userId'] . " AND imageId = " . $_POST['imageId']);
          $stmt->execute();

          $liked = 1 ;         
      }
      return $liked;
    }
    
    public function getStyleLiked($imgId)
    {
      $userId = $_SESSION['userId'];
      $stmt = $this->_db->query("SELECT * FROM `like` WHERE imageId = '$imgId' AND userId = '$userId'");
      
      while ($row = $stmt->fetch()) {
        if ($imgId == $row[2]) {
          return $row[3];
        }
      }
    }

    public function getNbLike($imgId)
    {
      $stmt = $this->_db->query("SELECT * FROM `like` WHERE imageId = '$imgId' AND liked = 1");
      $i = 0;
      while ($row = $stmt->fetch()) {
        $i++;
      }
      return $i;
    }

    public function comment()
    {
      // fetch img target and fetch all comment return to an array and parse in php to view EZ MONEY
      $stmt = $this->_db->prepare("SELECT * FROM comment");
    }
  }