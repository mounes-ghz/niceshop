<?php

namespace Modules\Category\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CategoryDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $categories = [
            [
                "id" => 181,
                "parent_id" => null,
                "slug" => "electronics",
                "position" => 0,
                "is_searchable" => true,
                "is_active" => true,
                "name" => "الکترونیک"
            ],
            [
                "id" => 12,
                "parent_id" => null,
                "slug" => "mens-fashion",
                "position" => 32,
                "is_searchable" => true,
                "is_active" => true,
                "name" => "مد مردانه"
            ],
            [
                "id" => 59,
                "parent_id" => null,
                "slug" => "consumer-electronics",
                "position" => 65,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "الکترونیک مصرفی"
            ],
            [
                "id" => 82,
                "parent_id" => null,
                "slug" => "watches",
                "position" => 95,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "ساعت"
            ],
            [
                "id" => 156,
                "parent_id" => null,
                "slug" => "home-appliances",
                "position" => 106,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "لوازم خانگی"
            ],
            [
                "id" => 98,
                "parent_id" => null,
                "slug" => "backpacks",
                "position" => 123,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "کوله‌پشتی"
            ],
            [
                "id" => 126,
                "parent_id" => null,
                "slug" => "womens-fashion",
                "position" => 133,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "مد زنانه"
            ],
            [
                "id" => 13,
                "parent_id" => 12,
                "slug" => "clothing",
                "position" => 33,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "پوشاک"
            ],
            [
                "id" => 19,
                "parent_id" => 12,
                "slug" => "shoes",
                "position" => 40,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "کفش"
            ],
            [
                "id" => 27,
                "parent_id" => 12,
                "slug" => "outerwear-jackets",
                "position" => 47,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "پوشاک و کت بیرونی"
            ],
            [
                "id" => 35,
                "parent_id" => 12,
                "slug" => "hot-sale",
                "position" => 53,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "فروش ویژه"
            ],
            [
                "id" => 52,
                "parent_id" => 12,
                "slug" => "bottoms",
                "position" => 59,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "شلوار"
            ],
            [
                "id" => 15,
                "parent_id" => 13,
                "slug" => "shirts",
                "position" => 34,
                "is_searchable" => true,
                "is_active" => true,
                "name" => "پیراهن"
            ],
            [
                "id" => 14,
                "parent_id" => 13,
                "slug" => "all-clothing",
                "position" => 35,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "تمام پوشاک"
            ],
            [
                "id" => 16,
                "parent_id" => 13,
                "slug" => "sportswear",
                "position" => 36,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "لباس ورزشی"
            ],
            [
                "id" => 17,
                "parent_id" => 13,
                "slug" => "tees-polos",
                "position" => 37,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "کمربند"
            ],
            [
                "id" => 18,
                "parent_id" => 13,
                "slug" => "pants",
                "position" => 38,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "شلوار"
            ],
            [
                "id" => 26,
                "parent_id" => 13,
                "slug" => "formal-shoes",
                "position" => 39,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "کفش رسمی"
            ],
            [
                "id" => 20,
                "parent_id" => 19,
                "slug" => "all-shoes",
                "position" => 41,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "تمام کفش‌ها"
            ],
            [
                "id" => 21,
                "parent_id" => 19,
                "slug" => "sneakers",
                "position" => 42,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "کتانی"
            ],
            [
                "id" => 22,
                "parent_id" => 19,
                "slug" => "boots",
                "position" => 43,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "چکمه"
            ],
            [
                "id" => 23,
                "parent_id" => 19,
                "slug" => "sandals",
                "position" => 44,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "صندل"
            ],
            [
                "id" => 24,
                "parent_id" => 19,
                "slug" => "slippers-flip-flops",
                "position" => 45,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "دمپایی و صندل انگشتی"
            ],
            [
                "id" => 25,
                "parent_id" => 19,
                "slug" => "sports-shoes",
                "position" => 46,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "کفش ورزشی"
            ],
            [
                "id" => 28,
                "parent_id" => 27,
                "slug" => "trench",
                "position" => 48,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "بارانی"
            ],
            [
                "id" => 30,
                "parent_id" => 27,
                "slug" => "genuine-leather",
                "position" => 49,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "چرم طبیعی"
            ],
            [
                "id" => 32,
                "parent_id" => 27,
                "slug" => "down-jackets",
                "position" => 50,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "کت پشمی"
            ],
            [
                "id" => 33,
                "parent_id" => 27,
                "slug" => "wool-blends",
                "position" => 51,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "پشم و ترکیبی"
            ],
            [
                "id" => 34,
                "parent_id" => 27,
                "slug" => "suits-blazer",
                "position" => 52,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "کت و شلوار و بلزر"
            ],
            [
                "id" => 36,
                "parent_id" => 35,
                "slug" => "hoodies-sweatshirts",
                "position" => 54,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "عینک"
            ],
            [
                "id" => 37,
                "parent_id" => 35,
                "slug" => "jackets",
                "position" => 55,
                "is_searchable" => true,
                "is_active" => true,
                "name" => "کت"
            ],
            [
                "id" => 38,
                "parent_id" => 35,
                "slug" => "t-shirts",
                "position" => 56,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "تی‌شرت"
            ],
            [
                "id" => 39,
                "parent_id" => 35,
                "slug" => "shirts-Qfb3u0OP",
                "position" => 57,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "پیراهن"
            ],
            [
                "id" => 40,
                "parent_id" => 35,
                "slug" => "sweaters",
                "position" => 58,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "کمربند"
            ],
            [
                "id" => 53,
                "parent_id" => 52,
                "slug" => "casual-pants",
                "position" => 60,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "شلوار کژوال"
            ],
            [
                "id" => 54,
                "parent_id" => 52,
                "slug" => "sweatpants",
                "position" => 61,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "شلوار ورزشی"
            ],
            [
                "id" => 55,
                "parent_id" => 52,
                "slug" => "cargo-pants",
                "position" => 62,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "شلوار کارگو"
            ],
            [
                "id" => 56,
                "parent_id" => 52,
                "slug" => "jeans",
                "position" => 63,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "جین"
            ],
            [
                "id" => 57,
                "parent_id" => 52,
                "slug" => "harem-pants",
                "position" => 64,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "شلوار هارم"
            ],
            [
                "id" => 120,
                "parent_id" => 59,
                "slug" => "televisions",
                "position" => 66,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "تلویزیون"
            ],
            [
                "id" => 7,
                "parent_id" => 59,
                "slug" => "gadgets",
                "position" => 67,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "گجت"
            ],
            [
                "id" => 142,
                "parent_id" => 59,
                "slug" => "drone",
                "position" => 68,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "پهپاد"
            ],
            [
                "id" => 108,
                "parent_id" => 59,
                "slug" => "accessories-supplies",
                "position" => 69,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "لوازم"
            ],
            [
                "id" => 109,
                "parent_id" => 59,
                "slug" => "camera-photo",
                "position" => 70,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "دوربین و عکاسی"
            ],
            [
                "id" => 110,
                "parent_id" => 59,
                "slug" => "car-vehicle-electronics",
                "position" => 71,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "خودرو و وسایل نقلیه"
            ],
            [
                "id" => 111,
                "parent_id" => 59,
                "slug" => "cell-phones-accessories",
                "position" => 72,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "تلفن همراه"
            ],
            [
                "id" => 112,
                "parent_id" => 59,
                "slug" => "computers-accessories",
                "position" => 73,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "کامپیوتر"
            ],
            [
                "id" => 113,
                "parent_id" => 59,
                "slug" => "gps-navigation",
                "position" => 74,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "جی‌پی‌اس و مسیریابی"
            ],
            [
                "id" => 114,
                "parent_id" => 59,
                "slug" => "headphones",
                "position" => 75,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "هدفون"
            ],
            [
                "id" => 115,
                "parent_id" => 59,
                "slug" => "home-audio",
                "position" => 76,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "صوت خانگی"
            ],
            [
                "id" => 116,
                "parent_id" => 59,
                "slug" => "office-electronics",
                "position" => 77,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "الکترونیک اداری"
            ],
            [
                "id" => 117,
                "parent_id" => 59,
                "slug" => "portable-audio-video",
                "position" => 78,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "صوت و تصویر"
            ],
            [
                "id" => 118,
                "parent_id" => 59,
                "slug" => "security-surveillance",
                "position" => 79,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "امنیت"
            ],
            [
                "id" => 119,
                "parent_id" => 59,
                "slug" => "service-plans",
                "position" => 80,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "طرح خدماتی"
            ],
            [
                "id" => 121,
                "parent_id" => 59,
                "slug" => "video-game-consoles-accessories",
                "position" => 81,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "بازی ویدئویی"
            ],
            [
                "id" => 122,
                "parent_id" => 59,
                "slug" => "video-projectors",
                "position" => 82,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "ویدئو پروژکتور"
            ],
            [
                "id" => 123,
                "parent_id" => 59,
                "slug" => "wearable-technology",
                "position" => 83,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "تکنولوژی پوشیدنی"
            ],
            [
                "id" => 124,
                "parent_id" => 59,
                "slug" => "ebook-readers-accessories",
                "position" => 84,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "کتابخوان الکترونیکی"
            ],
            [
                "id" => 60,
                "parent_id" => 59,
                "slug" => "computers-office-supplies",
                "position" => 85,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "لوازم اداری"
            ],
            [
                "id" => 61,
                "parent_id" => 59,
                "slug" => "all-computers",
                "position" => 86,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "تمام کامپیوترها"
            ],
            [
                "id" => 63,
                "parent_id" => 59,
                "slug" => "desktops-monitors",
                "position" => 87,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "رایانه رومیزی و مانیتور"
            ],
            [
                "id" => 64,
                "parent_id" => 59,
                "slug" => "drives-storage",
                "position" => 88,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "درایو و ذخیره‌سازی"
            ],
            [
                "id" => 65,
                "parent_id" => 59,
                "slug" => "networking",
                "position" => 89,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "شبکه‌سازی"
            ],
            [
                "id" => 66,
                "parent_id" => 59,
                "slug" => "keyboards-mice",
                "position" => 90,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "کیبورد و ماوس"
            ],
            [
                "id" => 67,
                "parent_id" => 59,
                "slug" => "pc-gaming",
                "position" => 91,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "بازی کامپیوتری"
            ],
            [
                "id" => 68,
                "parent_id" => 59,
                "slug" => "all-computer-accessories",
                "position" => 92,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "لوازم جانبی کامپیوتر"
            ],
            [
                "id" => 69,
                "parent_id" => 59,
                "slug" => "printers-ink",
                "position" => 93,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "پرینتر و جوهر"
            ],
            [
                "id" => 70,
                "parent_id" => 59,
                "slug" => "office-school-supplies",
                "position" => 94,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "لوازم اداری"
            ],
            [
                "id" => 83,
                "parent_id" => 82,
                "slug" => "mens-watches",
                "position" => 96,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "ساعت مردانه"
            ],
            [
                "id" => 88,
                "parent_id" => 82,
                "slug" => "womens-watches",
                "position" => 101,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "ساعت زنانه"
            ],
            [
                "id" => 89,
                "parent_id" => 82,
                "slug" => "childrens-watches",
                "position" => 102,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "ساعت کودک"
            ],
            [
                "id" => 90,
                "parent_id" => 82,
                "slug" => "pocket-fob-watches",
                "position" => 103,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "ساعت جیبی"
            ],
            [
                "id" => 91,
                "parent_id" => 82,
                "slug" => "watch-accessories",
                "position" => 104,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "لوازم جانبی ساعت"
            ],
            [
                "id" => 92,
                "parent_id" => 82,
                "slug" => "womens-bracelet-watches",
                "position" => 105,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "دستبند زنانه"
            ],
            [
                "id" => 84,
                "parent_id" => 83,
                "slug" => "quartz-watches",
                "position" => 97,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "ساعت آنالوگ"
            ],
            [
                "id" => 85,
                "parent_id" => 83,
                "slug" => "sports-watches",
                "position" => 98,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "ساعت ورزشی"
            ],
            [
                "id" => 86,
                "parent_id" => 83,
                "slug" => "mechanical-watches",
                "position" => 99,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "ساعت مکانیکی"
            ],
            [
                "id" => 87,
                "parent_id" => 83,
                "slug" => "digital-watches",
                "position" => 100,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "ساعت دیجیتال"
            ],
            [
                "id" => 99,
                "parent_id" => 98,
                "slug" => "mens-bags",
                "position" => 124,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "کیف مردانه"
            ],
            [
                "id" => 100,
                "parent_id" => 98,
                "slug" => "womens-bags",
                "position" => 125,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "کیف زنانه"
            ],
            [
                "id" => 102,
                "parent_id" => 98,
                "slug" => "wallets",
                "position" => 127,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "کیف پول"
            ],
            [
                "id" => 103,
                "parent_id" => 98,
                "slug" => "kids-babys-bags",
                "position" => 128,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "کیف کودک و نوزاد"
            ],
            [
                "id" => 104,
                "parent_id" => 98,
                "slug" => "luggage-travel-bags",
                "position" => 129,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "کیف سفر"
            ],
            [
                "id" => 105,
                "parent_id" => 98,
                "slug" => "functional-bags",
                "position" => 130,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "کیف کاربردی"
            ],
            [
                "id" => 106,
                "parent_id" => 98,
                "slug" => "coin-purses-holders",
                "position" => 131,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "کیف سکه"
            ],
            [
                "id" => 107,
                "parent_id" => 98,
                "slug" => "bag-parts-accessories",
                "position" => 132,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "قطعات کیف"
            ],
            [
                "id" => 127,
                "parent_id" => 126,
                "slug" => "all-beauty",
                "position" => 134,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "تمام لوازم زیبایی"
            ],
            [
                "id" => 128,
                "parent_id" => 126,
                "slug" => "make-up",
                "position" => 135,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "آرایش"
            ],
            [
                "id" => 129,
                "parent_id" => 126,
                "slug" => "luxury-beauty",
                "position" => 136,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "زیبایی لوکس"
            ],
            [
                "id" => 130,
                "parent_id" => 126,
                "slug" => "mens-grooming",
                "position" => 137,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "ساعت"
            ],
            [
                "id" => 213,
                "parent_id" => 126,
                "slug" => "necklace",
                "position" => 138,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "گردنبند"
            ],
            [
                "id" => 133,
                "parent_id" => 126,
                "slug" => "perfumes-for-men",
                "position" => 139,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "انگشتر"
            ],
            [
                "id" => 131,
                "parent_id" => 126,
                "slug" => "skin-care",
                "position" => 140,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "عینک"
            ],
            [
                "id" => 132,
                "parent_id" => 126,
                "slug" => "all-perfumes",
                "position" => 141,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "تمام عطرها"
            ],
            [
                "id" => 134,
                "parent_id" => 126,
                "slug" => "perfumes-for-women",
                "position" => 142,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "عطر زنانه"
            ],
            [
                "id" => 135,
                "parent_id" => 126,
                "slug" => "gift-sets",
                "position" => 143,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "ست هدیه"
            ],
            [
                "id" => 136,
                "parent_id" => 126,
                "slug" => "all-health-personal-care",
                "position" => 144,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "تمام لوازم بهداشتی"
            ],
            [
                "id" => 137,
                "parent_id" => 126,
                "slug" => "personal-care-appliances-9wjMnr3m",
                "position" => 145,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "مراقبت شخصی"
            ],
            [
                "id" => 138,
                "parent_id" => 126,
                "slug" => "hair-care-styling",
                "position" => 146,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "مراقبت از مو و حالت‌دهی"
            ],
            [
                "id" => 139,
                "parent_id" => 126,
                "slug" => "bath-body",
                "position" => 147,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "حمام و بدن"
            ],
            [
                "id" => 140,
                "parent_id" => 126,
                "slug" => "dental-care",
                "position" => 148,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "مراقبت از دندان"
            ],
            [
                "id" => 141,
                "parent_id" => 126,
                "slug" => "diet-nutrition",
                "position" => 149,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "رژیم و تغذیه"
            ],
            [
                "id" => 157,
                "parent_id" => 156,
                "slug" => "bedding",
                "position" => 107,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "ملزومات خواب"
            ],
            [
                "id" => 158,
                "parent_id" => 156,
                "slug" => "furniture",
                "position" => 108,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "مبلمان"
            ],
            [
                "id" => 159,
                "parent_id" => 156,
                "slug" => "decor",
                "position" => 109,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "تزئینات"
            ],
            [
                "id" => 160,
                "parent_id" => 156,
                "slug" => "curtains",
                "position" => 110,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "پرده"
            ],
            [
                "id" => 161,
                "parent_id" => 156,
                "slug" => "kitcher-utensils",
                "position" => 111,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "لوازم آشپزخانه"
            ],
            [
                "id" => 162,
                "parent_id" => 156,
                "slug" => "cooking-baking",
                "position" => 112,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "پخت و پز"
            ],
            [
                "id" => 163,
                "parent_id" => 156,
                "slug" => "gas-stove",
                "position" => 113,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "گاز و اجاق"
            ],
            [
                "id" => 164,
                "parent_id" => 156,
                "slug" => "plastics-melamine",
                "position" => 114,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "پلاستیک و ملامین"
            ],
            [
                "id" => 165,
                "parent_id" => 156,
                "slug" => "ceramics-dinnerware",
                "position" => 115,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "ظروف سرامیکی و سرویس غذاخوری"
            ],
            [
                "id" => 166,
                "parent_id" => 156,
                "slug" => "storage-organisation",
                "position" => 116,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "ذخیره‌سازی و سازماندهی"
            ],
            [
                "id" => 167,
                "parent_id" => 156,
                "slug" => "home-care",
                "position" => 117,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "مراقبت از خانه"
            ],
            [
                "id" => 168,
                "parent_id" => 156,
                "slug" => "cleaning-tools",
                "position" => 118,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "ابزارهای نظافت"
            ],
            [
                "id" => 169,
                "parent_id" => 156,
                "slug" => "laundry",
                "position" => 119,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "لباسشویی"
            ],
            [
                "id" => 170,
                "parent_id" => 156,
                "slug" => "towel",
                "position" => 120,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "حوله"
            ],
            [
                "id" => 171,
                "parent_id" => 156,
                "slug" => "travel-accessories",
                "position" => 121,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "لوازم سفر"
            ],
            [
                "id" => 172,
                "parent_id" => 156,
                "slug" => "pest-control",
                "position" => 122,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "کنترل آفات"
            ],
            [
                "id" => 183,
                "parent_id" => 181,
                "slug" => "mobiles",
                "position" => 1,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "موبایل"
            ],
            [
                "id" => 185,
                "parent_id" => 181,
                "slug" => "mobile-accessories",
                "position" => 8,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "لوازم جانبی موبایل"
            ],
            [
                "id" => 184,
                "parent_id" => 181,
                "slug" => "hot-brands",
                "position" => 15,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "برندهای داغ"
            ],
            [
                "id" => 182,
                "parent_id" => 181,
                "slug" => "laptops",
                "position" => 21,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "لپ‌تاپ"
            ],
            [
                "id" => 186,
                "parent_id" => 181,
                "slug" => "computer-accessories",
                "position" => 27,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "لوازم جانبی کامپیوتر"
            ],
            [
                "id" => 204,
                "parent_id" => 182,
                "slug" => "mackbook",
                "position" => 22,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "مک‌بوک"
            ],
            [
                "id" => 205,
                "parent_id" => 182,
                "slug" => "gaming",
                "position" => 23,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "بازی"
            ],
            [
                "id" => 206,
                "parent_id" => 182,
                "slug" => "ultraslim",
                "position" => 24,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "باریک و سبک"
            ],
            [
                "id" => 207,
                "parent_id" => 182,
                "slug" => "tablets",
                "position" => 25,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "تبلت"
            ],
            [
                "id" => 212,
                "parent_id" => 182,
                "slug" => "all-laptops",
                "position" => 26,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "تمام لپ‌تاپ‌ها"
            ],
            [
                "id" => 192,
                "parent_id" => 183,
                "slug" => "smartphones",
                "position" => 2,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "گوشی هوشمند"
            ],
            [
                "id" => 193,
                "parent_id" => 183,
                "slug" => "android",
                "position" => 3,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "اندروید"
            ],
            [
                "id" => 194,
                "parent_id" => 183,
                "slug" => "iphone",
                "position" => 4,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "آیفون"
            ],
            [
                "id" => 195,
                "parent_id" => 183,
                "slug" => "featured",
                "position" => 5,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "ویژه"
            ],
            [
                "id" => 196,
                "parent_id" => 183,
                "slug" => "refurbished",
                "position" => 6,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "تعمیر شده"
            ],
            [
                "id" => 197,
                "parent_id" => 183,
                "slug" => "brands",
                "position" => 7,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "برندها"
            ],
            [
                "id" => 187,
                "parent_id" => 184,
                "slug" => "oneplus",
                "position" => 16,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "وان‌پلاس"
            ],
            [
                "id" => 188,
                "parent_id" => 184,
                "slug" => "apple",
                "position" => 17,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "اپل"
            ],
            [
                "id" => 189,
                "parent_id" => 184,
                "slug" => "samsung",
                "position" => 18,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "سامسونگ"
            ],
            [
                "id" => 190,
                "parent_id" => 184,
                "slug" => "huawei",
                "position" => 19,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "هواوی"
            ],
            [
                "id" => 191,
                "parent_id" => 184,
                "slug" => "sony",
                "position" => 20,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "سونی"
            ],
            [
                "id" => 198,
                "parent_id" => 185,
                "slug" => "cases-covers",
                "position" => 9,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "قاب و پوشش"
            ],
            [
                "id" => 199,
                "parent_id" => 185,
                "slug" => "cables",
                "position" => 10,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "کابل"
            ],
            [
                "id" => 200,
                "parent_id" => 185,
                "slug" => "chargers",
                "position" => 11,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "شارژر"
            ],
            [
                "id" => 201,
                "parent_id" => 185,
                "slug" => "power-bank",
                "position" => 12,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "پاور بانک"
            ],
            [
                "id" => 202,
                "parent_id" => 185,
                "slug" => "mobile-headphones",
                "position" => 13,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "هدفون"
            ],
            [
                "id" => 203,
                "parent_id" => 185,
                "slug" => "screen-protectors",
                "position" => 14,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "محافظ صفحه نمایش"
            ],
            [
                "id" => 208,
                "parent_id" => 186,
                "slug" => "monitors",
                "position" => 28,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "مانیتور"
            ],
            [
                "id" => 209,
                "parent_id" => 186,
                "slug" => "keyboard-mouse",
                "position" => 29,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "کیبورد و ماوس"
            ],
            [
                "id" => 210,
                "parent_id" => 186,
                "slug" => "pendrive",
                "position" => 30,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "فلش مموری"
            ],
            [
                "id" => 211,
                "parent_id" => 186,
                "slug" => "speaker",
                "position" => 31,
                "is_searchable" => false,
                "is_active" => true,
                "name" => "بلندگو"
            ]
        ];


        foreach ($categories as $category) {
            DB::table('categories')->insert([
                "id" => $category['id'],
                "parent_id" => $category['parent_id'],
                "slug" => $category['slug'],
                "position" => $category['position'],
                "is_searchable" => $category['is_searchable'],
                "is_active" => $category['is_active'],
            ]);

            DB::table('category_translations')->insert([
                "category_id" => $category['id'],
                "locale" => 'fa',
                "name" => $category['name'],
            ]);
        }

        $categoryFiles = [
            [
                'id' => 1032,
                'file_id' => 1324,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 7,
                'locale' => 'en',
                'zone' => 'banner',
            ],
            [
                'id' => 1867,
                'file_id' => 1379,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 7,
                'locale' => 'fa',
                'zone' => 'banner',
            ],
            [
                'id' => 1019,
                'file_id' => 1325,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 12,
                'locale' => 'en',
                'zone' => 'banner',
            ],
            [
                'id' => 1020,
                'file_id' => 1332,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 12,
                'locale' => 'en',
                'zone' => 'logo',
            ],
            [
                'id' => 1860,
                'file_id' => 1332,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 12,
                'locale' => 'fa',
                'zone' => 'logo',
            ],
            [
                'id' => 1861,
                'file_id' => 1376,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 12,
                'locale' => 'fa',
                'zone' => 'banner',
            ],
            [
                'id' => 1021,
                'file_id' => 1325,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 13,
                'locale' => 'en',
                'zone' => 'banner',
            ],
            [
                'id' => 1862,
                'file_id' => 1376,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 13,
                'locale' => 'fa',
                'zone' => 'banner',
            ],
            [
                'id' => 1023,
                'file_id' => 1325,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 14,
                'locale' => 'en',
                'zone' => 'banner',
            ],
            [
                'id' => 1864,
                'file_id' => 1376,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 14,
                'locale' => 'fa',
                'zone' => 'banner',
            ],
            [
                'id' => 1022,
                'file_id' => 1326,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 15,
                'locale' => 'en',
                'zone' => 'banner',
            ],
            [
                'id' => 1863,
                'file_id' => 1376,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 15,
                'locale' => 'fa',
                'zone' => 'banner',
            ],
            [
                'id' => 1024,
                'file_id' => 1325,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 18,
                'locale' => 'en',
                'zone' => 'banner',
            ],
            [
                'id' => 1026,
                'file_id' => 1322,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 19,
                'locale' => 'en',
                'zone' => 'banner',
            ],
            [
                'id' => 1868,
                'file_id' => 1380,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 19,
                'locale' => 'fa',
                'zone' => 'banner',
            ],
            [
                'id' => 1027,
                'file_id' => 1322,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 20,
                'locale' => 'en',
                'zone' => 'banner',
            ],
            [
                'id' => 1869,
                'file_id' => 1380,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 20,
                'locale' => 'fa',
                'zone' => 'banner',
            ],
            [
                'id' => 1028,
                'file_id' => 1322,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 21,
                'locale' => 'en',
                'zone' => 'banner',
            ],
            [
                'id' => 1870,
                'file_id' => 1380,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 21,
                'locale' => 'fa',
                'zone' => 'banner',
            ],
            [
                'id' => 1025,
                'file_id' => 1322,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 26,
                'locale' => 'en',
                'zone' => 'banner',
            ],
            [
                'id' => 1029,
                'file_id' => 1325,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 35,
                'locale' => 'en',
                'zone' => 'banner',
            ],
            [
                'id' => 1030,
                'file_id' => 1320,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 59,
                'locale' => 'en',
                'zone' => 'banner',
            ],
            [
                'id' => 1866,
                'file_id' => 1374,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 59,
                'locale' => 'fa',
                'zone' => 'banner',
            ],
            [
                'id' => 1034,
                'file_id' => 1333,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 82,
                'locale' => 'en',
                'zone' => 'logo',
            ],
            [
                'id' => 1031,
                'file_id' => 1334,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 120,
                'locale' => 'en',
                'zone' => 'logo',
            ],
            [
                'id' => 1038,
                'file_id' => 1328,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 126,
                'locale' => 'en',
                'zone' => 'banner',
            ],
            [
                'id' => 1873,
                'file_id' => 1377,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 126,
                'locale' => 'fa',
                'zone' => 'banner',
            ],
            [
                'id' => 1039,
                'file_id' => 1328,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 127,
                'locale' => 'en',
                'zone' => 'banner',
            ],
            [
                'id' => 1874,
                'file_id' => 1377,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 127,
                'locale' => 'fa',
                'zone' => 'banner',
            ],
            [
                'id' => 1040,
                'file_id' => 1328,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 128,
                'locale' => 'en',
                'zone' => 'banner',
            ],
            [
                'id' => 1875,
                'file_id' => 1377,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 128,
                'locale' => 'fa',
                'zone' => 'banner',
            ],
            [
                'id' => 1041,
                'file_id' => 1329,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 129,
                'locale' => 'en',
                'zone' => 'banner',
            ],
            [
                'id' => 1876,
                'file_id' => 1381,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 129,
                'locale' => 'fa',
                'zone' => 'banner',
            ],
            [
                'id' => 1043,
                'file_id' => 1329,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 133,
                'locale' => 'en',
                'zone' => 'banner',
            ],
            [
                'id' => 1033,
                'file_id' => 1320,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 142,
                'locale' => 'en',
                'zone' => 'banner',
            ],
            [
                'id' => 1035,
                'file_id' => 1327,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 156,
                'locale' => 'en',
                'zone' => 'banner',
            ],
            [
                'id' => 1871,
                'file_id' => 1375,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 156,
                'locale' => 'fa',
                'zone' => 'banner',
            ],
            [
                'id' => 1036,
                'file_id' => 1327,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 161,
                'locale' => 'en',
                'zone' => 'banner',
            ],
            [
                'id' => 1872,
                'file_id' => 1375,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 161,
                'locale' => 'fa',
                'zone' => 'banner',
            ],
            [
                'id' => 1037,
                'file_id' => 1327,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 162,
                'locale' => 'en',
                'zone' => 'banner',
            ],
            [
                'id' => 1044,
                'file_id' => 1320,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 181,
                'locale' => 'en',
                'zone' => 'banner',
            ],
            [
                'id' => 1855,
                'file_id' => 1374,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 181,
                'locale' => 'fa',
                'zone' => 'banner',
            ],
            [
                'id' => 1016,
                'file_id' => 1323,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 182,
                'locale' => 'en',
                'zone' => 'banner',
            ],
            [
                'id' => 1017,
                'file_id' => 1331,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 182,
                'locale' => 'en',
                'zone' => 'logo',
            ],
            [
                'id' => 1858,
                'file_id' => 1331,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 182,
                'locale' => 'fa',
                'zone' => 'logo',
            ],
            [
                'id' => 1859,
                'file_id' => 1378,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 182,
                'locale' => 'fa',
                'zone' => 'banner',
            ],
            [
                'id' => 1011,
                'file_id' => 1323,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 183,
                'locale' => 'en',
                'zone' => 'banner',
            ],
            [
                'id' => 1012,
                'file_id' => 1330,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 183,
                'locale' => 'en',
                'zone' => 'logo',
            ],
            [
                'id' => 1856,
                'file_id' => 1330,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 183,
                'locale' => 'fa',
                'zone' => 'logo',
            ],
            [
                'id' => 1857,
                'file_id' => 1378,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 183,
                'locale' => 'fa',
                'zone' => 'banner',
            ],
            [
                'id' => 1013,
                'file_id' => 1324,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 184,
                'locale' => 'en',
                'zone' => 'banner',
            ],
            [
                'id' => 1865,
                'file_id' => 1376,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 184,
                'locale' => 'fa',
                'zone' => 'banner',
            ],
            [
                'id' => 1014,
                'file_id' => 1323,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 188,
                'locale' => 'en',
                'zone' => 'banner',
            ],
            [
                'id' => 1015,
                'file_id' => 1324,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 189,
                'locale' => 'en',
                'zone' => 'banner',
            ],
            [
                'id' => 1018,
                'file_id' => 1335,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 207,
                'locale' => 'en',
                'zone' => 'logo',
            ],
            [
                'id' => 1042,
                'file_id' => 1329,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 213,
                'locale' => 'en',
                'zone' => 'banner',
            ],
            [
                'id' => 1877,
                'file_id' => 1381,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 213,
                'locale' => 'fa',
                'zone' => 'banner',
            ],
            [
                'id' => 2600,
                'file_id' => 1392,
                'entity_type' => 'Modules\\Category\\Entities\\Category',
                'entity_id' => 215,
                'locale' => 'fa',
                'zone' => 'logo',
            ],
        ];

        foreach ($categoryFiles as $file) {
            DB::table('entity_files')->insert($file);
        }
    }
}
