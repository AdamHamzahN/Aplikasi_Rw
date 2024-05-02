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
    Schema::create('data_wargas', function (Blueprint $table) {
        $table->string('nik', 20,false, false)->unique()->primary();
        $table->string('nama', 200)->nullable(false);
        $table->enum('jenis_kelamin', ['laki-laki', 'perempuan'])->nullable(false);
        $table->string('tempat_lahir',30,false)->nullable(false);
        $table->date('tanggal_lahir')->nullable(false);
        $table->string('agama',20)->nullable(false);
        $table->string('pekerjaan', 100)->nullable(false)->default('belum bekerja');
        $table->string('alamat', 200)->nullable(false);
        $table->string('rt', 3,false,false)->nullable(false);
        $table->string('kontak', 20)->nullable(false);
        $table->timestamps();

    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_wargas');
    }
};
