<?php

    class ControllerComments extends Controller
    {
        public function commentsPage()
        {
            $view = new ViewComment();
            $action = new ModelComments();
            $imageId = filter_input(INPUT_POST, "imageId");
            // var_dump($imageId);
            $comment = trim(filter_input(INPUT_POST, 'comment'));
    
            if (isset($imageId) && $imageId != "") {
               $img = $action->fetchCommentImage();
            }
    
            if (isset($comment) && $comment != '') {
                if (trim($_SESSION['token']) != '') {
                    $action->postComment();
                }
            }
            $action->fetchComment();
            $view->build_page();
        }
    }