<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $q1 = new \App\question();
        $q1->question = "Hoe schrijf ik me in als student bij Endavant?";
        $q1->save();
        $q2 = new \App\question();
        $q2->question = "Hoe schrijf ik me in als bedrijf bij Endavant?";
        $q2->save();

        $a1 = new \App\answer();
        $a1->answer="Heel simpel. Je drukt op registreren en dan vul je gewoon jouw gegevens in en klaar is kees.";
        $a1->question_id=$q1->id;
        $a1->save();

        $a2 = new \App\answer();
        $a2->answer="Heel simpel. Je drukt op registreren en dan vul je gewoon jouw gegevens in en die van jouw bedrijf en klaar is kees.";
        $a2->question_id=$q2->id;
        $a2->save();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');



    }
}
