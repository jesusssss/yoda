<?php

Class PageController extends BaseController {

    public static function getAllPages() {
        $q = Doctrine::createQuery("SELECT p FROM Page p ORDER BY p.sort ASC");
        return $q->getResult();
    }

    public static function getPageContent($page = null) {
        if(!isset($page)) {
            if(Input::get("name")) {
                $q = Doctrine::createQuery("SELECT p.content FROM Page p WHERE p.name = :page");
                $q->setParameters(
                    array(
                        "page" => Input::get("name")
                    )
                );
            } else {
                $q = Doctrine::createQuery("SELECT p.content FROM Page p WHERE p.sort = (select min(b.sort) from Page b)");
            }
        } else {
            $q = Doctrine::createQuery("SELECT p.content FROM Page p WHERE p.name = :page");
            $q->setParameters(
                array(
                    "page" => $page
                )
            );
        }
        $q->setMaxResults(1);

        if($q->getResult()) {
            return $q->getResult();
        } else {
            return false;
        }
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

        $validator = Validator::make(Input::all(),
            array(
                "pagename" => "required|min:1"
            )
        );

        if($validator->fails()) {
            return Redirect::route("admin-pages")
                ->with("global", "Page title must contain min 1 character");
        } else {

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
    }

    public function editPage() {

        $id     = Input::get("id");
        $value  = Input::get("value");
        $field  = Input::get("field");
        $token  = Input::get("token");

        if(is_array($token)) {
            $q = Doctrine::createQuery("UPDATE Page p SET p.content = :val WHERE p.name = :tokendata");
            $q->setParameters(
                array(
                    "val" => $value,
                    "tokendata" => $token[1]
                )
            );
        } else {
            if($field == "name") {
                $q = Doctrine::createQuery("UPDATE Page p SET p.name = :val WHERE p.id = :tokendata");
            } else {
                $q = Doctrine::createQuery("UPDATE Page p SET p.active = :val WHERE p.id = :tokendata");
            }
            $q->setParameters(
                array(
                    "val" => $value,
                    "tokendata" => $id
                )
            );
        }

        if($q->execute()) {
            return "Information updated";
        } else {
            return "Error in updating. Try again later";
        }
    }

    public function editSort() {
        $id = Input::get("id");
        $pos = Input::get("pos");

        $q = Doctrine::createQuery("UPDATE Page p SET p.sort = :pos WHERE p.id = :id");
        $q->setParameters(array("pos" => $pos, "id" => $id));

        if($q->execute()) {
            return "Sort updated";
        } else {
            return "Sorting failed, try again later";
        }
    }

    public function postPage() {

        $id     = Input::get("id");
        $value  = Input::get("value");

            $q = Doctrine::createQuery("UPDATE Page p SET p.content = :val WHERE p.id = :id");
            $q->setParameters(
                array(
                    "val" => $value,
                    "id" => $id
                )
            );

        if($q->execute()) {
            return "Information updated";
        } else {
            return "Error in updating. Try again later";
        }
    }

    public function deletePage() {

        $id = Input::get("id");
        $page = Doctrine::getRepository("Page")->find($id);
        Doctrine::remove($page);
        Doctrine::flush();

        return "Page has been deleted";
    }
}