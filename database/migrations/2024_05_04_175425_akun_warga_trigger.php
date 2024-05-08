<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE TRIGGER TRakunwargainsert AFTER INSERT ON data_wargas FOR EACH ROW
            BEGIN
                INSERT INTO akun_wargas (nik,password) VALUES (new.nik,SUBSTRING(MD5(RAND()) FROM 1 FOR 8));
            END;'
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
