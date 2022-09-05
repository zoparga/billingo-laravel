<?php

namespace zoparga\BillingoLaravel;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use zoparga\BillingoLaravel\Validations\DocumentValidation;

class BillingoDocument
{
    public $base;

    public $documentData;

    public $itemsData;

    public $discount;

    public $settings;

    public $partner_id;

    public $block_id;

    public $bank_account_id;

    public $type;

    public $fulfillment_date;

    public $due_date;

    public $payment_method;

    public $toEmails;

    public $posSize;

    public const DRAFT = 'draft';

    public const PROFORMA = 'proforma';

    public const INVOICE = 'invoice';

    public const RECEIPT = 'receipt';

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

        return $this;
    }

    // $discount = [
    //     "type" => "percent",
    //     "value" => 0
    // ];
    public function discount($discount)
    {
        $this->discount = $discount;

        return $this;
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

        return $this;
    }

    public function partnerId($partnerId)
    {
        $this->partner_id = $partnerId;

        return $this;
    }

    public function bacnkAccountId($bankAccountId)
    {
        $this->bank_account_id = $bankAccountId;

        return $this;
    }

    public function type($type)
    {
        $this->type = $type;

        return $this;
    }

    public function fulfillmentDate($fulfillmentDate)
    {
        $this->fulfillment_date = $fulfillmentDate;

        return $this;
    }

    public function dueDate($dueDate)
    {
        $this->due_date = $dueDate;

        return $this;
    }

    public function paymentMethod($paymentMethod)
    {
        $this->payment_method = $paymentMethod;

        return $this;
    }

    public function posSize($posSize)
    {
        $this->posSize = [
            'size' => $posSize,
        ];

        return $this;
    }

    public function toEmails($toEmails)
    {
        $this->toEmails['emails'] = $toEmails;

        return $this;
    }

    public function invoiceType()
    {
        $this->type = self::INVOICE;

        return $this;
    }

    public function proformaType()
    {
        $this->type = self::PROFORMA;

        return $this;
    }

    public function receiptType()
    {
        $this->type = self::RECEIPT;

        return $this;
    }

    public function setBlockId()
    {
        if (! $this->block_id) {
            if ($this->type == self::RECEIPT) {
                $this->block_id = config('billingo-laravel.receipt_block_id');
            } else {
                $this->block_id = config('billingo-laravel.invoice_block_id');
            }
        }
    }

    public function setDefaults()
    {
        if (! $this->type) {
            $this->type = self::DRAFT;
        }
        if (! $this->fulfillment_date) {
            $this->fulfillment_date = Carbon::now()->format('Y-m-d');
        }
        if (! $this->due_date) {
            $this->due_date = Carbon::now()->addDays(8)->format('Y-m-d');
        }
        if (! $this->payment_method) {
            $this->payment_method = 'elore_utalas';
        }
    }

    public function documentData($documentData)
    {
        $this->setDefaults();
        $this->setBlockId();

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

                'vendor_id' => $documentData['vendor_id'] ?? uniqid(),
                'partner_id' => $documentData['partner_id'] ?? null,
                'block_id' => $documentData['block_id'] ?? $this->block_id,
                'bank_account_id' => $documentData['bank_account_id'] ?? 0,
                'type' => $this->type,
                'fulfillment_date' => $this->fulfillment_date,
                'due_date' => $this->due_date,
                'payment_method' => $this->payment_method,
                'language' => $documentData['language'] ?? 'hu',
                'currency' => $documentData['currency'] ?? 'HUF',
                'conversion_rate' => $documentData['conversion_rate'] ?? 1,
                'electronic' => $documentData['electronic'] ?? false,
                'paid' => $documentData['paid'] ?? false,
                'items' => $this->itemsData,
                'comment' => $documentData['comment'] ?? '',
                'settings' => $this->settings,

                'instant_payment' => $documentData['instant_payment'] ?? null,

            ];

            if ($this->discount) {
                $this->documentData['discount'] = $this->discount;
            }
            if (isset($documentData['advance_invoice'])) {
                $this->documentData['advance_invoice'] = [
                    $documentData['advance_invoice'],
                ];
            }
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

    public function createReceipt()
    {
        try {
            $response = $this->base->post('/documents/receipt', $this->documentData);
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

    public function delete($documentId)
    {
        $response = $this->base->delete('/documents/'.$documentId);

        return $response->successful();
    }

    public function sendEmail($documentId)
    {
        $response = $this->base->post('/documents/'.$documentId.'/send', $this->toEmails);

        return $response->body();
    }

    public function printPos($documentId)
    {
        $response = $this->base->get('/documents/'.$documentId.'/print/pos', $this->posSize);

        return $response->body();
    }

    public function download($documentId)
    {
        $response = $this->base->get('/documents/'.$documentId.'/download');

        return $response->body();
    }

    public function publicUrl($documentId)
    {
        $response = $this->base->get('/documents/'.$documentId.'/public-url');

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
}
