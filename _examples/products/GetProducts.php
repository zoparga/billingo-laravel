<?php

use zoparga\BillingoLaravel\BillingoProduct;

class GetProducts
{
    public function getProducts()
    {
        return BillingoProduct::prepare()->getAll();
    }

    public function result()
    {
        // {
        //     "total":2,
        //     "per_page":25,
        //     "current_page":1,
        //     "last_page":1,
        //     "prev_page_url":null,
        //     "next_page_url":null,
        //     "data":[
        //        {
        //           "id":11181118,
        //           "name":"Another product name",
        //           "comment":"",
        //           "currency":"EUR",
        //           "vat":"20%",
        //           "net_unit_price":2000,
        //           "gross_unit_price":2400,
        //           "unit":"pcs",
        //           "general_ledger_number":"",
        //           "general_ledger_taxcode":"",
        //           "entitlement":"AAM",
        //           "ean":"",
        //           "sku":"",
        //           "is_manage":false,
        //           "purchase_price":0
        //        },
        //        {
        //           "id":11181117,
        //           "name":"Product name",
        //           "comment":"",
        //           "currency":"EUR",
        //           "vat":"20%",
        //           "net_unit_price":1000,
        //           "gross_unit_price":1200,
        //           "unit":"pcs",
        //           "general_ledger_number":"",
        //           "general_ledger_taxcode":"",
        //           "entitlement":"EUE",
        //           "ean":"",
        //           "sku":"",
        //           "is_manage":false,
        //           "purchase_price":0
        //        }
        //     ]
        //  }
    }
}
