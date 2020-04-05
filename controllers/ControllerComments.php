<?php

    class ControllerComments extends Controller
    {
        public function commentsPage()
        {
            $view = new ViewComment();

            $view->build_page();
        }

        function middlewareComments()
        {
            $action = new Comments();
            $requestType = filter_input(INPUT_GET, "req");
            $imgId = filter_input(INPUT_GET, "imgId");

            if ($requestType == 'get') {
                $option = filter_input(INPUT_GET, "option");
                $action->get($imgId, $option);

                return true;
            } else if ($requestType == 'post') {
                $comment = filter_input(INPUT_POST, "comment");
                var_dump($imgId, $comment);
                $action->post(filter_input(INPUT_GET, "imgId"), $comment);

                return true;
            }
        }
    }