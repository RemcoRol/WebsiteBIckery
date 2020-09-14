<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            ['page_name' => 'Home', 'page_hidden' => 0, 'page_slug' => 'home', 'page_meta_title' => 'SEO Informatie voor home', 'page_meta_description' => 'Meta description voor home'],
            ['page_name' => 'Over ons', 'page_hidden' => 0, 'page_slug' => 'over-ons', 'page_meta_title' => 'SEO Informatie voor home', 'page_meta_description' => 'Meta description voor home'],
            ['page_name' => 'Premium Brands', 'page_hidden' => 0, 'page_slug' => 'premium-brands', 'page_meta_title' => 'SEO Informatie voor home', 'page_meta_description' => 'Meta description voor home'],
            ['page_name' => 'Premium Food', 'page_hidden' => 0, 'page_slug' => 'premium-food', 'page_meta_title' => 'SEO Informatie voor home', 'page_meta_description' => 'Meta description voor home'],
            ['page_name' => 'Premium Drinks', 'page_hidden' => 0, 'page_slug' => 'premium-drinks', 'page_meta_title' => 'SEO Informatie voor home', 'page_meta_description' => 'Meta description voor home'],
            ['page_name' => 'Geschenkpakketen', 'page_hidden' => 0, 'page_slug' => 'geschenkpakketten', 'page_meta_title' => 'SEO Informatie voor home', 'page_meta_description' => 'Meta description voor home'],
            ['page_name' => 'Thema Collecties', 'page_hidden' => 0, 'page_slug' => 'themacollecties', 'page_meta_title' => 'SEO Informatie voor home', 'page_meta_description' => 'Meta description voor home'],
            ['page_name' => 'Product Groepen', 'page_hidden' => 0, 'page_slug' => 'productgroepen', 'page_meta_title' => 'SEO Informatie voor home', 'page_meta_description' => 'Meta description voor home'],
            ['page_name' => 'Werken bij', 'page_hidden' => 0, 'page_slug' => 'werken-bij', 'page_meta_title' => 'SEO Informatie voor home', 'page_meta_description' => 'Meta description voor home'],
            ['page_name' => 'Testimonials', 'page_hidden' => 0, 'page_slug' => 'testimonials', 'page_meta_title' => 'SEO Informatie voor home', 'page_meta_description' => 'Meta description voor home'],
            ['page_name' => 'Vacatures', 'page_hidden' => 0, 'page_slug' => 'vacatures', 'page_meta_title' => 'SEO Informatie voor home', 'page_meta_description' => 'Meta description voor home'],
            ['page_name' => 'Nieuws', 'page_hidden' => 0, 'page_slug' => 'nieuws', 'page_meta_title' => 'SEO Informatie voor home', 'page_meta_description' => 'Meta description voor home'],
            ['page_name' => 'Contact', 'page_hidden' => 0, 'page_slug' => 'contact', 'page_meta_title' => 'SEO Informatie voor home', 'page_meta_description' => 'Meta description voor home'],
        ]);
    }
}
