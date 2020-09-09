<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('categories')->insert([
            ['category_name' => 'Premium Food', 'category_type' => 0, 'category_hidden' => 0],
            ['category_name' => 'Premium Drinks', 'category_type' => 0, 'category_hidden' => 0],
            ['category_name' => 'Thema Collecties', 'category_type' => 1, 'category_hidden' => 0],
            ['category_name' => 'Product Groepen', 'category_type' => 1, 'category_hidden' => 0],
        ]);
    }
}
