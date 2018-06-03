<?php

use App\company;
use App\Role;
use App\student;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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

        DB::table('students')->truncate();
        DB::table('companies')->truncate();
        DB::table('users')->truncate();

        $student = Role::where('name', 'student')->first();
        $company = Role::where('name', 'company')->first();

        $user = new User();
        $user->name = 'jonas';
        $user->familyname = 'van loey';
        $user->phone_number = '0471 47 53 45';
        $user->date_of_birth = '01/02/1997';
        $user->national_register = '0471-245-548';
        $user->email = 'jvanloey@gmail.com';
        $user->adress = 'jan de sadelerlaan 22';
        $user->city = 'Edegem';
        $user->zip_code = '2650';
        $user->password = Hash::make('2650Edegem');
        $user->save();
        $user->roles()->attach($student);

        $stud = new student();
        $stud->description = null;
        $stud->user_id = $user->id;
        $stud->save();

        $user2 = new User();
        $user2->name = 'Bert';
        $user2->familyname = 'Baas';
        $user2->phone_number = '0471 47 53 45';
        $user2->date_of_birth = '01/02/1997';
        $user2->national_register = '0471-245-548';
        $user2->email = 'bbaas@gmail.com';
        $user2->adress = 'jan de sadelerlaan 22';
        $user2->city = 'Edegem';
        $user2->zip_code = '2650';
        $user2->password = Hash::make('2650Edegem');
        $user2->save();
        $user2->roles()->attach($company);

        $bus = new company();
        $bus->name = 'mellow webdesign';
        $bus->vat_number = 'BE34 578 95632';
        $bus->adress = 'jan de sadelerlaan 22';
        $bus->phone_number = '0471 47 53 45';
        $bus->description = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Non enim, si omnia non sequebatur, idcirco non erat ortus illinc. <a href="http://loripsum.net/" target="_blank">Tum mihi Piso: Quid ergo?</a> <i>Haec et tu ita posuisti, et verba vestra sunt.</i> Mihi enim satis est, ipsis non satis. Quod si ita sit, cur opera philosophiae sit danda nescio. Duo Reges: constructio interrete. </p>

';
        $bus->city = 'Edegem';
        $bus->zip_code = '2650';
        $bus->save();
        $bus->users()->attach($user2->id);

    }
}
