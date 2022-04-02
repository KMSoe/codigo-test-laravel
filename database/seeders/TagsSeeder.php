<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // DB::table('tags')->truncate();

        DB::table('tags')->insert(
            [
                [
                    'name' => 'Popular'
                ],
                [
                    'name' => 'New'
                ],
                [
                    'name' => 'Limited'
                ],
            ]
        );
    }
}
