<?php

namespace zoparga\BillingoLaravel;

use Illuminate\Support\Facades\Http;

class BillingoDocumentPayment
{
    public $base;

    public $documentId;

    public $paymentDate;

    public $paymentPrice;

    public $paymentMethod;

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

    public function documentId($documentId)
    {
        $this->documentId = $documentId;

        return $this;
    }

    // $payment = [
    //     "date": "2022-08-30",
    //     "price": 0,
    //     "payment_method": "aruhitel",
    //     "voucher_number": "string",
    //     "conversion_rate": 0
    //     ]
    public function payment($payment)
    {
        $this->payment = $payment;

        return $this;
    }

    public function paymentDate($paymentDate)
    {
        $this->paymentDate = $paymentDate;
        $this->payment['date'] = $paymentDate;

        return $this;
    }

    public function paymentPrice($paymentPrice)
    {
        $this->paymentPrice = $paymentPrice;
        $this->payment['price'] = $paymentPrice;

        return $this;
    }

    public function paymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
        $this->payment['payment_method'] = $paymentMethod;

        return $this;
    }

    public function getAll()
    {
        $response = $this->base->get('/documents/'.$this->documentId.'/payments');

        return $response->body();
    }

    public function create()
    {
        $data[] = $this->payment;
        $response = $this->base->put('/documents/'.$this->documentId.'/payments', $data);

        return $response->body();
    }

    public function delete()
    {
        $response = $this->base->delete('/documents/'.$this->documentId.'/payments');

        return $response->body();
    }
}
