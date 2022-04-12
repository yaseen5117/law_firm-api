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
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'view']);
        Permission::create(['name' => 'delete']);

        // create roles and assign existing permissions
        $roleAdmin = Role::create(['name' => 'admin']);         

        $client = Role::create(['name' => 'visitor_user']);
        $client->givePermissionTo(Permission::all());    
        
        $user = User::find(1);
        $user->assignRole($roleAdmin);
 
        $ClientUser = User::create([
            'owner_name'=> 'Yaseen',
            'surname'=> 'yaseen1',
            'dob'=> '',
            'province_id'=> 1,
            'region_id'=> 1,
            'city_id'=> 1,
            'dog_name'=> 'ST Pet',
            'sex'=> 1, //1 is for male      
            'age_month'=> 12,
            'age_year'=> 10,
            'race_type_id'=> null,
            'relation_race'=> null,
            'pedigree'=> null,
            'particular_detail'=> 'Its Dog Particular Detail of User',
            'email' => 'user@user.com',
            'profile_image'=> '',
            'owner_detail'=> 'Its an Owner Detail',
            'dog_detail'=> 'Its Dog Detail',                         
            'password' => bcrypt('test1234'),
            'approval_status' => 1,           
        ]);

        $ClientUser->assignRole($client);
    }
}
