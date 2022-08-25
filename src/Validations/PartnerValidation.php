<?php

namespace zoparga\BillingoLaravel\Validations;

use Illuminate\Support\Facades\Validator;

class PartnerValidation
{
    public function validateInfo($info)
    {
        $validator = Validator::make($info, [

            'name' => 'required',
            'country_code' => 'required',
            'post_code' => 'required',
            'city' => 'required',
            'address' => 'required',
            'phone' => 'string',
            'emails.*' => [
                'string',
                'email',
            ],

        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        // Retrieve the validated input...
        return true;
    }
}
