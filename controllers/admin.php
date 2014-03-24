<?php

namespace controllers;

class admin extends \libs\controller {
    private $site;

    public function __construct($index = null) {
        parent::__construct();
        $this->site = $this->getSubsite();
        $this->view->setTheme("admin");
        if(isset($index)) {
            self::index();
        }
    }

    public function index() {
        $this->getOutput();
    }

    public function pages() {
        $this->getOutput("pages");
    }

    public function test() {
        $this->getOutput("test", array("info" => "this is a test site"));
    }
}