<?php

    Route::set('explore', function () {
        ControllerGallery::createView();
    });

    Route::set('signin', function () {
        ControllerSignin::signin();
    });

    Route::set('signup', function () {
        ControllerSignup::signup();
    });

    Route::set('logout', function () {
        ControllerLogout::logout();
    });

    Route::set('edit-account', function () {
        if (trim($_SESSION['token'])) {
            ControllerAccountEdit::createView();
        }
        ControllerGallery::createView();
    });

    Route::set('user', function () {
        if (trim($_SESSION['token'])) {
            ControllerGallery::userGallery();
        } else {
            ControllerSignin::signin();
        }
    });

    Route::set('comments', function () {
        ControllerComments::commentsPage();
    });

    Route::set('personal-montage', function () {
        if (trim($_SESSION['token'])) {
            ControllerMontage::createView();
        } else {
            ControllerGallery::createView();
        }
    });

    Route::set('not-available', function () {
        ControllerNotAvailable::createView();
    });

    Route::set('setup', function () {
        ControllerSetup::setup();
    });



    // // ----- API ----- //

    Route::set('getLikeStatus', function() {
      ControllerGallery::getLikeStatus();
    });

    Route::set('getNbComments', function() {
        ControllerGallery::getNbComments();
    });

    Route::set('datas_camagru', function() {
        ControllerGallery::getDatas();
    });

    Route::set('api_comments', function() {
        ControllerComments::middlewareComments();
    });

    // // --------------------- //
