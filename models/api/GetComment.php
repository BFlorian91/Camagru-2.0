<?php

    class GetComments extends Model
    {
        private $_db;

        public function __construct()
        {
            parent::__construct();
            $this->_db = $this->connect();
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
            if ($imgId == null) {
                $this->responseJson('error', 'FAIL: missing image ID...', null);
                return false;
            }
            try {
                $stmt = $this->_db->prepare('SELECT comment, userId FROM comment WHERE imageId LIKE :imageId ORDER BY id DESC');
                $stmt->bindParam(':imageId', $imgId);
                $stmt->execute();

                while ($rows = $stmt->fetch()) {
                    $datas['comment'][] = $rows;
                    $datas['authorMsg'][] = $this->getUsername($rows[1]);
                }
                $datas['numberOfComments'] = count($datas['comment']);
                $this->responseJson('success', 'request is done', $datas);
            } catch (Throwable $e) {
                $this->responseJson('error', 'FAIL: '.$e, null);
            }

            return $datas;
        }
    }