<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
            $admin->name = 'admin';
        $admin->description = 'An admin';
        $admin->save();

        $role_student = new Role();
        $role_student->name = 'student';
        $role_student->description = 'A student';
        $role_student->save();

        $role_company = new Role();
        $role_company->name = 'company';
        $role_company->description = 'A company';
        $role_company->save();
    }
}
