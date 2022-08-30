<?php

namespace zoparga\BillingoLaravel;

use Illuminate\Support\Facades\Http;

class BillingoDocumentBlock
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

    public function getAll()
    {
        $response = $this->base->get('/document-blocks');

        return $response->body();
    }
}
