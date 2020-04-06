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

    public function middlewareImages()
    {
        $action = new Images();
        $requestType = htmlspecialchars(filter_input(INPUT_GET, "req"));
        $imgId = htmlspecialchars(filter_input(INPUT_GET, "imgId"));

        if ($requestType == 'get') {
            $action->get();

            return true;
        } else if ($requestType == 'post') {
            var_dump("Hello World");
            // $comment = filter_input(INPUT_POST, "comment");
            // $action->post(filter_input(INPUT_GET, "imgId"), $comment);

            return true;
        }
    }

    public function userGallery()
    {
        $view = new ViewUserGallery();
        $view->build_page();
    }
}
