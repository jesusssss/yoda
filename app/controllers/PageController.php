<?php

Class PageController extends BaseController {


    public function getAllPages() {
        $q = Doctrine::createQuery("SELECT p FROM Page p ORDER BY p.id ASC");
        return $q->getResult();
    }


    /*
     * Get Pages
     */
    public function getPages() {
        return View::make("admin.pages", array(
            "data" => self::getAllPages()
        ));
    }

    public function createPage() {

        $q = Doctrine::createQuery("SELECT count(p.name) FROM Page p WHERE p.name = :pagename");
        $q->setParameters(
            array(
                "pagename" => Input::get("pagename")
            )
        );

        if($q->getSingleScalarResult() > 0) {
            return Redirect::route("admin-pages")
                ->with("global", "Pagename already exists. Please try again with another name");
        } else {
            $page = new Page;
            $page->setName(Input::get("pagename"));
            $page->setActive(Input::get("pageactive"));
            Doctrine::persist($page);
            Doctrine::flush();

            return Redirect::route("admin-pages")
                ->with("global", "Page has been created");
        }
    }

    public function editPage($id) {

        $q = Doctrine::createQuery("SELECT p FROM Page p WHERE p.id = :id");
        $q->setParameters(
            array(
                "id" => $id
            )
        );

        $data = $q->getResult();

        return View::make("admin.pageEdit", array(
            "data" => $data
        ));

    }


}