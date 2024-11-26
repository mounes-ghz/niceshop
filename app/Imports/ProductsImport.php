<?php

namespace NiceShop\Imports;

use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Modules\Product\Entities\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel,WithHeadingRow
{
    public function model(array $row)
    {
        Log::info($row);
        $product = Product::create([
            'name' => $row['name'],
            'price' => intval($row['price']),
            'brand_id' => intval($row['brand_id']),
            'is_active' => true,
            'is_virtual' => false,
            'manage_stock' => 0,
            'special_price_type' => 'fixed',
            'description' => $row['description'],
        ]);

        // سپس دسته‌بندی‌ها را ذخیره کنید
        if (!empty($row['categories'])) {
            $categories = explode(',', $row['categories']);
            $product->categories()->sync($categories);
        }

        // در صورت نیاز دانلودها را نیز مدیریت کنید
//        if (!empty($row['downloads'])) {
//            $downloads = explode(',', $row['downloads']);
//            $product->downloads()->sync($downloads);
//        }

        return $product;
    }
}
