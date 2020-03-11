<?php

  class ControllerGallery extends Controller
  {

    public static function gallery()
    {
      $view = new ViewGallery();
      $action = new ModelGallery();

      $action->fetchAllImg();
      if (isset($_POST['imageId']) && isset($_POST['comment']) == 1) {
        $view = new ViewComment();
        $action->comment();
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

    // public function getAllImg()
    // {
    //   // die($this->_action . "OK");
    //   $action = new ModelGallery();
    //   $action->fetchAllImg();
    //   // $this->_action->fetchAllImg();
    // // }

    // public function getUserImg()
    // {
    //   $action = new ModelGallery();
    //   $action->fetchUserImg();
    // }

    // inprogress
    // public function like()
    // {
    //   if (isset($_POST["imageId"])) {
    //     die("coucou");
    //     $action = new ModelGallery();
    //     $action->likeGestion();
    //   }
    // }
    ///////////////

  }