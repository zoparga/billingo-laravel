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

    // AAM - Alanyi adómentesség
    // ANTIQUES - Különbözet szerinti szabályozás - gyűjteménydarabok és régiségek -
    // ARTWORK - Különbözet szerinti szabályozás - műalkotások -
    // ATK - Áfa tv. tárgyi hatályán kívüli ügylet
    // EAM - Áfamentes termékexport, azzal egy tekintet alá eső értékesítések, nemzetközi közlekedéshez kapcsolódó áfamentes ügyletek (Áfa tv. 98-109. §)
    // EUE - EU más tagállamában áfaköteles (áfa fizetésére az értékesítő köteles)
    // EUFAD37 - Áfa tv. 37. § (1) bekezdése alapján a szolgáltatás teljesítése helye az EU más tagállama (áfa fizetésére a vevő köteles)
    // EUFADE - Áfa tv. egyéb rendelkezése szerint a teljesítés helye EU más tagállama (áfa fizetésére a vevő kötelezett)
    // HO - Áfa tv. szerint EU-n kívül teljesített ügylet
    // KBAET - Más tagállamba irányuló áfamentes termékértékesítés (Áfa tv. 89. §)
    // NAM_1 - Áfamentes közvetítői tevékenység (Áfa tv. 110. §)
    // NAM_2 - Termékek nemzetközi forgalmához kapcsolódó áfamentes ügylet (Áfa tv. 111-118. §)
    // SECOND_HAND - Különbözet szerinti szabályozás - használt cikkek -
    // TAM - Tevékenység közérdekű jellegére vagy egyéb sajátos jellegére tekintettel áfamentes (Áfa tv. 85-87.§)
    // TRAVEL_AGENCY - Különbözet szerinti szabályozás - utazási irodák -

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
        'ÁKK',
        'ÁTHK',
    ];
}
