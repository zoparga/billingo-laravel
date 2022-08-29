<?php

use zoparga\BillingoLaravel\BillingoProducts;

class DeleteProduct
{
    // $id = Billingo ID
    // $id = 1754130525;
    public function delete($id)
    {
        return BillingoProducts::prepare()->delete($id);
    }

    public function result()
    {
        // 1
    }
}
