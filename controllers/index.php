<?php

namespace controllers;

class index extends \libs\controller {
    public function __construct() {
        parent::__construct();
        $this->view->render("home");
    }
}