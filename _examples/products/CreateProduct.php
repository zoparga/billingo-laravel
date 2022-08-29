<?php

use zoparga\BillingoLaravel\BillingoProducts;

class CreateProduct
{
    public function createExample()
    {
        $productData = [
            'name' => 'Product name',
            // 'comment' => '',
            'currency' => 'EUR',
            'vat' => '20%',
            'net_unit_price' => 1000,
            'unit' => 'pcs',
            'entitlement' => 'EUE',
        ];

        return BillingoProducts::prepare()->productData($productData)->create();
    }

    public function result()
    {
        // {
        //     "id":11181117,
        //     "name":"Product name",
        //     "comment":"",
        //     "currency":"EUR",
        //     "vat":"20%",
        //     "net_unit_price":1000,
        //     "gross_unit_price":1200,
        //     "unit":"pcs",
        //     "general_ledger_number":"",
        //     "general_ledger_taxcode":"",
        //     "entitlement":"EUE",
        //     "ean":"",
        //     "sku":"",
        //     "is_manage":false,
        //     "purchase_price":null
        //  }
    }
}
