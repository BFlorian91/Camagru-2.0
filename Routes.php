<?php

    Route::set('explore', function() {
      ControllerGallery::CreateView('ViewGallery');
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
      ControllerGallery::CreateView();
    });

    Route::set('user', function() {
      if (trim($_SESSION['token'])) {
        ControllerUserGallery::CreateView();
      } else {
        ControllerSignin::CreateView();
      }
    });

    Route::set('personal-montage', function() {
      if (trim($_SESSION['token'])) {
        ControllerMontage::CreateView();
      } else {
        ControllerGallery::CreateView();
      }
    });

    Route::set('not-available', function() {
      ControllerNotAvailable::CreateView();
    });

    Route::set('setup', function() {
      ControllerSetup::CreateView();
    });
