<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
View::addNamespace('admin', __DIR__.'/views/admin');
View::addNamespace('theme', __DIR__.'/views/site');

Route::get('/', function()
{
	return View::make('theme::index');
});