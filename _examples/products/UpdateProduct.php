<?php

use zoparga\BillingoLaravel\BillingoProduct;

class UpdateProduct
{
    public function updateProduct()
    {
        $productId = 11181117;
        $productData = [
            'name' => 'Another product name',
            // 'comment' => '',
            'currency' => 'EUR',
            'vat' => '20%',
            'net_unit_price' => 2000,
            'unit' => 'pcs',
            'entitlement' => 'AAM',
        ];

        return BillingoProduct::prepare()->productData($productData)->update($productId);
    }

    public function result()
    {
        // {
        //     "id":11181117,
        //     "name":"Another product name",
        //     "comment":"",
        //     "currency":"EUR",
        //     "vat":"20%",
        //     "net_unit_price":2000,
        //     "gross_unit_price":2400,
        //     "unit":"pcs",
        //     "general_ledger_number":"",
        //     "general_ledger_taxcode":"",
        //     "entitlement":"AAM",
        //     "ean":"",
        //     "sku":"",
        //     "is_manage":false,
        //     "purchase_price":null
        //  }
    }
}
