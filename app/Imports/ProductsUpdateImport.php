<?php

namespace NiceShop\Imports;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Modules\Product\Entities\Product;
use Modules\Product\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Collection;

class ProductsUpdateImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        $productController = new ProductController(); // 🔹 ساخت یک نمونه از کنترلر

        foreach ($rows as $row) {
            // ✅ پیدا کردن محصول
            $product=  Product::with(['variations', 'variations.values', 'variations.values.files', 'variants', 'variants.files', 'categories', 'tags', 'attributes.attribute.attributeSet', 'options', 'files', 'reviews'])
                ->where('id', $row['id'])
                ->firstOrFail();
            if (!$product) {
                Log::warning("محصول با ID {$row['id']} یافت نشد.");
                continue;
            }

            if (!empty($row['name'])){
              $product->update([
                  'name'=> $row['name'],
                  'updated_at'=>Carbon::now()
              ]);
            }
            $product->refresh(); // 🟢 کل اطلاعات مدل از دیتابیس دوباره بارگذاری می‌شود
            $product->load('files');
            // ✅ مقداردهی مقادیر جدید از اکسل
//            $updatedData = [
//                'price' => is_numeric($row['price']) ? intval($row['price']) : null,
//                'partner_price' => is_numeric($row['partner_price']) ? intval($row['partner_price']) : null,
//                'special_price' => is_numeric($row['special_price']) ? intval($row['special_price']) : null,
//                'name' => !empty($row['name']) ? $row['name'] : $product->name,
//                'updated_at' => now(),
//            ];

//            // ✅ اگر هیچ تغییری وجود نداشت، ادامه بده
//            if (empty(array_filter($updatedData))) {
//                continue;
//            }
//
//            // ✅ شبیه‌سازی `request()` و ارسال به `update()`
//            $request = Request::create(route('admin.products.update', $product->id), 'PUT', $updatedData);
//            request()->replace($updatedData); // 🔹 جایگزینی داده‌های درخواست فعلی
//
//            // ✅ اجرای متد `update()` از `ProductController`
//            $productController->update($product->id);

//            Log::info("✅ محصول با ID {$product->id} از طریق `update()` به‌روزرسانی شد.", $updatedData);
        }
    }
}
