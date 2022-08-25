<?php

namespace zoparga\BillingoLaravel;

use Illuminate\Support\Facades\Http;

class Billingo
{
    public $base;

    public $text;

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

    public function text($text)
    {
        $this->text = $text;

        return $this;
    }

    public function send()
    {
        $response = $this->base->get('/documents');

        return $response;
    }
}
