<?php

    class ControllerComments extends Controller
    {
        public function commentsPage()
        {
            $view = new ViewComment();
            $action = new ModelComments();
            $comment = trim(filter_input(INPUT_POST, 'comment'));
    
            if (isset($comment) && $comment != '') {
                if (trim($_SESSION['token']) != '') {
                    $action->postComment();
                }
            }
            $action->fetchComment();
            $view->build_page();
        }

        public function getComments()
        {
            $action = new GetComments();

            $action->getComments(filter_input(INPUT_GET, "imgId"));
            
            return true;
        }

        // public function commentsImg()
        // {
        //     $action = new ModelComments();
        //     $imageId = filter_input(INPUT_POST, "imageId");

        //     if (isset($imageId) && $imageId != "") {
        //         $datas = json_encode($action->fetchCommentImage($imageId));
        //         echo json_encode($datas);
        //      }
        // }
    }