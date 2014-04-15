<?php

class AccountController extends BaseController {

    public function getCreate() {
        return View::make("account.create");
    }

    public function postCreate() {
        $validator = Validator::make(Input::all(),
            array(
                'username'          => 'required|max:50|min:3|unique:Users',
                'password'          => 'required|min:6',
                'password_again'    => 'required|same:password'
            )
        );

        if($validator->fails()) {
            return Redirect::route('account-create')->withErrors($validator)->withInput();
        } else {

            $username   = Input::get('username');
            $password   = Input::get('password');

            //Activation code
            $code       = str_random(60);

            $user = User::create(array(
                'username'  => $username,
                'password'  => Hash::make($password),
            ));

            if($user) {
                return Redirect::route('home')
                    ->with('global', 'Your account has been created! We have sent you an email');
            }
        }
    }

    public function getActive($code) {
        return $code;
    }

}