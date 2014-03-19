<?php

namespace libs;

class controller {
    public $view;

    public function __construct() {
        $this->view = new \libs\view();
    }
}