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
        // Trigger 1
        DB::unprepared('
            CREATE TRIGGER id_store_1 BEFORE INSERT ON generals FOR EACH ROW
            BEGIN
                INSERT INTO sequence_tbls VALUES (NULL);
                SET NEW.Disbursement = CONCAT("", LPAD(LAST_INSERT_ID(), 4, "0"));
            END
        ');

        // Trigger 2
        DB::unprepared('
            CREATE TRIGGER id_store_2 BEFORE INSERT ON specials FOR EACH ROW
            BEGIN
                INSERT INTO sequence_tbls VALUES (NULL);
                SET NEW.Disbursement = CONCAT("", LPAD(LAST_INSERT_ID(), 4, "0"));
            END
        ');

        // Trigger 3
        DB::unprepared('
            CREATE TRIGGER id_store_3 BEFORE INSERT ON trusts FOR EACH ROW
            BEGIN
                INSERT INTO sequence_tbls VALUES (NULL);
                SET NEW.Disbursement = CONCAT("", LPAD(LAST_INSERT_ID(), 4, "0"));
            END
        ');

        // // Trigger 4
        // DB::unprepared('
        //     CREATE TRIGGER id_store_4 BEFORE INSERT ON your_fourth_table FOR EACH ROW
        //     BEGIN
        //         -- Trigger 4 logic here
        //     END
        // ');

        // // Trigger 5
        // DB::unprepared('
        //     CREATE TRIGGER id_store_5 BEFORE INSERT ON your_fifth_table FOR EACH ROW
        //     BEGIN
        //         -- Trigger 5 logic here
        //     END
        // ');

        // // Trigger 6
        // DB::unprepared('
        //     CREATE TRIGGER id_store_6 BEFORE INSERT ON your_sixth_table FOR EACH ROW
        //     BEGIN
        //         -- Trigger 6 logic here
        //     END
        // ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the triggers if needed
        DB::unprepared('DROP TRIGGER IF EXISTS id_store_1');
        DB::unprepared('DROP TRIGGER IF EXISTS id_store_2');
        DB::unprepared('DROP TRIGGER IF EXISTS id_store_3');
        // DB::unprepared('DROP TRIGGER IF EXISTS id_store_4');
        // DB::unprepared('DROP TRIGGER IF EXISTS id_store_5');
        // DB::unprepared('DROP TRIGGER IF EXISTS id_store_6');
    }
};
