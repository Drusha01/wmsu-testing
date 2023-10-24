<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class admin_role_names extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('INSERT INTO `admin_role_names` (`admin_role_name_id`, `admin_role_name_name`, `admin_role_name_details`, `date_created`, `date_updated`) VALUES
        (1, "Administrator", "Admin", "2023-10-24 09:56:07", "2023-10-24 09:56:07"),
        (2, "Result Manager", "Who manages results", "2023-10-24 09:56:29", "2023-10-24 09:56:29"),
        (3, "Proctor", "Exam Proctor", "2023-10-24 09:56:56", "2023-10-24 09:56:56");');
    }
}
