<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class AddStudentRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $student = Role::create(['name' => 'student']);
        // //$student->givePermissionTo(Permission::all());

        // $studentUser = User::create([
        //     'name' => 'QC Student',
        //     'email' => 'student@qc.com',
        //     'password' => bcrypt('test1234'),

        // ]);

        // $studentUser->assignRole($student);


        //476
        // $roleStudent = Role::find(12);
        // $user = User::find(501);
        // $user->assignRole($roleStudent);
        // $student = Role::create(['name' => 'student']);
        // $student->givePermissionTo(Permission::all());
    }
}
