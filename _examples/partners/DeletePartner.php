<?php

use zoparga\BillingoLaravel\BillingoPartners;

class DeletePartner
{
    // $id = Billingo ID
    // $id = 1754130525;
    public function delete($id)
    {
        return BillingoPartners::prepare()->delete($id);
    }

    public function result()
    {
        // 1
    }
}
