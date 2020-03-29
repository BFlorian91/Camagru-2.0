<?php

class ModelComments extends Model
{
    public function fetchCommentImage()
    {
        $stmt = $this->_db->prepare('SELECT * FROM gallery WHERE id = :imageId');
        $stmt->bindParam(':imageId', filter_input(INPUT_POST, 'imageId'));
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function postComment()
    {
        $stmt = $this->_db->prepare('INSERT INTO comment(userId, imageId, comment) VALUE(:userId, :imageId, :comment)');
        $stmt->bindParam(':userId', $this->userId);
        $stmt->bindParam(':imageId', filter_input(INPUT_POST, 'imageId'));
        $stmt->bindParam(':comment', filter_input(INPUT_POST, 'comment'));
        $stmt->execute();
    }

    public function fetchComment()
    {
        $stmt = $this->_db->prepare('SELECT * FROM comment WHERE imageId = :imageId ORDER BY id DESC');
        $stmt->bindParam(':imageId', filter_input(INPUT_POST, 'imageId'));
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function fetchUsername($userId)
    {
        $stmt = $this->_db->prepare('SELECT * FROM users');
        $stmt->execute();
        $users = $stmt->fetchALL();

        foreach ($users as $user) {
            if ($user[0] == $userId) {
                return $user[1];
            }
        }
    }
}