<?php

namespace Modules\Page\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PageDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();

        $pages = [
            [
                "id" => 1,
                "slug" => "about-us",
                "is_active" => true,
                "name" => "درباره ما",
            ],
            [
                "id" => 2,
                "slug" => "faq",
                "is_active" => true,
                "name" => "سوالات متداول",
            ],
            [
                "id" => 3,
                "slug" => "return-policy",
                "is_active" => true,
                "name" => "سیاست بازگشت",
            ],
            [
                "id" => 4,
                "slug" => "terms-conditions",
                "is_active" => true,
                "name" => "مقررات",
            ],
            [
                "id" => 5,
                "slug" => "privacy-policy",
                "is_active" => true,
                "name" => "حریم خصوصی",
            ]
        ];

        foreach ($pages as $page) {
            $page['body'] = 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد کتابهای زیادی در شصت و سه درصد گذشته حال و آینده';

            DB::table('pages')->insert([
                "id" => $page['id'],
                "slug" => $page['slug'],
                "is_active" => $page['is_active'],
                "created_at" => now(),
                "updated_at" => now(),
            ]);

            DB::table('page_translations')->insert([
                "page_id" => $page['id'],
                "locale" => 'fa',
                "name" => $page['name'],
                "body" => $page['body'],
            ]);
        }
    }
}
