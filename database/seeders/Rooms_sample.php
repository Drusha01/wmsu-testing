<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Rooms_sample extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('INSERT INTO school_rooms VALUES(
            NULL,
            "College of Computing Studies",
            "CCS",
            "WMSU-MAIN Campus B",
            "LR-1",
            30,
            "Room is located at ground floor at the right of the entrance",
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO school_rooms VALUES(
            NULL,
            "College of Computing Studies",
            "CCS",
            "WMSU-MAIN Campus B",
            "LAB-2",
            25,
            "Room is located at ground floor at the right of the entrance",
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO school_rooms VALUES(
            NULL,
            "College of Computing Studies",
            "CCS",
            "WMSU-MAIN Campus B",
            "LR-2",
            25,
            "Room is located at ground floor at the right of the entrance",
            NOW(),
            NOW()
        );');
    }
}
