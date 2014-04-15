<?php

Class UserController extends BaseController {
    public function getUsers() {

    }

    public function createUser() {
        $validator = Validator::make(Input::all(),
            array(
                'username'          => 'required|max:10|min:3|unique:Users',
                'password'          => 'required|min:6|max:30',
            )
        );

        if($validator->fails()) {
            return Redirect::route('admin-settings')->withErrors($validator)->withInput()->with("global","Validation errors");
        } else {
            $username   = Input::get('username');
            $password   = Hash::make(Input::get('password'));

            $user = new Users();

            $user->setUsername($username);
            $user->setPassword($password);

            Doctrine::persist($user);
            Doctrine::flush();
            return Redirect::route('admin-settings')
                ->with("global", "User has been created");
        }
    }

    public function deleteUser() {
        $userId = Input::get("id");

        $user = Doctrine::find("Users", $userId);

        Doctrine::remove($user);
        Doctrine::flush();

        return "User has been deleted";

    }
}