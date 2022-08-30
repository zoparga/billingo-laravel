<?php

use zoparga\BillingoLaravel\BillingoDocument;

class SendDocumentInEmail
{
    public function sendInEmail()
    {
        $documentId = 39736545;

        return BillingoDocument::prepare()
            ->toEmails(['zoltan@pappz.hu', 'zoltan@pappz.dev'])
            ->sendEmail($documentId);
    }

    public function result()
    {
        // {
        //     "emails":[
        //        "zoltan@pappz.hu",
        //        "zoltan@pappz.dev"
        //     ]
        //  }
    }
}
