<?php

class productFormulaDetail_model extends Model {

    public function __construct() {
        parent::__construct();
        $this->table = "ProductFomularDetails";
        $this->pk = "PFDOID";
    }

    public function getListProductForFormula($id) {
        $sql = " "
                . " SELECT A.PFDOID,A.ProdOID,ProdName1,ProdCode,Weight,MixedWeight,Remark "
                . " FROM ProductFomularDetails A "
                . " LEFT JOIN Products B ON A.ProdOID=B.ProdOID "
                . " WHERE  A.PFOID='$id' AND IsDeleted='0' ORDER BY CeateAt ASC";
        return $this->query($sql);
    }

    public function deleteFormulaItem($id) {
        $data = ['IsDeleted' => '1', 'LastUpdated' => date("Y-m-d H:i:s")];
        $this->__setMultiple($data);
        return $this->save($id);
    }

    public function savePruductFormulaDetails($data) {

        if (!empty($data)) {
            foreach ($data['ProdOID'] AS $key => $value) {
                //Create item

                $dataRes = [
                    'PFDOID' => isset($data['PFDOID'][$value]) ? $data['PFDOID'][$value] : uniqid(), // Creater Only
                    'ProdOID' => $value,
                    'PFOID' => !empty($data['Revision']) ? $data['Revision'] : '',
                    'Weight' => !empty($data['Weight'][$value]) ? $data['Weight'][$value] : '',
                    'MixedWeight' => !empty($data['MixedWeight'][$value]) ? $data['MixedWeight'][$value] : '',
                    'CeateAt' => date('Y-m-d H:i:s'),
                    'LastUpdated' => date('Y-m-d H:i:s'),
                ];

                $this->__setMultiple($dataRes);
                if (isset($data['PFDOID'][$value])) {
                    $this->save();
                } else {
                    $this->create();
                }
            }
        }
    }

    public function createNextFormulasItem($data) {
        if (!empty($data)) {
            $datax = $this->query("SELECT * FROM ProductFomularDetails WHERE PFOID='{$data['oldPFOID']}'");
            foreach ($datax as $key => $value) {
                $ar = [
                    'PFDOID' => uniqid(),
                    'ProdOID' => $value->ProdOID,
                    'Weight' => $value->Weight,
                    'MixedWeight' => $value->MixedWeight,
                    'PFOID' => $data['newPFOID'],
                    'CeateAt' => date('Y-m-d H:i:s'),
                    'LastUpdated' => date('Y-m-d H:i:s'),
                ];
                $this->__setMultiple($ar);
                $this->create();
            }
        }
    }

}
