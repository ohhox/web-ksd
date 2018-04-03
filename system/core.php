<?php

class core {

    private $_CLASS;
    private $_FUNCTION;
    private $_URL;
    private $_controller;
    protected $_DEFAULT_CLASS = 'index';
    protected $_DEFAULT_FUNCTION = 'index';
    protected $_controllerPath = 'controller/';
    
    public function __construct() {
        $this->_getUrl();

        $url = $this->_URL;
        if (empty($url[0])) {
            $this->_CLASS = $this->_DEFAULT_CLASS;
        } else {
            $this->_CLASS = $url[0];
        }

        if (empty($url[1])) {
            $this->_FUNCTION = $this->_DEFAULT_FUNCTION;
        } else {
            $this->_FUNCTION = $url[1];
        }
    }

    private function _getUrl() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->_URL = explode('/', $url);
        ;
    }

    public function init() {
        $this->LoadController();
    }

    public function LoadController() {

        $file = $this->_controllerPath . $this->_CLASS . 'Controller' .  '.php';
        $this->_loadExistingController($file);
        $this->_controller = new $this->_CLASS();
        $this->model = $this->_controller->loadModel($this->_CLASS);
        $this->_callExistingControllerMethod();
    }

    private function _loadExistingController($file) {
        if (file_exists($file)) {
            require $file;
        } else {
            $this->_errorController();
            return false;
        }
    }

    private function _callExistingControllerMethod() {

        if (method_exists($this->_controller, $this->_FUNCTION)) {

            $function = $this->_FUNCTION;

            $length = count($this->_URL);
            switch ($length) {
                case 9:
                    //Controller->Method(Param1, Param2, Param3)
                    $this->_controller->$function($this->_URL[2], $this->_URL[3], $this->_URL[4], $this->_URL[5], $this->_URL[6], $this->_URL[7], $this->_URL[8]);
                    break;
                case 8:
                    //Controller->Method(Param1, Param2, Param3)
                    $this->_controller->$function($this->_URL[2], $this->_URL[3], $this->_URL[4], $this->_URL[5], $this->_URL[6], $this->_URL[7]);
                    break;
                case 7:
                    //Controller->Method(Param1, Param2, Param3)
                    $this->_controller->$function($this->_URL[2], $this->_URL[3], $this->_URL[4], $this->_URL[5], $this->_URL[6]);
                    break;
                case 6:
                    //Controller->Method(Param1, Param2, Param3)
                    $this->_controller->$function($this->_URL[2], $this->_URL[3], $this->_URL[4], $this->_URL[5]);
                    break;
                case 5:
                    //Controller->Method(Param1, Param2, Param3)
                    $this->_controller->$function($this->_URL[2], $this->_URL[3], $this->_URL[4]);
                    break;

                case 4:
                    //Controller->Method(Param1, Param2)
                    $this->_controller->$function($this->_URL[2], $this->_URL[3]);
                    break;

                case 3:
                    //Controller->Method(Param1, Param2)
                    $this->_controller->$function($this->_URL[2]);
                    break;

                case 2:
                    //Controller->Method(Param1, Param2)
                    $this->_controller->$function();
                    break;

                default:
                    $this->_controller->$function();
                    break;
            }
        } else {
            $this->_errorFunction();
        }
    }

    public function _errorController() {
        echo "Can't Find <b>{$this->_CLASS}.php</b> Class <i> {$this->_CLASS}</i>";
    }

    public function _errorFunction() {
        echo "Can't Find  Function <b>{$this->_FUNCTION} </b> IN Class <i> {$this->_CLASS}</i>";
    }

}
