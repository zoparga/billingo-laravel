<?php

use zoparga\BillingoLaravel\BillingoPartners;

class UpdatePartner
{
    public function updatePartner()
    {
        $partnerId = 1754130488;
        $data = [
            'name' => 'Text Company LTD',
            'country_code' => 'HU',
            'post_code' => 1024,
            'city' => 'Budapest',
            'address' => 'Fő utca 40.',
            'email' => 'test@test.asd',
        ];

        return BillingoPartners::prepare()->partnerData($data)->update($partnerId);
    }

    public function result()
    {
        // {
        // "id":1754130488,
        // "name":"Text Company LTD",
        // "address":{
        //     "country_code":"HU",
        //     "post_code":"1024",
        //     "city":"Budapest",
        //     "address":"F\u0151 utca 40."
        // },
        // "emails":[
        //     "test@test.asd"
        // ],
        // "taxcode":"",
        // "iban":"",
        // "swift":"",
        // "account_number":"",
        // "phone":"",
        // "general_ledger_number":"",
        // "tax_type":"",
        // "custom_billing_settings":{
        //     "payment_method":null,
        //     "document_form":null,
        //     "due_days":null,
        //     "document_currency":null,
        //     "template_language_code":null,
        //     "discount":null
        // },
        // "group_member_tax_number":"",
        // "giro_settings":{
        //     "giro_default_settings":true,
        //     "giro_payment_request_enabled":false,
        //     "giro_different_amount_allowed":false
        // },
        // "partner_shipping":{
        //     "match":true,
        //     "name":"",
        //     "mode":"none",
        //     "address":{
        //         "country_code":"HU",
        //         "post_code":"",
        //         "city":"",
        //         "address":""
        //     }
        // }
        // }
    }
}
