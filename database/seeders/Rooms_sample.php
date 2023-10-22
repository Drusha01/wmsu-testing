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

            "WMSU-MAIN",
            DATE(NOW()),
            "10:00",
            "12:00",
            30,

            NULL,
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

            "WMSU-MAIN",
            DATE(NOW()),
            "10:00",
            "12:00",
            35,

            NULL,
            "Room is located at ground floor at the right of the entrance",
            NOW(),
            NOW()
        );');

        DB::statement('INSERT INTO school_rooms VALUES(
            NULL,
            "College of Engineering",
            "COE",
            "WMSU-MAIN Campus A",
            "LAB-ROOM 1",

            "WMSU-MAIN",
            DATE(NOW()),
            "10:00",
            "12:00",
            25,

            NULL,
            "Room is located at ground floor at the right of the entrance",
            NOW(),
            NOW()
        );');
        
    }
}
