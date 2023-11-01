<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApparatenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('apparaten')->insert([
            [
                'naam' => 'iPhone 12 Pro Max',
                'omschrijving' => 'Apple smartphone met 6,7-inch OLED-display',
                'vergoeding' => 1100.00,
                'gewicht_gram' => 228,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Samsung Galaxy S21 Ultra',
                'omschrijving' => 'Samsung smartphone met 6,8-inch Dynamic AMOLED 2X',
                'vergoeding' => 1199.99,
                'gewicht_gram' => 228,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Dell XPS 15',
                'omschrijving' => 'Laptop met 15,6-inch 4K UHD+ touchscreen',
                'vergoeding' => 2200.50,
                'gewicht_gram' => 1800,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Apple Watch Series 7',
                'omschrijving' => 'Smartwatch met always-on Retina LTPO OLED-display',
                'vergoeding' => 429.00,
                'gewicht_gram' => 32,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Sony WH-1000XM4',
                'omschrijving' => 'Over-ear draadloze koptelefoon met noise cancelling',
                'vergoeding' => 350.00,
                'gewicht_gram' => 254,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Canon EOS R5',
                'omschrijving' => 'Full-frame mirrorless camera',
                'vergoeding' => 3899.99,
                'gewicht_gram' => 738,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
