<?php

    Route::set('explore', function() {
      ControllerGallery::CreateView('ViewGallery');
    });

    Route::set('signin', function() {
      ControllerSignin::CreateView('ViewSignin');
    });
    
    Route::set('signup', function() {
      ControllerSignup::CreateView('ViewSignup');
    });

    Route::set('logout', function() {
      ControllerSignup::CreateView('ViewNotAvailable');
    });

    Route::set('edit-account', function() {
      ControllerAccountEdit::CreateView('ViewAccountEdit');
    });

    Route::set($_SESSION['userName'], function() {
      ControllerSignin::CreateView('ViewUserGallery');
    });

    Route::set('personal-montage', function() {
      ControllerSignin::CreateView('ViewMontage');
    });

    Route::set('not-available', function() {
      ControllerNotAvailable::CreateView('ViewNotAvailable');
    });
