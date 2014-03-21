<?php
namespace libs;

class view extends \libs\controller {
    public $twig;
    public $loader;
    public $template;
    public $theme;

    public function __construct() {
        if($this->getSubsite()!= false) {
            $this->theme = $this->getSubsite()."/";
        } else {
            $this->theme = "nosite/";
        }
    }

    public function setTheme($theme) {

        if(isset($theme)) {
            $this->theme = $theme."/";
        } else {
            return false;
        }
    }

    public function render($page = null, $data = array()) {
        if(!isset($page)) {
            $page = 'home';
        }
        $requests = array(
            "page" => $page,
        );
        if(!empty($data)) {
            foreach($data as $key => $d) {
                $requests[$key] = $d;
            }
        }
        print_r($requests);
        $this->loader = new \Twig_Loader_Filesystem(VIEWS.$this->theme);
        $this->twig = new \Twig_Environment($this->loader, array(
            'cache' => CACHE,
            'debug' => true
        ));
        $this->template = $this->twig->loadTemplate("base.twig");
        echo $this->template->render($requests);
    }
}