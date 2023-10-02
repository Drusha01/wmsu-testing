<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserEducationalBackground extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE TABLE user_educational_background(
            ueb_id INT PRIMARY KEY AUTO_INCREMENT,
            ueb_user_id INT NOT NULL UNIQUE,
            ueb_shs_school_name VARCHAR(100) ,
            ueb_shs_address VARCHAR(100) ,
            ueb_shs_form_137 VARCHAR(100) ,
            ueb_shs_is_graduate BOOL ,
            ueb_shs_graduation_date DATE ,
            ueb_shs_diploma VARCHAR(100) ,
            ueb_hs_school_name VARCHAR(100)  ,
            ueb_hs_address VARCHAR(100) ,
            ueb_hs_form_137 VARCHAR(100) ,
            ueb_hs_is_graduate BOOL ,
            ueb_hs_graduation_date DATE ,
            ueb_hs_diploma VARCHAR(100) ,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (ueb_user_id) REFERENCES users(user_id)
        );');
        DB::statement('CREATE INDEX idx_ueb_shs_form_137 ON user_educational_background(ueb_shs_form_137(10));');
        DB::statement('CREATE INDEX idx_ueb_hs_form_137 ON user_educational_background(ueb_hs_form_137(10));');
        DB::statement('CREATE INDEX idx_ueb_shs_diploma ON user_educational_background(ueb_shs_diploma(10));');
        DB::statement('CREATE INDEX idx_ueb_hs_diploma ON user_educational_background(ueb_shs_diploma(10));');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_educational_background');
    }
}
