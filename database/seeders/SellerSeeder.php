<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seller;
use Illuminate\Support\Facades\Hash;

class SellerSeeder extends Seeder
{
    public function run(): void
    {
        Seller::create([
            'name' => 'Seller',
            'email' => 'seller@gmail.com',
            'password' => Hash::make('seller123'),
        ]);
    }
}
