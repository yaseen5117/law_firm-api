<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinces')->truncate();

        DB::table('provinces')->insert([
            "title" => "Agrigento", "id" => "1",
            "region_id" => "19"
        ]);
        DB::table('provinces')->insert([
            "title" => "Alessandria", "id" => "2",
            "region_id" => "1"
        ]);
        DB::table('provinces')->insert([
            "title" => "Ancona", "id" => "3",
            "region_id" => "11"
        ]);
        DB::table('provinces')->insert([
            "title" => "Arezzo", "id" => "4",
            "region_id" => "9"
        ]);
        DB::table('provinces')->insert([
            "title" => "Ascoli Piceno", "id" => "5",
            "region_id" => "11"
        ]);
        DB::table('provinces')->insert([
            "title" => "Asti", "id" => "6",
            "region_id" => "1"
        ]);
        DB::table('provinces')->insert([
            "title" => "Avellino", "id" => "7",
            "region_id" => "15"
        ]);
        DB::table('provinces')->insert([
            "title" => "Bari", "id" => "8",
            "region_id" => "16"
        ]);
        DB::table('provinces')->insert([
            "title" => "Barletta-Andria-Trani", "id" => "9",
            "region_id" => "16"
        ]);
        DB::table('provinces')->insert([
            "title" => "Belluno", "id" => "10",
            "region_id" => "5"
        ]);
        DB::table('provinces')->insert([
            "title" => "Benevento", "id" => "11",
            "region_id" => "15"
        ]);
        DB::table('provinces')->insert([
            "title" => "Bergamo", "id" => "12",
            "region_id" => "3"
        ]);
        DB::table('provinces')->insert([
            "title" => "Biella", "id" => "13",
            "region_id" => "1"
        ]);
        DB::table('provinces')->insert([
            "title" => "Bologna", "id" => "14",
            "region_id" => "8"
        ]);
        DB::table('provinces')->insert([
            "title" => "Bolzano/Bozen", "id" => "15",
            "region_id" => "4"
        ]);
        DB::table('provinces')->insert([
            "title" => "Brescia", "id" => "16",
            "region_id" => "3"
        ]);
        DB::table('provinces')->insert([
            "title" => "Brindisi", "id" => "17",
            "region_id" => "16"
        ]);
        DB::table('provinces')->insert([
            "title" => "Cagliari", "id" => "18",
            "region_id" => "20"
        ]);
        DB::table('provinces')->insert([
            "title" => "Caltanissetta", "id" => "19",
            "region_id" => "19"
        ]);
        DB::table('provinces')->insert([
            "title" => "Campobasso", "id" => "20",
            "region_id" => "14"
        ]);
        DB::table('provinces')->insert([
            "title" => "Carbonia-Iglesias", "id" => "21",
            "region_id" => "20"
        ]);
        DB::table('provinces')->insert([
            "title" => "Caserta", "id" => "22",
            "region_id" => "15"
        ]);
        DB::table('provinces')->insert([
            "title" => "Catania", "id" => "23",
            "region_id" => "19"
        ]);
        DB::table('provinces')->insert([
            "title" => "Catanzaro", "id" => "24",
            "region_id" => "18"
        ]);
        DB::table('provinces')->insert([
            "title" => "Chieti", "id" => "25",
            "region_id" => "13"
        ]);
        DB::table('provinces')->insert([
            "title" => "Como", "id" => "26",
            "region_id" => "3"
        ]);
        DB::table('provinces')->insert([
            "title" => "Cosenza", "id" => "27",
            "region_id" => "18"
        ]);
        DB::table('provinces')->insert([
            "title" => "Cremona", "id" => "28",
            "region_id" => "3"
        ]);
        DB::table('provinces')->insert([
            "title" => "Crotone", "id" => "29",
            "region_id" => "18"
        ]);
        DB::table('provinces')->insert([
            "title" => "Cuneo", "id" => "30",
            "region_id" => "1"
        ]);
        DB::table('provinces')->insert([
            "title" => "Enna", "id" => "31",
            "region_id" => "19"
        ]);
        DB::table('provinces')->insert([
            "title" => "Fermo", "id" => "32",
            "region_id" => "11"
        ]);
        DB::table('provinces')->insert([
            "title" => "Ferrara", "id" => "33",
            "region_id" => "8"
        ]);
        DB::table('provinces')->insert([
            "title" => "Firenze", "id" => "34",
            "region_id" => "9"
        ]);
        DB::table('provinces')->insert([
            "title" => "Foggia", "id" => "35",
            "region_id" => "16"
        ]);
        DB::table('provinces')->insert([
            "title" => "Forlì-Cesena", "id" => "36",
            "region_id" => "8"
        ]);
        DB::table('provinces')->insert([
            "title" => "Frosinone", "id" => "37",
            "region_id" => "12"
        ]);
        DB::table('provinces')->insert([
            "title" => "Genova", "id" => "38",
            "region_id" => "7"
        ]);
        DB::table('provinces')->insert([
            "title" => "Gorizia", "id" => "39",
            "region_id" => "6"
        ]);
        DB::table('provinces')->insert([
            "title" => "Grosseto", "id" => "40",
            "region_id" => "9"
        ]);
        DB::table('provinces')->insert([
            "title" => "Imperia", "id" => "41",
            "region_id" => "7"
        ]);
        DB::table('provinces')->insert([
            "title" => "Isernia", "id" => "42",
            "region_id" => "14"
        ]);
        DB::table('provinces')->insert([
            "title" => "L'Aquila", "id" => "43",
            "region_id" => "13"
        ]);
        DB::table('provinces')->insert([
            "title" => "La Spezia", "id" => "44",
            "region_id" => "7"
        ]);
        DB::table('provinces')->insert([
            "title" => "Latina", "id" => "45",
            "region_id" => "12"
        ]);
        DB::table('provinces')->insert([
            "title" => "Lecce", "id" => "46",
            "region_id" => "16"
        ]);
        DB::table('provinces')->insert([
            "title" => "Lecco", "id" => "47",
            "region_id" => "3"
        ]);
        DB::table('provinces')->insert([
            "title" => "Livorno", "id" => "48",
            "region_id" => "9"
        ]);
        DB::table('provinces')->insert([
            "title" => "Lodi", "id" => "49",
            "region_id" => "3"
        ]);
        DB::table('provinces')->insert([
            "title" => "Lucca", "id" => "50",
            "region_id" => "9"
        ]);
        DB::table('provinces')->insert([
            "title" => "Macerata", "id" => "51",
            "region_id" => "11"
        ]);
        DB::table('provinces')->insert([
            "title" => "Mantova", "id" => "52",
            "region_id" => "3"
        ]);
        DB::table('provinces')->insert([
            "title" => "Massa-Carrara", "id" => "53",
            "region_id" => "9"
        ]);
        DB::table('provinces')->insert([
            "title" => "Matera", "id" => "54",
            "region_id" => "17"
        ]);
        DB::table('provinces')->insert([
            "title" => "Medio Campidano", "id" => "55",
            "region_id" => "20"
        ]);
        DB::table('provinces')->insert([
            "title" => "Messina", "id" => "56",
            "region_id" => "19"
        ]);
        DB::table('provinces')->insert([
            "title" => "Milano", "id" => "57",
            "region_id" => "3"
        ]);
        DB::table('provinces')->insert([
            "title" => "Modena", "id" => "58",
            "region_id" => "8"
        ]);
        DB::table('provinces')->insert([
            "title" => "Monza e della Brianza", "id" => "59",
            "region_id" => "3"
        ]);
        DB::table('provinces')->insert([
            "title" => "Napoli", "id" => "60",
            "region_id" => "15"
        ]);
        DB::table('provinces')->insert([
            "title" => "Novara", "id" => "61",
            "region_id" => "1"
        ]);
        DB::table('provinces')->insert([
            "title" => "Nuoro", "id" => "62",
            "region_id" => "20"
        ]);
        DB::table('provinces')->insert([
            "title" => "Ogliastra", "id" => "63",
            "region_id" => "20"
        ]);
        DB::table('provinces')->insert([
            "title" => "Olbia-Tempio", "id" => "64",
            "region_id" => "20"
        ]);
        DB::table('provinces')->insert([
            "title" => "Oristano", "id" => "65",
            "region_id" => "20"
        ]);
        DB::table('provinces')->insert([
            "title" => "Padova", "id" => "66",
            "region_id" => "5"
        ]);
        DB::table('provinces')->insert([
            "title" => "Palermo", "id" => "67",
            "region_id" => "19"
        ]);
        DB::table('provinces')->insert([
            "title" => "Parma", "id" => "68",
            "region_id" => "8"
        ]);
        DB::table('provinces')->insert([
            "title" => "Pavia", "id" => "69",
            "region_id" => "3"
        ]);
        DB::table('provinces')->insert([
            "title" => "Perugia", "id" => "70",
            "region_id" => "10"
        ]);
        DB::table('provinces')->insert([
            "title" => "Pesaro e Urbino", "id" => "71",
            "region_id" => "11"
        ]);
        DB::table('provinces')->insert([
            "title" => "Pescara", "id" => "72",
            "region_id" => "13"
        ]);
        DB::table('provinces')->insert([
            "title" => "Piacenza", "id" => "73",
            "region_id" => "8"
        ]);
        DB::table('provinces')->insert([
            "title" => "Pisa", "id" => "74",
            "region_id" => "9"
        ]);
        DB::table('provinces')->insert([
            "title" => "Pistoia", "id" => "75",
            "region_id" => "9"
        ]);
        DB::table('provinces')->insert([
            "title" => "Pordenone", "id" => "76",
            "region_id" => "6"
        ]);
        DB::table('provinces')->insert([
            "title" => "Potenza", "id" => "77",
            "region_id" => "17"
        ]);
        DB::table('provinces')->insert([
            "title" => "Prato", "id" => "78",
            "region_id" => "9"
        ]);
        DB::table('provinces')->insert([
            "title" => "Ragusa", "id" => "79",
            "region_id" => "19"
        ]);
        DB::table('provinces')->insert([
            "title" => "Ravenna", "id" => "80",
            "region_id" => "8"
        ]);
        DB::table('provinces')->insert([
            "title" => "Reggio di Calabria", "id" => "81",
            "region_id" => "18"
        ]);
        DB::table('provinces')->insert([
            "title" => "Reggio nell'Emilia", "id" => "82",
            "region_id" => "8"
        ]);
        DB::table('provinces')->insert([
            "title" => "Rieti", "id" => "83",
            "region_id" => "12"
        ]);
        DB::table('provinces')->insert([
            "title" => "Rimini", "id" => "84",
            "region_id" => "8"
        ]);
        DB::table('provinces')->insert([
            "title" => "Roma", "id" => "85",
            "region_id" => "12"
        ]);
        DB::table('provinces')->insert([
            "title" => "Rovigo", "id" => "86",
            "region_id" => "5"
        ]);
        DB::table('provinces')->insert([
            "title" => "Salerno", "id" => "87",
            "region_id" => "15"
        ]);
        DB::table('provinces')->insert([
            "title" => "Sassari", "id" => "88",
            "region_id" => "20"
        ]);
        DB::table('provinces')->insert([
            "title" => "Savona", "id" => "89",
            "region_id" => "7"
        ]);
        DB::table('provinces')->insert([
            "title" => "Siena", "id" => "90",
            "region_id" => "9"
        ]);
        DB::table('provinces')->insert([
            "title" => "Siracusa", "id" => "91",
            "region_id" => "19"
        ]);
        DB::table('provinces')->insert([
            "title" => "Sondrio", "id" => "92",
            "region_id" => "3"
        ]);
        DB::table('provinces')->insert([
            "title" => "Taranto", "id" => "93",
            "region_id" => "16"
        ]);
        DB::table('provinces')->insert([
            "title" => "Teramo", "id" => "94",
            "region_id" => "13"
        ]);
        DB::table('provinces')->insert([
            "title" => "Terni", "id" => "95",
            "region_id" => "10"
        ]);
        DB::table('provinces')->insert([
            "title" => "Torino", "id" => "96",
            "region_id" => "1"
        ]);
        DB::table('provinces')->insert([
            "title" => "Trapani", "id" => "97",
            "region_id" => "19"
        ]);
        DB::table('provinces')->insert([
            "title" => "Trento", "id" => "98",
            "region_id" => "4"
        ]);
        DB::table('provinces')->insert([
            "title" => "Treviso", "id" => "99",
            "region_id" => "5"
        ]);
        DB::table('provinces')->insert([
            "title" => "Trieste", "id" => "100",
            "region_id" => "6"
        ]);
        DB::table('provinces')->insert([
            "title" => "Udine", "id" => "101",
            "region_id" => "6"
        ]);
        DB::table('provinces')->insert([
            "title" => "Valle d'Aosta", "id" => "102",
            "region_id" => "2"
        ]);
        DB::table('provinces')->insert([
            "title" => "Varese", "id" => "103",
            "region_id" => "3"
        ]);
        DB::table('provinces')->insert([
            "title" => "Venezia", "id" => "104",
            "region_id" => "5"
        ]);
        DB::table('provinces')->insert([
            "title" => "Verbano-Cusio-Ossola", "id" => "105",
            "region_id" => "1"
        ]);
        DB::table('provinces')->insert([
            "title" => "Vercelli", "id" => "106",
            "region_id" => "1"
        ]);
        DB::table('provinces')->insert([
            "title" => "Verona", "id" => "107",
            "region_id" => "5"
        ]);
        DB::table('provinces')->insert([
            "title" => "Vibo Valentia", "id" => "108",
            "region_id" => "18"
        ]);
        DB::table('provinces')->insert([
            "title" => "Vicenza", "id" => "109",
            "region_id" => "5"
        ]);
        DB::table('provinces')->insert([
            "title" => "Viterbo", "id" => "110",
            "region_id" => "12"
        ]);
    }
}
