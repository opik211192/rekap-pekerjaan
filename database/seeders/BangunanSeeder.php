<?php

namespace Database\Seeders;

use App\Models\Bangunan;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BangunanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        // for ($i=0; $i < 100; $i++) { 
        //      Bangunan::create([
        //         'paket_id' => $faker->numberBetween(1,5),
        //         'name' => $faker->words(2, true),
        //         'status' => 1,
        //         'tahun_konstruksi' => $faker->numberBetween(1995, 2021),
        //      ]);
        // }

        Bangunan::create([
            'paket_id' => 1,
            'name' => 'Embung Cikuya',
            'province_id' => 13,
            'city_id' => 188,
            'district_id' => 2634,
            'village_id' => 31818,
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 1,
            'name' => 'Embung Cikadu',
            'province_id' => 13,
            'city_id' => 188,
            'district_id' => 2633,
            'village_id' => 31796,
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 1,
            'name' => 'Embung Karangreja',
            'province_id' => 13,
            'city_id' => 188,
            'district_id' => 2637,
            'village_id' => 31860,
            'status' => 1,
            'tahun_konstruksi' => 2022,
        ]);

        Bangunan::create([
            'paket_id' => 1,
            'name' => 'Embung Kawung Carang',
            'province_id' => 13,
            'city_id' => 188,
            'district_id' => 2631,
            'village_id' => 31786,
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);


        Bangunan::create([
            'paket_id' => 2,
            'name' => 'Guranteng',
            'province_id' => 12,
            'city_id' => 166,
            'district_id' => 2222,
            'village_id' => 27896,
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 2,
            'name' => 'Pagerageung',
            'province_id' => 12,
            'city_id' => 166,
            'district_id' => 2222,
            'village_id' => 27896,
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 2,
            'name' => 'Tanjungkerta',
            'province_id' => 12,
            'city_id' => 166,
            'district_id' => 2222,
            'village_id' => 27896,
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 2,
            'name' => 'Cikarang',
            'province_id' => 12,
            'city_id' => 165,
            'district_id' => 2156,
            'village_id' => 27275,
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 2,
            'name' => 'Sukamanah',
            'province_id' => 12,
            'city_id' => 166,
            'district_id' => 2607,
            'village_id' => 31527,
            'status' => 1,
            'tahun_konstruksi' => 2021,
        ]);

        Bangunan::create([
            'paket_id' => 2,
            'name' => 'Cimari',
            'province_id' => 12,
            'city_id' => 167,
            'district_id' => 2225,
            'village_id' => 27928,
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 2,
            'name' => 'Cigembor',
            'province_id' => 12,
            'city_id' => 167,
            'district_id' => 2224,
            'village_id' => 27912,
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 2,
            'name' => 'Margaluyu',
            'province_id' => 12,
            'city_id' => 186,
            'district_id' => 2615,
            'village_id' => 31586,
            'status' => 1,
            'tahun_konstruksi' => 2021,
        ]);

        Bangunan::create([
            'paket_id' => 3,
            'name' => 'Tembok Laut (Material Buis Beton dan Pasangan Batu)',
            'province_id' => 12,
            'city_id' => 178,
            'district_id' => 2530,
            'village_id' => 31095,
            'status' => 1,
            'tahun_konstruksi' => 2020,
        ]);

        Bangunan::create([
            'paket_id' => 3,
            'name' => 'Jeti (Material Batu Armor) Sungai Cikidang',
            'province_id' => 12,
            'city_id' => 178,
            'district_id' => 2530,
            'village_id' => 31095,
            'status' => 1,
            'tahun_konstruksi' => 2020,
        ]);

        Bangunan::create([
            'paket_id' => 3,
            'name' => 'Pengerukan Muara Sungai Cikidang',
            'province_id' => 12,
            'city_id' => 178,
            'district_id' => 2530,
            'village_id' => 31095,
            'status' => 1,
            'tahun_konstruksi' => 2020,
        ]);

        // Bangunan::create([
        //     'paket_id' => 3,
        //     'name' => 'Pengerukan Muara Sungai Cikidang',
        //     'status' => 1,
        //     'tahun_konstruksi' => 2020,
        // ]);

        Bangunan::create([
            'paket_id' => 3,
            'name' => 'Tembok Laut (Material Buis Beton dan Pasangan Batu)',
            'province_id' => 12,
            'city_id' => 178,
            'district_id' => 2530,
            'village_id' => 31095,
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 3,
            'name' => 'Jembatan (Material Beton Bertulang dan Pasangan Batu) Pantai PIAMARI',
            'province_id' => 12,
            'city_id' => 178,
            'district_id' => 2530,
            'village_id' => 31095,
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 3,
            'name' => 'Jeti (Material Batu Armor) Sungai Bugel',
            'province_id' => 12,
            'city_id' => 178,
            'district_id' => 2530,
            'village_id' => 31095,
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 3,
            'name' => 'Groin (Material Batu Armor)',
            'province_id' => 12,
            'city_id' => 178,
            'district_id' => 2530,
            'village_id' => 31095,
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 3,
            'name' => 'Tembok Laut (Material Buis Beton dan Pasangan Batu) Pantai Tagog',
            'province_id' => 12,
            'city_id' => 178,
            'district_id' => 2530,
            'village_id' => 31095,
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 3,
            'name' => 'Tembok Laut (Material Buis Beton dan Pasangan Batu) Pantai Lembah Putri',
            'province_id' => 12,
            'city_id' => 178,
            'district_id' => 2529,
            'village_id' => 31086,
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 3,
            'name' => 'Jeti (Material Batu Armor) (Kanan) Muara Sungai Ciputrapinggan',
            'province_id' => 12,
            'city_id' => 178,
            'district_id' => 2529,
            'village_id' => 31086,
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 3,
            'name' => 'Jeti (Material Batu Armor) (Kiri) Muara Sungai Ciputrapinggan',
            'province_id' => 12,
            'city_id' => 178,
            'district_id' => 2529,
            'village_id' => 31086,
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 3,
            'name' => 'Revetmen (Material Pasangan Batu dan Wire Mesh) Pantai Karapyak',
            'province_id' => 12,
            'city_id' => 178,
            'district_id' => 2529,
            'village_id' => 31086,
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

    }
}
