<?php

namespace zoparga\BillingoLaravel\Validations;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class BankAccountValidation
{
    public function validateInfo($info)
    {
        $validator = Validator::make($info, [

            'name' => [
                'required',
                'string',
            ],
            'account_number' => [
                'required',
                'string',
            ],
            'account_number_iban' => [
                'nullable',
                'string',
            ],
            'swift' => [
                'nullable',
                'string',
            ],
            'currency' => [
                'required',
                Rule::in(ProductValidation::CURRENCIES),
            ],

        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        // Retrieve the validated input...
        return true;
    }
}
