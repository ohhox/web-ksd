<?php

class user extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index($id = NULL) {

        $this->model->Firstname = "Prawit";
        $this->model->Age = "25";
        $this->model->id = "1";
        $this->model->Sex = "M";
        $this->model->Lastname = "Yancharoenkit";
        $this->model->save();
    }

}
