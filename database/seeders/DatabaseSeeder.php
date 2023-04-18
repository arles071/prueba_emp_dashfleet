<?php

namespace Database\Seeders;

use App\Models\Product;
use Database\Factories\OrderProductFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        //\App\Models\Customer::factory(10)->create();
        \App\Models\Product::factory(10)->create();
        \App\Models\Order::factory(10)->create()->each(function($order){
            $numProducts = mt_rand(1,10);

            $products = Product::select('id')
            ->inRandomOrder()
            ->limit($numProducts)
            ->distinct()
            ->get();
                      
            foreach($products as $product){
                DB::table('order_product')->insert([
                    [
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'cuantity' => rand(1, 10),
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                    ]);
            }
        });

    }
}
