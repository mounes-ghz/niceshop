<?php

namespace NiceShop\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Modules\Product\Entities\Product;


class ProductsExport implements FromCollection,WithHeadings
{
    protected $productIds;

    public function __construct($productIds)
    {
        $this->productIds = $productIds;
    }


    public function collection()
    {
        return Product::whereIn('id', $this->productIds)->with(['variants'])
            ->get()
            ->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'brand_id' => $product->brand_id,
                    'price' => $product->price?->amount(),
                    'partner_price'=>$product->partner_price?->amount(),
                    'special_price' => $product->special_price ?? 0
                ];
            });
    }

    public function headings(): array
    {
        return ["id", "name", "brand_id", "price","partner_price","special_price"];
    }
}
