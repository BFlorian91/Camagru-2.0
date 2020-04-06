<?php

    class ControllerComments extends Controller
    {
        public function commentsPage()
        {
            $view = new ViewComment();

            $view->build_page();
        }

        public function middlewareComments()
        {
            $action = new Comments();
            $requestType = htmlspecialchars(filter_input(INPUT_GET, "req"));
            $imgId = htmlspecialchars(filter_input(INPUT_GET, "imgId"));

            if ($requestType == 'get') {
                $option = filter_input(INPUT_GET, "option");
                $action->get($imgId, $option);

                return true;
            } else if ($requestType == 'post') {
                $comment = filter_input(INPUT_POST, "comment");
                $action->post(filter_input(INPUT_GET, "imgId"), $comment);

                return true;
            }
        }
    }