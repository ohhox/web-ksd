<?php

class order extends Controller {

    public $data = [];

    public function __construct() {
        parent::__construct();
        $this->pageActive = "order";
        $this->loadModel('orders');
    }

    public function index() {

        $this->data = $this->model->getOrder();
        $this->pageTiitle = "Order List";
        $this->view('order/list');
    }

    public function form($id = "", $name = "") {

        if ($_POST) {
            $data = ($_POST);

            $this->model->__setMultiple($data);

            if (empty($id)) {
                echo $this->model->create();
            } else {
                $this->model->save($id);
            }
            Go(URL . 'order');
        }
        $array['customer'] = $this->model->_getTable('customers');
        $array['Producttype'] = $this->model->_getTable('Producttypes');
        $array['Product'] = $this->model->_getTable('Products');
        $array['Factorytype'] = $this->model->_getTable('Factorytypes');
        $array['Holder'] = $this->model->_getTable('Holders');
        $array['Srick'] = $this->model->_getTable('Sricks');
        $array['Tray'] = $this->model->_getTable('Trays');
        $array['Unit'] = $this->model->_getTable('Units');

        $this->data['option'] = $array;
        $this->pageTiitle = "Order Form";
        if (!empty($id)) {
            $order = $this->model->one_query('orders', "oid=$id");
            if (!empty($order)) {
                $this->data['Myorder'] = $order[0];
                $this->id = $id;
            }
        }

        $this->view('order/form');
    }

    public function delete($id) {
        if (!empty($id)) {
            $this->model->delete($id);
        }
        Go(URL . 'order');
    }

}
