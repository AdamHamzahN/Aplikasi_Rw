<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         Schema::create('pengurus_rw', function (Blueprint $table) {
            $table->integer('id_pengurus_rw', 11, true, false)->nullable(false);
            $table->string('nik',20,false, false)->index('nik');
            $table->integer('id_jabatan')->index('id_jabatan');
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->timestamp('diubah_pada')->useCurrent();

            $table->foreign('nik')->on('data_wargas')
                ->references('nik')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('id_jabatan')->on('jabatans')
                ->references('id_jabatan')
                ->onUpdate('cascade')
                ->onDelete('cascade');
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengurus_rw');
    }
};
