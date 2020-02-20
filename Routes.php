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
      ControllerAccountEdit::CreateView();
    });

    Route::set($_SESSION['token'], function() {
      if (trim($_SESSION['token'])) {
        ControllerUserGallery::CreateView();
      } else {
        ControllerSignin::CreateView();
      }
    });

    Route::set('personal-montage', function() {
      ControllerSignin::CreateView();
    });

    Route::set('not-available', function() {
      ControllerNotAvailable::CreateView();
    });

    Route::set('setup', function() {
      ControllerSetup::CreateView();
    });
