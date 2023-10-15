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
        DB::statement('CREATE TABLE test_applications(
            t_a_id INT PRIMARY KEY AUTO_INCREMENT,
            t_a_test_type_id INT NOT NULL,
            t_a_applicant_user_id INT NOT NULL,
            t_a_test_status_id INT NOT NULL,
            t_a_user_details VARCHAR(1024) ,
            t_a_isactive BOOL DEFAULT 1,

            -- Select all: educational background // retension
            t_a_school_school_name VARCHAR(100) ,
            t_a_school_address VARCHAR(100) ,

            -- Select all: requirements // retension
            -- cet
            t_a_formal_photo VARCHAR(50),
            t_a_school_principal_certification VARCHAR(50),
            t_a_original_senior_high_school_card VARCHAR(50),
            t_a_transcript_of_records VARCHAR(50),
            t_a_endorsement_letter_from_wmsu_dean VARCHAR(50),

            -- nat

            -- eat 

            -- etc

            --
            t_a_accepted_by INT,    
            t_a_assigned_by INT,
            t_a_proctor_assigned_by INT,
            t_a_returned_by INT,
            t_a_proctor_user_id INT,
            t_a_school_room_id INT,

            t_a_school_year_id INT NOT NULL,

            t_a_hash VARCHAR(50) NOT NULL,

            -- cet type
            t_a_cet_type_id INT,
            -- cet results
            t_a_cet_english_procficiency FLOAT DEFAULT NULL,
            t_a_cet_reading_comprehension  FLOAT DEFAULT NULL,
            t_a_cet_science_process_skills FLOAT DEFAULT NULL,
            t_a_cet_quantitative_skills FLOAT DEFAULT NULL,
            t_a_cet_abstract_thinking_skills FLOAT DEFAULT NULL,
            t_a_cet_oapr FLOAT DEFAULT NULL,

            

            date_created DATETIME DEFAULT CURRENT_TIMESTAMP,
            date_updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (t_a_test_type_id) REFERENCES test_types(test_type_id), 
            FOREIGN KEY (t_a_applicant_user_id) REFERENCES users(user_id),
            FOREIGN KEY (t_a_school_year_id) REFERENCES school_years(school_year_id),
            FOREIGN KEY (t_a_test_status_id) REFERENCES test_status(test_status_id)
            

        );');

        DB::statement('CREATE INDEX idx_t_a_accepted_by ON test_applications(t_a_accepted_by);');
        DB::statement('CREATE INDEX idx_t_a_assigned_by ON test_applications(t_a_assigned_by);');
        DB::statement('CREATE INDEX idx_t_a_proctor_assigned_by ON test_applications(t_a_proctor_assigned_by);');
        DB::statement('CREATE INDEX idx_t_a_returned_by ON test_applications(t_a_returned_by);');
        DB::statement('CREATE INDEX idx_t_a_proctor_user_id ON test_applications(t_a_proctor_user_id);');
        DB::statement('CREATE INDEX idx_t_a_school_room_id ON test_applications(t_a_school_room_id);');

        // for file indexes
        DB::statement('CREATE INDEX idx_t_a_formal_photo ON test_applications(t_a_formal_photo(10));');
        DB::statement('CREATE INDEX idx_t_a_school_principal_certification ON test_applications(t_a_school_principal_certification(10));');
        DB::statement('CREATE INDEX idx_t_a_original_senior_high_school_card ON test_applications(t_a_original_senior_high_school_card(10));');
        DB::statement('CREATE INDEX idx_t_a_transcript_of_records ON test_applications(t_a_transcript_of_records(10));');
        DB::statement('CREATE INDEX idx_t_a_endorsement_letter_from_wmsu_dean ON test_applications(t_a_endorsement_letter_from_wmsu_dean(10));');

        // hash for qr code
        DB::statement('CREATE INDEX idx_t_a_hash ON test_applications(t_a_hash(10));');
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
