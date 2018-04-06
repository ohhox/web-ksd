<?php

class functiomx {

    public $REF = array(
        'Customers' => array(
            'table_name' => 'Customers',
            'table_Description' => "Customers",
            'pk' => 'oid',
            'Icon' => 'fa-share-alt',
            'field' => array(
                '1' => array(
                    'field_name' => "CustomerCode",
                    'field_Description' => 'Customer Code',
                    'field_type' => 'input',
                    'required' => 'required',
                    'comment' => ''
                ),
                '2' => array(
                    'field_name' => "CustomerName",
                    'field_Description' => 'Customer Name',
                    'field_type' => 'input',
                    'required' => 'required'
                ),
                '3' => array(
                    'field_name' => "ShortName",
                    'field_Description' => 'Short Name',
                    'field_type' => 'input',
                    'required' => ''
                ),
            )
        ),
        'FactoryTypes' => array(
            'table_name' => 'FactoryTypes',
            'table_Description' => "Factory Types",
            'pk' => 'oid',
            'Icon' => 'fa-usd',
            'field' => array(
                '1' => array(
                    'field_name' => "FactoryTypeCode",
                    'field_Description' => 'Factory Type Code',
                    'field_type' => 'input',
                    'required' => 'required',
                    'comment' => ''
                ),
                '2' => array(
                    'field_name' => "FactoryTypeName",
                    'field_Description' => 'Factory Type Name',
                    'field_type' => 'input',
                    'required' => 'required'
                )
            )
        ),
        'Holders' => array(
            'table_name' => 'Holders',
            'table_Description' => "Holders",
            'pk' => 'oid',
            'Icon' => '',
            'field' => array(
                '1' => array(
                    'field_name' => "HolderCode",
                    'field_Description' => 'Holder Code',
                    'field_type' => 'input',
                    'required' => 'required',
                    'comment' => ''
                ),
                '2' => array(
                    'field_name' => "HolderName",
                    'field_Description' => 'Holder Name',
                    'field_type' => 'input',
                    'required' => 'required'
                )
            )
        ),
        'ProductTypes' => array(
            'table_name' => 'ProductTypes',
            'table_Description' => "Product Types",
            'pk' => 'oid',
            'Icon' => 'fa-share-alt',
            'field' => array(
                '1' => array(
                    'field_name' => "ProductTypeCode",
                    'field_Description' => 'Product Type Code',
                    'field_type' => 'input',
                    'required' => 'required',
                ),
                '2' => array(
                    'field_name' => "ProductTypeName",
                    'field_Description' => 'Product Type Name',
                    'field_type' => 'input',
                    'required' => 'required'
                )
            )
        ),
        'Products' => array(
            'table_name' => 'Products',
            'table_Description' => "Products",
            'pk' => 'oid',
            'Icon' => 'fa-share-alt',
            'field' => array(
                '1' => array(
                    'field_name' => "ProductCode",
                    'field_Description' => 'Product Code',
                    'field_type' => 'input',
                    'required' => 'required',
                ),
                '2' => array(
                    'field_name' => "ProductName",
                    'field_Description' => 'Product Name',
                    'field_type' => 'input',
                    'required' => 'required'
                ),
                '3' => array(
                    'field_name' => "ShortName",
                    'field_Description' => 'Short Name',
                    'field_type' => 'input',
                    'required' => 'required'
                )
            )
        ),
        'Sricks' => array(
            'table_name' => 'Sricks',
            'table_Description' => "Sricks",
            'pk' => 'oid',
            'Icon' => 'fa-list-ol',
            'field' => array(
                '1' => array(
                    'field_name' => "SrickCode",
                    'field_Description' => 'Srick Code',
                    'field_type' => 'input',
                    'required' => 'required',
                ),
                '2' => array(
                    'field_name' => "SrickName",
                    'field_Description' => 'Srick Name',
                    'field_type' => 'input',
                    'required' => 'required'
                )
            )
        ),
        'Trays' => array(
            'table_name' => 'Trays',
            'table_Description' => "Trays",
            'pk' => 'oid',
            'Icon' => 'fa-certificate',
            'field' => array(
                '1' => array(
                    'field_name' => "TrayCode",
                    'field_Description' => 'Tray Code',
                    'field_type' => 'input',
                    'required' => 'required',
                ),
                '2' => array(
                    'field_name' => "TrayName",
                    'field_Description' => 'Tray Name',
                    'field_type' => 'input',
                    'required' => 'required'
                )
            )
        ),
        'Units' => array(
            'table_name' => 'Units',
            'table_Description' => "Units",
            'pk' => 'oid',
            'Icon' => 'fa-certificate',
            'field' => array(
                '1' => array(
                    'field_name' => "UnitCode",
                    'field_Description' => 'Unit Code',
                    'field_type' => 'input',
                    'required' => 'required'
                ),
                '2' => array(
                    'field_name' => "UnitName",
                    'field_Description' => 'Unit Name',
                    'field_type' => 'input',
                    'required' => 'required'
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
