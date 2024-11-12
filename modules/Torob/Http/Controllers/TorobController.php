<?php

namespace Modules\Torob\Http\Controllers;

use Modules\Torob\Torob;
use Illuminate\Http\Response;
use Modules\Torob\Transformers\TorobProductsCollection;

class TorobController
{
    /**
     * Display a listing of the resource.
     *
     * @param Torob $torob
     *
     * @return Response
     */
    public function index(Torob $torob)
    {
        $products = $torob->products()->paginate(100);

        return new TorobProductsCollection($products);
    }
}
