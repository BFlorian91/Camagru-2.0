<?php

    Route::set('home', function() {
      ControllerList::CreateView('ViewList');
    });

    Route::set('signin', function() {
      ControllerSignin::CreateView('ViewSignin');
    });

    Route::set('signup', function() {
      ControllerSignup::CreateView('ViewSignup');
    });

    Route::set('account', function() {
      ControllerAccount::CreateView('ViewAccount');
    });

    Route::set('not-available', function() {
      ControllerNotAvailable::CreateView('ViewNotAvailable');
    });
    // Route::set('contact-us', function() {
    //   ControllerContact::CreateView('ViewContact');
    // });