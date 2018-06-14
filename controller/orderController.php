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
        $this->customer = $this->model->_getTable('customers');

        $this->view('order/list', array(), array('order/index_js'));
    }

    public function form($id = "", $name = "") {

        if ($_POST) {
            $data = ($_POST);

            if (empty($id)) {
                $data['created_at'] = date('Y-m-d H:i:s');
                $data['updated_at'] = date('Y-m-d H:i:s');
                $this->model->__setMultiple($data);
                $this->model->create();
            } else {
                $data['updated_at'] = date('Y-m-d H:i:s');
                $data['Revision'] = ($data['Revision'] + 1);
                $this->model->__setMultiple($data);
                $this->model->save($id);
            }
            Go(URL . 'order');
        }

        $array['customer'] = $this->model->_getTable('customers');
        $array['Producttype'] = $this->model->_getTable('OrderProductTypes');
        $array['Product'] = $this->model->_getTable('Products');
        $array['Factorytype'] = $this->model->_getTable('Factorytypes');
        $array['Holder'] = $this->model->_getTable('Holders');
        $array['Srick'] = $this->model->_getTable('Sricks');
        $array['Tray'] = $this->model->_getTable('Trays');
        $array['Unit'] = $this->model->_getTable('Units');

        //// Search Form
        $array['ItemTypes'] = $this->model->_getTable('ItemTypes');
        $array['CategoryGroup'] = $this->model->_getTable('ProductTypes');
        $array['Category'] = $this->model->_getTable('ProductCategories');
        $array['SubCategory'] = $this->model->_getTable('ProductSubCategories');

        $this->data['option'] = $array;
        $this->pageTiitle = "Order Form";
        if (!empty($id)) {
            $order = $this->model->one_query('orders', "oid=$id");
            if (!empty($order)) {
                $this->data['Myorder'] = $order[0];
                $this->id = $id;
                $prodid = $order[0]->ProductOid;
                $prod = $this->model->query("SELECT TOP (1) [ProdOID] ,[ProdCode] ,[ProdmpNo] ,[ProdName1],[ProdName2],[ProdShortName],[ProdDescription]  FROM [KSD_MRP].[dbo].[Products] WHERE ProdOID='$prodid'");
                if (!empty($prod)) {

                    $this->data['myproduct'] = $prod[0];
                }
            }
        }



        $this->view('order/form', array(
            'order/_search_product'
                ), array('order/js'));
    }

    public function delete($id) {
        if (!empty($id)) {
            $this->model->removeOrder($id);
        }
        Go(URL . 'order');
    }

    public function status() {
        $this->pageTiitle = "Order Status";
        $this->pageActive = "status";
        $this->view('order/status');
    }

    public function productsearch() {
        $data = $this->model->getProductSearch();
        echo json_encode($data);
    }

}
