<?php

  class ControllerMontage extends Controller
  {
    public function CreateView()
    {
      $view = new ViewMontage();
      $action = new modelMontage();

      if (isset($_FILES['photoUpload'])) {
        $action->uploadImage($_FILES['photoUpload']);
      }
      $view->build_page();
    }
  }