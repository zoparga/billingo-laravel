<?php

namespace zoparga\BillingoLaravel\Validations;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductValidation
{
    public function validateInfo($info)
    {
        $validator = Validator::make($info, [

            'name' => [
                'required',
                'string',
            ],
            'currency' => [
                'required',
                Rule::in(self::CURRENCIES),
            ],
            'vat' => [
                'required',
                Rule::in(self::VAT),
            ],
            'entitlement' => [
                'required',
                Rule::in(self::ENTITLEMENT),
            ],
            'unit' => [
                'required',
            ],
            'net_unit_price' => [
                'required_unless:name,gross_unit_price:',
            ],
            'gross_unit_price' => [
                'required_unless:name,net_unit_price',
            ],

            'comment' => [
                'string',
            ],
            'general_ledger_number' => [
                'nullable',
            ],
            'general_ledger_taxcode' => [
                'nullable',
            ],

        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        // Retrieve the validated input...
        return true;
    }

    public const CURRENCIES = [
        'AED',
        'AUD',
        'BGN',
        'BRL',
        'CAD',
        'CHF',
        'CNY',
        'CZK',
        'DKK',
        'EUR',
        'GBP',
        'HKD',
        'HRK',
        'HUF',
        'IDR',
        'ILS',
        'INR',
        'ISK',
        'JPY',
        'KRW',
        'MXN',
        'MYR',
        'NOK',
        'NZD',
        'PHP',
        'PLN',
        'RON',
        'RSD',
        'RUB',
        'SEK',
        'SGD',
        'THB',
        'TRY',
        'UAH',
        'USD',
        'ZAR',
    ];

    public const ENTITLEMENT = [
        'AAM',
        'ANTIQUES',
        'ARTWORK',
        'ATK',
        'EAM',
        'EUE',
        'EUFAD37',
        'EUFADE',
        'HO',
        'KBAET',
        'NAM_1',
        'NAM_2',
        'SECOND_HAND',
        'TAM',
        'TRAVEL_AGENCY',
    ];

    // AAM - Alanyi ad??mentess??g
    // ANTIQUES - K??l??nb??zet szerinti szab??lyoz??s - gy??jtem??nydarabok ??s r??gis??gek -
    // ARTWORK - K??l??nb??zet szerinti szab??lyoz??s - m??alkot??sok -
    // ATK - ??fa tv. t??rgyi hat??ly??n k??v??li ??gylet
    // EAM - ??famentes term??kexport, azzal egy tekintet al?? es?? ??rt??kes??t??sek, nemzetk??zi k??zleked??shez kapcsol??d?? ??famentes ??gyletek (??fa tv. 98-109. ??)
    // EUE - EU m??s tag??llam??ban ??fak??teles (??fa fizet??s??re az ??rt??kes??t?? k??teles)
    // EUFAD37 - ??fa tv. 37. ?? (1) bekezd??se alapj??n a szolg??ltat??s teljes??t??se helye az EU m??s tag??llama (??fa fizet??s??re a vev?? k??teles)
    // EUFADE - ??fa tv. egy??b rendelkez??se szerint a teljes??t??s helye EU m??s tag??llama (??fa fizet??s??re a vev?? k??telezett)
    // HO - ??fa tv. szerint EU-n k??v??l teljes??tett ??gylet
    // KBAET - M??s tag??llamba ir??nyul?? ??famentes term??k??rt??kes??t??s (??fa tv. 89. ??)
    // NAM_1 - ??famentes k??zvet??t??i tev??kenys??g (??fa tv. 110. ??)
    // NAM_2 - Term??kek nemzetk??zi forgalm??hoz kapcsol??d?? ??famentes ??gylet (??fa tv. 111-118. ??)
    // SECOND_HAND - K??l??nb??zet szerinti szab??lyoz??s - haszn??lt cikkek -
    // TAM - Tev??kenys??g k??z??rdek?? jelleg??re vagy egy??b saj??tos jelleg??re tekintettel ??famentes (??fa tv. 85-87.??)
    // TRAVEL_AGENCY - K??l??nb??zet szerinti szab??lyoz??s - utaz??si irod??k -

    public const VAT = [
        '0%',
        '1%',
        '10%',
        '11%',
        '12%',
        '13%',
        '14%',
        '15%',
        '16%',
        '17%',
        '18%',
        '19%',
        '2%',
        '20%',
        '21%',
        '22%',
        '23%',
        '24%',
        '25%',
        '26%',
        '27%',
        '3%',
        '4%',
        '5%',
        '5,5%',
        '6%',
        '7%',
        '7,7%',
        '8%',
        '9%',
        '9,5%',
        'AAM',
        'AM',
        'EU',
        'EUK',
        'F.AFA',
        'FAD',
        'K.AFA',
        'MAA',
        'TAM',
        '??KK',
        '??THK',
    ];
}
