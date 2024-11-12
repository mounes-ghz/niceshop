<?php

namespace Modules\Slider\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sliders')->insert([
            'id' => 1,
            'speed' => 1000,
            'autoplay' => 1,
            'autoplay_speed' => 5000,
            'fade' => 0,
            'dots' => 1,
            'arrows' => 1,
        ]);

        DB::table('slider_translations')->insert([
            [
                'id' => 2,
                'slider_id' => 1,
                'locale' => 'fa',
                'name' => 'اسلایدر اصلی',
            ],
        ]);

        DB::table('slider_slides')->insert([
            [
                'id' => 1,
                'slider_id' => 1,
                'options' => '{"caption_1":{"delay":null,"effect":"fadeInUp"},"caption_2":{"delay":null,"effect":"fadeInUp"},"call_to_action":{"delay":null,"effect":"fadeInUp"}}',
                'call_to_action_url' => '#',
                'open_in_new_window' => 1,
                'position' => 0,
            ],
            [
                'id' => 2,
                'slider_id' => 1,
                'options' => '{"caption_1":{"delay":null,"effect":"fadeInUp"},"caption_2":{"delay":null,"effect":"fadeInUp"},"call_to_action":{"delay":null,"effect":"fadeInUp"}}',
                'call_to_action_url' => '#',
                'open_in_new_window' => 0,
                'position' => 1,
            ],
            [
                'id' => 3,
                'slider_id' => 1,
                'options' => '{"caption_1":{"delay":null,"effect":"fadeInUp"},"caption_2":{"delay":null,"effect":"fadeInUp"},"call_to_action":{"delay":null,"effect":"fadeInUp"}}',
                'call_to_action_url' => '#',
                'open_in_new_window' => 0,
                'position' => 2,
            ],
        ]);

        DB::table('slider_slide_translations')->insert([
            [
                'id' => 4,
                'slider_slide_id' => 1,
                'locale' => 'fa',
                'file_id' => 1353,
                'caption_1' => 'بلندگوی <b>شیائومی</b>',
                'caption_2' => 'ارتقاء کیفیت و کنترل در خانه وجود دارد',
                'call_to_action_text' => 'خرید',
                'direction' => 'left',
            ],
            [
                'id' => 5,
                'slider_slide_id' => 2,
                'locale' => 'fa',
                'file_id' => 1354,
                'caption_1' => 'مویک سه  <b>پرو</b>',
                'caption_2' => 'فروشگاه خلاق برای دوربین های پرواز و کنترلرهای پرواز',
                'call_to_action_text' => 'خرید',
                'direction' => 'left',
            ],
            [
                'id' => 6,
                'slider_slide_id' => 3,
                'locale' => 'fa',
                'file_id' => 1355,
                'caption_1' => 'واقعیت مجازی <b>سه بعدی</b>',
                'caption_2' => 'عینک سه بعدی VR با گیم پد کنترل از راه دور با بهترین قیمت',
                'call_to_action_text' => 'خرید',
                'direction' => 'left',
            ],
        ]);
    }
}
