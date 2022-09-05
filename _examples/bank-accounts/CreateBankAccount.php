<?php

use zoparga\BillingoLaravel\BillingoBankAccount;

class CreateBankAccount
{
    public function createBankAccount()
    {
        return BillingoBankAccount::prepare()
            ->name('Bank account name') // REQUIRED
            ->accountNumber('11332200-44556644') // REQUIRED
            ->currency('EUR') // REQUIRED
            ->accountNumberIban('HU30113322004455664400000000') // OPTIONAL
            ->swift('OTPVHUHB') // OPTIONAL
            ->create();
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
