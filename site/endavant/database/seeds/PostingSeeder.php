<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Model::unguard();

        DB::table('postingtypes')->truncate();
        DB::table('postings')->truncate();


               $type1 = new \App\postingtype();
        $type1->type = 'Studentenjob';
        $type1->save();

        $type2 = new \App\postingtype();
        $type2->type = 'Stage';
        $type2->save();

        $pos = new \App\posting();
        $pos->title = 'Dit is de titel van de job';
        $pos->description = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tria genera bonorum; Multoque hoc melius nos veriusque quam Stoici. Quod quidem nobis non saepe contingit. </p>

<ol>
	<li>Duo Reges: constructio interrete.</li>
	<li>Praeclare, inquit, facis, cum et eorum memoriam tenes, quorum uterque tibi testamento liberos suos commendavit, et puerum diligis.</li>
	<li>Quod si ita est, sequitur id ipsum, quod te velle video, omnes semper beatos esse sapientes.</li>
	<li>Nam quibus rebus efficiuntur voluptates, eae non sunt in potestate sapientis.</li>
</ol>


';
        $pos->reason = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Qualem igitur hominem natura inchoavit? Ea possunt paria non esse. Sed ad rem redeamus; Duo Reges: constructio interrete. </p>
';
        $pos->company_id = 1;
        $pos->postingtype_id = 1;
        $pos->save();

        $pos2 = new \App\posting();
        $pos2->title = 'Dit is de titel van de job';
        $pos2->description = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tria genera bonorum; Multoque hoc melius nos veriusque quam Stoici. Quod quidem nobis non saepe contingit. </p>

<ol>
	<li>Duo Reges: constructio interrete.</li>
	<li>Praeclare, inquit, facis, cum et eorum memoriam tenes, quorum uterque tibi testamento liberos suos commendavit, et puerum diligis.</li>
	<li>Quod si ita est, sequitur id ipsum, quod te velle video, omnes semper beatos esse sapientes.</li>
	<li>Nam quibus rebus efficiuntur voluptates, eae non sunt in potestate sapientis.</li>
</ol>


';
        $pos2->reason = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Qualem igitur hominem natura inchoavit? Ea possunt paria non esse. Sed ad rem redeamus; Duo Reges: constructio interrete. </p>
';
        $pos2->company_id = 1;
        $pos2->postingtype_id = 1;
        $pos2->save();

        $pos3 = new \App\posting();
        $pos3->title = 'Dit is de titel van de job';
        $pos3->description = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tria genera bonorum; Multoque hoc melius nos veriusque quam Stoici. Quod quidem nobis non saepe contingit. </p>

<ol>
	<li>Duo Reges: constructio interrete.</li>
	<li>Praeclare, inquit, facis, cum et eorum memoriam tenes, quorum uterque tibi testamento liberos suos commendavit, et puerum diligis.</li>
	<li>Quod si ita est, sequitur id ipsum, quod te velle video, omnes semper beatos esse sapientes.</li>
	<li>Nam quibus rebus efficiuntur voluptates, eae non sunt in potestate sapientis.</li>
</ol>


';
        $pos3->reason = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Qualem igitur hominem natura inchoavit? Ea possunt paria non esse. Sed ad rem redeamus; Duo Reges: constructio interrete. </p>
';
        $pos3->company_id = 1;
        $pos3->postingtype_id = 1;
        $pos3->save();

    }
}
