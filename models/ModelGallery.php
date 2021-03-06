<?php

  class ModelGallery extends Model
  {
      public function __construct()
      {
          parent::__construct();
          $this->_db = $this->connect();
      }

      // GALLERY //

      public function fetchAllImg()
      {
          $stmt = $this->_db->prepare(
        'SELECT id, img, imgDate FROM gallery ORDER BY id DESC');
          $stmt->execute();
          while ($row = $stmt->fetch()) {
              $rows[] = $row;
          }

          return $rows;
      }

      public function fetchUserImg()
      {
          $stmt = $this->_db->prepare('SELECT id, img, userId FROM gallery WHERE userId = :userId ORDER BY id DESC');
          $stmt->bindParam(':userId', $this->userId);
          $stmt->execute();
          while ($row = $stmt->fetch()) {
              $rows[] = $row;
          }

          return $rows;
      }

      // LIKE //

      public function likeGestion()
      {
          $datas = [];
          $stmt = $this->_db->prepare('SELECT * FROM `like` WHERE imageId = :imageId AND userId = :userId');
          $stmt->bindParam(':imageId', filter_input(INPUT_POST, 'imageId'));
          $stmt->bindParam(':userId', $this->userId);
          $stmt->execute();

          $liked = $this->getLikedStatus();
          if ($stmt->rowCount() < 1) {
              $liked = 1;
              $stmt = $this->_db->prepare('INSERT INTO `like`(userId, imageId, liked) VALUE (:userId, :imageId, :liked)');
              $stmt->bindParam(':userId', $this->userId);
              $stmt->bindParam(':imageId', filter_input(INPUT_POST, 'imageId'));
              $stmt->bindParam(':liked', $liked);
              $stmt->execute();
              $datas[] = $liked;
              $datas[] = $this->getNbLike(filter_input(INPUT_POST, 'imageId'));

              return $datas;
          }
          if ($liked) {
              $stmt = $this->_db->prepare('UPDATE `like` SET liked = 0 WHERE userId = :userId AND imageId = :imageId');
              $stmt->bindParam(':userId', $this->userId);
              $stmt->bindParam(':imageId', filter_input(INPUT_POST, 'imageId'));
              $stmt->execute();

              $liked = 0;
              $datas[] = $liked;
              $datas[] = $this->getNbLike(filter_input(INPUT_POST, 'imageId'));

              return $datas;
          }
          $stmt = $this->_db->prepare('UPDATE `like` SET liked = 1  WHERE userId = :userId AND imageId = :imageId');
          $stmt->bindParam(':userId', $this->userId);
          $stmt->bindParam(':imageId', filter_input(INPUT_POST, 'imageId'));
          $stmt->execute();

          $liked = 1;
          $datas[] = $liked;
          $datas[] = $this->getNbLike(filter_input(INPUT_POST, 'imageId'));

          return $datas;
      }

    //   public function getStyleLiked($imgId)
    //   {
    //       $stmt = $this->_db->prepare('SELECT * FROM `like` WHERE imageId = :imageId AND userId = :userId');
    //       $stmt->bindParam(':imageId', $imgId);
    //       $stmt->bindParam(':userId', $this->userId);
    //       $stmt->execute();

    //       while ($row = $stmt->fetch()) {
    //           if ($imgId == $row[2]) {
    //               return $row[3];
    //           }
    //       }
    //   }

      public function getNbLike($imgId = null)
      {
          if ($imgId != null) {
              $stmt = $this->_db->prepare('SELECT * FROM `like` WHERE imageId = :imageId AND liked = 1');
              $stmt->bindParam(':imageId', $imgId);
              $stmt->execute();

              $nbLike = 0;
              while ($stmt->fetch()) {
                  $nbLike++;
              }

              return $nbLike;
          }
          //   $stmt = $this->_db->prepare('SELECT * FROM `like` WHERE liked = 1');
        //   $stmt->execute();

        //   $nbLike = 0;
        //   while ($stmt->fetch()) {
        //       $nbLike++;
        //   }
        //   return $nbLike;
      }

      public function getLikedStatus()
      {
          $imageId = filter_input(INPUT_POST, 'imageId');
          $stmt = $this->_db->prepare('SELECT * FROM `like` WHERE imageId = :imageId AND userId = :userId');
          $stmt->bindParam(':imageId', $imageId);
          $stmt->bindParam(':userId', $this->userId);
          $stmt->execute();

          while ($row = $stmt->fetch()) {
              if ($imageId == $row[2]) {
                  return $row[3];
              }
          }
      }

    //   public function getLikeStatus()
    //   {
    //       $imageId = $this->getImagesID();

    //       foreach ($imageId as $imgId) {
    //           // REQUEST NUMBER OF LIKE PER IMG
    //           $stmt = $this->_db->prepare('SELECT * FROM `like` WHERE imageId = :imageId');
    //           $stmt->bindParam(':imageId', $imgId[0]);
    //           $stmt->execute();

    //           $nbLike = 0;
    //           while ($rows = $stmt->fetch()) {
    //               if ($rows[3]) {
    //                   $nbLike++;
    //               }
    //           }
    //           $row["nbOfLike"][] = $nbLike;

    //           // REQUEST IF USER LIKE IT
    //           try {
    //               $stmt = $this->_db->prepare('SELECT * FROM `like` WHERE imageId = :imageId AND userId = :userId');
    //               $stmt->bindParam(':imageId', $imgId[0]);
    //               $stmt->bindParam(':userId', $this->userId);
    //               $stmt->execute();
                  
    //               $liked = $stmt->fetchAll();
    //               $row["liked"][] = $liked[0][3];
    //           } catch(Throwable $e) {
    //             echo "Error " . $e ;
    //           }
    //       }
    //       return $row;
    //   }

      // COMMENT //

    //   public function getNbComments()
    //   {
    //       $imagesId = $this->getImagesID();
    //       foreach ($imagesId as $imgId) {
    //           $stmt = $this->_db->prepare('SELECT * FROM comment WHERE imageId = :imageId');
    //           $stmt->bindParam(':imageId', $imgId[0]);
    //           $stmt->execute();
    //           $nbComment = 0;

    //           while ($stmt->fetch()) {
    //               $nbComment++;
    //           }
    //           $rows[] = $nbComment;
    //       }

    //       return $rows;
    //   }
  }
