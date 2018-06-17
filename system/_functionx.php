<?php

class functiomx {

    public $REF = array(
        'Customers' => array(
            'table_name' => 'Customers',
            'table_Description' => "Customers",
            'pk' => 'oid',
            'Icon' => 'fa-share-alt',
            'manage' => true,
            'field' => array(
                '1' => array(
                    'field_name' => "CustomerCode",
                    'field_Description' => 'Customer Code',
                    'field_type' => 'input',
                    'required' => 'required',
                    'comment' => '',
                    'checkExit' => true
                ),
                '2' => array(
                    'field_name' => "CustomerName",
                    'field_Description' => 'Customer Name',
                    'field_type' => 'input',
                    'required' => 'required',
                    'checkExit' => true
                ),
                '3' => array(
                    'field_name' => "ShortName",
                    'field_Description' => 'Short Name',
                    'field_type' => 'input',
                    'required' => '',
                    'checkExit' => 'false',
                ),
            )
        ),
        'FactoryTypes' => array(
            'table_name' => 'FactoryTypes',
            'table_Description' => "Factory Types",
            'pk' => 'oid',
            'Icon' => 'fa-usd',
            'manage' => true,
            'field' => array(
                '1' => array(
                    'field_name' => "FactoryTypeCode",
                    'field_Description' => 'Factory Type Code',
                    'field_type' => 'input',
                    'required' => 'required',
                    'comment' => '',
                    'checkExit' => true
                ),
                '2' => array(
                    'field_name' => "FactoryTypeName",
                    'field_Description' => 'Factory Type Name',
                    'field_type' => 'input',
                    'required' => 'required',
                    'checkExit' => true
                )
            )
        ),
        'Holders' => array(
            'table_name' => 'Holders',
            'table_Description' => "Holders",
            'pk' => 'oid',
            'Icon' => '',
            'manage' => true,
            'field' => array(
                '1' => array(
                    'field_name' => "HolderCode",
                    'field_Description' => 'Holder Code',
                    'field_type' => 'input',
                    'required' => 'required',
                    'comment' => '',
                    'checkExit' => true
                ),
                '2' => array(
                    'field_name' => "HolderName",
                    'field_Description' => 'Holder Name',
                    'field_type' => 'input',
                    'required' => 'required',
                    'checkExit' => true
                )
            )
        ),
        'OrderProductTypes' => array(
            'table_name' => 'OrderProductTypes',
            'table_Description' => "Product Types",
            'pk' => 'oid',
            'manage' => true,
            'Icon' => 'fa-share-alt',
            'field' => array(
                '1' => array(
                    'field_name' => "OrderProductTypeCode",
                    'field_Description' => 'Order Product Type Code',
                    'field_type' => 'input',
                    'required' => 'required',
                    'checkExit' => true
                ),
                '2' => array(
                    'field_name' => "OrderProductTypeName",
                    'field_Description' => 'Order Product Type Name',
                    'field_type' => 'input',
                    'required' => 'required',
                    'checkExit' => true
                )
            )
        ),
        'Products' => array(
            'table_name' => 'Products',
            'table_Description' => "Products",
            'pk' => 'ProdOID',
            'manage' => false,
            'Icon' => 'fa-share-alt',
            'field' => array(
                '1' => array(
                    'field_name' => "ProdCode",
                    'field_Description' => 'Product Code',
                    'field_type' => 'input',
                    'required' => 'required',
                    'checkExit' => true
                ),
                '2' => array(
                    'field_name' => "ProdName1",
                    'field_Description' => 'Product Name',
                    'field_type' => 'input',
                    'required' => 'required',
                    'checkExit' => true
                ),
                '3' => array(
                    'field_name' => "ProdShortName",
                    'field_Description' => 'Short Name',
                    'field_type' => 'input',
                    'required' => 'required',
                    'checkExit' => true
                )
            )
        ),
        'Sricks' => array(
            'table_name' => 'Sricks',
            'table_Description' => "Sricks",
            'pk' => 'oid',
            'manage' => true,
            'Icon' => 'fa-list-ol',
            'field' => array(
                '1' => array(
                    'field_name' => "SrickCode",
                    'field_Description' => 'Srick Code',
                    'field_type' => 'input',
                    'required' => 'required',
                    'checkExit' => true
                ),
                '2' => array(
                    'field_name' => "SrickName",
                    'field_Description' => 'Srick Name',
                    'field_type' => 'input',
                    'required' => 'required',
                    'checkExit' => true
                )
            )
        ),
        'Trays' => array(
            'table_name' => 'Trays',
            'table_Description' => "Trays",
            'pk' => 'oid',
            'manage' => true,
            'Icon' => 'fa-certificate',
            'field' => array(
                '1' => array(
                    'field_name' => "TrayCode",
                    'field_Description' => 'Tray Code',
                    'field_type' => 'input',
                    'required' => 'required',
                    'checkExit' => true
                ),
                '2' => array(
                    'field_name' => "TrayName",
                    'field_Description' => 'Tray Name',
                    'field_type' => 'input',
                    'required' => 'required',
                    'checkExit' => true
                )
            )
        ),
        'Units' => array(
            'table_name' => 'Units',
            'table_Description' => "Units",
            'pk' => 'UnitOID',
            'Icon' => 'fa-certificate',
            'manage' => false,
            'field' => array(
                '1' => array(
                    'field_name' => "UnitNameFullThai",
                    'field_Description' => 'Unit Name Thai',
                    'field_type' => 'input',
                    'required' => 'required',
                    'checkExit' => true
                ),
                '2' => array(
                    'field_name' => "UnitNameFullEng",
                    'field_Description' => 'Unit Name Eng',
                    'field_type' => 'input',
                    'required' => 'required',
                    'checkExit' => true
                ),
                '3' => array(
                    'field_name' => "UnitNameShortThai",
                    'field_Description' => 'Unit Short Name Thai',
                    'field_type' => 'input',
                    'required' => 'required'
                ),
                '4' => array(
                    'field_name' => "UnitNameShortEng",
                    'field_Description' => 'Unit Short Name Eng',
                    'field_type' => 'input',
                    'required' => 'required',
                    'checkExit' => true
                )
            )
        )
    );

    public function getOrder() {
        
    }

    public function COUNTREF() {
        return "";
    }

}
