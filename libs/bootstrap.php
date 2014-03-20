<?php

namespace libs;
class bootstrap {
    public function __construct() {
        if(!isset($_REQUEST["rt"])) {
            $controller = new \controllers\index();
        } else {
            $url = $_REQUEST["rt"];
            $url = rtrim($url, '/');
            $url = explode('/', $url);
            if(file_exists(CONTROLLERS.$url[0].".php")) {
                $c = "\\controllers\\".$url[0];
                $controller = new $c();
            } else {
                $controller = new \controllers\error();
                return false;
            }
        }
        if(isset($url[2])) {
            $controller->$url[1]($url[2]);
        } else {
            if(isset($url[1])) {
                $controller->$url[1]();
            }
        }
    }
}