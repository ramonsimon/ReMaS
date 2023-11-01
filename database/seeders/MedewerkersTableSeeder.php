<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MedewerkersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('medewerkers')->insert([
            [
                'rol_id' => 2,  // bijvoorbeeld medewerker inname
                'naam' => 'Johan de Vries',
                'wachtwoord' => Hash::make('wachtwoord123'),  // Voorbeeld wachtwoord
                'emailadres' => 'johan.devries@example.com',
            ],
            [
                'rol_id' => 3,  // bijvoorbeeld medewerker demontage
                'naam' => 'Els van Dijk',
                'wachtwoord' => Hash::make('elsDijk2023'),  // Voorbeeld wachtwoord
                'emailadres' => 'els.vandijk@example.com',
            ],
            [
                'rol_id' => 4,  // bijvoorbeeld medewerker uitgifte
                'naam' => 'Pieter Bakker',
                'wachtwoord' => Hash::make('pieterBakker!'),  // Voorbeeld wachtwoord
                'emailadres' => 'pieter.bakker@example.com',
            ],
            ]);
    }
}
