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
        $this->dataid;
        $this->count = 0;

        $this->master = $tableData = $this->fn->REF[$table];
        $this->limit = $limit = 30;
        $this->page = $page = (isset($_GET['p']) ? $_GET['p'] : 1) - 1;

        $where = "";
        if (isset($_GET['search'])) {
            foreach ($_GET['search'] AS $key => $value) {
                if (!empty($value)) {
                    if (empty($where)) {
                        $where = " WHERE $key LIKE '%$value%' ";
                    } else {
                          $where .= " AND $key LIKE '%$value%' ";
                    }
                }
            }
        }

        $row_start = $page * $limit;
        $row_end = $row_start + $limit;
        if (!empty($table)) {
            $this->dataid = $table;
            $this->pageTiitle = "Manage Master Data : " . $table;
            $model = new Model();
            $sql = " SELECT c.* FROM (
                    SELECT ROW_NUMBER() OVER(ORDER BY {$tableData['pk']}) AS RowID,*  FROM $table $where
                ) AS c  
                WHERE c.RowID > $row_start AND c.RowID <= $row_end ";
            $this->data = $model->query($sql);

            $this->count = $model->query('SELECT COUNT(*) AS count FROM ' . $table);
        }
        $this->view('masterData/masterList');
    }

    public function c($table = '') {
        if (!empty($table)) {
            $model = new Model();
            $model->table = $table;
            $data = $_POST;
            if ($table == 'Units') {
                $data['UnitOID'] = uniqid();
            }
            echo strlen($data['UnitOID']);
            pshow($data);

            $model->__setMultiple($data);
            $model->create();
            //     Go(URL . "masterdata/l/$table");
        } else {
            Go(URL);
        }
    }

    public function u($table = '', $id = '') {
        if (!empty($table)) {
            $model = new Model();
            $model->table = $table;
            $model->pk = 'oid';
            if ($table == 'Units') {
                $model->pk = 'UnitOID';
            }
            if ($table == 'Products') {
                $model->pk = 'ProdOID';
            }

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
            $pk = "oid";
            if ($table == "Units") {
                $pk = "UnitOID";
            }
            $res = $model->query("SELECT * FROM $table WHERE $pk='$id'");
            if ($res)
                $res = $res[0];
            echo json_encode($res);
        }
    }

}
