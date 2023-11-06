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
                // Algemene medewerker
                'rol_id' => 1,
                'naam' => 'Johan de Vries',
                'wachtwoord' => Hash::make('wachtwoord123'),
                'emailadres' => 'johan.devries@example.com',
            ],
            [
                // Medewerker Inname
                'rol_id' => 2,
                'naam' => 'Els van Dijk',
                'wachtwoord' => Hash::make('elsDijk2023'),
                'emailadres' => 'els.vandijk@example.com',
            ],
            [
                // Medewerker Verwerking
                'rol_id' => 3,
                'naam' => 'Pieter Bakker',
                'wachtwoord' => Hash::make('wachtwoord123'),
                'emailadres' => 'pieter.bakker@example.com',
            ],
            [
                // Medewerker Uitgifte
                'rol_id' => 4,
                'naam' => 'Anna Jansen',
                'wachtwoord' => Hash::make('wachtwoord123'),
                'emailadres' => 'anna.jansen@example.com',
            ],
            [
                // Applicatiebeheerder
                'rol_id' => 5,
                'naam' => 'David Smit',
                'wachtwoord' => Hash::make('wachtwoord123'),
                'emailadres' => 'david.smit@example.com',
            ],
            [
                // Administrator
                'rol_id' => 6,
                'naam' => 'Linda de Boer',
                'wachtwoord' => Hash::make('wachtwoord123'),
                'emailadres' => 'linda.deboer@example.com',
            ],
        ]);

    }
}
