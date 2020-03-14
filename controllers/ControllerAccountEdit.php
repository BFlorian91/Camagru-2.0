<?php

  class ControllerAccountEdit extends Controller
  {
    public function createView()
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
      if (isset($_POST['newPassword']) && isset($_POST['confirmPassword'])) {
        $newPassword = htmlspecialchars($_POST['newPassword']);
        $confirmPassword = htmlspecialchars($_POST['confirmPassword']);
        $action->editPassword($newPassword, $confirmPassword);
      }
      if (isset($_POST['mailNotifSub'])) {
        if (!isset($_POST['toggle'])) {
          $status = '2';
        } else if (isset($_POST['toggle'])) {
          $status = '1';
        }
        $action->mailNotif($status);
      }
      $view->build_page();
    }
  }