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
        CREATE TRIGGER TRlogs AFTER INSERT ON data_wargas FOR EACH ROW
        BEGIN
            INSERT INTO logs (pesan) VALUES (CONCAT("data ", NEW.nama, " ditambahkan pada tanggal ", CURRENT_TIMESTAMP()));
        END;
    ');
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER "TRlogs"');
    }
};
