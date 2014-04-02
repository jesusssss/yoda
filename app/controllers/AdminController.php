<?php

Class AdminController extends \BaseController {

    /*
     * Goto admin homepage
     */
    public function index() {
        return View::make("admin.home");
    }

    /*
     * Try login
     */
    public function postLogin() {

        $validator = Validator::make(Input::all(),
            array (
                'username'  =>  'required|max:10',
                'password'  =>  'required|min:3'
            )
        );

        if($validator->fails()) {
            return Redirect::route('admin-login-get')
                ->withErrors($validator)
                ->withInput();
        } else {
            //die(Hash::make("1000koder"));
            $user = Auth::attempt(array(
                        "username" => Input::get("username"),
                        "password" => Input::get("password")
                    ));
            if($user) {
                return Redirect::intended(URL::route("adminHome"));
            } else {
                return Redirect::route("admin-login-get")
                    ->with("global", "Username/Password wrong.");
            }
        }

        return Redirect::route("admin-login-get")
            ->with("global", "There was a problem signing you in.");
    }

    /*
     * Get login page
     */
    public function getLogin() {
        return View::make("admin.login");
    }

    /*
     * Signout user
     */
    public function signOut() {
        Auth::logout();
        return Redirect::route("admin-login-get")
            ->with("global", "You have been signed out");
    }

    /*
     * Get Cart
     */
    public function getCart() {
        return Redirect::route("adminHome")
            ->with("global", "Shop is deactivated");
    }

    /*
     * Get Settings
     */
    public function getSettings() {
        return View::make("admin.settings");
    }

}