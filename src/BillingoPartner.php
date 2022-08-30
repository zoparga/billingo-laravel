<?php

namespace zoparga\BillingoLaravel;

use Illuminate\Support\Facades\Http;
use zoparga\BillingoLaravel\Validations\PartnerValidation;

class BillingoPartner
{
    public $base;

    public $partnerData;

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

    // {
    //     "name": "string",
    //     "address": {
    //       "country_code": "",
    //       "post_code": "string",
    //       "city": "string",
    //       "address": "string"
    //     },
    //     "emails": [
    //       "string"
    //     ],
    //     "taxcode": "string",
    //     "iban": "string",
    //     "swift": "string",
    //     "account_number": "string",
    //     "phone": "string",
    //     "general_ledger_number": "string",
    //     "tax_type": "",
    //     "custom_billing_settings": {
    //       "payment_method": "aruhitel",
    //       "document_form": "electronic",
    //       "due_days": 0,
    //       "document_currency": "AED",
    //       "template_language_code": "de",
    //       "discount": {
    //         "type": "percent",
    //         "value": 0
    //       }
    //     },
    //     "group_member_tax_number": "string"
    //   }

    public function partnerData($partnerData)
    {
        try {
            $validated = (new PartnerValidation)->validateInfo($partnerData);

            if ($validated) {
                $this->partnerData = [
                    'name' => $partnerData['name'] ?? null,
                    'address' => [
                        'country_code' => $partnerData['country_code'] ?? null,
                        'post_code' => $partnerData['post_code'] ?? null,
                        'city' => $partnerData['city'] ?? null,
                        'address' => $partnerData['address'] ?? null,
                    ],
                    'emails' => [
                        $partnerData['email'] ?? '',
                    ],
                    'taxcode' => $partnerData['taxcode'] ?? null,
                    'iban' => $partnerData['iban'] ?? null,
                    'swift' => $partnerData['swift'] ?? null,
                    'account_number' => $partnerData['account_number'] ?? null,
                    'phone' => $partnerData['phone'] ?? '',
                    'general_ledger_number' => $partnerData['general_ledger_number'] ?? null,
                    'tax_type' => $partnerData['tax_type'] ?? null,
                    'custom_billing_settings' => [
                        'payment_method' => $partnerData['payment_method'] ?? null,
                        'document_form' => $partnerData['document_form'] ?? null,
                        'due_days' => $partnerData['due_days'] ?? null,
                        'document_currency' => $partnerData['document_currency'] ?? null,
                        'template_language_code' => $partnerData['template_language_code'] ?? null,
                        'discount' => [
                            'type' => $partnerData['discount_type'] ?? null,
                            'value' => $partnerData['discount_value'] ?? null,
                        ],
                    ],
                    'group_member_tax_number' => $partnerData['group_member_tax_number'] ?? null,
                ];
            }

            return $this;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function create()
    {
        try {
            $response = $this->base->post('/partners', $this->partnerData);
        } catch (\Throwable $th) {
            throw $th;
        }

        return $response->body();
    }

    public function update($partnerId)
    {
        try {
            $response = $this->base->put('/partners/'.$partnerId, $this->partnerData);
        } catch (\Throwable $th) {
            throw $th;
        }

        return $response->body();
    }

    public function getAll()
    {
        $response = $this->base->get('/partners');

        return $response->body();
    }

    public function getOne($partnerId)
    {
        $response = $this->base->get('/partners/'.$partnerId);

        return $response->body();
    }

    public function delete($partnerId)
    {
        $response = $this->base->delete('/partners/'.$partnerId);

        return $response->successful();
    }
}
