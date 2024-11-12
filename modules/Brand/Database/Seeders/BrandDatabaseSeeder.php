<?php

namespace Modules\Brand\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BrandDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $brands = [
            [
                "id" => 1,
                "slug" => "apple",
                "is_active" => true,
                "name" => "اپل",

            ],
            [
                "id" => 2,
                "slug" => "samsung",
                "is_active" => true,
                "name" => "سامسونگ",

            ],
            [
                "id" => 3,
                "slug" => "huawei",
                "is_active" => true,
                "name" => "هواوی",

            ],
            [
                "id" => 4,
                "slug" => "oneplus",
                "is_active" => true,
                "name" => "وان پلاس",

            ],
            [
                "id" => 5,
                "slug" => "hp",
                "is_active" => true,
                "name" => "اچ پی",

            ],
            [
                "id" => 6,
                "slug" => "dell",
                "is_active" => true,
                "name" => "دل",

            ],
            [
                "id" => 7,
                "slug" => "acer",
                "is_active" => true,
                "name" => "ایسر",

            ],
            [
                "id" => 8,
                "slug" => "asus",
                "is_active" => true,
                "name" => "ایسوس",

            ],
            [
                "id" => 9,
                "slug" => "microsoft",
                "is_active" => true,
                "name" => "مایکروسافت",

            ],
            [
                "id" => 10,
                "slug" => "xiaomi",
                "is_active" => true,
                "name" => "لنوو",

            ],
            [
                "id" => 11,
                "slug" => "google",
                "is_active" => true,
                "name" => "ریباک",

            ],
            [
                "id" => 12,
                "slug" => "msi",
                "is_active" => true,
                "name" => "ام اس آی",

            ],
            [
                "id" => 14,
                "slug" => "lg",
                "is_active" => true,
                "name" => "ال جی",

            ],
            [
                "id" => 15,
                "slug" => "beats",
                "is_active" => true,
                "name" => "بیتس",

            ],
            [
                "id" => 16,
                "slug" => "adidas",
                "is_active" => true,
                "name" => "آدیداس",

            ],
            [
                "id" => 17,
                "slug" => "nike",
                "is_active" => true,
                "name" => "نایک",

            ],
            [
                "id" => 18,
                "slug" => "levis",
                "is_active" => true,
                "name" => "سونی",

            ],
            [
                "id" => 19,
                "slug" => "nokia",
                "is_active" => true,
                "name" => "نوکیا",

            ]
        ];


        foreach ($brands as $brand) {
            DB::table('brands')->insert([
                "id" => $brand['id'],
                "slug" => $brand['slug'],
                "is_active" => $brand['is_active'],
                "created_at" => now(),
                "updated_at" => now(),
            ]);

            DB::table('brand_translations')->insert([
                "brand_id" => $brand['id'],
                "locale" => 'fa',
                "name" => $brand['name'],
            ]);
        }

        $brandFiles = [
            [
                'id' => 1009,
                'file_id' => 1319,
                'entity_type' => 'Modules\\Brand\\Entities\\Brand',
                'entity_id' => 1,
                'locale' => 'en',
                'zone' => 'logo',
            ],
            [
                'id' => 1008,
                'file_id' => 1318,
                'entity_type' => 'Modules\\Brand\\Entities\\Brand',
                'entity_id' => 2,
                'locale' => 'en',
                'zone' => 'logo',
            ],
            [
                'id' => 1007,
                'file_id' => 1317,
                'entity_type' => 'Modules\\Brand\\Entities\\Brand',
                'entity_id' => 3,
                'locale' => 'en',
                'zone' => 'logo',
            ],
            [
                'id' => 1006,
                'file_id' => 1316,
                'entity_type' => 'Modules\\Brand\\Entities\\Brand',
                'entity_id' => 4,
                'locale' => 'en',
                'zone' => 'logo',
            ],
            [
                'id' => 1005,
                'file_id' => 1315,
                'entity_type' => 'Modules\\Brand\\Entities\\Brand',
                'entity_id' => 5,
                'locale' => 'en',
                'zone' => 'logo',
            ],
            [
                'id' => 1004,
                'file_id' => 1314,
                'entity_type' => 'Modules\\Brand\\Entities\\Brand',
                'entity_id' => 6,
                'locale' => 'en',
                'zone' => 'logo',
            ],
            [
                'id' => 1003,
                'file_id' => 1313,
                'entity_type' => 'Modules\\Brand\\Entities\\Brand',
                'entity_id' => 7,
                'locale' => 'en',
                'zone' => 'logo',
            ],
            [
                'id' => 1002,
                'file_id' => 1312,
                'entity_type' => 'Modules\\Brand\\Entities\\Brand',
                'entity_id' => 8,
                'locale' => 'en',
                'zone' => 'logo',
            ],
            [
                'id' => 1001,
                'file_id' => 1311,
                'entity_type' => 'Modules\\Brand\\Entities\\Brand',
                'entity_id' => 9,
                'locale' => 'en',
                'zone' => 'logo',
            ],
            [
                'id' => 1000,
                'file_id' => 1310,
                'entity_type' => 'Modules\\Brand\\Entities\\Brand',
                'entity_id' => 10,
                'locale' => 'en',
                'zone' => 'logo',
            ],
            [
                'id' => 999,
                'file_id' => 1309,
                'entity_type' => 'Modules\\Brand\\Entities\\Brand',
                'entity_id' => 11,
                'locale' => 'en',
                'zone' => 'logo',
            ],
            [
                'id' => 998,
                'file_id' => 1308,
                'entity_type' => 'Modules\\Brand\\Entities\\Brand',
                'entity_id' => 12,
                'locale' => 'en',
                'zone' => 'logo',
            ],
            [
                'id' => 997,
                'file_id' => 1307,
                'entity_type' => 'Modules\\Brand\\Entities\\Brand',
                'entity_id' => 14,
                'locale' => 'en',
                'zone' => 'logo',
            ],
            [
                'id' => 996,
                'file_id' => 1306,
                'entity_type' => 'Modules\\Brand\\Entities\\Brand',
                'entity_id' => 15,
                'locale' => 'en',
                'zone' => 'logo',
            ],
            [
                'id' => 995,
                'file_id' => 1305,
                'entity_type' => 'Modules\\Brand\\Entities\\Brand',
                'entity_id' => 16,
                'locale' => 'en',
                'zone' => 'logo',
            ],
            [
                'id' => 994,
                'file_id' => 1304,
                'entity_type' => 'Modules\\Brand\\Entities\\Brand',
                'entity_id' => 17,
                'locale' => 'en',
                'zone' => 'logo',
            ],
            [
                'id' => 993,
                'file_id' => 1303,
                'entity_type' => 'Modules\\Brand\\Entities\\Brand',
                'entity_id' => 18,
                'locale' => 'en',
                'zone' => 'logo',
            ],
            [
                'id' => 992,
                'file_id' => 1302,
                'entity_type' => 'Modules\\Brand\\Entities\\Brand',
                'entity_id' => 19,
                'locale' => 'en',
                'zone' => 'logo',
            ],
        ];

        foreach ($brandFiles as $file) {
            DB::table('entity_files')->insert($file);
        }
    }
}
