<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestSchedules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE TABLE test_schedules(
            id INT PRIMARY KEY AUTO_INCREMENT,
            test_date DATE,
            test_center_id INT NOT NULL,
            test_cet_type_id INT NOT NULL,
            
            test_center_code VARCHAR(10) ,
            test_center_name VARCHAR(255) NOT NULL,
            test_center_code_name VARCHAR(10) ,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_schedules');
    }
}
