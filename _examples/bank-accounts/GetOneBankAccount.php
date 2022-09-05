<?php

use zoparga\BillingoLaravel\BillingoBankAccount;

class GetOneBankAccount
{
    public function getOne()
    {
        $bankAccountId = 134164;

        return BillingoBankAccount::prepare()
            ->getOne($bankAccountId);
    }

    public function result()
    {
        // {
        //     "id":134164,
        //     "name":"Bank account name",
        //     "account_number":"11332200-44556644",
        //     "account_number_iban":"HU30113322004455664400000000",
        //     "swift":"OTPVHUHB",
        //     "currency":"EUR",
        //     "need_qr":false
        //  }
    }
}
