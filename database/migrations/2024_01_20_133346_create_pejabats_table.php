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
        Schema::create('pejabats', function (Blueprint $table) {
            $table->integer('id_pejabat', true, false)->nullable(false);
            $table->string('nama_jabatan', 100)->nullable(false);
            $table->string('nik', 20, false, false)->index('nik')->nullable(true);
            $table->timestamps();

            $table->foreign('nik')->on('data_wargas')
                ->references('nik')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pejabats');
    }
};
