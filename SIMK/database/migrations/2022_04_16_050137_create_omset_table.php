<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('omset', function (Blueprint $table) {
            $table->id();
            $table->string('nopol');
            $table->string('nama_supir');
            $table->bigInteger('biaya_mobil');
            $table->bigInteger('pengeluaran_jkt');
            $table->bigInteger('pengeluaran_lpg');
            $table->bigInteger('jumlah_omset_bersih');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign("created_by")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("users")->onDelete("cascade");
            $table->softDeletes();
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
        Schema::dropIfExists('omset');
    }
};
