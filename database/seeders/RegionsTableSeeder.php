<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->truncate();
        
        DB::table('regions')->insert([
            "id" => "13",
            "title" => "Abruzzo",
            "display_order" => 13,
             
        ]);
            DB::table('regions')->insert([
            "id" => "17",
            "title" => "Basilicata",
            "display_order" => 17,
        ]);
            DB::table('regions')->insert([
            "id" => "18",
            "title" => "Calabria",
            "display_order" => 18,
        ]);
            DB::table('regions')->insert([
            "id" => "15",
            "title" => "Campania",
            "display_order" => 15,
        ]);
            DB::table('regions')->insert([
            "id" => "8",
            "title" => "Emilia-Romagna",
            "display_order" => 8,
        ]);
            DB::table('regions')->insert([
            "id" => "6",
            "title" => "Friuli-Venezia Giulia",
            "display_order" => 6,
        ]);
            DB::table('regions')->insert([
            "id" => "12",
            "title" => "Lazio",
            "display_order" => 12,
        ]);
            DB::table('regions')->insert([
            "id" => "7",
            "title" => "Liguria",
            "display_order" => 7,
        ]);
            DB::table('regions')->insert([
            "id" => "3",
            "title" => "Lombardia",
            "display_order" => 3,
        ]);
            DB::table('regions')->insert([
            "id" => "11",
            "title" => "Marche",
            "display_order" => 11,
        ]);
            DB::table('regions')->insert([
            "id" => "14",
            "title" => "Molise",
            "display_order" => 14,
        ]);
            DB::table('regions')->insert([
            "id" => "1",
            "title" => "Piemonte",
            "display_order" => 1,
        ]);
            DB::table('regions')->insert([
            "id" => "16",
            "title" => "Puglia",
            "display_order" => 16,
        ]);
            DB::table('regions')->insert([
            "id" => "20",
            "title" => "Sardegna",
            "display_order" => 20,
        ]);
            DB::table('regions')->insert([
            "id" => "19",
            "title" => "Sicilia",
            "display_order" => 19,
        ]);
            DB::table('regions')->insert([
            "id" => "9",
            "title" => "Toscana",
            "display_order" => 9,
        ]);
            DB::table('regions')->insert([
            "id" => "4",
            "title" => "Trentino-Alto Adige/Südtirol",
            "display_order" => 4,
        ]);
            DB::table('regions')->insert([
            "id" => "10",
            "title" => "Umbria",
            "display_order" => 10,
        ]);
            DB::table('regions')->insert([
            "id" => "2",
            "title" => "Valle d'Aosta/Vallée d'Aoste",
            "display_order" => 2,
        ]);
            DB::table('regions')->insert([
            "id" => "5",
            "title" => "Veneto",
            "display_order" => 5,
            ]);
    }
}
