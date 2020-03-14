<?php

    Route::set('explore', function() {
      ControllerGallery::createView();
    });

    Route::set('signin', function() {
      ControllerSignin::createView();
    });
    
    Route::set('signup', function() {
      ControllerSignup::createView();
    });

    Route::set('logout', function() {
      ControllerLogout::createView();
    });

    Route::set('edit-account', function() {
      if (trim($_SESSION['token'])) {
        ControllerAccountEdit::createView();
      }
      ControllerGallery::createView();
    });

    Route::set('user', function() {
      if (trim($_SESSION['token'])) {
        ControllerGallery::userGallery();
      } else {
        ControllerSignin::createView();
      }
    });

    Route::set('comment', function() {
      ControllerGallery::createView();
    });

    Route::set('personal-montage', function() {
      if (trim($_SESSION['token'])) {
        ControllerMontage::createView();
      } else {
        ControllerGallery::createView();
      }
    });

    Route::set('not-available', function() {
      ControllerNotAvailable::createView();
    });

    Route::set('setup', function() {
      ControllerSetup::createView();
    });


    // // ----- fetch ajax ----- //

    // Route::set('getAllImg', function() {
    //   ControllerGallery::getAllImg();
    // });

    // Route::set('getUserImg', function() {
    //   ControllerGallery::getUserImg();
    // });

    // // --------------------- //