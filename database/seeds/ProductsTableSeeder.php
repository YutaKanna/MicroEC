<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'iPhoneX',
                'slug' => 'iphone-x',
                'description' => 'This is iPhoneX',
                'price' => '100000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Macbook Air',
                'slug' => 'macbook-air',
                'description' => 'This is Macbook Air',
                'price' => '150000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Macbook Pro',
                'slug' => 'macbook-pro',
                'description' => 'This is Macbook Air',
                'price' => '300000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'iPad',
                'slug' => 'ipad',
                'description' => 'This is Macbook Air',
                'price' => '100000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Apple Watch',
                'slug' => 'apple-watch',
                'description' => 'This is Apple Watch',
                'price' => '50000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
