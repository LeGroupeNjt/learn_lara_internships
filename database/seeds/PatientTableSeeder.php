<?php

use Illuminate\Database\Seeder;

class PatientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients')->insert([
            'nom' => Str::random(10),
            'prenom' => Str::random(10),
            'sexe' => Str::random(10),
            'age' => Str::random(10),
            'numtele' => Str::random(10),
            'cin' => Str::random(10)
        ]);
    }
}
