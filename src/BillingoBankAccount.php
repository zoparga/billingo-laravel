<?php

namespace zoparga\BillingoLaravel;

use Illuminate\Support\Facades\Http;
use zoparga\BillingoLaravel\Validations\BankAccountValidation;

class BillingoBankAccount
{
    public $base;

    public $bankAccountData;

    public $name;

    public $accountNumber;

    public $accountNumberIban;

    public $swift;

    public $currency;

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

    public function name($name)
    {
        $this->name = $name;

        return $this;
    }

    public function accountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }

    public function accountNumberIban($accountNumberIban)
    {
        $this->accountNumberIban = $accountNumberIban;

        return $this;
    }

    public function swift($swift)
    {
        $this->swift = $swift;

        return $this;
    }

    public function currency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    public function prepareBankAccountData()
    {
        try {
            $bankAccountData = [
                'name' => $this->name,
                'account_number' => $this->accountNumber,
                'account_number_iban' => $this->accountNumberIban,
                'swift' => $this->swift,
                'currency' => $this->currency,
            ];

            $validated = (new BankAccountValidation)->validateInfo($bankAccountData);

            if ($validated) {
                $this->bankAccountData = [
                    'name' => $bankAccountData['name'] ?? null,
                    'account_number' => $bankAccountData['account_number'] ?? null,
                    'account_number_iban' => $bankAccountData['account_number_iban'] ?? null,
                    'swift' => $bankAccountData['swift'] ?? null,
                    'currency' => $bankAccountData['currency'] ?? null,

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
            $this->prepareBankAccountData();
            $response = $this->base->post('/bank-accounts', $this->bankAccountData);
        } catch (\Throwable $th) {
            throw $th;
        }

        return $response->body();
    }

    public function update($bankAccountId)
    {
        try {
            $this->prepareBankAccountData();

            $response = $this->base->put('/bank-accounts/'.$bankAccountId, $this->bankAccountData);
        } catch (\Throwable $th) {
            throw $th;
        }

        return $response->body();
    }

    public function getAll()
    {
        $response = $this->base->get('/bank-accounts');

        return $response->body();
    }

    public function getOne($bankAccountId)
    {
        $response = $this->base->get('/bank-accounts/'.$bankAccountId);

        return $response->body();
    }

    public function delete($bankAccountId)
    {
        $response = $this->base->delete('/bank-accounts/'.$bankAccountId);

        return $response->successful();
    }
}
