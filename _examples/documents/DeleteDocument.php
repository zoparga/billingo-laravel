<?php

use zoparga\BillingoLaravel\BillingoDocument;

class DeleteDocument
{
    // $id = Billingo ID
    // $id = 1754130525;
    public function delete()
    {
        $documentId = 39736559;

        return BillingoDocument::prepare()->delete($documentId);
    }

    public function result()
    {
        // 1
    }
}
