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
            $table->integer('id_akun_warga', true)->nullable(false);
            $table->string('username',20,false, false)->index('usernameNik');
            $table->text('password',10)->nullable(false);
            $table->timestamps();

            $table->foreign('username')->on('data_wargas')
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
