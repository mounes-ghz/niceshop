<?php

namespace Modules\Torob\Transformers;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TorobProductsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($product) {

            if ($product->variant) {
                $price         = $product->variant->price->amount();
                $selling_price = $product->variant->selling_price->amount();
                $in_stock      = $product->variant->isInStock();
            } else {
                $price         = $product->price->amount();
                $selling_price = $product->selling_price->amount();
                $in_stock      = $product->isInStock();
            }

            $url = route('products.show', ['slug' => $product->slug]);

            return [
                'product_id'   => $product->id,
                'page_url'     => $url,
                'price'        => $selling_price,
                'availability' => $in_stock ? 'instock' : false,
                'old_price'    => $price,
            ];
        });
    }
}
