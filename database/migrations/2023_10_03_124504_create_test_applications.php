<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestApplications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // DB::statement('CREATE TABLE test_applications(
        //     t_a_id INT PRIMARY KEY AUTO_INCREMENT,

        //     t_a_type_id ,
        //     t_a_user_id,

        //     user_details // retension

        //     educational background // retension

        //     requirements // retension


        //     t_a_accepted_by,    
        //     t_a_assigned_by,
        //     t_a_proctor_assigned_by,
        //     t_a_returned_by,
        //     t_a_proctor_user_id,
        //     t_a_school_room_id,
        //     t_a_school_year_id,

        //     t_a_hash // for qr code

        //     // result/s
            

        //     created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        //     updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        // );');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_applications');
    }
}
