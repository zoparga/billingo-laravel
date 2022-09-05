<?php

use zoparga\BillingoLaravel\BillingoBankAccount;

class UpdateBankAccount
{
    public function updateBankAccount()
    {
        $bankAccountId = 134164;

        return BillingoBankAccount::prepare()
            ->name('Bank account name - modified')
            ->accountNumber('11332200-44556644')
            ->accountNumberIban('HU30113322004455664400000000')
            ->swift('OTPVHUHB')
            ->currency('EUR')
            ->update($bankAccountId);
    }

    public function result()
    {
        // {
        //     "id":134164,
        //     "name":"Bank account name - modified",
        //     "account_number":"11332200-44556644",
        //     "account_number_iban":"HU30113322004455664400000000",
        //     "swift":"OTPVHUHB",
        //     "currency":"EUR",
        //     "need_qr":false
        //  }
    }
}
