<?php

use zoparga\BillingoLaravel\BillingoDocumentPayment;

class GetPayments
{
    public function getAll()
    {
        $documentId = 39736545;

        return BillingoDocumentPayment::prepare()
            ->documentId($documentId)
            ->getAll();
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
