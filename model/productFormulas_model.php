<?php

class productFormulas_model extends Model {

    public function __construct($data = array()) {
        parent::__construct();
        $this->table = "ProductFomulars";
        $this->pk = "PFOID";
    }

    public function getFormulasListByProdOID($id) {
        $data = array(
            'ProdOID' => $id,
            'isDeleted' => '0'
        );

        return $this->search($data, array('ActiveRevOID' => 'ASC' ,"RevCount"=>'DESC'));
    }

    public function getProductFormulaByPFOID($id) {
        $data = array(
            'PFOID' => $id
        );

        return $this->search($data, array('ActiveRevOID' => 'ASC'));
    }

    public function createFirstFormulas($id) {
        $data = [
            'PFOID' => uniqid(),
            'ProdOID' => $id,
            'RevCount' => '1',
            'CreateAt' => date('Y-m-d H:i:s'),
            'LastUpdated' => date('Y-m-d H:i:s')
        ];

        $this->__setMultiple($data);
        return $this->create();
    }

    public function createNextFormulas($ProdOID, $option = '') {
        $lastRevition = $this->query("SELECT TOP 1 *  FROM ProductFomulars WHERE ProdOID='$ProdOID' AND isDeleted='0' ORDER BY RevCount DESC ");
        $revcount = 1;
        if (!empty($lastRevition))
            $revcount = $lastRevition[0]->RevCount;
        $revcount = $revcount + 1;
        $newId = uniqid();
        $data = [
            'PFOID' => $newId,
            'ProdOID' => $ProdOID,
            'RevCount' => $revcount,
            'CreateAt' => date('Y-m-d H:i:s'),
            'LastUpdated' => date('Y-m-d H:i:s')
        ];
        if (!empty($option)) {
            if ($option == "newRevisionWithItem") {
                $data = [
                    'PFOID' => $newId,
                    'ProdOID' => $ProdOID,
                    'RevCount' => $revcount,
                    'QtyPerSet' => $lastRevition[0]->QtyPerSet,
                    'PreTotalWeight' => $lastRevition[0]->PreTotalWeight,
                    'PostTotalWeight' => $lastRevition[0]->PostTotalWeight,
                    'PreMixedTotalWeight' => $lastRevition[0]->PreMixedTotalWeight,
                    'PostMixedTotalWeight' => $lastRevition[0]->PostMixedTotalWeight,
                    'Remark' => $lastRevition[0]->Remark,
                    'CreateAt' => date('Y-m-d H:i:s'),
                    'LastUpdated' => date('Y-m-d H:i:s')
                ];
            }
        }
        $this->__setMultiple($data);
        $this->create();
        $this->query("UPDATE ProductFomulars SET ActiveRevOID='1'  WHERE PFOID='{$lastRevition[0]->PFOID}'");
        return array('oldPFOID' => $lastRevition[0]->PFOID, 'newPFOID' => $newId, 'RevCount' => $revcount);
    }

    public function savePruductFormulas($data) {
        if (!empty($data) && !empty($data['PFOID'])) {
            $this->__setMultiple($data);
            $this->save();
        }
    }

}
