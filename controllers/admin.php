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

    public function create() {
        $pageName = $this->pget("createpage-name");
        $pageType = $this->pget("createpage-type");
        echo $pageName;
        echo "<br/>";
        echo $pageType;
        $this->getOutput("createpage");
    }

    public function createpage() {
        $this->getOutput("createpage");
    }

    public function test() {
        $this->getOutput("test", array("info" => "this is a test site"));
    }

    public function getOutput($page = null, $data = array()) {
        $data["site"] = $this->getSubsite();
        $this->view->render($page, $data);
    }
}