<?php

class productformula extends Controller {

    function __construct() {
        $this->pageActive = "formula";
        $this->loadModel('orders');
    }

    public function index() {
        $this->form();
    }

    public function form() {

        //// Search Form
        $array['ItemTypes'] = $this->model->_getTable('ItemTypes');
        $array['CategoryGroup'] = $this->model->_getTable('ProductTypes');
        $array['Category'] = $this->model->_getTable('ProductCategories');
        $array['SubCategory'] = $this->model->_getTable('ProductSubCategories');

        $this->data['option'] = $array;
        $this->view(
                'formula/form', array(
            'order/_search_product', 'formula/_addproduct'
                ), array('formula/js')
        );
    }

}
