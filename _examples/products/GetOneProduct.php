<?php

use zoparga\BillingoLaravel\BillingoProduct;

class GetOneProduct
{
    // $id = Billingo ID
    // $id = 1754130525;
    public function getOne($id)
    {
        return BillingoProduct::prepare()->getOne($id);
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
        //     "purchase_price":0
        //  }
    }
}
