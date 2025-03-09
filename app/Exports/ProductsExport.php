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

          return Product::whereIn('id', $this->productIds)->get()->map(function ($product) {
                 $variant = $product->variants()->first(); // اولین متغیر محصول

              return [
                  'id' => $product->id,
                  'name' => $product->name,
                  'brand_id'=>$product->brand_id,
                  'stock' => $product->stock ?? ($variant ? $variant->qty : null), // موجودی از `products` یا `variants`
                  'partner_price' => !is_null($product->partner_price) ? optional($product->partner_price)->amount()
                      : ($variant ? optional($variant->partner_price)->amount() : null), // قیمت همکار
                  'price' => optional($product->price)->amount() ?? ($variant ? optional($variant->price)->amount() : null), // دریافت مقدار از `variants` اگر `null` باشد
                  'special_price' => !is_null($product->special_price) ? optional($product->special_price)->amount()
                      : ($variant ? optional($variant->special_price)->amount() : null), // قیمت ویژه
                  'special_price_start' => !is_null($product->special_price_start) ? optional($product->special_price_start)->format('Y-m-d H:i:s')
                      : ($variant ? optional($variant->special_price_start)->format('Y-m-d H:i:s') : null), // تاریخ و ساعت شروع قیمت ویژه
                  'special_price_end' => !is_null($product->special_price_end) ? optional($product->special_price_end)->format('Y-m-d H:i:s')
                      : ($variant ? optional($variant->special_price_end)->format('Y-m-d H:i:s') : null), // تاریخ و ساعت پایان قیمت ویژه
              ];

             });

    }

    public function headings(): array
    {
        return ["id", "name", "brand_id", "stock","partner_price","price","special_price","special_price_start","special_price_end"];
    }
}
