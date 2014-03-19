<?php

namespace controllers;

use libs\controller;

class error extends controller {
    public function __construct() {
        parent::__construct();
        $this->view->render("error");
    }
}