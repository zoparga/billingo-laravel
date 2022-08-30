<?php

use zoparga\BillingoLaravel\BillingoProduct;

class DeleteProduct
{
    // $id = Billingo ID
    // $id = 1754130525;
    public function delete($id)
    {
        return BillingoProduct::prepare()->delete($id);
    }

    public function result()
    {
        // 1
    }
}
