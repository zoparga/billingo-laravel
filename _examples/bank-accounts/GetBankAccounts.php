<?php

use zoparga\BillingoLaravel\BillingoBankAccount;

class GetBankAccounts
{
    public function getAll()
    {
        return BillingoBankAccount::prepare()->getAll();
    }

    public function result()
    {
        // {
        //     "total":1,
        //     "per_page":25,
        //     "current_page":1,
        //     "last_page":1,
        //     "prev_page_url":null,
        //     "next_page_url":null,
        //     "data":[
        //        {
        //           "id":134164,
        //           "name":"Bank account name",
        //           "account_number":"11332200-44556644",
        //           "account_number_iban":"HU30113322004455664400000000",
        //           "swift":"OTPVHUHB",
        //           "currency":"EUR",
        //           "need_qr":false
        //        }
        //     ]
        //  }
    }
}
