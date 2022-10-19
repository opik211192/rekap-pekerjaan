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
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 1,
            'name' => 'Embung Cikadu',
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 1,
            'name' => 'Embung Karangreja',
            'status' => 1,
            'tahun_konstruksi' => 2022,
        ]);

        Bangunan::create([
            'paket_id' => 1,
            'name' => 'Embung Kawung Carang',
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);


        Bangunan::create([
            'paket_id' => 2,
            'name' => 'Guranteng',
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 2,
            'name' => 'Pagerageung',
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 2,
            'name' => 'Cikarag',
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 2,
            'name' => 'Sukamanah',
            'status' => 1,
            'tahun_konstruksi' => 2021,
        ]);

        Bangunan::create([
            'paket_id' => 2,
            'name' => 'Cimari',
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 2,
            'name' => 'Cigembor',
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 2,
            'name' => 'Margaluyu',
            'status' => 1,
            'tahun_konstruksi' => 2021,
        ]);

        Bangunan::create([
            'paket_id' => 3,
            'name' => 'Tembok Laut (Material Buis Beton dan Pasangan Batu)',
            'status' => 1,
            'tahun_konstruksi' => 2020,
        ]);

        Bangunan::create([
            'paket_id' => 3,
            'name' => 'Jeti (Material Batu Armor) Sungai Cikidang',
            'status' => 1,
            'tahun_konstruksi' => 2020,
        ]);

        Bangunan::create([
            'paket_id' => 3,
            'name' => 'Pengerukan Muara Sungai Cikidang',
            'status' => 1,
            'tahun_konstruksi' => 2020,
        ]);

        Bangunan::create([
            'paket_id' => 3,
            'name' => 'Pengerukan Muara Sungai Cikidang',
            'status' => 1,
            'tahun_konstruksi' => 2020,
        ]);

        Bangunan::create([
            'paket_id' => 3,
            'name' => 'Tembok Laut (Material Buis Beton dan Pasangan Batu)',
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 3,
            'name' => 'Jembatan (Material Beton Bertulang dan Pasangan Batu) Pantai PIAMARI',
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 3,
            'name' => 'Jeti (Material Batu Armor) Sungai Bugel',
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 3,
            'name' => 'Groin (Material Batu Armor)',
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 3,
            'name' => 'Tembok Laut (Material Buis Beton dan Pasangan Batu) Pantai Tagog',
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 3,
            'name' => 'Tembok Laut (Material Buis Beton dan Pasangan Batu) Pantai Lembah Putri',
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 3,
            'name' => 'Jeti (Material Batu Armor) (Kanan) Muara Sungai Ciputrapinggan',
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 3,
            'name' => 'Jeti (Material Batu Armor) (Kiri) Muara Sungai Ciputrapinggan',
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

        Bangunan::create([
            'paket_id' => 3,
            'name' => 'Revetmen (Material Pasangan Batu dan Wire Mesh) Pantai Karapyak',
            'status' => 0,
            'tahun_konstruksi' => '',
        ]);

    }
}
