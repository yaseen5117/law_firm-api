<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([SupportServiceTableSeeder::class]);
        // \App\Models\User::factory(10)->create();

            DB::table('companies')->truncate();
            DB::table('companies')->insert([
                
                'name' => 'Rezo System',
                'display_order' => '1',
                'created_at' => now(),
                'updated_at' => now()
                
            ]);
            DB::table('users')->truncate();
            DB::table('password_resets')->truncate();

            
            // Insert admin
            DB::table('users')->insert(
                array(
                    'first_name'      => 'Marc ',
                    'last_name'     => 'Harrell',
                    'email'     => 'marc@rezosystems.com',
                    'password'  => bcrypt('Rezo0238#'),
                    'created_at'  => now(),
                )
            );

            DB::table('users')->insert(
                array(
                    'first_name'      => 'Programmer',
                    'last_name'      => 'Umer',
                    'email'     => 'ua@rezosystems.com',
                    'password'  => bcrypt('Rezo2221'),
                    'created_at'  => now(),
                    
                )
            );



            /************SERVERS***************/
            DB::table('servers')->truncate();
            DB::table('servers')->insert(
                array(
                    'name'      => 'Server 1',
                    'created_at'  => now(),
                    
                ),
            );

            DB::table('servers')->insert(
                array(
                    'name'      => 'Server 2',
                    'created_at'  => now(),
                    
                )
            );


            DB::table('servers')->insert(
                array(
                    'name'      => 'Server 3',
                    'created_at'  => now(),
                    
                ),
                
            );
            /************SERVERS***************/


            /************products***************/
            DB::table('products')->truncate();
            DB::table('products')->insert(
                array(
                    'name'      => 'Bike Rentals',
                    'created_at'  => now(),
                    
                ),
            );

            DB::table('products')->insert(
                array(
                    'name'      => 'Ski Rental',
                    'created_at'  => now(),
                    
                )
            );


            DB::table('products')->insert(
                array(
                    'name'      => 'GMS',
                    'created_at'  => now(),
                    
                ),
                
            );

            DB::table('products')->insert(
                array(
                    'name'      => 'Rafting',
                    'created_at'  => now(),
                    
                ),
                
            );
            /************products***************/
    }
}
