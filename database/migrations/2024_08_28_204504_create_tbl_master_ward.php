<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMasterWard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_master_ward', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('kode_kecamatan');
            $table->foreign('kode_kecamatan')->references('kode')->on('tbl_master_subdistrict');
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
        Schema::dropIfExists('tbl_master_ward');
    }
}
