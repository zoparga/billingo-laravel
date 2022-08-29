<?php

use zoparga\BillingoLaravel\BillingoPartners;

class CreatePartner
{
    public function createExample()
    {
        $data = [
            // REQUIRED FIELDS
            'name' => 'Billingo Technologies',  // REQUIRED
            'country_code' => 'HU',             // REQUIRED
            'post_code' => 1024,                // REQUIRED
            'city' => 'Budapest',               // REQUIRED
            'address' => 'Fő utca 40.',         // REQUIRED

            // THESE ARE OPTIONAL
            'email' => '',
            'taxcode' => '',
            'iban' => '',
            'switft',
            'account_number',
            'phone' => '',
            'general_ledger_number' => '',
            'tax_type' => '',
            'payment_method' => '',
            'document_form' => '',
            'due_days' => '',
            'document_currency' => '',
            'template_language_code' => '',
            'discount_type' => '',
            'discount_value' => '',
            'group_member_tax_number' => '',

        ];

        return BillingoPartners::prepare()->partnerData($data)->create();
    }

    public function result()
    {
        // {
        //     "id":1754412333,
        //     "name":"Text CompanyLTD",
        //     "address":{
        //        "country_code":"HU",
        //        "post_code":"1024",
        //        "city":"Budapest",
        //        "address":"F\u0151 utca40."
        //     },
        //     "emails":[

        //     ],
        //     "taxcode":"",
        //     "iban":"",
        //     "swift":"",
        //     "account_number":"",
        //     "phone":"",
        //     "general_ledger_number":"",
        //     "tax_type":"",
        //     "custom_billing_settings":{
        //        "payment_method":null,
        //        "document_form":null,
        //        "due_days":null,
        //        "document_currency":null,
        //        "template_language_code":null,
        //        "discount":null
        //     },
        //     "group_member_tax_number":"",
        //     "giro_settings":{
        //        "giro_default_settings":true,
        //        "giro_payment_request_enabled":false,
        //        "giro_different_amount_allowed":false
        //     },
        //     "partner_shipping":{
        //        "match":true,
        //        "name":"",
        //        "mode":"none",
        //        "address":{
        //           "country_code":"HU",
        //           "post_code":"",
        //           "city":"",
        //           "address":""
        //        }
        //     }
        //  }
    }
}
