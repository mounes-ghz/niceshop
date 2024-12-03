<?php

namespace NiceShop\Imports;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Modules\Brand\Entities\Brand;
use Modules\Media\Eloquent\HasMedia;
use Modules\Product\Entities\Product;
use Illuminate\Support\Collection;

class ProductsImport implements ToCollection, WithHeadingRow
{
    use HasMedia;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if (empty($row['name']) || empty($row['brand_id']) || !is_numeric($row['brand_id'])) {
                continue;
            }

            $brandId = intval($row['brand_id']);
            if (!Brand::find($brandId)) {
                Log::warning("Brand ID {$brandId} not found in the database.");
                continue;
            }

            $categories = explode(',', $row['categories']);
            $downloads = explode(',', $row['downloads']);

            $product = Product::create([
                'name' => $row['name'],
                'price' => intval($row['price']),
                'brand_id' => $brandId,
                'is_active' => true,
                'is_virtual' => false,
                'manage_stock' => 1,
                'special_price_type' => 'fixed',
                'description' => $row['description'],
                'qty' => intval($row['qty'])
            ]);

            // مدیریت دسته‌بندی‌ها
            if (!empty($categories)) {
                $product->categories()->sync($categories);
            }

            if (!empty($downloads)) {
                foreach ($downloads as $download) {
                    $productFiles[] = [
                        'file_id' => $download,
                        'entity_type' => 'Modules\\Product\\Entities\\Product',
                        'entity_id' => $product->id,
                        'locale' => 'en',
                        'zone' => 'base_image'];

                }

                DB::table('entity_files')->insert($productFiles);
            }
        }
    }
}
