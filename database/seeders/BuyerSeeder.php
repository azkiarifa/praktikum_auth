<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buyer;
use Illuminate\Support\Facades\Hash;

class BuyerSeeder extends Seeder
{
    public function run(): void
    {
        Buyer::create([
            'name' => 'Buyer',
            'email' => 'buyer@gmail.com',
            'password' => Hash::make('buyer123'),
        ]);
    }
}
