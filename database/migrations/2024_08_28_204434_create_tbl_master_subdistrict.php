<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMasterSubdistrict extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_master_subdistrict', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('kode_kabupaten_kota');
            $table->foreign('kode_kabupaten_kota')->references('kode')->on('tbl_master_city');
            $table->string('nama');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_master_subdistrict');
    }
}
