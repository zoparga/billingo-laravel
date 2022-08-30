<?php

namespace zoparga\BillingoLaravel;

use Illuminate\Support\Facades\Http;
use zoparga\BillingoLaravel\Validations\ProductValidation;

class BillingoProduct
{
    public $base;

    public $productData;

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
    //     "comment": "string",
    //     "currency": "AED",
    //     "vat": "0%",
    //     "net_unit_price": 0,
    //     "unit": "string",
    //     "general_ledger_number": "string",
    //     "general_ledger_taxcode": "string",
    //     "entitlement": "AAM"
    //   }

    public function productData($productData)
    {
        try {
            $validated = (new ProductValidation)->validateInfo($productData);

            if ($validated) {
                $this->productData = [
                    'name' => $productData['name'] ?? null,
                    'comment' => $productData['comment'] ?? null,
                    'currency' => $productData['currency'] ?? null,
                    'vat' => $productData['vat'] ?? null,
                    'net_unit_price' => $productData['net_unit_price'] ?? null,
                    'unit' => $productData['unit'] ?? null,
                    'general_ledger_number' => $productData['general_ledger_number'] ?? null,
                    'general_ledger_taxcode' => $productData['general_ledger_taxcode'] ?? null,
                    'entitlement' => $productData['entitlement'] ?? null,
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
            $response = $this->base->post('/products', $this->productData);
        } catch (\Throwable $th) {
            throw $th;
        }

        return $response->body();
    }

    public function update($productId)
    {
        try {
            $response = $this->base->put('/products/'.$productId, $this->productData);
        } catch (\Throwable $th) {
            throw $th;
        }

        return $response->body();
    }

    public function getAll()
    {
        $response = $this->base->get('/products');

        return $response->body();
    }

    public function getOne($productId)
    {
        $response = $this->base->get('/products/'.$productId);

        return $response->body();
    }

    public function delete($productId)
    {
        $response = $this->base->delete('/products/'.$productId);

        return $response->successful();
    }
}
