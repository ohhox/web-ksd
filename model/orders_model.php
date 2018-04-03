<?php

class orders_model extends Model {

    public function __construct($data = array()) {
        parent::__construct();
        $this->table = "orders";
        $this->pk = "oid";
    }

    public function getOrder() {
        $sql = "SELECT o.oid,o.ProductCode,Remark,Revision,OrderQty,CustomerName,FactoryTypeName,Holdername,ProductName,ProductTypeName,SrickName,UnitName,TrayName FROM Orders AS o"
                . " LEFT JOIN Customers AS c ON c.oid = o.CustomerOid "
                . " LEFT JOIN FactoryTypes AS f ON f.oid = o.FactoryTypeOid "
                . " LEFT JOIN Holders AS h ON h.oid = o.HolderOid "
                . " LEFT JOIN Products AS p ON p.oid = o.ProductOid "
                . " LEFT JOIN ProductTypes AS pt ON pt.oid = o.ProductTypeOid "
                . " LEFT JOIN Sricks AS s ON s.oid = o.SrickOid "
                . " LEFT JOIN Units AS u ON u.oid = o.UnitOid "
                . "LEFT JOIN Trays AS t ON t.oid = o.TrayOid ";
        return $this->query($sql);
    }

    public function removeOrder($orderId) {
        if (!empty($orderId)) {
            $this->delete($orderId);
        }
    }

}
