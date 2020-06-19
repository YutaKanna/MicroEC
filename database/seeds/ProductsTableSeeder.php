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
                'name' => 'Product_1',
                'slug' => 'product_1',
                'description' => 'test',
                'price' => '1000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Product_2',
                'slug' => 'product_2',
                'description' => 'test',
                'price' => '1000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Product_3',
                'slug' => 'product_3',
                'description' => 'test',
                'price' => '1000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Product_4',
                'slug' => 'product_4',
                'description' => 'test',
                'price' => '1000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Product_5',
                'slug' => 'product_5',
                'description' => 'test',
                'price' => '1000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
