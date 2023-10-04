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
            school_room_college_name VARCHAR(100) NOT NULL,
            school_room_venue  VARCHAR(100) NOT NULL,
            school_room_name VARCHAR(100) UNIQUE, 
            school_room_capacity INT NOT NULL,
            school_room_description VARCHAR(255),
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
        Schema::dropIfExists('school_rooms');
    }
}
