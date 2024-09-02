<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCostumers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_costumers',
            function (Blueprint $table) {
                $table->id();
                $table->string('nama');
                $table->string('tempat_lahir');
                $table->date('tanggal_lahir');
                $table->string('jenis_kelamin');
                $table->string('kode_pekerjaan');
                $table->string('kode_provinsi');
                $table->string('kode_kabupaten_kota');
                $table->string('kode_kecamatan');
                $table->string('kode_kelurahan');
                $table->foreign('kode_pekerjaan')->references('kode')->on('tbl_master_pekerjaan');
                $table->foreign('kode_provinsi')->references('kode')->on('tbl_master_province');
                $table->foreign('kode_kabupaten_kota')->references('kode')->on('tbl_master_city');
                $table->foreign('kode_kecamatan')->references('kode')->on('tbl_master_subdistrict');
                $table->foreign('kode_kelurahan')->references('kode')->on('tbl_master_ward');
                $table->string('alamat');
                $table->decimal('nominal_setor', 15, 2);
                $table->boolean('is_approved')->default(false);
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
        Schema::dropIfExists('tbl_master_costumers');
    }
}
