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
      $stmt = $this->_db->prepare("SELECT id, img,  userId FROM gallery WHERE userId = :userId ORDER BY id DESC");
      $stmt->bindParam(":userId", $_SESSION['userId']);
      $stmt->execute();
      while ($row = $stmt->fetch()) {
        $rows[] = $row;
      }
      return $rows;
    }


    // LIKE //

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

        return $liked;
      }
      if ($liked) {
        $stmt = $this->_db->prepare("UPDATE `like` SET liked = 0 WHERE userId = " . $_SESSION['userId'] . " AND imageId = " . $_POST['imageId']);
        $stmt->execute();

        $liked = 0;
        return $liked;
      }
      $stmt = $this->_db->prepare("UPDATE `like` SET liked = 1  WHERE userId = " . $_SESSION['userId'] . " AND imageId = " . $_POST['imageId']);
      $stmt->execute();
      $liked = 1;

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
      $nbLike = 0;
      while ($stmt->fetch()) {
        $nbLike++;
      }
      return $nbLike;
    }


    // COMMENT //

    public function fetchCommentImage()
    {
      $stmt = $this->_db->prepare("SELECT * FROM gallery WHERE id = :imageId");
      $stmt->bindParam(":imageId", $_POST['imageId']);
      $stmt->execute();
      while ($row = $stmt->fetch()) {
        $rows[] = $row;
      }
      return $rows;
    }
    public function getNbComment($imageId)
    {
      // $imageId = $_POST['imageId'];

      $stmt = $this->_db->prepare("SELECT * FROM comment WHERE imageId = :imageId");
      $stmt->bindParam(":imageId", $imageId);
      $stmt->execute();
      $nbComment = 0;

      while ($stmt->fetch()) {
        $nbComment++;
      }

      return $nbComment;
    }

    public function postComment()
    {
      $stmt = $this->_db->prepare("INSERT INTO comment(userId, imageId, comment) VALUE(:userId, :imageId, :comment)");
      $stmt->bindParam(":userId", $_SESSION['userId']);
      $stmt->bindParam(":imageId", $_POST['imageId']);
      $stmt->bindParam(":comment", $_POST['comment']);
      $stmt->execute();
    }

    public function fetchComment()
    {
      $imageId = $_POST['imageId'];

      $stmt = $this->_db->prepare("SELECT * FROM comment WHERE imageId = :imageId ORDER BY id DESC");
      $stmt->bindParam(":imageId", $imageId);
      $stmt->execute();
      while ($row = $stmt->fetch()) {
        $rows[] = $row;
      }
      return $rows;
    }

    public function fetchUsername($userId)
    {
      $stmt = $this->_db->prepare("SELECT * FROM users");
      $stmt->execute();
      $users = $stmt->fetchALL();

      foreach($users as $user) {
        if ($user[0] == $userId) {
          return $user[1];
        }
      }
    }
    ////////////////////////

  }