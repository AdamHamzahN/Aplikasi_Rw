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
        Schema::create('akun_wargas', function (Blueprint $table) {
            $table->integer('id_akun_wargas', true)->nullable(false);
            $table->string('nik',20,false, false)->index('nik');
            $table->text('password',10)->nullable(false);

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
        Schema::dropIfExists('akun_wargas');
    }
};
