<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class cet_type_lists extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('INSERT INTO cet_types VALUES(
            NULL,
            "shs_under_grad",
            "shs_under_grad",
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO cet_types VALUES(
            NULL,
            "shs_grad",
            "shs_grad",
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO cet_types VALUES(
            NULL,
            "shiftee/tranferee",
            "shiftee/tranferee",
            NOW(),
            NOW()
        );');
    }
}
