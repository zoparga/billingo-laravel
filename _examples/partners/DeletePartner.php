<?php

use zoparga\BillingoLaravel\BillingoPartner;

class DeletePartner
{
    // $id = Billingo ID
    // $id = 1754130525;
    public function delete($id)
    {
        return BillingoPartner::prepare()->delete($id);
    }

    public function result()
    {
        // 1
    }
}
