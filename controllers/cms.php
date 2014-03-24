<?php

namespace controllers;

class cms extends \libs\controller {

    private $theme;

    public function __construct() {
        $this->theme = $this->getSubsite();
    }

    public function addPage() {
        $pageName = $this->pget("cms-name");
        $pageLink = $this->pget("cms-link");
        $pageType = $this->pget("cms-type");

        $menu = new \models\menu();
        $menu->setTitle($pageName);
        $menu->setUrl($pageLink);
        $menu->setType($pageType);

        $GLOBALS["em"]->persist($menu);
        $GLOBALS["em"]->flush();

        header( 'Location: /admin/pages' ) ;
    }

    public function getPage() {
        //TODO funktion til at få alle pages ud til tilhørende site
    }


}