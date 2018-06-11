<?php

use App\tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles=['website','game','grafisch werk','UX','app','plugin','poster','flyer','animatiefilmpje','3D visualisatie'];

        foreach ($roles as $role){
            $tag = new tag();
            $tag->tag = $role;
            $tag->save();
        }
    }
}
