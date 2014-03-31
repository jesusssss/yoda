<?php

/*
 * Get to index page
 */
Route::get('/', array(
    "as" => "home",
    "uses" => "HomeController@index"
));

/*
 * None authenticated users (Guests)
 */
Route::group(array('before' => 'guest'), function() {

    /*
     * Protection for cross-site sessions
     */
    Route::group(array('before' => 'csrf'), function() {
        /*
         * Create page (POST AND PROTECTED)
         */
        Route::post('/account/create', array(
            "as" => "account-create-post",
            "uses" => "AccountController@postCreate"
        ));
    });

    /*
     * Create page (GET)
     */
    Route::get('/account/create', array(
        "as" => "account-create",
        "uses" => "AccountController@getCreate"
    ));

    Route::get('/account/activate/{code}', array(
        'as' => 'account-activate',
        'uses' => 'AccountController@getActivate'
    ));
});

Route::group(array('prefix' => 'admin'), function() {

    Route::group(array('before' => 'guest'), function() {
       Route::group(array('before' => 'csrf'), function() {

       });

     Route::get('/', array(
         "as" => "adminHome",
         "uses" => "AdminController@index"
     ));
    });

});