<?php

namespace libs;
class controller {
    public $view;
    public $subsite;

    public function __construct() {
        $this->view = new \libs\view();
        $this->subsite = $this->getSubsite();
    }

    public function getSubsite() {
        $subsite = $_SERVER["SERVER_NAME"];
        $subsite = explode(".", $subsite);
        if(count($subsite) > 2) {
            return $subsite[0];
        } else {
            return false;
        }
    }

    public function pget($post) {
        if(isset($_REQUEST[$post])) {
            return $_REQUEST[$post];
        }
    }

    public function getOutput($page = null, $data = array()) {
        $data["site"] = $this->getSubsite();
        $this->view->render($page, $data);
    }
}