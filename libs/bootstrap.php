<?php

namespace libs;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
class bootstrap extends \libs\controller{
    public function __construct() {
        //DOCTRIN EM
        $paths = array(MODELS);
        $isDevMode = true;

        // the connection configuration

        if($this->getSubsite() != false) {
            $dbName = $this->getSubsite();
        } else {
            $dbName = "noSite";
        }

        $dbParams = array(
            'driver'   => 'pdo_mysql',
            'host'     => 'mysql29.unoeuro.com',
            'user'     => 'baademedia_dk',
            'password' => '1000koder',
            'dbname'   => $dbName,
        );

        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
        $GLOBALS["em"] = EntityManager::create($dbParams, $config);



        //ROUTING
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
        } else if(isset($url[1])) {
            $controller->$url[1]();
        } else {
            $controller->index();
        }
    }
}