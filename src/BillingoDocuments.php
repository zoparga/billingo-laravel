<?php

namespace zoparga\BillingoLaravel;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use zoparga\BillingoLaravel\Validations\DocumentValidation;

class BillingoDocuments
{
    public $base;

    public $documentData;

    public $itemsData;

    public $discount;

    public $settings;

    public function __construct()
    {
        $url = 'https://api.billingo.hu/v3';

        $this->base = Http::withHeaders([
            'X-API-KEY' => config('billingo-laravel.api_key'),
        ])->baseUrl($url);
    }

    public static function prepare()
    {
        return new static;
    }

    public function items($itemsData)
    {
        // $itemsData = [
        //     [
        //         "product_id" => 0,
        //         "quantity" => 0,
        //         "comment" => "string"
        //     ],
        //     [
        //         "name" => "string",
        //         "unit_price" => 0,
        //         "unit_price_type" => "gross",
        //         "quantity" => 0,
        //         "unit" => "string",
        //         "vat" => "0%",
        //         "comment" => "string",
        //         "entitlement" => "AAM"
        //     ]
        // ];
        $this->itemsData = $itemsData;
    }

    public function discount($discount)
    {
        // $discount = [
        //     "type" => "percent",
        //     "value" => 0
        // ];
        $this->discount = $discount;
    }

    public function settings($settings)
    {
        $this->settings = [
            'mediated_service' => $settings['mediated_service'] ?? false,
            'without_financial_fulfillment' => $settings['without_financial_fulfillment'] ?? false,
            'online_payment' => $settings['online_payment'] ?? '',
            'round' => $settings['round'] ?? 'five',
            'no_send_onlineszamla_by_user' => $settings['without_financial_fulfillment'] ?? true,
            'order_number' => $settings['order_number'] ?? '',
            'place_id' => $settings['place_id'] ?? 0,
            'instant_payment' => $settings['instant_payment'] ?? true,
            'selected_type' => $settings['selected_type'] ?? 'advance',
        ];
    }

    public function documentData($documentData)
    {
        try {
            //$validated = (new DocumentValidation)->validateInfo($documentData);

            //if ($validated) {
            $this->documentData = [
                'name' => $documentData['name'] ?? null,
                'comment' => $documentData['comment'] ?? null,
                'currency' => $documentData['currency'] ?? null,
                'vat' => $documentData['vat'] ?? null,
                'net_unit_price' => $documentData['net_unit_price'] ?? null,
                'unit' => $documentData['unit'] ?? null,
                'general_ledger_number' => $documentData['general_ledger_number'] ?? null,
                'general_ledger_taxcode' => $documentData['general_ledger_taxcode'] ?? null,
                'entitlement' => $documentData['entitlement'] ?? null,

                'vendor_id' => $documentData['partner_id'] ?? 'string',
                'partner_id' => $documentData['partner_id'] ?? null,
                'block_id' => $documentData['block_id'] ?? null,
                'bank_account_id' => $documentData['bank_account_id'] ?? null,
                'type' => $documentData['type'] ?? null,
                'fulfillment_date' => $documentData['fulfillment_date'] ?? null,
                'due_date' => $documentData['due_date'] ?? Carbon::now()->addDays(8),
                'payment_method' => $documentData['payment_method'] ?? 'transfer',
                'language' => $documentData['language'] ?? 'hu',
                'currency' => $documentData['currency'] ?? 'HUF',
                'conversion_rate' => $documentData['conversion_rate'] ?? 1,
                'electronic' => $documentData['electronic'] ?? false,
                'paid' => $documentData['paid'] ?? false,
                'items' => $this->itemsData,
                'comment' => $documentData['comment'] ?? null,
                'settings' => $this->settings,
                'advance_invoice' => [
                    $documentData['advance_invoice'] ?? 0,
                ],
                'discount' => $this->discount,
                'instant_payment' => $documentData['instant_payment'] ?? null,

            ];
            //}

            return $this;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getAll()
    {
        $response = $this->base->get('/documents');

        return $response->body();
    }

    public function create()
    {
        try {
            $response = $this->base->post('/documents', $this->documentData);
        } catch (\Throwable $th) {
            throw $th;
        }

        return $response->body();
    }

    public function getOne($documentId)
    {
        $response = $this->base->get('/documents/'.$documentId);

        return $response->body();
    }

    // public function update($documentId)
    // {
    //     try {
    //         $response = $this->base->put('/documents/'.$documentId, $this->documentData);
    //     } catch (\Throwable $th) {
    //         throw $th;
    //     }

    //     return $response->body();
    // }

    // public function delete($documentId)
    // {
    //     $response = $this->base->delete('/documents/'.$documentId);

    //     return $response->successful();
    // }
}
