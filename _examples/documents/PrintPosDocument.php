<?php

use zoparga\BillingoLaravel\BillingoDocument;

class PrintPosDocument
{
    public function printPos()
    {
        $documentId = 40059111;

        $billingoDocAsString = BillingoDocument::prepare()
            ->posSize(80)
            ->printPos($documentId);

        //dd($billingoDocAsString);

        $filePath = storage_path('app/test-pdf.pdf');

        file_put_contents($filePath, $billingoDocAsString);

        return response()->download($filePath);
    }

    public function return()
    {
        // HOPE YOU UNDERSTAND THE FLOW WHAT HAPPENS
    }
}
