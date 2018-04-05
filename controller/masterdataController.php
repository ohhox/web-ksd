<?php

class masterdata extends Controller {

    public function __construct() {
        parent::__construct();
        $this->pageActive = 'masterdata';
    }

    public function index() {
        $this->pageTiitle = "Manage Master Data ";
        $this->view('masterData/masterList');
    }

    public function l($table = "") {
        $this->pageTiitle = "Manage Master Data ";
        $this->dataid = "";
        if (!empty($table)) {
            $this->dataid = $table;
            $this->pageTiitle = "Manage Master Data : " . $table;
            $model = new Model();
            $this->data = $model->query("SELECT * FROM  $table");
        }
        $this->view('masterData/masterList');
    }

    public function c($table = '') {
        if (!empty($table)) {
            $model = new Model();
            $model->table = $table;
            $model->__setMultiple($_POST);
            $model->create();
            Go(URL . "masterdata/l/$table");
        } else {
            Go(URL);
        }
    }

    public function u($table = '', $id = '') {
        if (!empty($table)) {
            $model = new Model();
            $model->table = $table;
            $model->pk = 'oid';

            $model->__setMultiple($_POST);
            $model->save($id);
            Go(URL . "masterdata/l/$table");
        } else {
            Go(URL);
        }
    }

    public function d($table = '', $id = '') {
        if (!empty($table)) {
            $model = new Model();
            $model->table = $table;
            $model->pk = 'oid';
            $model->delete($id);
            Go(URL . "masterdata/l/$table");
        } else {
            Go(URL);
        }
    }

    public function q($table = '', $id = '') {
        if (!empty($table) && !empty($id)) {
            $model = new Model();
            $model->table = $table;
            $res = $model->query("SELECT * FROM $table WHERE oid='$id'");
            if ($res)
                $res = $res[0];
            echo json_encode($res);
        }
    }

}
