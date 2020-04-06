<?php

    class GetDatas extends Model
    {
        private $_db;

        public function __construct()
        {
            parent::__construct();
            $this->_db = $this->connect();
        }

        public function getImg($imgId)
        {
            try {
                $sql = 'SELECT * FROM gallery
                        INNER JOIN users ON gallery.userId = users.id
                        WHERE gallery.id LIKE :imgId';
                $stmt = $this->_db->prepare($sql);
                $stmt->bindParam(':imgId', $imgId);
                $stmt->execute();

                for ($i = 0; $i < count($this->getImagesID()); $i++) {
                    $numberOfImages = $i;
                }
                $numberOfImages > 1 ? $numberOfImages++ : 0;

                $datas = $stmt->fetchAll();
                $datas[] = $numberOfImages;
            } catch (Throwable $e) {
                echo $this->message->error($e);
            }

            return $datas;
        }

        public function getUsername($userId)
        {
            try {
                $stmt = $this->_db->prepare('SELECT * FROM users WHERE id LIKE :userId');
                $stmt->bindParam(":userId", $userId);
                $stmt->execute();

                while ($rows = $stmt->fetch()) {
                    $username = $rows[1];
                }
                return $username;
            } catch(Throwable $e) {
                echo $this->message->error($e);
            }
        }

        public function getComments($imgId)
        {
            try {
                $stmt = $this->_db->prepare('SELECT comment, userId FROM comment WHERE imageId LIKE :imageId ORDER BY id DESC');
                $stmt->bindParam(':imageId', $imgId);
                $stmt->execute();

                while ($rows = $stmt->fetch()) {
                    $datas['comment'][] = $rows;
                    $datas['authorMsg'][] = $this->getUsername($rows[1]);
                }
                $datas['numberOfComments'] = count($datas['comment']);
            } catch (Throwable $e) {
                echo $this->message->error($e);
            }

            return $datas;
        }

        public function getNbLike($imgId)
        {
            try {
                $stmt = $this->_db->prepare('SELECT * FROM `like` WHERE imageId LIKE :imageId AND liked LIKE 1');
                $stmt->bindParam(':imageId', $imgId);
                $stmt->execute();

                $nbLike = 0;
                while ($stmt->fetch()) {
                    $nbLike++;
                }
            } catch (Throwable $e) {
                echo $this->message->error($e);
            }

            return $nbLike;
        }

        public function getLikedStatus($imgId)
        {
            try {
                $stmt = $this->_db->prepare('SELECT * FROM `like` WHERE imageId LIKE :imageId AND userId LIKE :userId');
                $stmt->bindParam(':imageId', $imgId);
                $stmt->bindParam(':userId', $this->userId);
                $stmt->execute();

                while ($row = $stmt->fetch()) {
                    if ($imgId == $row[2]) {
                        return $row[3];
                    }
                }
            } catch (Throwable $e) {
                echo $this->message->error($e);
            }
        }

        public function datasArchitecture()
        {
            $imageId = $this->getImagesID();
            $datas = [];

            try {
                foreach ($imageId as $imgId) {

                    // IMAGE REQUEST
                    $imageDatas = $this->getImg($imgId[0]);
                    $datas['id'][] = $imageDatas[0][0];
                    $datas['images'][] = $imageDatas[0][1];
                    $datas['date'][] = $imageDatas[0][3];
                    $datas['authorsImages'][] = $imageDatas[0][5];
                    $datas['numberOfImages'] = $imageDatas[1];

                    // COMMENTS DATAS REQUEST
                    $commentDatas = $this->getComments($imgId[0]);
                    $datas['comments'][] = $commentDatas;

                    // NUMBER OF LIKE REQUEST
                    $datas['likes'][] = $this->getNbLike($imgId[0]);

                    // LIKED STATUS REQUEST
                    if ($this->userIsConnected) {
                        $datas['likesStatus'][] = $this->getLikedStatus($imgId[0]);
                        $datas['userIsConnected'] = 1;
                    } else {
                        $datas['userIsConnected'] = 0;
                    }
                }

                $this->responseJson('success', 'request is done', $datas);
            } catch (Throwable $e) {
                $this->responseJson('error', 'FAIL: '.$e, null);
            }
        }
    }
