<?php

namespace Modules\Product\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use Modules\Product\Entities\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Product\Http\Requests\SaveProductRequest;
use Modules\Product\Transformers\ProductEditResource;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use NiceShop\Exports\ProductsExport;
use NiceShop\Imports\ProductsImport;
use NiceShop\Imports\ProductsUpdateImport;


class ProductController
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected string $model = Product::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected string $label = 'product::products.product';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected string $viewPath = 'product::admin.products';

    /**
     * Form requests for the resource.
     *
     * @var array|string
     */
    protected string|array $validation = SaveProductRequest::class;


    /**
     * Store a newly created resource in storage.
     *
     * @return Response|JsonResponse
     */
    public function store()
    {
        $this->disableSearchSyncing();

        // دریافت داده‌های فرم
        $data = $this->getRequest('store')->all();

        // اطمینان از ارسال مقدار عددی برای partner_price
        if (isset($data['partner_price']) && is_array($data['partner_price'])) {
            $data['partner_price'] = $data['partner_price']['amount'] ?? null;
        }

        // ایجاد محصول با داده‌های اصلاح شده
        $entity = $this->getModel()->create($data);

        $this->searchable($entity);

        $message = trans('admin::messages.resource_created', ['resource' => $this->getLabel()]);

        if (request()->query('exit_flash')) {
            session()->flash('exit_flash', $message);
        }

        if (request()->wantsJson()) {
            return response()->json(
                [
                    'success' => true,
                    'message' => $message,
                    'product_id' => $entity->id,
                ],
                200
            );
        }

        return redirect()->route("{$this->getRoutePrefix()}.index")
            ->withSuccess($message);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Factory|View|Application
     */
    public function edit($id): Factory|View|Application
    {
        $entity = $this->getEntity($id);
        $productEditResource = new ProductEditResource($entity);

        return view("{$this->viewPath}.edit",
            [
                'product' => $entity,
                'product_resource' => $productEditResource->response()->content(),
            ]
        );
    }

    public function importFromExcel(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|file|mimes:xlsx,xls',
        ]);

        $file = $request->file('excel_file');

        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $timestamp = Carbon::now()->format('Y_m_d_H_i_s');
        $uniqueFilename = $filename . '_' . $timestamp . '.' . $extension;


        $path = $file->move(public_path('uploads'), $uniqueFilename);
        $fullPath = public_path('uploads/' . $uniqueFilename);
        Excel::import(new ProductsImport, $fullPath);
        $message = trans('admin::messages.resource_created', ['resource' => $this->getLabel()]);
        return redirect()->route("{$this->getRoutePrefix()}.index")
            ->withSuccess($message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     */
    public function update($id)
    {
        $entity = $this->getEntity($id);

        $this->disableSearchSyncing();

        // دریافت داده‌های فرم
        $data = $this->getRequest('update')->all();

        // اطمینان از ارسال مقدار عددی برای partner_price
        if (isset($data['partner_price']) && is_array($data['partner_price'])) {
            $data['partner_price'] = $data['partner_price']['amount'] ?? null;
        }

        // به‌روزرسانی محصول با داده‌های اصلاح شده
        $entity->update($data);

        $entity->withoutEvents(function () use ($entity) {
            $entity->touch();
        });

        $productEditResource = new ProductEditResource($entity);

        $this->searchable($entity);

        $message = trans('admin::messages.resource_updated', ['resource' => $this->getLabel()]);

        if (request()->query('exit_flash')) {
            session()->flash('exit_flash', $message);
        }

        if (request()->wantsJson()) {
            return response()->json(
                [
                    'success' => true,
                    'message' => $message,
                    'product_resource' => $productEditResource,
                ],
                200
            );
        }
    }

    public function exportSelected(Request $request)
    {

        $productIds = explode(',', $request->input('selected_products', ''));
        if (empty($productIds)) {
            return back()->with('error', 'لطفا حداقل یک محصول را انتخاب کنید.');
        }

        return Excel::download(new ProductsExport($productIds), 'selected_products.xlsx');
    }

    public function importProducts(Request $request)
    {
        // بررسی اینکه فایلی آپلود شده است
        if (!$request->hasFile('file')) {
            return back()->with('error', 'لطفا یک فایل اکسل انتخاب کنید.');
        }

        $file = $request->file('file');

        // بررسی نوع فایل (باید اکسل باشد)
        if (!in_array($file->getClientOriginalExtension(), ['xls', 'xlsx', 'csv'])) {
            return back()->with('error', 'فایل باید در فرمت اکسل باشد.');
        }

        // استفاده از کلاس `ProductsImport` برای پردازش داده‌ها
        Excel::import(new ProductsUpdateImport, $file);

        return back()->with('success', 'محصولات با موفقیت به‌روزرسانی شدند.');
    }

}
