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
            Log::info($row);

            if (empty($row['name']) || empty($row['brand_id']) || !is_numeric($row['brand_id'])) {
                Log::warning("Invalid row skipped: ", $row);
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
            ]);

            if (!empty($row['categories'])) {
                // تقسیم دسته‌بندی‌ها بر اساس ویرگول یا جداکننده
                $categories = explode(',', $row['categories']);

                // تبدیل دسته‌بندی‌ها به آرایه‌ای از اعداد صحیح
                $categories = array_map('intval', $categories);

                // بررسی وجود دسته‌بندی‌ها در پایگاه داده
                $existingCategories = Category::whereIn('id', $categories)->pluck('id')->toArray();

                if (!empty($existingCategories)) {
                    $product->categories()->sync($existingCategories);
                    Log::info("Categories synced: ", $existingCategories);
                } else {
                    Log::warning("No valid categories found for product: ", $categories);
                }
            }


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
