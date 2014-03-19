<?php
namespace libs;

class view {
    public $twig;
    public $loader;
    public $template;

    public function __construct() {
        $this->loader = new \Twig_Loader_Filesystem(VIEWS);
        $this->twig = new \Twig_Environment($this->loader, array(
            'cache' => CACHE,
            'debug' => true
        ));
    }

    public function render($page, $data = array()) {
        $requests = array(
            "page" => $page,
        );
        if(!empty($data)) {
            foreach($data as $key => $d) {
                $requests[$key] = $d;
            }
        }
        $this->template = $this->twig->loadTemplate("base.twig");
        echo $this->template->render($requests);
    }
}