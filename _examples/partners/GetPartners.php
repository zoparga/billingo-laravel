<?php

use zoparga\BillingoLaravel\BillingoPartner;

class GetPartners
{
    public function getPartners()
    {
        return BillingoPartner::prepare()->getAll();
    }

    public function result()
    {
        // {
        //     "total":4,
        //     "per_page":25,
        //     "current_page":1,
        //     "last_page":1,
        //     "prev_page_url":null,
        //     "next_page_url":null,
        //     "data":[
        //        {
        //           "id":1754130525,
        //           "name":"Billingo Technologies",
        //           "address":{
        //              "country_code":"HU",
        //              "post_code":"1024",
        //              "city":"Budapest",
        //              "address":"F\u0151 utca 40."
        //           },
        //           "emails":[

        //           ],
        //           "taxcode":"",
        //           "iban":"",
        //           "swift":"",
        //           "account_number":"",
        //           "phone":"",
        //           "general_ledger_number":"",
        //           "tax_type":"",
        //           "custom_billing_settings":{
        //              "payment_method":null,
        //              "document_form":null,
        //              "due_days":null,
        //              "document_currency":null,
        //              "template_language_code":null,
        //              "discount":null
        //           },
        //           "group_member_tax_number":"",
        //           "giro_settings":{
        //              "giro_default_settings":true,
        //              "giro_payment_request_enabled":false,
        //              "giro_different_amount_allowed":false
        //           },
        //           "partner_shipping":{
        //              "match":true,
        //              "name":"",
        //              "mode":"none",
        //              "address":{
        //                 "country_code":"HU",
        //                 "post_code":"",
        //                 "city":"",
        //                 "address":""
        //              }
        //           }
        //        },
        //        {
        //           "id":1754130488,
        //           "name":"Test name",
        //           "address":{
        //              "country_code":"HU",
        //              "post_code":"1024",
        //              "city":"Budapest",
        //              "address":"F\u0151 utca 40."
        //           },
        //           "emails":[

        //           ],
        //           "taxcode":"",
        //           "iban":"",
        //           "swift":"",
        //           "account_number":"",
        //           "phone":"",
        //           "general_ledger_number":"",
        //           "tax_type":"",
        //           "custom_billing_settings":{
        //              "payment_method":null,
        //              "document_form":null,
        //              "due_days":null,
        //              "document_currency":null,
        //              "template_language_code":null,
        //              "discount":null
        //           },
        //           "group_member_tax_number":"",
        //           "giro_settings":{
        //              "giro_default_settings":true,
        //              "giro_payment_request_enabled":false,
        //              "giro_different_amount_allowed":false
        //           },
        //           "partner_shipping":{
        //              "match":true,
        //              "name":"",
        //              "mode":"none",
        //              "address":{
        //                 "country_code":"HU",
        //                 "post_code":"",
        //                 "city":"",
        //                 "address":""
        //              }
        //           }
        //        },
        //        {
        //           "id":1754130494,
        //           "name":"Test name",
        //           "address":{
        //              "country_code":"HU",
        //              "post_code":"1024",
        //              "city":"Budapest",
        //              "address":"F\u0151 utca 40."
        //           },
        //           "emails":[

        //           ],
        //           "taxcode":"",
        //           "iban":"",
        //           "swift":"",
        //           "account_number":"",
        //           "phone":"",
        //           "general_ledger_number":"",
        //           "tax_type":"",
        //           "custom_billing_settings":{
        //              "payment_method":null,
        //              "document_form":null,
        //              "due_days":null,
        //              "document_currency":null,
        //              "template_language_code":null,
        //              "discount":null
        //           },
        //           "group_member_tax_number":"",
        //           "giro_settings":{
        //              "giro_default_settings":true,
        //              "giro_payment_request_enabled":false,
        //              "giro_different_amount_allowed":false
        //           },
        //           "partner_shipping":{
        //              "match":true,
        //              "name":"",
        //              "mode":"none",
        //              "address":{
        //                 "country_code":"HU",
        //                 "post_code":"",
        //                 "city":"",
        //                 "address":""
        //              }
        //           }
        //        },
        //        {
        //           "id":1754412333,
        //           "name":"Text Company LTD",
        //           "address":{
        //              "country_code":"HU",
        //              "post_code":"1024",
        //              "city":"Budapest",
        //              "address":"F\u0151 utca 40."
        //           },
        //           "emails":[

        //           ],
        //           "taxcode":"",
        //           "iban":"",
        //           "swift":"",
        //           "account_number":"",
        //           "phone":"",
        //           "general_ledger_number":"",
        //           "tax_type":"",
        //           "custom_billing_settings":{
        //              "payment_method":null,
        //              "document_form":null,
        //              "due_days":null,
        //              "document_currency":null,
        //              "template_language_code":null,
        //              "discount":null
        //           },
        //           "group_member_tax_number":"",
        //           "giro_settings":{
        //              "giro_default_settings":true,
        //              "giro_payment_request_enabled":false,
        //              "giro_different_amount_allowed":false
        //           },
        //           "partner_shipping":{
        //              "match":true,
        //              "name":"",
        //              "mode":"none",
        //              "address":{
        //                 "country_code":"HU",
        //                 "post_code":"",
        //                 "city":"",
        //                 "address":""
        //              }
        //           }
        //        }
        //     ]
        //  }
    }
}
