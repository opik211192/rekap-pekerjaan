<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBangunansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bangunans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paket_id');
            $table->string('name');
            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('village_id')->nullable();  
            $table->boolean('status')->default(0);
            $table->string('tahun_konstruksi')->nullable();
            $table->timestamps();

            $table->foreign('paket_id')->references('id')->on('pakets')->onDelete('cascade');
            $table->foreign('province_id')->references('id')->on('indonesia_provinces');
            $table->foreign('city_id')->references('id')->on('indonesia_cities');
            $table->foreign('district_id')->references('id')->on('indonesia_districts');
            $table->foreign('village_id')->references('id')->on('indonesia_villages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bangunans');
    }
}
