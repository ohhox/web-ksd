<?php

class orders_model extends Model {

    public function __construct($data = array()) {
        parent::__construct();
        $this->table = "Orders";
        $this->pk = "oid";
    }

    public function getOrder() {
        $sql = "SELECT o.oid,o.ProductCode,Remark,Revision,OrderQty,c.ShortName AS CustomerName,FactoryTypeName,Holdername,p.ProdName1 AS ProductName,orderProductTypeName,SrickName,UnitNameFullEng,TrayName 
                    FROM Orders AS o 
                    LEFT JOIN Customers AS c ON c.oid = o.CustomerOid 
                    LEFT JOIN FactoryTypes AS f ON f.oid = o.FactoryTypeOid 
                    LEFT JOIN Holders AS h ON h.oid = o.HolderOid 
                    LEFT JOIN Products AS p ON p.ProdOID = o.ProductOid 
                    LEFT JOIN OrderProductTypes AS pt ON pt.oid = o.orderProductTypeOid 
                    LEFT JOIN Sricks AS s ON s.oid = o.SrickOid 
                    LEFT JOIN Units AS u ON u.UnitOID = o.UnitOid 
                    LEFT JOIN Trays AS t ON t.oid = o.TrayOid 
                    WHERE o.isDelete='0'
                    ";
        return $this->query($sql);
    }

    public function removeOrder($orderId) {
        if (!empty($orderId)) {
            $data = [
                'oid' => $orderId,
                'isDelete' => '1',
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $this->__setMultiple($data);
            $this->save();
            // $this->delete($orderId);
        }
    }

    public function getProductSearch() {
        $fillter = "";
        if (!empty($_POST['ItemTypes']) && $_POST['ItemTypes'] != "all") { //ProductType
            $fillter = " WHERE ItemTypes='{$_POST['ItemTypes']}'";
        }

        if (!empty($_POST['SubCategory']) && $_POST['SubCategory'] != "all") { //Category Group
            if (empty($fillter)) {
                $fillter .= " WHERE ProdCatSubOID='{$_POST['SubCategory']}'";
            } else {
                $fillter .= " AND ProdCatSubOID='{$_POST['SubCategory']}'";
            }
        }

        if (!empty($_POST['SubCategory']) && $_POST['SubCategory'] != "all") { //Category
            if (empty($fillter)) {
                $fillter .= " WHERE ProdCatSubOID='{$_POST['SubCategory']}'";
            } else {
                $fillter .= " AND ProdCatSubOID='{$_POST['SubCategory']}'";
            }
        }

        if (!empty($_POST['SubCategory']) && $_POST['SubCategory'] != "all") { //Sub Category
            if (empty($fillter)) {
                $fillter .= " WHERE ProdCatSubOID='{$_POST['SubCategory']}'";
            } else {
                $fillter .= " AND ProdCatSubOID='{$_POST['SubCategory']}'";
            }
        }
        if (!empty($_POST['keyword'])) {
            if (empty($fillter)) {
                $fillter .= " WHERE ProdCode LIKE '%{$_POST['keyword']}%' OR ProdName1 LIKE '%{$_POST['keyword']}%' OR ProdName2 LIKE '%{$_POST['keyword']}%' OR ProdShortName LIKE '%{$_POST['keyword']}%' OR ProdDescription LIKE '%{$_POST['keyword']}%'  ";
            } else {
                $fillter .= " AND ProdCode LIKE '%{$_POST['keyword']}%' OR ProdName1 LIKE '%{$_POST['keyword']}%' OR ProdName2 LIKE '%{$_POST['keyword']}%' OR ProdShortName LIKE '%{$_POST['keyword']}%' OR ProdDescription LIKE '%{$_POST['keyword']}%'  ";
            }
        }

        if (!empty($fillter)) {
            $sql = "SELECT TOP 100 ProdOID,ProdCode,ProdName1 FROM Products $fillter ";
            return $this->query($sql);
        } else {
            return array();
        }
    }

}
