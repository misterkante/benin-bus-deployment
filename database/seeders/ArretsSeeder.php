<?php

namespace Database\Seeders;

use App\Models\Arret;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArretsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arrets =
            [
                [
                    "ville" => "Cotonou",
                    "latitude" => "6.3667",
                    "longitude" => "2.4333",
                    "pays" => "Benin",
                    "departement" => "Littoral"
                ],
                [
                    "ville" => "Abomey-Calavi",
                    "latitude" => "6.4486",
                    "longitude" => "2.3556",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Godomè",
                    "latitude" => "6.3667",
                    "longitude" => "2.3500",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Banikoara",
                    "latitude" => "11.3000",
                    "longitude" => "2.4333",
                    "pays" => "Benin",
                    "departement" => "Alibori"
                ],
                [
                    "ville" => "Djougou",
                    "latitude" => "9.7000",
                    "longitude" => "1.6667",
                    "pays" => "Benin",
                    "departement" => "Donga"
                ],
                [
                    "ville" => "Tchaourou",
                    "latitude" => "8.8833",
                    "longitude" => "2.6000",
                    "pays" => "Benin",
                    "departement" => "Borgou"
                ],
                [
                    "ville" => "Parakou",
                    "latitude" => "9.3500",
                    "longitude" => "2.6167",
                    "pays" => "Benin",
                    "departement" => "Borgou"
                ],
                [
                    "ville" => "Kandi",
                    "latitude" => "11.1286",
                    "longitude" => "2.9369",
                    "pays" => "Benin",
                    "departement" => "Alibori"
                ],
                [
                    "ville" => "Aplahoué",
                    "latitude" => "6.9333",
                    "longitude" => "1.6833",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ],
                [
                    "ville" => "Kalalé",
                    "latitude" => "10.2953",
                    "longitude" => "3.3786",
                    "pays" => "Benin",
                    "departement" => "Borgou"
                ],
                [
                    "ville" => "Malanville",
                    "latitude" => "11.8667",
                    "longitude" => "3.3833",
                    "pays" => "Benin",
                    "departement" => "Atacora"
                ],
                [
                    "ville" => "Kétou",
                    "latitude" => "7.3581",
                    "longitude" => "2.6075",
                    "pays" => "Benin",
                    "departement" => "Plateau"
                ],
                [
                    "ville" => "Bohicon",
                    "latitude" => "7.2000",
                    "longitude" => "2.0667",
                    "pays" => "Benin",
                    "departement" => "Zou"
                ],
                [
                    "ville" => "Djakotomé",
                    "latitude" => "6.9000",
                    "longitude" => "1.7167",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ],
                [
                    "ville" => "Porto-Novo",
                    "latitude" => "6.4972",
                    "longitude" => "2.6050",
                    "pays" => "Benin",
                    "departement" => "Ouémé"
                ],
                [
                    "ville" => "Zagnanado",
                    "latitude" => "7.2667",
                    "longitude" => "2.3500",
                    "pays" => "Benin",
                    "departement" => "Zou"
                ],
                [
                    "ville" => "Bassila",
                    "latitude" => "9.0167",
                    "longitude" => "1.6667",
                    "pays" => "Benin",
                    "departement" => "Donga"
                ],
                [
                    "ville" => "Avrankou",
                    "latitude" => "6.5500",
                    "longitude" => "2.6667",
                    "pays" => "Benin",
                    "departement" => "Ouémé"
                ],
                [
                    "ville" => "Allada",
                    "latitude" => "6.6500",
                    "longitude" => "2.1500",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Missérété",
                    "latitude" => "6.5625",
                    "longitude" => "2.5853",
                    "pays" => "Benin",
                    "departement" => "Ouémé"
                ],
                [
                    "ville" => "Glazoué",
                    "latitude" => "7.9736",
                    "longitude" => "2.2400",
                    "pays" => "Benin",
                    "departement" => "Collines"
                ],
                [
                    "ville" => "Pobé",
                    "latitude" => "6.9667",
                    "longitude" => "2.6833",
                    "pays" => "Benin",
                    "departement" => "Plateau"
                ],
                [
                    "ville" => "Djidja",
                    "latitude" => "7.3333",
                    "longitude" => "1.9333",
                    "pays" => "Benin",
                    "departement" => "Zou"
                ],
                [
                    "ville" => "Lalo",
                    "latitude" => "6.9167",
                    "longitude" => "1.8833",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ],
                [
                    "ville" => "Gogounou",
                    "latitude" => "10.8386",
                    "longitude" => "2.8361",
                    "pays" => "Benin",
                    "departement" => "Alibori"
                ],
                [
                    "ville" => "Adjaouèrè",
                    "latitude" => "7.0000",
                    "longitude" => "2.6167",
                    "pays" => "Benin",
                    "departement" => "Plateau"
                ],
                [
                    "ville" => "Sakété",
                    "latitude" => "6.7364",
                    "longitude" => "2.6581",
                    "pays" => "Benin",
                    "departement" => "Plateau"
                ],
                [
                    "ville" => "Matéri",
                    "latitude" => "10.6978",
                    "longitude" => "1.0633",
                    "pays" => "Benin",
                    "departement" => "Atacora"
                ],
                [
                    "ville" => "Ifanhim",
                    "latitude" => "6.6667",
                    "longitude" => "2.7167",
                    "pays" => "Benin",
                    "departement" => "Plateau"
                ],
                [
                    "ville" => "Ndali",
                    "latitude" => "9.8608",
                    "longitude" => "2.7181",
                    "pays" => "Benin",
                    "departement" => "Borgou"
                ],
                [
                    "ville" => "Dassa-Zoumé",
                    "latitude" => "7.7500",
                    "longitude" => "2.1833",
                    "pays" => "Benin",
                    "departement" => "Collines"
                ],
                [
                    "ville" => "Kouandé",
                    "latitude" => "10.3317",
                    "longitude" => "1.6914",
                    "pays" => "Benin",
                    "departement" => "Atacora"
                ],
                [
                    "ville" => "Banté",
                    "latitude" => "8.4167",
                    "longitude" => "1.8833",
                    "pays" => "Benin",
                    "departement" => "Collines"
                ],
                [
                    "ville" => "Lokossa",
                    "latitude" => "6.6333",
                    "longitude" => "1.7167",
                    "pays" => "Benin",
                    "departement" => "Mono"
                ],
                [
                    "ville" => "Natitingou",
                    "latitude" => "10.3000",
                    "longitude" => "1.3667",
                    "pays" => "Benin",
                    "departement" => "Atacora"
                ],
                [
                    "ville" => "Tota",
                    "latitude" => "6.8000",
                    "longitude" => "1.7833",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ],
                
                [
                    "ville" => "Ouidah",
                    "latitude" => "6.3667",
                    "longitude" => "2.0833",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Sinendé",
                    "latitude" => "10.3447",
                    "longitude" => "2.3792",
                    "pays" => "Benin",
                    "departement" => "Borgou"
                ],
                [
                    "ville" => "Abomey",
                    "latitude" => "7.1856",
                    "longitude" => "1.9881",
                    "pays" => "Benin",
                    "departement" => "Zou"
                ],
                [
                    "ville" => "Ségbana",
                    "latitude" => "10.9278",
                    "longitude" => "3.6944",
                    "pays" => "Benin",
                    "departement" => "Alibori"
                ],
                [
                    "ville" => "Toviklin",
                    "latitude" => "6.8333",
                    "longitude" => "1.8167",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ],
                [
                    "ville" => "Boukoumbé",
                    "latitude" => "10.1833",
                    "longitude" => "1.1000",
                    "pays" => "Benin",
                    "departement" => "Atacora"
                ],
                [
                    "ville" => "Pèrèrè",
                    "latitude" => "9.7994",
                    "longitude" => "2.9928",
                    "pays" => "Benin",
                    "departement" => "Borgou"
                ],
                [
                    "ville" => "Péhonko",
                    "latitude" => "10.2283",
                    "longitude" => "2.0019",
                    "pays" => "Benin",
                    "departement" => "Atacora"
                ],
                [
                    "ville" => "So-Awa",
                    "latitude" => "6.4667",
                    "longitude" => "2.4167",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Toffo",
                    "latitude" => "6.8500",
                    "longitude" => "2.0833",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Tanguiéta",
                    "latitude" => "10.6167",
                    "longitude" => "1.2667",
                    "pays" => "Benin",
                    "departement" => "Atacora"
                ],
                [
                    "ville" => "Péda-Houéyogbé",
                    "latitude" => "6.4500",
                    "longitude" => "1.9333",
                    "pays" => "Benin",
                    "departement" => "Mono"
                ],
                [
                    "ville" => "Ouaké",
                    "latitude" => "9.6617",
                    "longitude" => "1.3847",
                    "pays" => "Benin",
                    "departement" => "Donga"
                ],
                [
                    "ville" => "Zogbodomé",
                    "latitude" => "7.0833",
                    "longitude" => "2.1000",
                    "pays" => "Benin",
                    "departement" => "Zou"
                ],
                [
                    "ville" => "Kopargo",
                    "latitude" => "9.8375",
                    "longitude" => "1.5481",
                    "pays" => "Benin",
                    "departement" => "Donga"
                ],
                [
                    "ville" => "Bopa",
                    "latitude" => "6.5833",
                    "longitude" => "1.9833",
                    "pays" => "Benin",
                    "departement" => "Mono"
                ],
                [
                    "ville" => "Nikki",
                    "latitude" => "9.9333",
                    "longitude" => "3.2083",
                    "pays" => "Benin",
                    "departement" => "Borgou"
                ],
                [
                    "ville" => "Karimama",
                    "latitude" => "12.0667",
                    "longitude" => "3.1833",
                    "pays" => "Benin",
                    "departement" => "Alibori"
                ],
                [
                    "ville" => "Dangbo",
                    "latitude" => "6.5000",
                    "longitude" => "2.6833",
                    "pays" => "Benin",
                    "departement" => "Ouémé"
                ],
                [
                    "ville" => "Adjohon",
                    "latitude" => "6.7000",
                    "longitude" => "2.4667",
                    "pays" => "Benin",
                    "departement" => "Ouémé"
                ],
                [
                    "ville" => "Ouinhri",
                    "latitude" => "7.0000",
                    "longitude" => "2.4500",
                    "pays" => "Benin",
                    "departement" => "Zou"
                ],
                [
                    "ville" => "Grand-Popo",
                    "latitude" => "6.2833",
                    "longitude" => "1.8333",
                    "pays" => "Benin",
                    "departement" => "Mono"
                ],
                [
                    "ville" => "Athiémé",
                    "latitude" => "6.5833",
                    "longitude" => "1.6667",
                    "pays" => "Benin",
                    "departement" => "Mono"
                ],
                [
                    "ville" => "Agbangnizoun",
                    "latitude" => "7.0667",
                    "longitude" => "1.9667",
                    "pays" => "Benin",
                    "departement" => "Zou"
                ],
                [
                    "ville" => "Tori-Bossito",
                    "latitude" => "6.5031",
                    "longitude" => "2.1450",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Cové",
                    "latitude" => "7.2333",
                    "longitude" => "2.3000",
                    "pays" => "Benin",
                    "departement" => "Zou"
                ],
                [
                    "ville" => "Toukountouna",
                    "latitude" => "10.4986",
                    "longitude" => "1.3756",
                    "pays" => "Benin",
                    "departement" => "Atacora"
                ],
                [
                    "ville" => "Kérou",
                    "latitude" => "10.8250",
                    "longitude" => "2.1094",
                    "pays" => "Benin",
                    "departement" => "Atacora"
                ],
                [
                    "ville" => "Savalou",
                    "latitude" => "7.9333",
                    "longitude" => "1.9667",
                    "pays" => "Benin",
                    "departement" => "Collines"
                ],
                [
                    "ville" => "Ekpé",
                    "latitude" => "6.4000",
                    "longitude" => "2.5333",
                    "pays" => "Benin",
                    "departement" => "Ouémé"
                ],
                [
                    "ville" => "Comé",
                    "latitude" => "6.4000",
                    "longitude" => "1.8833",
                    "pays" => "Benin",
                    "departement" => "Mono"
                ],
                [
                    "ville" => "Savé",
                    "latitude" => "8.0333",
                    "longitude" => "2.4833",
                    "pays" => "Benin",
                    "departement" => "Collines"
                ],
                [
                    "ville" => "Bembèrèkè",
                    "latitude" => "10.2250",
                    "longitude" => "2.6681",
                    "pays" => "Benin",
                    "departement" => "Borgou"
                ],
                [
                    "ville" => "Agblangandan",
                    "latitude" => "6.3667",
                    "longitude" => "2.5167",
                    "pays" => "Benin",
                    "departement" => "Ouémé"
                ],
                [
                    "ville" => "Founougo",
                    "latitude" => "11.4808",
                    "longitude" => "2.5322",
                    "pays" => "Benin",
                    "departement" => "Alibori"
                ],
                [
                    "ville" => "Bonou",
                    "latitude" => "6.9000",
                    "longitude" => "2.4500",
                    "pays" => "Benin",
                    "departement" => "Ouémé"
                ],
                [
                    "ville" => "Golo-Djigbé",
                    "latitude" => "6.5403",
                    "longitude" => "2.3253",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Bouka",
                    "latitude" => "10.2167",
                    "longitude" => "3.1333",
                    "pays" => "Benin",
                    "departement" => "Borgou"
                ],
                [
                    "ville" => "Paouignan",
                    "latitude" => "7.6937",
                    "longitude" => "2.2673",
                    "pays" => "Benin",
                    "departement" => "Collines"
                ],
                [
                    "ville" => "Idigny",
                    "latitude" => "7.4833",
                    "longitude" => "2.7000",
                    "pays" => "Benin",
                    "departement" => "Plateau"
                ],
                [
                    "ville" => "Guéné",
                    "latitude" => "11.7306",
                    "longitude" => "3.2242",
                    "pays" => "Benin",
                    "departement" => "Atacora"
                ],
                [
                    "ville" => "Goumori",
                    "latitude" => "11.1833",
                    "longitude" => "2.2833",
                    "pays" => "Benin",
                    "departement" => "Alibori"
                ],
                [
                    "ville" => "Azové",
                    "latitude" => "6.9500",
                    "longitude" => "1.7000",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ],
                [
                    "ville" => "Doutou",
                    "latitude" => "6.5500",
                    "longitude" => "1.8833",
                    "pays" => "Benin",
                    "departement" => "Mono"
                ],
                [
                    "ville" => "Sori",
                    "latitude" => "10.7281",
                    "longitude" => "2.7825",
                    "pays" => "Benin",
                    "departement" => "Alibori"
                ],
                [
                    "ville" => "Bagou",
                    "latitude" => "10.8147",
                    "longitude" => "2.7164",
                    "pays" => "Benin",
                    "departement" => "Alibori"
                ],
                [
                    "ville" => "Vakon",
                    "latitude" => "6.5167",
                    "longitude" => "2.5667",
                    "pays" => "Benin",
                    "departement" => "Ouémé"
                ],
                [
                    "ville" => "Kissa",
                    "latitude" => "7.0333",
                    "longitude" => "1.7833",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ],
                [
                    "ville" => "Issaba",
                    "latitude" => "7.0833",
                    "longitude" => "2.6167",
                    "pays" => "Benin",
                    "departement" => "Plateau"
                ],
                [
                    "ville" => "Atchoupa",
                    "latitude" => "6.5333",
                    "longitude" => "2.6333",
                    "pays" => "Benin",
                    "departement" => "Ouémé"
                ],
                [
                    "ville" => "Bouanri",
                    "latitude" => "10.2000",
                    "longitude" => "2.8667",
                    "pays" => "Benin",
                    "departement" => "Borgou"
                ],
                [
                    "ville" => "Togba",
                    "latitude" => "7.1000",
                    "longitude" => "1.6667",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ],
                [
                    "ville" => "Zinvié",
                    "latitude" => "6.6167",
                    "longitude" => "2.3500",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Biro",
                    "latitude" => "9.9000",
                    "longitude" => "2.9333",
                    "pays" => "Benin",
                    "departement" => "Borgou"
                ],
                [
                    "ville" => "Tohoué",
                    "latitude" => "6.3967",
                    "longitude" => "2.5853",
                    "pays" => "Benin",
                    "departement" => "Ouémé"
                ],
                [
                    "ville" => "Lobogo",
                    "latitude" => "6.6333",
                    "longitude" => "1.9000",
                    "pays" => "Benin",
                    "departement" => "Mono"
                ],
                [
                    "ville" => "Kolokondé",
                    "latitude" => "9.9000",
                    "longitude" => "1.7667",
                    "pays" => "Benin",
                    "departement" => "Donga"
                ],
                [
                    "ville" => "Akassato",
                    "latitude" => "6.5000",
                    "longitude" => "2.3667",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Tobré",
                    "latitude" => "10.2000",
                    "longitude" => "2.1333",
                    "pays" => "Benin",
                    "departement" => "Atacora"
                ],
                [
                    "ville" => "Massé",
                    "latitude" => "7.1578",
                    "longitude" => "2.5436",
                    "pays" => "Benin",
                    "departement" => "Plateau"
                ],
                [
                    "ville" => "Aklanpa",
                    "latitude" => "8.1684",
                    "longitude" => "2.2320",
                    "pays" => "Benin",
                    "departement" => "Collines"
                ],
                [
                    "ville" => "Azaourissè",
                    "latitude" => "6.6944",
                    "longitude" => "2.5075",
                    "pays" => "Benin",
                    "departement" => "Ouémé"
                ],
                [
                    "ville" => "Tantéga",
                    "latitude" => "10.8500",
                    "longitude" => "1.0333",
                    "pays" => "Benin",
                    "departement" => "Atacora"
                ],
                [
                    "ville" => "Tiahounkossi",
                    "latitude" => "10.8167",
                    "longitude" => "1.0667",
                    "pays" => "Benin",
                    "departement" => "Atacora"
                ],
                [
                    "ville" => "Ina",
                    "latitude" => "9.9833",
                    "longitude" => "2.7167",
                    "pays" => "Benin",
                    "departement" => "Borgou"
                ],
                [
                    "ville" => "Adjahomé",
                    "latitude" => "7.0618",
                    "longitude" => "1.8368",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ],
                [
                    "ville" => "Angara-Débou",
                    "latitude" => "11.3289",
                    "longitude" => "3.0406",
                    "pays" => "Benin",
                    "departement" => "Atacora"
                ],
                [
                    "ville" => "Garou",
                    "latitude" => "11.8053",
                    "longitude" => "3.4739",
                    "pays" => "Benin",
                    "departement" => "Atacora"
                ],
                [
                    "ville" => "Ségou",
                    "latitude" => "6.6167",
                    "longitude" => "2.2167",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Banigbé",
                    "latitude" => "6.9000",
                    "longitude" => "2.6500",
                    "pays" => "Benin",
                    "departement" => "Plateau"
                ],
                [
                    "ville" => "Sérarou",
                    "latitude" => "9.5833",
                    "longitude" => "2.6500",
                    "pays" => "Benin",
                    "departement" => "Borgou"
                ],
                [
                    "ville" => "Dassari",
                    "latitude" => "10.8158",
                    "longitude" => "1.1406",
                    "pays" => "Benin",
                    "departement" => "Atacora"
                ],
                [
                    "ville" => "Toui",
                    "latitude" => "8.6833",
                    "longitude" => "2.6000",
                    "pays" => "Benin",
                    "departement" => "Collines"
                ],
                [
                    "ville" => "Bétérou",
                    "latitude" => "9.2000",
                    "longitude" => "2.2667",
                    "pays" => "Benin",
                    "departement" => "Borgou"
                ],
                [
                    "ville" => "Sakabansi",
                    "latitude" => "10.0442",
                    "longitude" => "3.3821",
                    "pays" => "Benin",
                    "departement" => "Borgou"
                ],
                [
                    "ville" => "Briniamaro",
                    "latitude" => "10.7411",
                    "longitude" => "2.0731",
                    "pays" => "Benin",
                    "departement" => "Atacora"
                ],
                [
                    "ville" => "Sinmpérékou",
                    "latitude" => "11.2333",
                    "longitude" => "2.4167",
                    "pays" => "Benin",
                    "departement" => "Alibori"
                ],
                [
                    "ville" => "Onklou",
                    "latitude" => "9.5000",
                    "longitude" => "1.9833",
                    "pays" => "Benin",
                    "departement" => "Donga"
                ],
                [
                    "ville" => "Dahé",
                    "latitude" => "6.5167",
                    "longitude" => "1.9500",
                    "pays" => "Benin",
                    "departement" => "Mono"
                ],
                [
                    "ville" => "Pahou",
                    "latitude" => "6.3833",
                    "longitude" => "2.2167",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Ayomi",
                    "latitude" => "6.7833",
                    "longitude" => "1.7167",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ],
                [
                    "ville" => "Adakplamé",
                    "latitude" => "7.4500",
                    "longitude" => "2.5500",
                    "pays" => "Benin",
                    "departement" => "Plateau"
                ],
                [
                    "ville" => "Méridjonou",
                    "latitude" => "6.4619",
                    "longitude" => "2.6774",
                    "pays" => "Benin",
                    "departement" => "Ouémé"
                ],
                [
                    "ville" => "Gouka",
                    "latitude" => "8.1333",
                    "longitude" => "1.9667",
                    "pays" => "Benin",
                    "departement" => "Collines"
                ],
                [
                    "ville" => "Manta",
                    "latitude" => "10.3564",
                    "longitude" => "1.1056",
                    "pays" => "Benin",
                    "departement" => "Atacora"
                ],
                [
                    "ville" => "Doumé",
                    "latitude" => "8.0167",
                    "longitude" => "1.6333",
                    "pays" => "Benin",
                    "departement" => "Collines"
                ],
                [
                    "ville" => "Atomé-Avégamé",
                    "latitude" => "7.2333",
                    "longitude" => "1.6500",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ],
                [
                    "ville" => "Hévié",
                    "latitude" => "6.4167",
                    "longitude" => "2.2500",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Toura",
                    "latitude" => "11.2436",
                    "longitude" => "2.3831",
                    "pays" => "Benin",
                    "departement" => "Alibori"
                ],
                [
                    "ville" => "Gouandé",
                    "latitude" => "10.7828",
                    "longitude" => "0.9186",
                    "pays" => "Benin",
                    "departement" => "Atacora"
                ],
                [
                    "ville" => "Gomparou",
                    "latitude" => "11.3000",
                    "longitude" => "2.4489",
                    "pays" => "Benin",
                    "departement" => "Alibori"
                ],
                [
                    "ville" => "Donwari",
                    "latitude" => "11.1197",
                    "longitude" => "2.8558",
                    "pays" => "Benin",
                    "departement" => "Alibori"
                ],
                [
                    "ville" => "Kouti",
                    "latitude" => "6.5542",
                    "longitude" => "2.6616",
                    "pays" => "Benin",
                    "departement" => "Plateau"
                ],
                [
                    "ville" => "Birni",
                    "latitude" => "9.9892",
                    "longitude" => "1.5269",
                    "pays" => "Benin",
                    "departement" => "Atacora"
                ],
                [
                    "ville" => "Siki",
                    "latitude" => "10.1833",
                    "longitude" => "2.3833",
                    "pays" => "Benin",
                    "departement" => "Borgou"
                ],
                [
                    "ville" => "Kika",
                    "latitude" => "9.3000",
                    "longitude" => "2.2667",
                    "pays" => "Benin",
                    "departement" => "Borgou"
                ],
                [
                    "ville" => "Pira",
                    "latitude" => "8.5000",
                    "longitude" => "1.7333",
                    "pays" => "Benin",
                    "departement" => "Collines"
                ],
                [
                    "ville" => "Soklogbo",
                    "latitude" => "7.6937",
                    "longitude" => "2.2673",
                    "pays" => "Benin",
                    "departement" => "Collines"
                ],
                [
                    "ville" => "Godohou",
                    "latitude" => "7.0333",
                    "longitude" => "1.7833",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ],
                [
                    "ville" => "Ouénou",
                    "latitude" => "9.7870",
                    "longitude" => "2.6375",
                    "pays" => "Benin",
                    "departement" => "Borgou"
                ],
                [
                    "ville" => "Katagon",
                    "latitude" => "6.6333",
                    "longitude" => "2.5833",
                    "pays" => "Benin",
                    "departement" => "Ouémé"
                ],
                [
                    "ville" => "Sagon",
                    "latitude" => "7.1500",
                    "longitude" => "2.4167",
                    "pays" => "Benin",
                    "departement" => "Zou"
                ],
                [
                    "ville" => "Gbanhi",
                    "latitude" => "8.4497",
                    "longitude" => "2.4737",
                    "pays" => "Benin",
                    "departement" => "Collines"
                ],
                [
                    "ville" => "Sam",
                    "latitude" => "11.0333",
                    "longitude" => "2.7333",
                    "pays" => "Benin",
                    "departement" => "Alibori"
                ],
                [
                    "ville" => "Sokouhoué",
                    "latitude" => "6.9000",
                    "longitude" => "1.6667",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ],
                [
                    "ville" => "Kountouri",
                    "latitude" => "10.4050",
                    "longitude" => "0.9425",
                    "pays" => "Benin",
                    "departement" => "Atacora"
                ],
                [
                    "ville" => "Tori-Cada",
                    "latitude" => "6.5833",
                    "longitude" => "2.2000",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Coussé",
                    "latitude" => "6.8500",
                    "longitude" => "2.1333",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Lissegazoun",
                    "latitude" => "6.6167",
                    "longitude" => "2.0833",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Gbéroubouè",
                    "latitude" => "10.5333",
                    "longitude" => "2.7333",
                    "pays" => "Benin",
                    "departement" => "Borgou"
                ],
                [
                    "ville" => "Péonga",
                    "latitude" => "10.3333",
                    "longitude" => "3.2667",
                    "pays" => "Benin",
                    "departement" => "Borgou"
                ],
                [
                    "ville" => "Dérassi",
                    "latitude" => "10.1667",
                    "longitude" => "3.2667",
                    "pays" => "Benin",
                    "departement" => "Borgou"
                ],
                [
                    "ville" => "Kaboua",
                    "latitude" => "8.2500",
                    "longitude" => "2.6833",
                    "pays" => "Benin",
                    "departement" => "Collines"
                ],
                [
                    "ville" => "Agamé",
                    "latitude" => "6.7333",
                    "longitude" => "1.7667",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ],
                [
                    "ville" => "Guinagourou",
                    "latitude" => "9.5667",
                    "longitude" => "2.9500",
                    "pays" => "Benin",
                    "departement" => "Borgou"
                ],
                [
                    "ville" => "Niémasson",
                    "latitude" => "10.3078",
                    "longitude" => "2.0378",
                    "pays" => "Benin",
                    "departement" => "Atacora"
                ],
                [
                    "ville" => "Sérékali",
                    "latitude" => "9.9186",
                    "longitude" => "3.0434",
                    "pays" => "Benin",
                    "departement" => "Borgou"
                ],
                [
                    "ville" => "Sanson",
                    "latitude" => "9.2833",
                    "longitude" => "2.4333",
                    "pays" => "Benin",
                    "departement" => "Borgou"
                ],
                [
                    "ville" => "Gounarou",
                    "latitude" => "10.8667",
                    "longitude" => "2.8500",
                    "pays" => "Benin",
                    "departement" => "Alibori"
                ],
                [
                    "ville" => "Agouna",
                    "latitude" => "7.5667",
                    "longitude" => "1.7000",
                    "pays" => "Benin",
                    "departement" => "Zou"
                ],
                [
                    "ville" => "Fô-Bouré",
                    "latitude" => "10.1167",
                    "longitude" => "2.4000",
                    "pays" => "Benin",
                    "departement" => "Borgou"
                ],
                [
                    "ville" => "Adohoun",
                    "latitude" => "6.6333",
                    "longitude" => "1.6667",
                    "pays" => "Benin",
                    "departement" => "Mono"
                ],
                [
                    "ville" => "Kilibo",
                    "latitude" => "8.5717",
                    "longitude" => "2.6017",
                    "pays" => "Benin",
                    "departement" => "Collines"
                ],
                [
                    "ville" => "Ouédo-Aguéko",
                    "latitude" => "6.4963",
                    "longitude" => "2.4268",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Yoko",
                    "latitude" => "6.7000",
                    "longitude" => "2.6167",
                    "pays" => "Benin",
                    "departement" => "Plateau"
                ],
                [
                    "ville" => "Lonkly",
                    "latitude" => "7.1333",
                    "longitude" => "1.6833",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ],
                [
                    "ville" => "Takon",
                    "latitude" => "6.6500",
                    "longitude" => "2.6167",
                    "pays" => "Benin",
                    "departement" => "Plateau"
                ],
                [
                    "ville" => "Dougba",
                    "latitude" => "8.4497",
                    "longitude" => "2.4737",
                    "pays" => "Benin",
                    "departement" => "Collines"
                ],
                [
                    "ville" => "Libanté",
                    "latitude" => "10.7936",
                    "longitude" => "3.5828",
                    "pays" => "Benin",
                    "departement" => "Alibori"
                ],
                [
                    "ville" => "Dan",
                    "latitude" => "7.3167",
                    "longitude" => "2.0667",
                    "pays" => "Benin",
                    "departement" => "Zou"
                ],
                [
                    "ville" => "Firou",
                    "latitude" => "10.9192",
                    "longitude" => "1.9386",
                    "pays" => "Benin",
                    "departement" => "Atacora"
                ],
                [
                    "ville" => "Ahogbeya",
                    "latitude" => "7.0333",
                    "longitude" => "1.9167",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ],
                [
                    "ville" => "Ganvié",
                    "latitude" => "6.4667",
                    "longitude" => "2.4167",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Pabégou",
                    "latitude" => "9.8333",
                    "longitude" => "1.5492",
                    "pays" => "Benin",
                    "departement" => "Donga"
                ],
                [
                    "ville" => "Hozin",
                    "latitude" => "6.5333",
                    "longitude" => "2.5500",
                    "pays" => "Benin",
                    "departement" => "Ouémé"
                ],
                [
                    "ville" => "Ouédo",
                    "latitude" => "6.4833",
                    "longitude" => "2.4500",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Massi",
                    "latitude" => "9.9167",
                    "longitude" => "1.4667",
                    "pays" => "Benin",
                    "departement" => "Donga"
                ],
                [
                    "ville" => "Tomboutou",
                    "latitude" => "11.8550",
                    "longitude" => "3.2892",
                    "pays" => "Benin",
                    "departement" => "Atacora"
                ],
                [
                    "ville" => "Kouarfa",
                    "latitude" => "10.4833",
                    "longitude" => "1.5167",
                    "pays" => "Benin",
                    "departement" => "Atacora"
                ],
                [
                    "ville" => "Agatogba",
                    "latitude" => "6.4000",
                    "longitude" => "1.9000",
                    "pays" => "Benin",
                    "departement" => "Mono"
                ],
                [
                    "ville" => "Zoudjamé",
                    "latitude" => "6.8167",
                    "longitude" => "1.8667",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ],
                [
                    "ville" => "Dasso",
                    "latitude" => "7.0167",
                    "longitude" => "2.4667",
                    "pays" => "Benin",
                    "departement" => "Zou"
                ],
                [
                    "ville" => "Agoué",
                    "latitude" => "6.2500",
                    "longitude" => "1.6833",
                    "pays" => "Benin",
                    "departement" => "Mono"
                ],
                [
                    "ville" => "Dagbé",
                    "latitude" => "6.5667",
                    "longitude" => "2.6833",
                    "pays" => "Benin",
                    "departement" => "Ouémé"
                ],
                [
                    "ville" => "Lagbé",
                    "latitude" => "6.6833",
                    "longitude" => "2.6833",
                    "pays" => "Benin",
                    "departement" => "Plateau"
                ],
                [
                    "ville" => "Lanta",
                    "latitude" => "7.1000",
                    "longitude" => "1.8667",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ],
                [
                    "ville" => "Dodji-Bata",
                    "latitude" => "6.6833",
                    "longitude" => "2.2833",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Ouédémè",
                    "latitude" => "6.7000",
                    "longitude" => "1.6833",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ],
                [
                    "ville" => "Adjido",
                    "latitude" => "7.0333",
                    "longitude" => "1.9833",
                    "pays" => "Benin",
                    "departement" => "Zou"
                ],
                [
                    "ville" => "Igana",
                    "latitude" => "7.0333",
                    "longitude" => "2.7000",
                    "pays" => "Benin",
                    "departement" => "Plateau"
                ],
                [
                    "ville" => "Ouando",
                    "latitude" => "6.5542",
                    "longitude" => "2.6616",
                    "pays" => "Benin",
                    "departement" => "Ouémé"
                ],
                [
                    "ville" => "Avabodji",
                    "latitude" => "6.4533",
                    "longitude" => "2.5275",
                    "pays" => "Benin",
                    "departement" => "Ouémé"
                ],
                [
                    "ville" => "Adjarra",
                    "latitude" => "6.5333",
                    "longitude" => "2.2667",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Dékanmé",
                    "latitude" => "7.1333",
                    "longitude" => "1.9667",
                    "pays" => "Benin",
                    "departement" => "Zou"
                ],
                [
                    "ville" => "Locogahoué",
                    "latitude" => "6.8000",
                    "longitude" => "1.7830",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ],
                [
                    "ville" => "Sèmèrè",
                    "latitude" => "9.6268",
                    "longitude" => "1.4515",
                    "pays" => "Benin",
                    "departement" => "Donga"
                ],
                [
                    "ville" => "Sémé-Akiza",
                    "latitude" => "6.9667",
                    "longitude" => "2.0500",
                    "pays" => "Benin",
                    "departement" => "Zou"
                ],
                [
                    "ville" => "Agbodji",
                    "latitude" => "6.6500",
                    "longitude" => "1.9833",
                    "pays" => "Benin",
                    "departement" => "Mono"
                ],
                [
                    "ville" => "Ouassa",
                    "latitude" => "7.1867",
                    "longitude" => "2.1206",
                    "pays" => "Benin",
                    "departement" => "Zou"
                ],
                [
                    "ville" => "Zounké",
                    "latitude" => "6.6167",
                    "longitude" => "2.5333",
                    "pays" => "Benin",
                    "departement" => "Ouémé"
                ],
                [
                    "ville" => "Houédomé",
                    "latitude" => "6.4833",
                    "longitude" => "2.5500",
                    "pays" => "Benin",
                    "departement" => "Ouémé"
                ],
                [
                    "ville" => "Anandana",
                    "latitude" => "9.9500",
                    "longitude" => "1.3833",
                    "pays" => "Benin",
                    "departement" => "Donga"
                ],
                [
                    "ville" => "Tanvé",
                    "latitude" => "7.1333",
                    "longitude" => "1.9667",
                    "pays" => "Benin",
                    "departement" => "Zou"
                ],
                [
                    "ville" => "Okpomèta",
                    "latitude" => "7.4000",
                    "longitude" => "2.6500",
                    "pays" => "Benin",
                    "departement" => "Plateau"
                ],
                [
                    "ville" => "Badjoudè",
                    "latitude" => "9.7167",
                    "longitude" => "1.4167",
                    "pays" => "Benin",
                    "departement" => "Donga"
                ],
                [
                    "ville" => "Kpénou",
                    "latitude" => "6.5997",
                    "longitude" => "1.7408",
                    "pays" => "Benin",
                    "departement" => "Mono"
                ],
                [
                    "ville" => "Boni",
                    "latitude" => "9.2833",
                    "longitude" => "2.7333",
                    "pays" => "Benin",
                    "departement" => "Borgou"
                ],
                [
                    "ville" => "Gourou",
                    "latitude" => "9.9370",
                    "longitude" => "3.2089",
                    "pays" => "Benin",
                    "departement" => "Borgou"
                ],
                [
                    "ville" => "Koyohoué",
                    "latitude" => "6.8582",
                    "longitude" => "1.6841",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ],
                [
                    "ville" => "Oungo",
                    "latitude" => "6.8500",
                    "longitude" => "2.0833",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ],
                [
                    "ville" => "Affamè",
                    "latitude" => "6.8167",
                    "longitude" => "2.4667",
                    "pays" => "Benin",
                    "departement" => "Ouémé"
                ],
                [
                    "ville" => "Tchanou",
                    "latitude" => "6.5997",
                    "longitude" => "1.7408",
                    "pays" => "Benin",
                    "departement" => "Mono"
                ],
                [
                    "ville" => "Allahé",
                    "latitude" => "7.1667",
                    "longitude" => "2.2667",
                    "pays" => "Benin",
                    "departement" => "Zou"
                ],
                [
                    "ville" => "Dékin-Afio",
                    "latitude" => "6.5500",
                    "longitude" => "2.4500",
                    "pays" => "Benin",
                    "departement" => "Ouémé"
                ],
                [
                    "ville" => "Hondjin",
                    "latitude" => "7.0618",
                    "longitude" => "1.8368",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ],
                [
                    "ville" => "Chabi-Kouma",
                    "latitude" => "10.0000",
                    "longitude" => "1.4667",
                    "pays" => "Benin",
                    "departement" => "Atacora"
                ],
                [
                    "ville" => "Domé",
                    "latitude" => "7.1000",
                    "longitude" => "2.3000",
                    "pays" => "Benin",
                    "departement" => "Zou"
                ],
                [
                    "ville" => "Lissazoumé",
                    "latitude" => "7.0723",
                    "longitude" => "1.9660",
                    "pays" => "Benin",
                    "departement" => "Zou"
                ],
                [
                    "ville" => "Kpoba",
                    "latitude" => "6.8167",
                    "longitude" => "1.6333",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ],
                [
                    "ville" => "Agoukamè",
                    "latitude" => "6.3816",
                    "longitude" => "1.9935",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Koundakpoé",
                    "latitude" => "6.7283",
                    "longitude" => "2.3187",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Azohoué-Cada",
                    "latitude" => "6.5500",
                    "longitude" => "2.1000",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Naogon",
                    "latitude" => "7.2333",
                    "longitude" => "2.3333",
                    "pays" => "Benin",
                    "departement" => "Zou"
                ],
                [
                    "ville" => "Houin",
                    "latitude" => "6.6300",
                    "longitude" => "1.7160",
                    "pays" => "Benin",
                    "departement" => "Mono"
                ],
                [
                    "ville" => "Attogon",
                    "latitude" => "6.7167",
                    "longitude" => "2.1500",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Akpotonou",
                    "latitude" => "6.7667",
                    "longitude" => "2.4833",
                    "pays" => "Benin",
                    "departement" => "Ouémé"
                ],
                [
                    "ville" => "Houton",
                    "latitude" => "6.8000",
                    "longitude" => "1.7830",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ],
                [
                    "ville" => "Adjaha",
                    "latitude" => "6.3167",
                    "longitude" => "1.8333",
                    "pays" => "Benin",
                    "departement" => "Mono"
                ],
                [
                    "ville" => "Sahé",
                    "latitude" => "7.0500",
                    "longitude" => "1.9167",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ],
                [
                    "ville" => "Avlékété",
                    "latitude" => "6.3500",
                    "longitude" => "2.2000",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Adjian",
                    "latitude" => "6.7283",
                    "longitude" => "2.3187",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Ayou",
                    "latitude" => "6.7167",
                    "longitude" => "2.1167",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Gbakpodji",
                    "latitude" => "6.6667",
                    "longitude" => "1.8667",
                    "pays" => "Benin",
                    "departement" => "Mono"
                ],
                [
                    "ville" => "Komtè",
                    "latitude" => "9.6268",
                    "longitude" => "1.4515",
                    "pays" => "Benin",
                    "departement" => "Donga"
                ],
                [
                    "ville" => "Kpomé",
                    "latitude" => "6.9500",
                    "longitude" => "2.3000",
                    "pays" => "Benin",
                    "departement" => "Zou"
                ],
                [
                    "ville" => "Ayahohoué",
                    "latitude" => "7.0618",
                    "longitude" => "1.8368",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ],
                [
                    "ville" => "Kinkinhoué",
                    "latitude" => "6.9167",
                    "longitude" => "1.7167",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ],
                [
                    "ville" => "Djanglamé",
                    "latitude" => "6.4000",
                    "longitude" => "1.8167",
                    "pays" => "Benin",
                    "departement" => "Mono"
                ],
                [
                    "ville" => "Kouzounkpa",
                    "latitude" => "7.0163",
                    "longitude" => "2.1911",
                    "pays" => "Benin",
                    "departement" => "Zou"
                ],
                [
                    "ville" => "Gakpé",
                    "latitude" => "6.4167",
                    "longitude" => "2.1333",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Cana",
                    "latitude" => "7.1669",
                    "longitude" => "2.0669",
                    "pays" => "Benin",
                    "departement" => "Zou"
                ],
                [
                    "ville" => "Ounhoué",
                    "latitude" => "6.5281",
                    "longitude" => "1.8650",
                    "pays" => "Benin",
                    "departement" => "Mono"
                ],
                [
                    "ville" => "Kinta",
                    "latitude" => "7.0723",
                    "longitude" => "1.9660",
                    "pays" => "Benin",
                    "departement" => "Zou"
                ],
                [
                    "ville" => "Gbehoué",
                    "latitude" => "6.3488",
                    "longitude" => "1.8065",
                    "pays" => "Benin",
                    "departement" => "Mono"
                ],
                [
                    "ville" => "Avamé",
                    "latitude" => "6.5000",
                    "longitude" => "2.2167",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Détohou",
                    "latitude" => "7.1833",
                    "longitude" => "1.9500",
                    "pays" => "Benin",
                    "departement" => "Zou"
                ],
                [
                    "ville" => "Togodo",
                    "latitude" => "6.6500",
                    "longitude" => "2.1667",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Avakpa",
                    "latitude" => "6.6500",
                    "longitude" => "2.0500",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Tchito",
                    "latitude" => "6.9333",
                    "longitude" => "2.0667",
                    "pays" => "Benin",
                    "departement" => "Zou"
                ],
                [
                    "ville" => "Djigbé",
                    "latitude" => "6.8333",
                    "longitude" => "2.3833",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Hinvi",
                    "latitude" => "6.7667",
                    "longitude" => "2.1667",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Oumako",
                    "latitude" => "6.4333",
                    "longitude" => "1.8333",
                    "pays" => "Benin",
                    "departement" => "Mono"
                ],
                [
                    "ville" => "Ahomadégbé",
                    "latitude" => "6.8333",
                    "longitude" => "2.0000",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ],
                [
                    "ville" => "Long-Agomey",
                    "latitude" => "6.7333",
                    "longitude" => "2.0500",
                    "pays" => "Benin",
                    "departement" => "Atlantique"
                ],
                [
                    "ville" => "Sazué",
                    "latitude" => "6.3488",
                    "longitude" => "1.8065",
                    "pays" => "Benin",
                    "departement" => "Mono"
                ],
                [
                    "ville" => "Avlo",
                    "latitude" => "6.2930",
                    "longitude" => "1.8954",
                    "pays" => "Benin",
                    "departement" => "Mono"
                ],
                [
                    "ville" => "Tchalinga",
                    "latitude" => "9.8167",
                    "longitude" => "1.3833",
                    "pays" => "Benin",
                    "departement" => "Donga"
                ],
                [
                    "ville" => "Zoungoudo",
                    "latitude" => "7.0167",
                    "longitude" => "1.9833",
                    "pays" => "Benin",
                    "departement" => "Zou"
                ],
                [
                    "ville" => "Dogbo",
                    "latitude" => "6.8167",
                    "longitude" => "1.7833",
                    "pays" => "Benin",
                    "departement" => "Couffo"
                ]
            ];
        foreach ($arrets as $arret) {
            Arret::firstOrCreate([
                "nom" => $arret['ville'],
                "latitude" => $arret['latitude'],
                "longitude" => $arret['longitude'],
                "pays" => $arret['pays'],
                "departement" => $arret['departement']
            ]);
        }
    }
}
