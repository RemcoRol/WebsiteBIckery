<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            ['menu_title' => 'Home', 'menu_hidden' => 0, 'menu_parent_id' => 0, 'page_id' => 1],
            ['menu_title' => 'Over ons', 'menu_hidden' => 0, 'menu_parent_id' => 0, 'page_id' => 2],
            ['menu_title' => 'Premium Brands', 'menu_hidden' => 0, 'menu_parent_id' => 0, 'page_id' => 3],
            ['menu_title' => 'Premium Food', 'menu_hidden' => 0, 'menu_parent_id' => 3, 'page_id' => 4],
            ['menu_title' => 'Premium Drinks', 'menu_hidden' => 0, 'menu_parent_id' => 3, 'page_id' => 5],
            ['menu_title' => 'Geschenkpakketten', 'menu_hidden' => 0, 'menu_parent_id' => 0, 'page_id' => 6],
            ['menu_title' => 'Thema Collecties', 'menu_hidden' => 0, 'menu_parent_id' => 6, 'page_id' => 7],
            ['menu_title' => 'Product Groepen', 'menu_hidden' => 0, 'menu_parent_id' => 6, 'page_id' => 8],
            ['menu_title' => 'Werken bij', 'menu_hidden' => 0, 'menu_parent_id' => 0, 'page_id' => 9],
            ['menu_title' => 'Testimonials', 'menu_hidden' => 0, 'menu_parent_id' => 9, 'page_id' => 10],
            ['menu_title' => 'Vacatures', 'menu_hidden' => 0, 'menu_parent_id' => 9, 'page_id' => 11],
            ['menu_title' => 'Contact', 'menu_hidden' => 0, 'menu_parent_id' => 0, 'page_id' => 12],
            ['menu_title' => 'Nieuws', 'menu_hidden' => 0, 'menu_parent_id' => 0, 'page_id' => 13],
        ]);
    }
}
