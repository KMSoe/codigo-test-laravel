<?php

namespace Database\Seeders;

use App\Models\Package;
use Facade\Ignition\Support\FakeComposer;
use Illuminate\Database\Seeder;

class PackagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $packages = [
            [
                "name" => "Single Class",
                "description" => $faker->sentence(10),
                "type" => "non_shareable",
                "total_credit" => 1,
                "validity_month" => 0,
                "price" => 32.1,
                "gst_percent" => 7.00,
                "newbie_first_attend" => true,
                "newbie_addition_credit" => 0,
                "newbie_note" => $faker->text(),
                "alias" => "single-pack",
                "estimate_price" => 32.1
            ],
            [
                "name" => "10 Class Pack",
                "description" => $faker->sentence(10),
                "type" => "non_shareable",
                "total_credit" => 10,
                "validity_month" => 3,
                "price" => 235.4,
                "gst_percent" => 7.00,
                "newbie_first_attend" => true,
                "newbie_addition_credit" => 0,
                "newbie_note" => $faker->text(),
                "alias" => "pack-10",
                "estimate_price" => 23.54
            ],
            [
                "name" => "20 Class Pack",
                "description" => $faker->sentence(10),
                "type" => "non_shareable",
                "total_credit" => 20,
                "validity_month" => 3,
                "price" => 380.00,
                "gst_percent" => 7.00,
                "newbie_first_attend" => true,
                "newbie_addition_credit" => 0,
                "newbie_note" => $faker->text(),
                "alias" => "pack-20",
                "estimate_price" => 19.00
            ],
            [
                "name" => "30 Class Pack",
                "description" => $faker->sentence(10),
                "type" => "non_shareable",
                "total_credit" => 30,
                "validity_month" => 3,
                "price" => 540.0,
                "gst_percent" => 7.00,
                "newbie_first_attend" => false,
                "newbie_addition_credit" => 1,
                "newbie_note" => $faker->text(),
                "alias" => "pack-30",
                "estimate_price" => 18.00
            ],
            [
                "name" => "50 Share Pack",
                "description" => $faker->sentence(10),
                "type" => "shareable",
                "total_credit" => 50,
                "validity_month" => 12,
                "price" => 540.0,
                "gst_percent" => 7.00,
                "newbie_first_attend" => true,
                "newbie_addition_credit" => 1,
                "newbie_note" => $faker->text(),
                "alias" => "pack-30",
                "estimate_price" => 18.00
            ],
            [
                "name" => "Unlimated Classes",
                "description" => $faker->sentence(10),
                "type" => "unlimated",
                "total_credit" => 0,
                "validity_month" => 24,
                "price" => 1200,
                "gst_percent" => 7.00,
                "newbie_first_attend" => false,
                "newbie_addition_credit" => 1,
                "newbie_note" => $faker->text(),
                "alias" => "pack-30",
                "estimate_price" => 50
            ],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}
