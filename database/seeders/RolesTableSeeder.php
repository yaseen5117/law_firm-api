<?php

namespace Database\Seeders;

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
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();        
        DB::table('model_has_roles')->truncate();
        DB::table('role_has_permissions')->truncate();
         // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

         //Create Permissions
        Permission::create(['name' => 'edit petition']);
        Permission::create(['name' => 'view petition']);
        Permission::create(['name' => 'delete petition']);

        // create roles and assign existing permissions
        $roleAdmin = Role::create(['name' => 'admin']);

        $judge = Role::create(['name' => 'judge']);
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
            'first_name' => 'Judge',
            'last_name' => '1',
            'email' => 'judge@qc.com',
            'password' => bcrypt('test1234'),
         
        ]);

        $JudgeUser->assignRole($judge);

        $LawyerUser = User::create([
            'first_name' => 'Lawyer',
            'last_name' => '1',
            'email' => 'lawyer@qc.com',
            'password' => bcrypt('test1234'),            
        ]);

        $LawyerUser->assignRole($lawyer);

        $StaffUser = User::create([
            'first_name' => 'Staff',
            'last_name' => '1',
            'email' => 'staff@qc.com',
            'password' => bcrypt('test1234'),            
        ]);

        $StaffUser->assignRole($staff);

        $ClientUser = User::create([
            'id' => 5,
            'first_name' => 'Kamran',
            'last_name' => 'Khan',
            'company_name' => 'KAMRAN KHAN AND OTHERS',
            'email' => 'kamran@qc.com',
            'password' => bcrypt('test1234'),           
        ]);

        $ClientUser->assignRole($client);


        $ClientUser = User::create([
            'id' => 6,
            'first_name' => 'CDA',
            'last_name' => 'Others',
            'company_name' => 'CDA AND OTHERS',
            'email' => 'cda@qc.com',
            'password' => bcrypt('test1234'),           
        ]);

        $ClientUser->assignRole($client);
    }
}
