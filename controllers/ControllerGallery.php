<?php

class ControllerGallery extends Controller
  {

    public static function createView()
    {
      $view = new ViewGallery();
      $action = new ModelGallery();

      $action->fetchAllImg();
      if (isset($_POST['imageId']) && isset($_POST['commentPage']) == 1) {
        $view = new ViewComment();
        $action->fetchComment();
      }
      if (isset($_POST['comment']) && isset($_POST['imageId'])) {
        die("test hello");
      }
      if (isset($_POST['imageId']) && isset($_POST['like']) == 1) {
        $action->likeGestion();
      }
      $view->build_page();
    }

    public function userGallery()
    {
      $view = new ViewUserGallery();
      $view->build_page();
    }
  }