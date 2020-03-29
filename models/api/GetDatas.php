<?php

    class GetDatas extends Model
    {
        private $_db;

        public function __construct()
        {
            parent::__construct();
            $this->_db = $this->connect();
        }

        public function getAllImg($imgId)
        {
            try {
                $stmt = $this->_db->prepare('SELECT id, img, imgDate FROM gallery WHERE id LIKE :imgId');
                $stmt->bindParam(":imgId", $imgId);
                $stmt->execute();

                for ($i = 0; $i < count($this->getImagesID()); $i++) {
                    $numberOfImages = $i;
                }
                $numberOfImages > 1 ? $numberOfImages++ : 0;

                $datas = $stmt->fetchAll();
                $datas[] = $numberOfImages;
            } catch (Throwable $e) {
                echo $this->message->success($e);
            }

            return $datas;
        }

        public function getComments($imgId)
        {
            try {
                $stmt = $this->_db->prepare('SELECT comment FROM comment WHERE imageId LIKE :imageId');
                $stmt->bindParam(':imageId', $imgId);
                $stmt->execute();

                $datas['comment'] = $stmt->fetchAll();
                $datas['numberOfComments'] = count($datas['comment']);
            } catch (Throwable $e) {
                echo $this->message->success($e);
            }

            return $datas;
        }

        public function getNbLike($imgId)
        {
            try {
                $stmt = $this->_db->prepare('SELECT * FROM `like` WHERE imageId = :imageId AND liked = 1');
                $stmt->bindParam(':imageId', $imgId);
                $stmt->execute();

                $nbLike = 0;
                while ($stmt->fetch()) {
                    $nbLike++;
                }
            } catch (Throwable $e) {
                echo $this->message->success($e);
            }

            return $nbLike;
        }

        public function getLikedStatus($imgId)
        {
            try {
                $stmt = $this->_db->prepare('SELECT * FROM `like` WHERE imageId = :imageId AND userId = :userId');
                $stmt->bindParam(':imageId', $imgId);
                $stmt->bindParam(':userId', $this->userId);
                $stmt->execute();

                while ($row = $stmt->fetch()) {
                    if ($imgId == $row[2]) {
                        return $row[3];
                    }
                }
            } catch (Throwable $e) {
                echo $this->message->success($e);
            }
        }

        public function fetchDatas()
        {
            $imageId = $this->getImagesID();
            $datas = [];

            try {
                foreach ($imageId as $imgId) {

                    // IMAGE REQUEST
                    $imageDatas = $this->getAllImg($imgId[0]);
                    $datas['images'][] = $imageDatas[0][1];
                    $datas['date'][] = $imageDatas[0][2];
                    $datas['numberOfImages'] = $imageDatas[1];

                    // COMMENTS REQUEST
                    $commentDatas = $this->getComments($imgId[0]);
                    $datas['comments'][] = $commentDatas;

                    // NUMBER OF LIKE REQUEST
                    $datas['likes'][] = $this->getNbLike($imgId[0]);

                    // LIKED STATUS REQUEST
                    if ($this->userIsConnected) {
                        $datas['likesStatus'][] = $this->getLikedStatus($imgId[0]);
                    }
                }

                $this->responseJson('success', 'request is done', $datas);
            } catch (Throwable $e) {
                $this->responseJson('error', 'FAIL: '.$e, null);
            }
        }
    }
