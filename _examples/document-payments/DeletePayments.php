<?php

use zoparga\BillingoLaravel\BillingoDocumentPayment;

class DeletePayments
{
    public function delete()
    {
        $documentId = 39736545;

        return BillingoDocumentPayment::prepare()
            ->documentId($documentId)
            ->delete();
    }

    public function result()
    {
        // []
    }
}
