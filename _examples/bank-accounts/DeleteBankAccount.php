<?php

use zoparga\BillingoLaravel\BillingoBankAccount;

class GetBankAccounts
{
    public function getAll()
    {
        $bankAccountId = 134164;

        return BillingoBankAccount::prepare()
            ->delete($bankAccountId);
    }

    public function result()
    {
        // 1
    }
}
