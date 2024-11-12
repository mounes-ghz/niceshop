<?php

namespace NiceShop\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Core\Http\Requests\Request;

class InstallRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'db_host' => 'required',
            'db_port' => 'required',
            'db_username' => 'required',
            'db_password' => 'nullable',
            'db_database' => 'required',
            'admin_first_name' => 'required',
            'admin_last_name' => 'required',
            'admin_email' => 'required|email',
            'admin_phone' => 'required',
            'admin_password' => 'required|confirmed|min:6',
            'store_name' => 'required',
            'store_email' => 'required|email',
            'store_phone' => 'required',
            'store_search_engine' => ['required', Rule::in(['mysql', 'algolia', 'meilisearch'])],
            'algolia_app_id' => 'required_if:store_search_engine,algolia',
            'algolia_secret' => 'required_if:store_search_engine,algolia',
            'meilisearch_host' => 'required_if:store_search_engine,meilisearch',
            'meilisearch_key' => 'required_if:store_search_engine,meilisearch',
        ];
    }


    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'db_host'             => 'میزبان پایگاه داده',
            'db_port'             => 'پورت پایگاه داده',
            'db_username'         => 'نام کاربری پایگاه داده',
            'db_password'         => 'رمز عبور پایگاه داده',
            'db_database'         => 'نام پایگاه داده',
            'admin_first_name'    => 'نام',
            'admin_last_name'     => 'نام خانوادگی',
            'admin_email'         => 'ایمیل',
            'admin_phone'         => 'تلفن',
            'admin_password'      => 'رمز عبور',
            'store_name'          => 'نام فروشگاه',
            'store_email'         => 'ایمیل فروشگاه',
            'store_phone'         => 'تلفن فروشگاه',
            'store_search_engine' => 'موتور جستجو',
            'algolia_app_id'      => 'شناسه برنامه Algolia',
            'algolia_secret'      => 'کلید مدیریت Algolia',
            'meilisearch_host'    => 'میزبان Meilisearch',
            'meilisearch_key'     => 'کلید Meilisearch',
        ];
    }
}
