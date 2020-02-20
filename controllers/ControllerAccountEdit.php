<?php

  class ControllerAccountEdit extends Controller
  {
    public function CreateView()
    {
      $view = new ViewAccountEdit();
      $action = new ModelEditAccount();

      if (isset($_POST['editUsername'])) {
        $editUsername = htmlspecialchars($_POST['editUsername']);
        $action->editUsername($editUsername);
      }
      if (isset($_POST['editEmail'])) {
        $editEmail = htmlspecialchars($_POST['editEmail']);
        $action->editEmail($editEmail);
      }
      $view->build_page();
    }
  }