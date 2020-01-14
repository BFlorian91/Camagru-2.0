<?php

    Route::set('home', function() {
      ControllerGallery::CreateView('ViewGallery');
    });

    Route::set('signin', function() {
      ControllerSignin::CreateView($_SESSION['userName'] != '' ? 'ViewUserGallery' : 'ViewSignin');;
    });

    Route::set('signup', function() {
      ControllerSignup::CreateView('ViewSignup');
    });

    Route::set('not-available', function() {
      ControllerNotAvailable::CreateView('ViewNotAvailable');
    });
