<?php
//Init.php defines error displays and init setup
require_once(__DIR__."/config/init.php");

//Special twig autoloader
require_once (__DIR__.'/vendor/twig/twig/lib/Twig/Autoloader.php');
Twig_Autoloader::register();

//Generel autoloader from composer
require('vendor/autoload.php');



//Defined paths and database connections
require_once(__DIR__."/config/paths.php");
require_once(__DIR__."/config/db.php");

//Bootstrap routing
require_once(LIBS."bootstrap.php");

//TODO Fix så man kan køre themes -> Spørg Lars
$theme = "";
$application = new \libs\bootstrap($theme);
