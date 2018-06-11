<?php

class api extends Controller {

    public $respone = array(
        "succes" => FALSE,
        "error" => 'No List Data'
    );

    function __construct() {
        $this->pageActive = "formula";
        $this->loadModel('orders');
    }

    public function productsearch() {
        $data = $this->model->getProductSearch();
        echo json_encode($data);
    }

    public function getFormula($prodOid) {
        $this->loadModel('productFormulas');
        $data = $this->model->getFormulasListByProdOID($prodOid);
        $res = [];
        foreach ($data as $key => $value) {
            $value->CreateAt = date("d/m/Y - H:i", strtotime($value->CreateAt));
            $res[] = $value;
        }

        if (!empty($data)) {
            $this->respone = [
                "succes" => TRUE,
                'data' => $data
            ];
        }

        echo json_encode($this->respone);
    }

    public function newFormula() {
        $prodOid = $_POST['prodOid'];
        $option = $_POST['option'];
        $date = $_POST['date'];
        if (!empty($prodOid)) {
            if ($option == 'firstFormulas') {
                $this->loadModel('productFormulas');
                $data = $this->model->createFirstFormulas($prodOid, $date);
                if ($data) {
                    $this->respone = [
                        "succes" => TRUE,
                        'data' => $data
                    ];
                }
            } else if ($option == 'newRevisionWithItem') {
                $this->loadModel('productFormulas');
                $data = $this->model->createNextFormulas($prodOid, $date, $option);

                $this->loadModel('productFormulaDetail');
                $this->model->createNextFormulasItem($data);
                $this->respone = [
                    "succes" => TRUE,
                    'data' => $data
                ];
            } else if ($option == 'newRevisionNoItem') {
                $this->loadModel('productFormulas');
                $data = $this->model->createNextFormulas($prodOid, $date);
                $this->respone = [
                    "succes" => TRUE,
                    'data' => $data
                ];
            }
        }
        echo json_encode($this->respone);
    }

    public function getListProductForFormula($id) {
        $this->loadModel('productFormulaDetail');
        $data = $this->model->getListProductForFormula($id);
        if (!empty($data)) {
            $this->respone = [
                "succes" => TRUE,
                'data' => $data
            ];
        }
        echo json_encode($this->respone);
    }

    public function getProductFormula($id) {
        $this->loadModel('productFormulas');
        $res = $this->model->getProductFormulaByPFOID($id);
        if (!empty($res))
            $res = $res[0];
        if (!empty($res)) {
            $this->respone = [
                "succes" => TRUE,
                'data' => $res
            ];
        }
        echo json_encode($this->respone);
    }

    public function deleteFormulaItem($id) {
        $this->loadModel('productFormulaDetail');
        $data = $this->model->deleteFormulaItem($id);
        if ($data) {
            $this->respone = [
                "succes" => TRUE,
                'data' => "succes"
            ];
        }
        echo json_encode($this->respone);
    }

    public function savePruductFormula() {
        if (isset($_POST['Revision']) && !empty($_POST['Revision'])) {

            $ProductFormulas = [
                'PFOID' => $_POST['Revision'],
                'QtyPerSet' => $_POST['QtyPerSet'],
                'PreTotalWeight' => $_POST['PreTotalWeight'],
                'PreMixedTotalWeight' => $_POST['PreMixedTotalWeight'],
                'PostTotalWeight' => $_POST['PostTotalWeight'],
                'PostMixedTotalWeight' => $_POST['PostMixedTotslWeight'],
                'Remark' => $_POST['Remark'],
                'LastUpdated' => date('Y-m-d H:i:s')
            ];

            $this->loadModel('productFormulas');
            $res = $this->model->savePruductFormulas($ProductFormulas);


            $PruductFormulaDetails = [
                'PFDOID' => isset($_POST['PFDOID']) ? $_POST['PFDOID'] : array(),
                'ProdOID' => $_POST['ProdOID'],
                'Revision' => $_POST['Revision'],
                'Weight' => $_POST['Weight'],
                'MixedWeight' => $_POST['MixedWeight'],
            ];

            $this->loadModel('productFormulaDetail');
            $res = $this->model->savePruductFormulaDetails($PruductFormulaDetails);

            $this->respone = [
                "succes" => TRUE,
                'data' => "succes"
            ];
        }
        echo json_encode($this->respone);
    }

}
