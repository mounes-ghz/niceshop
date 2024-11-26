<?php

namespace NiceShop\Imports;

use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Modules\Brand\Entities\Brand;
use Modules\Category\Entities\Category;
use Modules\Product\Entities\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel,WithHeadingRow
{
    public function model(array $row)
    {
        try {
            if (empty($row['name']) || empty($row['brand_id']) || !is_numeric($row['brand_id'])) {
                return null;
            }

            $brandId = intval($row['brand_id']);
            if (!Brand::find($brandId)) {
                Log::warning("Brand ID {$brandId} not found in the database.");
                return null;
            }

            $product = Product::create([
                'name' => $row['name'],
                'price' => intval($row['price']),
                'brand_id' => $brandId,
                'is_active' => true,
                'is_virtual' => false,
                'manage_stock' => 0,
                'special_price_type' => 'fixed',
                'description' => $row['description'],
                'special_price'=>intval($row['price']),
            ]);

            $categories = explode(',', $row['categories']);
            $product->categories()->sync($categories);

Log::info($product->categories);
            return $product;
        } catch (\Exception $e) {
            Log::error("Error processing row: " . $e->getMessage(), $row);
            return null; // ادامه دادن به رکوردهای بعدی
        }
    }

//    public function model(array $row)
//    {
//        Log::info($row);
//        $product = Product::create([
//            'name' => $row['name'],
//            'price' => intval($row['price']),
//            'brand_id' => intval($row['brand_id']),
//            'is_active' => true,
//            'is_virtual' => false,
//            'manage_stock' => 0,
//            'special_price_type' => 'fixed',
//            'description' => $row['description'],
//        ]);
//
//        // سپس دسته‌بندی‌ها را ذخیره کنید
//        if (!empty($row['categories'])) {
//            $categories = explode(',', $row['categories']);
//            $product->categories()->sync($categories);
//        }
//
//        // در صورت نیاز دانلودها را نیز مدیریت کنید
////        if (!empty($row['downloads'])) {
////            $downloads = explode(',', $row['downloads']);
////            $product->downloads()->sync($downloads);
////        }
//
//        return $product;
//    }
}
