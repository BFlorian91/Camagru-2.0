<?php

  class ControllerMontage extends Controller
  {
    public function CreateView()
    {
      $view = new ViewMontage();
      $action = new ModelMontage();

      if (isset($_FILES['imageUpload'])) {
        $action->uploadImage($_FILES['imageUpload']);
      }
      $view->build_page();
    }
  }