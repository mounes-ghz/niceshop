<?php

namespace Modules\Torob;

use Modules\Product\Entities\Product;

class Torob
{
    public function products()
    {
        return Product::forCard();
    }
}
