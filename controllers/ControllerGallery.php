<?php

class ControllerGallery extends Controller
{
    public function createView()
    {
        $view = new ViewGallery();
        $action = new ModelGallery();

        $imageId = filter_input(INPUT_POST, 'imageId');
        $like = filter_input(INPUT_POST, 'like');

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
     
        $action->fetchDatas();

        return true;
    }

    public function userGallery()
    {
        $view = new ViewUserGallery();
        $view->build_page();
    }
}
