<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OnderdelenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('onderdelen')->insert([
            [
                'naam' => 'Moederbord',
                'omschrijving' => 'Het centrale circuitbord van een computer',
                'voorraad_kg' => 200,
                'prijs_per_kg' => 50.00,
            ],
            [
                'naam' => 'RAM Geheugen',
                'omschrijving' => 'Geheugenmodules gebruikt om tijdelijke data op te slaan',
                'voorraad_kg' => 150,
                'prijs_per_kg' => 60.00,
            ],
            [
                'naam' => 'Grafische Kaart',
                'omschrijving' => 'Een kaart die beelden genereert voor weergave op een monitor',
                'voorraad_kg' => 100,
                'prijs_per_kg' => 120.00,
            ],
            [
                'naam' => 'SSD Opslag',
                'omschrijving' => 'Snelle opslag drive voor het opslaan van bestanden',
                'voorraad_kg' => 180,
                'prijs_per_kg' => 80.00,
            ],
        ]);
    }
}
