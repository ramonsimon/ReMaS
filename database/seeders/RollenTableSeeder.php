<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RollenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run()
    {
        DB::table('rollen')->insert([
            [
                'naam' => 'Algemene medewerker',
                'omschrijving' => 'Heeft toegang tot rapportage functies',
                'waarde' => 8,
            ],
            [
                'naam' => 'Medewerker Inname',
                'omschrijving' => 'Verantwoordelijk voor inname en heeft toegang tot rapportage functies',
                'waarde' => 9,
            ],
            [
                'naam' => 'Medewerker Verwerking',
                'omschrijving' => 'Verantwoordelijk voor verwerking, uitgifte en heeft toegang tot rapportage functies',
                'waarde' => 14,
            ],
            [
                'naam' => 'Medewerker Uitgifte',
                'omschrijving' => 'Verantwoordelijk voor uitgifte en heeft toegang tot rapportage functies',
                'waarde' => 12,
            ],
            [
                'naam' => 'Applicatiebeheerder',
                'omschrijving' => 'Heeft toegang tot alle functies behalve gebruikersbeheer',
                'waarde' => 15,
            ],
            [
                'naam' => 'Administrator',
                'omschrijving' => 'Heeft volledige toegang tot alle functies',
                'waarde' => 63,
            ],
        ]);

    }

}
