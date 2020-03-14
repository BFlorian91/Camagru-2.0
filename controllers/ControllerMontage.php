<?php

  class ControllerMontage extends Controller
  {
    public function createView()
    {
      $view = new ViewMontage();
      $action = new ModelMontage();

      if (isset($_FILES['imageUpload'])) {
        $action->uploadImage();
        $action->pushImgToDb();
      }
      if (isset($_POST['takePhoto'])) {
        $action->getImage();
        $action->pushImgToDb();
      }
      $view->build_page();
    }
  }