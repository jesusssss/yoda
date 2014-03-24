<?php

namespace controllers;

class index extends \libs\controller {
    public function __construct($index = null) {
        parent::__construct();
        if(isset($index)) {
            self::index();
        }
    }

    public function index() {
        $this->getOutput();
    }

    public function getOutput($page = null, $data = array()) {
        $this->view->render($page, $data);
    }
}