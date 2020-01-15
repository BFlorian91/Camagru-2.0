<?php

    Route::set('home', function() {
      ControllerGallery::CreateView('ViewGallery');
    });

    Route::set('signin', function() {
      ControllerSignin::CreateView('ViewSignin');
    });
    
    Route::set('signup', function() {
      ControllerSignup::CreateView('ViewSignup');
    });

    Route::set('personal-gallery', function() {
      ControllerSignin::CreateView('ViewUserGallery');
    });

    Route::set('personal-montage', function() {
      ControllerSignin::CreateView('ViewMontage');
    });

    Route::set('not-available', function() {
      ControllerNotAvailable::CreateView('ViewNotAvailable');
    });
