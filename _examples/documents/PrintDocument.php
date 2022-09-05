<?php

use zoparga\BillingoLaravel\BillingoDocument;

class PrintDocument
{
    public function download()
    {
        $documentId = 40059156;

        $billingoDocAsString = BillingoDocument::prepare()
            ->download($documentId);

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
