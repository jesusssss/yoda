<?php

class AdminController extends BaseController {

    public function index() {
        return View::make('admin.home');
    }

    public function login() {
        return View::make('admin.login');
    }

}