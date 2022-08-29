<?php

use zoparga\BillingoLaravel\BillingoPartners;

class GetOnePartner
{
    // $id = Billingo ID
    // $id = 1754130525;
    public function getOne($id)
    {
        return BillingoPartners::prepare()->getOne($id);
    }

    public function result()
    {
        // {
        //     "id": 1754130525,
        //     "name": "Billingo Technologies",
        //     "address": {
        //         "country_code": "HU",
        //         "post_code": "1024",
        //         "city": "Budapest",
        //         "address": "Fő utca 40."
        //     },
        //     "emails": [],
        //     "taxcode": "",
        //     "iban": "",
        //     "swift": "",
        //     "account_number": "",
        //     "phone": "",
        //     "general_ledger_number": "",
        //     "tax_type": "",
        //     "custom_billing_settings": {
        //         "payment_method": null,
        //         "document_form": null,
        //         "due_days": null,
        //         "document_currency": null,
        //         "template_language_code": null,
        //         "discount": null
        //     },
        //     "group_member_tax_number": "",
        //     "giro_settings": {
        //         "giro_default_settings": true,
        //         "giro_payment_request_enabled": false,
        //         "giro_different_amount_allowed": false
        //     },
        //     "partner_shipping": {
        //         "match": true,
        //         "name": "",
        //         "mode": "none",
        //         "address": {
        //             "country_code": "HU",
        //             "post_code": "",
        //             "city": "",
        //             "address": ""
        //         }
        //     }
        // }
    }
}
