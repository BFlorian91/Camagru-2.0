<?php

    Route::set('explore', function() {
      ControllerGallery::gallery();
    });

    Route::set('signin', function() {
      ControllerSignin::CreateView();
    });
    
    Route::set('signup', function() {
      ControllerSignup::CreateView();
    });

    Route::set('logout', function() {
      ControllerLogout::CreateView();
    });

    Route::set('edit-account', function() {
      if (trim($_SESSION['token'])) {
        ControllerAccountEdit::CreateView();
      }
      ControllerGallery::gallery();
    });

    Route::set('user', function() {
      if (trim($_SESSION['token'])) {
        ControllerGallery::userGallery();
      } else {
        ControllerSignin::CreateView();
      }
    });

    Route::set('personal-montage', function() {
      if (trim($_SESSION['token'])) {
        ControllerMontage::CreateView();
      } else {
        ControllerGallery::gallery();
      }
    });

    Route::set('not-available', function() {
      ControllerNotAvailable::CreateView();
    });

    Route::set('setup', function() {
      ControllerSetup::CreateView();
    });


    // ----- fetch ajax ----- //

    Route::set('getAllImg', function() {
      ControllerGallery::getAllImg();
    });

    Route::set('getUserImg', function() {
      ControllerGallery::getUserImg();
    });

    // --------------------- //