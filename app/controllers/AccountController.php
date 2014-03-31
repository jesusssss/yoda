<?php

class AccountController extends BaseController {

    public function getCreate() {
        return View::make("account.create");
    }

    public function postCreate() {
        $validator = Validator::make(Input::all(),
            array(
                'email'             => 'required|max:100|email|unique:users',
                'username'          => 'required|max:50|min:3|unique:users',
                'password'          => 'required|min:6',
                'password_again'    => 'required|same:password'
            )
        );

        if($validator->fails()) {
            return Redirect::route('account-create')->withErrors($validator)->withInput();
        } else {

            $email      = Input::get('email');
            $username   = Input::get('username');
            $password   = Input::get('password');

            //Activation code
            $code       = str_random(60);

            $user = User::create(array(
                'email'     => $email,
                'username'  => $username,
                'password'  => Hash::make($password),
                'code'      => $code,
                'active'    => 0
            ));

            Mail::send('emails.auth.activate', array('link' => URL::route('account-activate', $code), 'username' => $username), function($message) use ($user) {
                $message->to($user->email, $user->username)->subject('Activate your account');
            });

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