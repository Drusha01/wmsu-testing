<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userHighschool extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('INSERT INTO user_high_schools VALUES(
            NULL,
            " ",
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO user_high_schools VALUES(
            NULL,
            "Western Mindanao State University",
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO user_high_schools VALUES(
            NULL,
            "Pilar College, Inc.",
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO user_high_schools VALUES(
            NULL,
            "Southern City Colleges",
            NOW(),
            NOW()
        );');

    }
}
