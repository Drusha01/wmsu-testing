<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class moduleList extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('INSERT INTO modules VALUES(
            NULL,
            "dashboard",
            "Dashboard",
            1,
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO modules VALUES(
            NULL,
            "appointment",
            "Appointment Management",
            2,
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO modules VALUES(
            NULL,
            "applicant",
            "Applicant Management",
            3,
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO modules VALUES(
            NULL,
            "room",
            "Room Management",
            4,
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO modules VALUES(
            NULL,
            "exam-m",
            "Exam Management",
            5,
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO modules VALUES(
            NULL,
            "exam-a",
            "Exam Administrator",
            6,
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO modules VALUES(
            NULL,
            "result",
            "Result Management",
            7,
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO modules VALUES(
            NULL,
            "announcement",
            "Announcement Management",
            8,
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO modules VALUES(
            NULL,
            "admin",
            "Admin Management",
            9,
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO modules VALUES(
            NULL,
            "chat",
            "Chat Support",
            10,
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO modules VALUES(
            NULL,
            "settings",
            "Settings",
            11,
            1,
            NOW(),
            NOW()
        );');
        
       
    }
}
