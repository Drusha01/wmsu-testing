<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolRooms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE TABLE school_rooms(
            school_room_id INT PRIMARY KEY AUTO_INCREMENT,
            school_room_college_name VARCHAR(100) ,
            school_room_college_abr VARCHAR(100) ,
            school_room_venue  VARCHAR(100) NOT NULL,
            school_room_name VARCHAR(100) ,

            school_room_test_center VARCHAR(100) NOT NULL,
            school_room_test_date DATE ,
            school_room_test_time_start VARCHAR(10),
            school_room_test_time_end VARCHAR(10),
            school_room_capacity INT NOT NULL,

            school_room_proctor_user_id INT DEFAULT NULL,

            school_room_description VARCHAR(255),
            date_created DATETIME DEFAULT CURRENT_TIMESTAMP,
            date_updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );');
        DB::statement('CREATE INDEX idx_school_room_proctor_user_id ON school_rooms(school_room_proctor_user_id);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_rooms');
    }
}
