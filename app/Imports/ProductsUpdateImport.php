<?php

namespace NiceShop\Imports;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Product\Entities\Product;
use Illuminate\Support\Collection;
use Modules\Product\Http\Requests\SaveProductRequest;

class ProductsUpdateImport implements ToCollection, WithHeadingRow
{
    use HasCrudActions;

    protected string $model = Product::class;
    protected string $label = 'product::products.product';
    protected string $viewPath = 'product::admin.products';
    protected string|array $validation = SaveProductRequest::class;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $entity = $this->getEntity($row['id']);

            if (!$entity) {
                Log::warning("⚠ محصول با ID {$row['id']} یافت نشد.");
                continue;
            }

            $variant = $entity->variants()->first(); // دریافت اولین متغیر محصول

            // ✅ مقداردهی داده‌های جدید از اکسل (اگر مقدار جدید نبود، مقدار قبلی حفظ شود)
            $data = [
                'name' => $row['name'] ?? $entity->name,
                'stock' => isset($row['stock']) ? (int) $row['stock'] : ($entity->stock ?? ($variant ? $variant->qty : null)),
                'partner_price' => isset($row['partner_price']) ? (float) $row['partner_price'] : ($entity->partner_price ?? ($variant ? $variant->partner_price : null)),
                'price' => isset($row['price']) ? (float) $row['price'] : ($entity->price ?? ($variant ? $variant->price : null)),
                'special_price' => isset($row['special_price']) ? (float) $row['special_price'] : ($entity->special_price ?? ($variant ? $variant->special_price : null)),
                'special_price_start' => isset($row['special_price_start']) ? Carbon::parse($row['special_price_start']) : ($entity->special_price_start ?? ($variant ? $variant->special_price_start : null)),
                'special_price_end' => isset($row['special_price_end']) ? Carbon::parse($row['special_price_end']) : ($entity->special_price_end ?? ($variant ? $variant->special_price_end : null)),
                'tax_class_id' => isset($row['tax_class_id']) ? $row['tax_class_id'] : $entity->tax_class_id,
                'sku' => isset($row['sku']) ? $row['sku'] : $entity->sku,
                'in_stock' => isset($row['in_stock']) ? (bool) $row['in_stock'] : $entity->in_stock,
                'updated_at' => Carbon::now(),
            ];

            // ✅ به‌روزرسانی محصول **بدون اجرای eventها که ممکن است فایل‌ها را تحت تأثیر قرار دهد**
            $entity->updateQuietly($data);

            // ✅ اگر محصول متغیر دارد، مقدار `stock`, `price`, `partner_price` و `special_price` را در `variants` هم آپدیت کنیم
            if ($variant) {
                $variantData = [
                    'qty' => $data['stock'],
                    'price' => isset($row['price']) ? (float) $row['price'] : $variant->price,
                    'partner_price' => isset($row['partner_price']) ? (float) $row['partner_price'] : $variant->partner_price,
                    'special_price' => isset($row['special_price']) ? (float) $row['special_price'] : $variant->special_price,
                    'special_price_start' => isset($row['special_price_start']) ? Carbon::parse($row['special_price_start']) : $variant->special_price_start,
                    'special_price_end' => isset($row['special_price_end']) ? Carbon::parse($row['special_price_end']) : $variant->special_price_end,
                ];
                $variant->updateQuietly($variantData);
            }

            Log::info("✅ محصول با ID {$row['id']} و متغیر آن با موفقیت آپدیت شد.");
        }
    }
}
