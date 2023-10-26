<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class servicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('INSERT INTO services VALUES(
            NULL,
            "College Entrance Exam Evaluation",
            "logo.png",
            "We provide comprehensive evaluation services for college entrance exams to help applicants succeed in their academic journey.",
            1,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO services VALUES(
            NULL,
            "Professional Certification Testing",
            "logo.png",
            "Our center offers a range of professional certification testing services to validate and enhance your skills in various industries.",
            2,
            NOW(),
            NOW()
        );');
        DB::statement('INSERT INTO services VALUES(
            NULL,
            "Standardized Testing",
            "logo.png",
            "We conduct standardized testing to measure knowledge and skills objectively, providing valuable insights for educational institutions and learners.",
            3,
            NOW(),
            NOW()
        );');
    }
}
