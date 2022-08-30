<?php

namespace zoparga\BillingoLaravel\Validations;

use Illuminate\Support\Facades\Validator;

class DocumentValidation
{
    public function validateInfo($info)
    {
        $validator = Validator::make($info, [

            'partner_id' => [
                'required',
            ],
            'block_id' => [
                'required',
            ],
            'bank_account_id' => [
                'required',
            ],
            'type' => [
                'required',
            ],
            'fulfillment_date' => [
                'required',
            ],
            'due_date' => [
                'date,
                    date_format:Y-m-d',
            ],
            'payment_method' => [
                'required',
            ],
            'items' => [
                'required',
            ],
            'comment' => [
                'string',
            ],
            // 'advance_invoice' => [
            //     'string',
            // ],
            // 'discount' => [
            //     'string',
            // ],

        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        // Retrieve the validated input...
        return true;
    }

    public const PAYMENT_METHODS = [
        'aruhitel',
        'bankcard',
        'barion',
        'barter',
        'cash',
        'cash_on_delivery',
        'coupon',
        'elore_utalas',
        'ep_kartya',
        'kompenzacio',
        'levonas',
        'online_bankcard',
        'other',
        'paylike',
        'payoneer',
        'paypal',
        'paypal_utolag',
        'payu',
        'pick_pack_pont',
        'postai_csekk',
        'postautalvany',
        'skrill',
        'szep_card',
        'transferwise',
        'upwork',
        'utalvany',
        'valto',
        'wire_transfer',
    ];

    public const DOCUMENT_BLOCK = [
        'certificate_of_completion',
        'dossier',
        'invoice',
        'offer',
        'order_form',
        'receipt',
        'waybill',
    ];

    public const DOCUMENT_TYPE = [
        'advance',
        'cancellation',
        'cert_of_completion',
        'd_cert_of_completion',
        'dossier',
        'draft',
        'draft_offer',
        'draft_order_form',
        'draft_waybill',
        'invoice',
        'modification',
        'offer',
        'order_form',
        'proforma',
        'receipt',
        'receipt_cancellation',
        'waybill',
    ];
}
