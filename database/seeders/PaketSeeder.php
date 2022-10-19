<?php

namespace Database\Seeders;

use App\Models\Paket;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Faker::create('id_ID');

      //  for ($i=0; $i < 10000; $i++) { 
      //    Paket::create([
      //       'tahun_anggaran' => $faker->numberBetween(2000, 2022),
      //       'name' => $faker->words(3, true),
      //    ]);
      //  }
      Paket::Create([
         'tahun_anggaran' => 2019,
         'name' => 'SID Embung di DAS Citanduy Kabupaten Cilacap',
      ]);

      Paket::Create([
         'tahun_anggaran' => 2019,
         'name' => 'DED Check Dam di DAS Citanduy Hulu',
      ]);

      Paket::create([
         'tahun_anggaran' => 2019,
         'name' => 'SID Pengamanan Pantai Timur Pangandaran Sampai Pantai Karapyak di Kabupaten Pangandaran',
      ]);

      Paket::Create([
         'tahun_anggaran' => 2019,
         'name' => 'Amdal Quarry Bendungan Leuwikeris',
      ]);
    }
}
