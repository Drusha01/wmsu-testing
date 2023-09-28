<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // table
        DB::statement('CREATE TABLE users(
            user_id INT PRIMARY KEY AUTO_INCREMENT,
            user_status_id INT NOT NULL,
            user_sex_id INT ,
            user_gender_id INT , 
            user_role_id INT NOT NULL,
            user_name VARCHAR(255) ,
            user_email VARCHAR(255),
            user_phone VARCHAR(20),
            user_password VARCHAR(255),
            user_name_verified BOOL DEFAULT NULL,
            user_email_verified BOOL DEFAULT NULL,
            user_phone_verified BOOL DEFAULT NULL,
            user_firstname VARCHAR(255) NOT NULL,
            user_middlename VARCHAR(255),
            user_lastname  VARCHAR(255) NOT NULL,
            user_suffix VARCHAR(100),
            user_address VARCHAR(255),
            user_birthdate DATE,
            user_profile_picture VARCHAR(100) DEFAULT "default.png",

            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (user_status_id) REFERENCES user_status(user_status_id),
            FOREIGN KEY (user_role_id) REFERENCES user_roles(user_role_id)
        );');


        // index
        DB::statement('CREATE INDEX idx_user_email ON users(user_email(10));');
        DB::statement('CREATE INDEX idx_user_name ON users(user_name(10));');
        DB::statement('CREATE INDEX idx_user_phone ON users(user_phone(10));');
        DB::statement('CREATE INDEX idx_user_password ON users(user_password(10));');
        DB::statement('CREATE INDEX idx_full_name ON users(user_firstname(10),user_lastname(10),user_middlename(10));');
        DB::statement('CREATE INDEX idx_user_gender ON users(user_gender_id);');
        DB::statement('CREATE INDEX idx_user_sex ON users(user_sex_id);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
