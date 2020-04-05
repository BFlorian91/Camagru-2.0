<?php

class ControllerGallery extends Controller
{
    public function createView()
    {
        $view = new ViewGallery();
        $action = new ModelGallery();

        $imageId = filter_input(INPUT_POST, 'imageId');
        $imageCommentedId = filter_input(INPUT_POST, 'imageCommentedId');
        $like = filter_input(INPUT_POST, 'like');

        if (! (empty($imageId) && empty($like) == 1)) {
            if (trim($_SESSION['token']) != '') {
                $datas = $action->likeGestion();
                echo json_encode($datas);

                return true;
            }
        }
        if (! (empty($imageCommentedId)) ) {
            header("Location: comments?imgId=" . $imageCommentedId);
        }

        $view->build_page();
    }

    // public function commentsImg($imageId)
    // {
    //     die("hello world");
    //     die($imageId);

    //     $action = new ModelComments();
    //     if (isset($imageId) && $imageId != "") {
    //         $datas = $action->fetchCommentImage($imageId);
    //         echo json_encode($datas);
    //      }
    // }

    public function getLikeStatus()
    {
        $action = new ModelGallery();

        $datas = $action->getLikeStatus();
        echo json_encode($datas);

        return true;
    }

    public function getNbComments()
    {
        $action = new ModelGallery();

        $datas = $action->getNbComments();
        echo json_encode($datas);

        return true;
    }

    public function getDatas()
    {
        $action = new GetDatas();
     
        $action->datasArchitecture();

        return true;
    }

    public function userGallery()
    {
        $view = new ViewUserGallery();
        $view->build_page();
    }
}
