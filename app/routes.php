<?php

/*
 * Index page of site
 */
Route::get('/', array(
    "as" => "home",
    "uses" => "HomeController@index"
));

Route::get('/site/{page}', array(
    "as" => "home-subpage",
    "uses" => "HomeController@subpage"
));

Route::get('/error/404', array("as" => "error"), function() {
    return View::make('errors.missing');
});

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

    /*
     * Activation code request
     */
    Route::get('/account/activate/{code}', array(
        'as' => 'account-activate',
        'uses' => 'AccountController@getActivate'
    ));
});

/*
 * Group for admin system
 */
Route::group(array('prefix' => 'admin'), function() {

    /*
     * Group for guests
     */
    Route::group(array('before' => 'guest'), function() {

        /*
         * Safe for outcommers to post to it
         */
        Route::group(array('before' => 'csrf'), function() {
            Route::post('/login', array(
                "as" => "admin-login-post",
                "uses" => "AdminController@postLogin"
            ));
        });

        /*
         * Guests only get login page
         */
        Route::get('/login', array(
            "as" => "admin-login-get",
            "uses" => "AdminController@getLogin"
        ));
    });

    /*
     * Group for authendicated users
     */
    Route::group(array('before' => 'auth'), function() {

        Route::get("/", array(
            "as" => "adminHome",
            "uses" => "AdminController@index"
        ));

        Route::get("/signout", array(
            "as" => "admin-signout",
            "uses" => "AdminController@signOut"
        ));

        Route::get("/pages", array(
            "as" => "admin-pages",
            "uses" => "PageController@getPages"
        ));

        Route::get("/cart", array(
            "as" => "admin-cart",
            "uses" => "AdminController@getCart"
        ));

        Route::get("/settings", array(
            "as" => "admin-settings",
            "uses" => "AdminController@getSettings"
        ));

        Route::post("/pages/create", array(
            "as" => "admin-page-create",
            "uses" => "PageController@createPage"
        ));

        Route::post("/pages/edit", array(
            "as" => "admin-page-edit",
            "uses" => "PageController@editPage"
        ));

        Route::post("/pages/post", array(
            "as" => "admin-page-post",
            "uses" => "PageController@postPage"
        ));

        Route::post("/pages/delete", array(
            "as" => "admin-page-delete",
            "uses" => "PageController@deletePage"
        ));

        Route::post("/pages/getContent", array(
            "as" => "admin-page-get-content",
            "uses" => "PageController@getPageContent"
        ));
    });
});
