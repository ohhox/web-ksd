<?php

class View {

    public $viewDir = "./view/";
    public $layout = array(
        'layout' => "layout/",
        "header" => 'default/header.php',
        "footer" => 'default/footer.php'
    );
    public $viewMessage = "";
    public $pageActive = "home";
    public $pageTiitle = "KSD ";

    function __construct() {
        
    }

    public function view($viewname) {
        $view = $this->viewDir . $viewname . '.php';

        if (file_exists($view)) {
            include $this->viewDir . $this->layout['layout'] . $this->layout['header'];
            include $view;
            include $this->viewDir . $this->layout['layout'] . $this->layout['footer'];
        } else {
            $this->viewMessage = "View <b>{$viewname}</b> do not exists. ";
            include 'view/error/error.php';
        }
    }

}
