<?php

    class Comments extends Model
    {
        private $_db;

        public function __construct()
        {
            parent::__construct();
            $this->_db = $this->connect();
        }

        public function get($imgId, $option)
        {
            if ($imgId == null) {
                $this->responseJson('error', 'FAIL: missing image ID...', null);

                return false;
            }
            try {
                // SHOW LAST MESSAGE OPTION
                if ($option == 'last') {
                    $stmt = $this->_db->prepare('SELECT comment, userId FROM comment WHERE imageId LIKE :imageId ORDER BY id DESC LIMIT 1');
                    $stmt->bindParam(':imageId', $imgId);
                } 

                // SHOW ALL MESSAGE 
                else {

                    $stmt = $this->_db->prepare('SELECT comment, userId FROM comment WHERE imageId LIKE :imageId ORDER BY id DESC');
                    $stmt->bindParam(':imageId', $imgId);
                }
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

        
        public function post($imgId, $comment)
        {
            try {
                $stmt = $this->_db->prepare('INSERT INTO comment(userId, imageId, comment) VALUE(:userId, :imageId, :comment)');
                $stmt->bindParam(':userId', $this->userId);
                $stmt->bindParam(':imageId', $imgId);
                $stmt->bindParam(':comment', $comment);

                $stmt->execute();
            } catch (Throwable $e) {
                $this->message->error($e);
            }
        }
    }
