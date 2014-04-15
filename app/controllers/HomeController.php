<?php

class HomeController extends BaseController {

    public function index() {
        return View::make('home',
            array(
                "menu" => PageController::getAllPages(),
                "content" => PageController::getPageContent()
            ));

    }

    public function subpage($page) {
        if(PageController::getPageContent($page) !== false) {
        return View::make('subpage',
            array(
                "menu" => PageController::getAllPages(),
                "content" => PageController::getPageContent($page)
            ));
        } else {
            return App::abort(404);
        }
    }

}