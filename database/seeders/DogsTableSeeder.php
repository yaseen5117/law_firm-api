<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dog_types')->truncate();
        DB::table('dog_types')->insert([
            'title' => 'AFFENPINSCHER',
            'display_order' => 1,
            'created_at' => now(),
        ]);

        DB::table('dog_types')->insert([
            'title' => 'AIREDALE TERRIER',
            'display_order' => 2,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'AKITA',
            'display_order' => 3,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'AKITA AMERICANO',
            'display_order' => 4,
            'created_at' => now(),
        ]);

        DB::table('dog_types')->insert([
            'title' => 'ALANO',
            'display_order' => 5,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'ALASKAN MALAMUTE',
            'display_order' => 6,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'ALPENLAENDISCHE DACHSBRACKE',
            'display_order' => 1,
            'created_at' => now(),
        ]);

        DB::table('dog_types')->insert([
            'title' => 'AMERICAN STAFFORDSHIRE TERRIER',
            'display_order' => 7,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'AMERICAN WATER SPANIEL',
            'display_order' => 8,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'ANGLO FRANCAIS DE PETITE VENERIE',
            'display_order' => 9,
            'created_at' => now(),
        ]);

        DB::table('dog_types')->insert([
            'title' => 'ARIEGEOIS',
            'display_order' => 10,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'AUSTRALIAN CATTLEDOG',
            'display_order' => 11,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'AUSTRALIAN SHEPHERD',
            'display_order' => 12,
            'created_at' => now(),
        ]);

        DB::table('dog_types')->insert([
            'title' => 'AUSTRALIAN SILKY TERRIER',
            'display_order' => 13,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'AUSTRALIAN STUMPY TAIL CATTLE DOG',
            'display_order' => 14,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'AUSTRALIAN TERRIER',
            'display_order' => 15,
            'created_at' => now(),
        ]);

        DB::table('dog_types')->insert([
            'title' => 'AZAWAKH',
            'display_order' => 16,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BARBET',
            'display_order' => 17,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BARBONI',
            'display_order' => 18,
            'created_at' => now(),
        ]);

        DB::table('dog_types')->insert([
            'title' => 'BARZOI',
            'display_order' => 19,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BASENJI',
            'display_order' => 20,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BASSET BLUE DE GASCOGNE',
            'display_order' => 21,
            'created_at' => now(),
        ]);

        DB::table('dog_types')->insert([
            'title' => 'BASSETHOUND',
            'display_order' => 22,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BASSETT ARTESIAN NORMAND',
            'display_order' => 23,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BASSETT FAUVE DE BRETAGNE',
            'display_order' => 24,
            'created_at' => now(),
        ]);

        DB::table('dog_types')->insert([
            'title' => 'BASSOTTO TEDESCO',
            'display_order' => 25,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BAYERISCHER GEBIRGSSCHWEISSHUND',
            'display_order' => 26,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BEAGLE',
            'display_order' => 27,
            'created_at' => now(),
        ]);

        DB::table('dog_types')->insert([
            'title' => 'BEAGLE HARRIER',
            'display_order' => 28,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BEARDED COLLIE',
            'display_order' => 29,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BEDLINGTON TERRIER',
            'display_order' => 30,
            'created_at' => now(),
        ]);

        DB::table('dog_types')->insert([
            'title' => 'BICHON A POIL FRISE',
            'display_order' => 31,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BICHON HAVANAIS',
            'display_order' => 32,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BILLY',
            'display_order' => 33,
            'created_at' => now(),
        ]);

        DB::table('dog_types')->insert([
            'title' => 'BLACK AND TAN COONHOUND',
            'display_order' => 34,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BLOODHOUND CHIEN DE SAINT-UBERT',
            'display_order' => 35,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BOBTAIL',
            'display_order' => 36,
            'created_at' => now(),
        ]);

        DB::table('dog_types')->insert([
            'title' => 'BOLOGNESE',
            'display_order' => 37,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BORDER COLLIE',
            'display_order' => 38,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BORDER TERRIER',
            'display_order' => 39,
            'created_at' => now(),
        ]);

        DB::table('dog_types')->insert([
            'title' => 'BOSTON TERRIER',
            'display_order' => 40,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BOULEDOGUE FRANCESE',
            'display_order' => 41,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BOVARO DEL BERNESE',
            'display_order' => 42,
            'created_at' => now(),
        ]);

        DB::table('dog_types')->insert([
            'title' => 'BOVARO DELL APPENZELL',
            'display_order' => 43,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BOVARO DELL ENTLEBUCH',
            'display_order' => 44,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BOVARO DELLE ARDENNE',
            'display_order' => 45,
            'created_at' => now(),
        ]);

        DB::table('dog_types')->insert([
            'title' => 'BOVARO DELLE FIANDRE',
            'display_order' => 46,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BOXER',
            'display_order' => 47,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BRACCO D ARIEGE',
            'display_order' => 48,
            'created_at' => now(),
        ]);

        DB::table('dog_types')->insert([
            'title' => 'BRACCO D AUVERGNE',
            'display_order' => 49,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BRACCO DEL BOURBONNAIS',
            'display_order' => 50,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BRACCO DI BURGOS',
            'display_order' => 51,
            'created_at' => now(),
        ]);

        DB::table('dog_types')->insert([
            'title' => 'BRACCO FRANCESE GASCOGNE',
            'display_order' => 52,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BRACCO FRANCESE PIRENEI',
            'display_order' => 53,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BRACCO ITALIANO',
            'display_order' => 54,
            'created_at' => now(),
        ]);

        DB::table('dog_types')->insert([
            'title' => 'BRACCO PORTOGHESE',
            'display_order' => 55,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BRACCO SAINT GERMAIN',
            'display_order' => 56,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BRACCO SLOVACCO PELO DURO',
            'display_order' => 57,
            'created_at' => now(),
        ]);

        DB::table('dog_types')->insert([
            'title' => 'BRACCO UNGHERESE PELO CORTO',
            'display_order' => 58,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BRACCO UNGHERESE PELO DURO',
            'display_order' => 59,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BRIQUET GRIFFON VENDEEN',
            'display_order' => 60,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BROHOLMER',
            'display_order' => 61,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BULL TERRIER INGLESE',
            'display_order' => 62,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BULLDOG',
            'display_order' => 63,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'BULLMASTIFF',
            'display_order' => 64,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'CAIRN TERRIER',
            'display_order' => 65,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'CANAAN',
            'display_order' => 66,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'CARLINO',
            'display_order' => 67,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'CAVALIER KING CHARLES SPANIEL',
            'display_order' => 68,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'CHESAPEAKE BAY RETRIEVER',
            'display_order' => 69,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'CHIEN D ARTOIS',
            'display_order' => 70,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'CHIHUAHUA',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'CHIN',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'CHINESE CRESTED',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'CHOW-CHOW',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'CIMARRON URUGUAYO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'CIOBANESC ROMANESC BUCOVINA',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'CIRNECO DELL ETNA',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'CLUMBER SPANIEL',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'COCKER AMERICANO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'COCKER SPANIEL INGLESE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'CORSO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'COTON DE TULEAR',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'CURLY-COATED RETRIEVER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'DA FERMA BOEMO PELO RUVIDO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'DA FERMA TEDESCO PELO CORTO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'DA FERMA TEDESCO PELO DURO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'DA FERMA TEDESCO PELO LUNGO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'DA FERMA TEDESCO PELO RUVIDO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'DA MONTAGNA PIRENEI',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'DA ORSO DELLA CARELIA',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'DA SIERRA DE AIRES',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'DA SIERRA DI ESTRELA',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'DALMATA',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'DANDIE DINMONT TERRIER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'DANSK-SVENSK GARDSHUND',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'DE AGUA',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'DE AGUA ESPANOL',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'DE CASTRO LABOREIRO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'DEERHOUND',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'DELL ATLAS',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'DEUTSCHER JAGDTERRIER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'DOBERMANN',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'DOGO ARGENTINO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'DOGUE DE BORDEAUX',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'DREVER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'DUNKER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'ENGLISH TOY TERRIER BLACK AND TAN',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'EPAGNEUL BLUE DE PICARDIE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'EPAGNEUL BRETON',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'EPAGNEUL DE PONT â€“ AUDEMER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'EPAGNEUL FRANCAIS',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'EPAGNEUL NANO CONTINENTALE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'EPAGNEUL OLANDESE DI DRENT',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'EPAGNEUL PICARD',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'EURASIER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'FIELD SPANIEL',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'FILA BRASILEIRO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'FILA DE SAO MIGUEL',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'FLAT COATED RETRIEVER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'FOX TERRIER PELO LISCIO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'FOX TERRIER PELO RUVIDO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'FOXHOUND',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'FOXHOUND AMERICANO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'FRANCAIS BLANC E NOIR',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'FRANCAIS BLANC E ORANGE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'FRANCAIS TRICOLORE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'GALGO ESPANOL',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'GAMMEL DANSK HONSENHUND',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'GASCON SAINTONGEOIS',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'GOLDEN RETRIEVER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'GONCZY POLSKI',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'GRAND ANGLO FRANCAIS BLANC ET NOIR',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'GRAND ANGLO FRANCAIS BLANC ET ORANGE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'GRAND ANGLO FRANCAIS TRICOLORE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'GRAND BASSET GRIFFON VENDEEN',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'GRAND BLEU DE GASCOGNE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'GRAND GRIFFON VENDEEN',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'GRANDE BOVARO SVIZZERO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'GRANDE MUENSTERLANDER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'GREYHOUND',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'GRIFFON BLEU DE GASCOGNE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'GRIFFON FAUVE DE BRETAGNE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'GRIFFON NIVERNAIS',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'GRIFFONE BELGA',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'GRIFFONE DI BRUXELLES',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'GRIFFONE PELO DURO KORTHALS',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'GROENLANDESE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'HALDENSTOVARE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'HAMILTON STOVARE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'HANNOVERISCHER SCHWEISSHUND',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'HARRIER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'HOKKAIDO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'HOVAWART',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'HYGHENHUND',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'IRISH GLEN OF IMAAL TERRIER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'IRISH SOFT-COATED WHEATEN TERRIER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'IRISH TERRIER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'IRISH WATER SPANIEL',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'IRISH WOLFHOUND',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'JACK RUSSELL TERRIER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'JAMTHUND',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'KAI',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'KANGAL COBAN KOPEGI',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'KERRY BLUE TERRIER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'KING CHARLES SPANIEL',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'KISHU',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'KOMONDOR',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'KOOIKERHONDJE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'KOREA JINDO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'KUVASZ',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'LABRADOR RETRIEVER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'LAGOTTO ROMAGNOLO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'LAIKA DELLA SIBERIA OCCIDENTALE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'LAIKA DELLA SIBERIA ORIENTALE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'LAIKA RUSSO-EUROPEO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'LAKELAND TERRIER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'LANCASHIRE HEELER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'LANDSEER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'LAPINKOIRA',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'LEONBERGER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'LEVRIERO AFGANO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'LEVRIERO POLACCO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'LHASA APSO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'LUPO CECOSLOVACCO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'LUPO SAARLOOS',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'MAGYAR AGAR',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'MALTESE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'MANCHESTER TERRIER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'MASTIFF',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'MASTINO DEI PIRENEI',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'MASTINO NAPOLETANO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'MASTINO SPAGNOLO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'MUDI',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'NORBOTTENSPETS',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'NORFOLK TERRIER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'NORSK BUHUND',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'NORSK ELGHUND GRIGIO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'NORSK ELGHUND NERO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'NORSK LUNDEHUND',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'NORWICH TERRIER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'NOVA SCOTIA DUCK TOLLING RETRIEVER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'OTTERHOUND',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PARSON RUSSELL TERRIER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PASTORE AUSTRALIANO KELPIE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PASTORE BELGA',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PASTORE BERGAMASCO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PASTORE CATALANO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PASTORE CIARPLANINA',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PASTORE CROATO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PASTORE DEI PIRENEI PELO LUNGO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PASTORE DEL CAUCASO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PASTORE DELLâ€™ASIA CENTRALE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PASTORE DELLA RUSSIA MERIDIONALE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PASTORE DI BEAUCE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PASTORE DI BRIE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PASTORE DI ISLANDA',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PASTORE DI KARST',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PASTORE DI PICARDIA',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PASTORE DI TATRA',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PASTORE FINLANDESE DELLA LAPPONIA LAPINPOROKOIRA',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PASTORE MALLORQUIN',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PASTORE MAREMMANO ABRUZZESE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PASTORE OLANDESE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PASTORE PIRENEI FACCIA RASA',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PASTORE POLACCO VALLEE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PASTORE SCOZZESE PELO CORTO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PASTORE SCOZZESE PELO LUNGO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PASTORE SCOZZESE SHETLAND',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PASTORE SVIZZERO BIANCO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PASTORE TEDESCO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PECHINESE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PERRO DOGO MALLORQUIN',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PETIT BASSET GRIFFON VENDEEN',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PETIT BLEU DE GASCOGNE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PHARAON HOUND',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PICCOLO BRABANTINO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PICCOLO CANE LEONE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PICCOLO LEVRIERO ITALIANO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PICCOLO MUENSTERLANDER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PICCOLO SEGUGIO DELLA SVIZZERA',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PINSCHER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PINSCHER AUSTRIACO PELO CORTO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PODENCO CANARIO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PODENCO IBICENCO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PODENGO PORTUGUES',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'POINTER INGLESE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'POITEVIN',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PORCELAINE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PRESA CANARIO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PUDEL POINTER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PULI',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'PUMI',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'RAFEIRO DO ALENTEJO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'RHODESIAN RIDGEBACK',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'RIESENSCHNAUZER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'ROMANIAN CARPATHIAN SHEPERD',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'ROMANIAN MIORITIC SHEPERD',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'ROTTWEILER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'RUSSIAN TOY',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SABUESO ESPAGNOL',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SALUKI',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SAMOIEDO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SAN BERNARDO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SCHAPENDOES',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SCHILLER STOVARE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SCHIPPERKEE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SCHNAUZER MEDIO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SCOTTISH TERRIER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SEALYHAM TERRIER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SEGUGIO AUSTRIACO NERO FOCATO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SEGUGIO DELL APPENNINO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SEGUGIO DELL ISTRIA PELO DURO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SEGUGIO DELL ISTRIA PELO RASO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SEGUGIO DELLA BOSNIA PELO DURO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SEGUGIO DELLA STIRIA PELO RUVIDO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SEGUGIO DELLA TRANSILVANIA',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SEGUGIO DELLA WESTFALIA',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SEGUGIO ELLENICO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SEGUGIO FINLANDESE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SEGUGIO ITALIANO PELO FORTE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SEGUGIO ITALIANO PELO RASO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SEGUGIO MAREMMANO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SEGUGIO POLACCO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SEGUGIO POSAVATZ',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SEGUGIO SERBO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SEGUGIO SVIZZERI',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SEGUGIO TEDESCO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SEGUGIO TIROLESE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SEGUGIO TRICOLORE JUGOSLAVO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SEGUGIO YUGOSLAVO DA MONTAGNA',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SETTER GORDON',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SETTER INGLESE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SETTER IRLANDESE ROSSO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SETTER IRLANDESE ROSSO-BIANCO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SHAR PEI',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SHIBA',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SHIH TZU',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SHIKOKU',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SIBERIAN HUSKY',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SIN PELO DEL PERU',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SKYE TERRIER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SLOUGHI',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SLOVENSKY CUVAC',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SLOVENSKY KOPOV',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SMAALANDSSTOVARE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SMOUSHOUND OLANDESE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SPANIEL OLANDESE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SPANIEL TEDESCO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SPINO DEGLI IBLEI',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SPINONE ITALIANO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SPITZ FINNICO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SPITZ GIAPPONESE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SPITZ TEDESCHI',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SPRINGER SPANIEL INGLESE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'STABYHOUND',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'STAFFORDSHIRE BULL TERRIER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SUSSEX SPANIEL',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'SVENSK LAPPHUND',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'TAIWAN',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'TERRANOVA',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'TERRIER BOEMO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'TERRIER BRAZILEIRO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'TERRIER GIAPPONESE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'TERRIER NERO RUSSO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'THAI BANGKAEW',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'THAI RIDGEBACK',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'TIBETAN MASTIFF',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'TIBETAN SPANIEL',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'TIBETAN TERRIER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'TORNJAK',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'TOSA',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'VASTGOTSAASPETS',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'VOLPINO ITALIANO',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'WEIMARANER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'WELSH CORGI CARDIGAN',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'WELSH CORGI PEMBROKE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'WELSH SPRINGER SPANIEL',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'WELSH TERRIER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'WEST HIGHLAND WHITE TERRIER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'WHIPPET',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'XOLOITZCUINTLE',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'YORKSHIRE TERRIER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'ZWERGPINSCHER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
        DB::table('dog_types')->insert([
            'title' => 'ZWERGSCHNAUZER',
            'display_order' => 1,
            'created_at' => now(),
        ]);
    }
}
