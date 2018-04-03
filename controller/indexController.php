<?php

class index extends Controller{

public $data = "";



public function __construct() {
    parent::__construct();
}

public function index() {
$model = new Model();
$this->data = $model->_getTable("Orders"); 
$this->view('main/index');
}

}
