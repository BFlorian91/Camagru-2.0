<?php

class ControllerGallery extends Controller
{
    public static function createView()
    {
        $view = new ViewGallery();
        $action = new ModelGallery();

        $imageId = filter_input(INPUT_POST, 'imageId');
        $like = filter_input(INPUT_POST, 'like');

        $action->fetchAllImg();
        if (! (empty($imageId) && empty($like) == 1)) {
            if (trim($_SESSION['token']) != '') {
                $datas = $action->likeGestion();
                echo json_encode($datas);

                return true;
            }
        }

        $view->build_page();
    }

    public function getLikeStatus()
    {
        $action = new ModelGallery();

        $datas = $action->getLikeStatus();
        echo json_encode($datas);
        // header("Location: explore");
        // var_dump(json_encode($datas));
        // echo json_encode("13");
        return true;
    }

    public function commentsPage()
    {
        $view = new ViewComment();
        $action = new ModelGallery();
        $comment = trim(filter_input(INPUT_POST, 'comment'));

        if (isset($comment) && $comment != '') {
            if (trim($_SESSION['token']) != '') {
                $action->postComment();
            }
        }
        $action->fetchComment();
        $view->build_page();
    }

    public function userGallery()
    {
        $view = new ViewUserGallery();
        $view->build_page();
    }
}
