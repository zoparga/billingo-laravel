<?php

use Carbon\Carbon;
use zoparga\BillingoLaravel\BillingoDocumentPayment;

class CreatePayment
{
    public function createPayment()
    {
        $documentId = 39736545;

        return BillingoDocumentPayment::prepare()
            ->documentId($documentId)
            ->paymentMethod('bankcard')
            ->paymentDate(Carbon::now()->format('Y-m-d'))
            ->paymentPrice(200)
            ->create();
    }

    public function result()
    {
        // [
        //     {
        //        "date":"2022-08-30",
        //        "price":200,
        //        "payment_method":"bankcard",
        //        "voucher_number":"",
        //        "conversion_rate":1
        //     }
        //  ]
    }
}
