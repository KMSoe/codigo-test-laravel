<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();

        User::create([
            "name" => "Kaung Myat Soe",
            "email" => "kaungmyatsoe.m192@gmail.com",
            "password" => bcrypt(111111),
        ]);

        User::create([
            "name" => "Kaung Myat Soe",
            "email" => "kaungmyatsoe.m193@gmail.com",
            "password" => bcrypt(111111),
        ]);
        $this->call(TagsSeeder::class);
        $this->call(PackagesSeeder::class);
        \App\Models\PromoCode::factory(5)->create();

    }
}
