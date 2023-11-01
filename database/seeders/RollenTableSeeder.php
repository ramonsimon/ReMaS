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
                'naam' => 'inwoner gemeente',
                'omschrijving' => 'Inwoner van de gemeente',
                'waarde' => 1,
            ],
            [
                'naam' => 'medewerker inname',
                'omschrijving' => 'Medewerker verantwoordelijk voor inname',
                'waarde' => 2,
            ],
            [
                'naam' => 'medewerker demontage',
                'omschrijving' => 'Medewerker verantwoordelijk voor demontage',
                'waarde' => 3,
            ],
            [
                'naam' => 'medewerker uitgifte',
                'omschrijving' => 'Medewerker verantwoordelijk voor uitgifte',
                'waarde' => 4,
            ],
            [
                'naam' => 'opkoper van de onderdelen',
                'omschrijving' => 'Opkoper die onderdelen koopt',
                'waarde' => 5,
            ],
            [
                'naam' => 'beleidsmedewerker gemeente',
                'omschrijving' => 'Medewerker die beleid bepaalt binnen de gemeente',
                'waarde' => 6,
            ],
            [
                'naam' => 'Administrator',
                'omschrijving' => 'Beheerder van het systeem',
                'waarde' => 7,
            ],
            [
                'naam' => 'medewerker gemeente',
                'omschrijving' => 'Algemene medewerker binnen de gemeente',
                'waarde' => 8,
            ],
        ]);
    }

}
