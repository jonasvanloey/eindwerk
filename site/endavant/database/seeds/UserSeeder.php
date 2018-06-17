<?php

use App\company;
use App\Role;
use App\student;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Geocoder\Facades\Geocoder;

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

        $studentrole = Role::where('name', 'student')->first();
        $company = Role::where('name', 'company')->first();

        $student1 = new User();
        $student1->name = 'Ben';
        $student1->familyname = 'van Geel';
        $student1->phone_number = '0475 91 20 33';
        $student1->date_of_birth = '05/05/1995';
        $student1->email = 'benvg@gmail.com';
        $student1->adress = 'Jules Moretuslei 21';
        $student1->city = 'Wilrijk';
        $student1->zip_code = '2610';
        $student1->password = Hash::make('Endavant1997');
        $adress = 'Jules Moretuslei 21 2610 Wilrijk';
        $afterGeo=Geocoder::getCoordinatesForAddress($adress);
        $student1->latitude = $afterGeo['lat'];
        $student1->longtitude = $afterGeo['lng'];
        $student1->save();
        $student1->roles()->attach($studentrole);

        $stud = new student();
        $stud->description = null;
        $stud->user_id = $student1->id;
        $stud->save();

        $student2 = new User();
        $student2->name = 'Vincent';
        $student2->familyname = 'Brel';
        $student2->phone_number = '0499 25 41 56';
        $student2->date_of_birth = '05/11/1994';
        $student2->email = 'vincent.brel@gmail.com';
        $student2->adress = 'Jodenstraat 10';
        $student2->city = 'Gent';
        $student2->zip_code = '9000';
        $student2->password = Hash::make('Endavant1997');
        $adress = 'Jodenstraat 10 9000 Gent';
        $afterGeo=Geocoder::getCoordinatesForAddress($adress);
        $student2->latitude = $afterGeo['lat'];
        $student2->longtitude = $afterGeo['lng'];
        $student2->save();
        $student2->roles()->attach($studentrole);

        $stud2 = new student();
        $stud2->description = null;
        $stud2->user_id = $student2->id;
        $stud2->save();

        $user2 = new User();
        $user2->name = 'Bert';
        $user2->familyname = 'Baas';
        $user2->phone_number = '0471 47 53 45';
        $user2->date_of_birth = '01/02/1992';
        $user2->email = 'bbaas@gmail.com';
        $user2->adress = 'Recollettenlei 1';
        $user2->city = 'Gent';
        $user2->zip_code = '9000';
        $user2->password = Hash::make('Endavant1997');
        $adress = 'Recollettenlei 1 9000 Gent';
        $afterGeo=Geocoder::getCoordinatesForAddress($adress);
        $user2->latitude = $afterGeo['lat'];
        $user2->longtitude = $afterGeo['lng'];
        $user2->save();
        $user2->roles()->attach($company);

        $bus = new company();
        $bus->name = 'Bakkerij Aernoudt Gent Centrum';
        $bus->vat_number = 'BE34 578 95632';
        $bus->adress = 'Recollettenlei 1';
        $adress = 'Recollettenlei 1 9000 Gent';
        $afterGeo=Geocoder::getCoordinatesForAddress($adress);
        $bus->latitude = $afterGeo['lat'];
        $bus->longtitude = $afterGeo['lng'];
        $bus->phone_number = '0471 47 53 45';
        $bus->description = null;
        $bus->city = 'Gent';
        $bus->zip_code = '9000';
        $bus->save();
        $bus->users()->attach($user2->id);

        $user3 = new User();
        $user3->name = 'Frans';
        $user3->familyname = 'Van dun';
        $user3->phone_number = '0493 45 78 63';
        $user3->date_of_birth = '01/02/1982';
        $user3->email = 'Fransvand@gmail.com';
        $user3->adress = 'Bist 82';
        $user3->city = 'Wilrijk';
        $user3->zip_code = '2610';
        $user3->password = Hash::make('Endavant1997');
        $adress = 'Bist 82 2610 Wilrijk';
        $afterGeo=Geocoder::getCoordinatesForAddress($adress);
        $user3->latitude = $afterGeo['lat'];
        $user3->longtitude = $afterGeo['lng'];
        $user3->save();
        $user3->roles()->attach($company);

        $bus2 = new company();
        $bus2->name = 'kapsalon bist';
        $bus2->vat_number = 'BE34 578 95648';
        $bus2->adress = 'Bist 82';
        $adress = 'Bist 82 2610 Wilrijk';
        $afterGeo=Geocoder::getCoordinatesForAddress($adress);
        $bus2->latitude = $afterGeo['lat'];
        $bus2->longtitude = $afterGeo['lng'];
        $bus2->phone_number = '0493 45 78 63';
        $bus2->description = null;
        $bus2->city = 'Wilrijk';
        $bus2->zip_code = '2610';
        $bus2->save();
        $bus2->users()->attach($user3->id);

        $user4 = new User();
        $user4->name = 'Frederik';
        $user4->familyname = 'Slabak';
        $user4->phone_number = '0493 45 78 87';
        $user4->date_of_birth = '01/12/1992';
        $user4->email = 'FSlabak@gmail.com';
        $user4->adress = 'Oostmalsesteenweg 124i';
        $user4->city = 'Ranst';
        $user4->zip_code = '2520';
        $user4->password = Hash::make('Endavant1997');
        $adress = 'Oostmalsesteenweg 124i, 2520 Ranst';
        $afterGeo=Geocoder::getCoordinatesForAddress($adress);
        $user4->latitude = $afterGeo['lat'];
        $user4->longtitude = $afterGeo['lng'];
        $user4->save();
        $user4->roles()->attach($company);

        $bus3 = new company();
        $bus3->name = 'Evenementen SB';
        $bus3->vat_number = 'BE34 578 95688';
        $bus3->adress = 'Oostmalsesteenweg 124i';
        $adress = 'Oostmalsesteenweg 124i, 2520 Ranst';
        $afterGeo=Geocoder::getCoordinatesForAddress($adress);
        $bus3->latitude = $afterGeo['lat'];
        $bus3->longtitude = $afterGeo['lng'];
        $bus3->phone_number = '0493 45 78 63';
        $bus3->description = null;
        $bus3->city = 'Ranst';
        $bus3->zip_code = '2520';
        $bus3->save();
        $bus3->users()->attach($user4->id);

    }
}
