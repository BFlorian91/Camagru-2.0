<?php

class ControllerGallery extends Controller
  {

    public static function createView()
    {
      $view = new ViewGallery();
      $action = new ModelGallery();

      $imageId = filter_input(INPUT_POST, "imageId");
      $like = filter_input(INPUT_POST, "like");

      $action->fetchAllImg();
      if (isset($imageId) && isset($like) == 1) {
        $action->likeGestion();
      }
      $view->build_page();
    }

    public function commentsPage()
    {
      $view = new ViewComment();
      $action = new ModelGallery();
      $comment = trim(filter_input(INPUT_POST, "comment"));

      if (isset($comment) && $comment != "") {
        $action->postComment();
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