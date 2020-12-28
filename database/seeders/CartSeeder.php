<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cart = [
            'Payment' => 'delivery',
            'Status' => 'not delivered',
            'c_Date' => date('Y-m-d H:i:s'),
            'u_Id' => 2
        ];
        DB::table('carts')->insert($cart);
    }
}
