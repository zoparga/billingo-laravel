<?php

use Carbon\Carbon;
use zoparga\BillingoLaravel\BillingoDocument;

class CreateInvoiceDocument
{
    public function createInvoiceDocument()
    {
        $itemsData[] = [
            'product_id' => 11194208,
            'quantity' => 1,
            'comment' => 'test',
        ];

        $documentData = [
            'partner_id' => 1754413391,
            'bank_account_id' => null,
        ];

        return BillingoDocument::prepare()
            ->items($itemsData)
            ->invoiceType()
            ->fulfillmentDate(Carbon::now()->format('Y-m-d'))
            ->dueDate(Carbon::now()->addDays(8)->format('Y-m-d'))
            ->paymentMethod('cash')
            ->documentData($documentData)
            ->create();
    }

    public function result()
    {
        // {
        //     "id":40059047,
        //     "invoice_number":"2022-2",
        //     "type":"invoice",
        //     "correction_type":"invoice",
        //     "cancelled":false,
        //     "block_id":159494,
        //     "payment_status":"paid",
        //     "payment_method":"cash",
        //     "gross_total":2400,
        //     "currency":"HUF",
        //     "conversion_rate":1,
        //     "invoice_date":"2022-09-05",
        //     "fulfillment_date":"2022-09-05",
        //     "due_date":"2022-09-13",
        //     "paid_date":"2022-09-05",
        //     "organization":{
        //        "name":"Billingo Technologies Zrt.",
        //        "tax_number":"27926309-2-41",
        //        "bank_account":{
        //           "id":134165,
        //           "name":"Bank account name",
        //           "account_number":"11332200-44556644",
        //           "account_number_iban":"",
        //           "swift":""
        //        },
        //        "address":{
        //           "country_code":"HU",
        //           "post_code":"1133",
        //           "city":"Budapest",
        //           "address":"\u00c1rb\u00f3c utca 6."
        //        },
        //        "small_taxpayer":false,
        //        "ev_number":"01-10-140802",
        //        "eu_tax_number":"",
        //        "cash_settled":false
        //     },
        //     "partner":{
        //        "id":1754413391,
        //        "name":"Text Company LTD",
        //        "address":{
        //           "country_code":"HU",
        //           "post_code":"1024",
        //           "city":"Budapest",
        //           "address":"F\u0151 utca 40."
        //        },
        //        "emails":[

        //        ],
        //        "taxcode":"",
        //        "iban":"",
        //        "swift":"",
        //        "account_number":"",
        //        "phone":"",
        //        "general_ledger_number":"",
        //        "tax_type":"",
        //        "custom_billing_settings":{
        //           "payment_method":null,
        //           "document_form":null,
        //           "due_days":null,
        //           "document_currency":null,
        //           "template_language_code":null,
        //           "discount":null
        //        },
        //        "group_member_tax_number":"",
        //        "giro_settings":{
        //           "giro_default_settings":true,
        //           "giro_payment_request_enabled":false,
        //           "giro_different_amount_allowed":false
        //        },
        //        "partner_shipping":{
        //           "match":true,
        //           "name":"",
        //           "mode":"none",
        //           "address":{
        //              "country_code":"HU",
        //              "post_code":"",
        //              "city":"",
        //              "address":""
        //           }
        //        }
        //     },
        //     "document_partner":{
        //        "id":1754413391,
        //        "name":"Text Company LTD",
        //        "address":{
        //           "country_code":"HU",
        //           "post_code":"1024",
        //           "city":"Budapest",
        //           "address":"F\u0151 utca 40."
        //        },
        //        "emails":[

        //        ],
        //        "taxcode":"",
        //        "iban":"",
        //        "swift":"",
        //        "account_number":"",
        //        "phone":"",
        //        "tax_type":"",
        //        "partner_shipping":{
        //           "match":true,
        //           "name":"",
        //           "mode":"none",
        //           "address":{
        //              "country_code":"HU",
        //              "post_code":"",
        //              "city":"",
        //              "address":""
        //           }
        //        }
        //     },
        //     "electronic":false,
        //     "comment":"",
        //     "tags":[

        //     ],
        //     "notification_status":"none",
        //     "language":"hu",
        //     "items":[
        //        {
        //           "product_id":11194208,
        //           "name":"Another product name",
        //           "net_unit_amount":2000,
        //           "quantity":1,
        //           "unit":"pcs",
        //           "net_amount":2000,
        //           "gross_amount":2400,
        //           "vat":"20%",
        //           "vat_amount":400,
        //           "entitlement":"AAM",
        //           "comment":"test"
        //        }
        //     ],
        //     "summary":{
        //        "net_amount":2000,
        //        "net_amount_local":2000,
        //        "gross_amount_local":2400,
        //        "vat_amount":400,
        //        "vat_amount_local":400,
        //        "vat_rate_summary":[
        //           {
        //              "vat_name":"20%",
        //              "vat_percentage":0.2,
        //              "vat_rate_net_amount":2000,
        //              "vat_rate_vat_amount":400,
        //              "vat_rate_vat_amount_local":400,
        //              "vat_rate_gross_amount":2400
        //           }
        //        ]
        //     },
        //     "settings":{
        //        "mediated_service":false,
        //        "without_financial_fulfillment":false,
        //        "online_payment":"",
        //        "should_send_email":false,
        //        "round":"none",
        //        "no_send_onlineszamla_by_user":false,
        //        "order_number":"",
        //        "place_id":null,
        //        "instant_payment":true,
        //        "selected_type":null,
        //        "dont_send_to_nav_reason":null,
        //        "instant_payment_request":null
        //     },
        //     "related_documents":[

        //     ],
        //     "online_szamla_status":"processing",
        //     "discount":null
        //  }
    }
}
