<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('permissions')->truncate();
        DB::table('roles')->truncate();
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        //Create Permissions
        Permission::create(['name' => 'edit petition']);
        Permission::create(['name' => 'view petition']);
        Permission::create(['name' => 'delete petition']);

        // create roles and assign existing permissions
        $roleAdmin = Role::create(['name' => 'admin']);

        $judge = Role::create(['name' => 'judge(Beta)']);
        $judge->givePermissionTo(Permission::all());


        $lawyer = Role::create(['name' => 'lawyer']);
        $lawyer->givePermissionTo(Permission::all());


        $staff = Role::create(['name' => 'staff']);
        $staff->givePermissionTo(Permission::all());


        $client = Role::create(['name' => 'client']);
        $client->givePermissionTo(Permission::all());

        $user = User::find(1);
        $user->assignRole($roleAdmin);

        $JudgeUser = User::create([
            'company_id' => Company::first()->id,
            'name' => 'Judge 1',
            'email' => 'judge@qc.com',
            'password' => bcrypt('test1234'),

        ]);

        $JudgeUser->assignRole($judge);

        $LawyerUser = User::create([
            'company_id' => Company::first()->id,
            'name' => 'Lawyer 1',
            'email' => 'lawyer@qc.com',
            'password' => bcrypt('test1234'),
        ]);

        $LawyerUser->assignRole($lawyer);

        $StaffUser = User::create([
            'company_id' => Company::first()->id,
            'name' => 'Staff 1',
            'email' => 'staff@qc.com',
            'password' => bcrypt('test1234'),
        ]);

        $StaffUser->assignRole($staff);

        $ClientUser = User::create([
            'id' => 5,
            'company_id' => Company::first()->id,
            'name' => 'Client QC',
            'email' => 'kamran@qc.com',
            'password' => 'test1234',
        ]);

        $ClientUser->assignRole($client);


        $ClientUser = User::create([
            'id' => 6,
            'company_id' => Company::first()->id,
            'name' => 'CDA Others',
            'company_name' => 'CDA AND OTHERS',
            'email' => 'cda@qc.com',
            'password' => bcrypt('test1234'),
        ]);

        $ClientUser->assignRole($client);
    }
}
