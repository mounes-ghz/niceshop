<?php

namespace Modules\FlashSale\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FlashSaleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('flash_sales')->insert([
            'id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('flash_sale_translations')->insert([
            'id' => 1,
            'flash_sale_id' => 1,
            'locale' => 'fa',
            'campaign_name' => 'فروش فوری'
        ]);

        DB::table('flash_sale_products')->insert([
            [
                'id' => 1,
                'flash_sale_id' => 1,
                'product_id' => 2,
                'end_date' => now()->addDays(25),
                'price' => '27000.0000',
                'qty' => 15,
                'position' => 0,
            ],
            [
                'id' => 2,
                'flash_sale_id' => 1,
                'product_id' => 94,
                'end_date' => now()->addDays(15),
                'price' => '93000.0000',
                'qty' => 22,
                'position' => 1,
            ],
            [
                'id' => 3,
                'flash_sale_id' => 1,
                'product_id' => 116,
                'end_date' => now()->addDays(20),
                'price' => '91200.0000',
                'qty' => 34,
                'position' => 2,
            ],
        ]);
    }
}
