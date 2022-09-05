<?php

use zoparga\BillingoLaravel\BillingoDocument;

class PublicUrlDocument
{
    public function publicUrl()
    {
        $documentId = 40059111;

        $billingoDocAsString = BillingoDocument::prepare()
            ->publicUrl($documentId);

        return json_decode($billingoDocAsString)->public_url;
    }

    public function return()
    {
        // https://api.billingo.hu/document-access/O2mE7P3Q4Z6zw1MbVbNwlARjg0Nn1rxp
    }
}
