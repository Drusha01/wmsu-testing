<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserGenders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE TABLE user_genders(
            user_genders_id INT PRIMARY KEY AUTO_INCREMENT,
            user_genders_details VARCHAR(100) UNIQUE,
            created_at DATETIME ,
            updated_at DATETIME 
        );');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_genders');
    }
}
