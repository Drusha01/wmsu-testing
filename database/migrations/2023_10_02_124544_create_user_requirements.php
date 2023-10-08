<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRequirements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE TABLE user_requirements(
            user_requirement_id INT PRIMARY KEY AUTO_INCREMENT,
            user_requirement_user_id INT NOT NULL UNIQUE,
            user_requirement_formal_photo VARCHAR(100),
            user_requirement_endorsement_letter VARCHAR(100),
            user_requirement_form_137 VARCHAR(100),
            user_requirement_valid_identification_card VARCHAR(100),
            user_requirement_valid_identification_card_copy VARCHAR(100),
            user_requirement_wmsu_cet_irr VARCHAR(100),
            user_letter_of_request VARCHAR(100),
            user_requirement_birth_certificate VARCHAR(100),
            user_requirement_birth_certificate_nso_auth VARCHAR(100), 
            user_requirement_proof_of_early_completion VARCHAR(100),

            date_created DATETIME DEFAULT CURRENT_TIMESTAMP,
            date_updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );');

        DB::statement('CREATE INDEX idx_user_requirement_formal_photo ON user_requirements(user_requirement_formal_photo(10));');
        DB::statement('CREATE INDEX idx_user_requirement_endorsement_letter ON user_requirements(user_requirement_endorsement_letter(10));');
        DB::statement('CREATE INDEX idx_user_requirement_form_137 ON user_requirements(user_requirement_form_137(10));');
        DB::statement('CREATE INDEX idx_user_requirement_valid_identification_card ON user_requirements(user_requirement_valid_identification_card(10));');
        DB::statement('CREATE INDEX idx_user_requirement_valid_identification_card_copy ON user_requirements(user_requirement_valid_identification_card_copy(10));');

        DB::statement('CREATE INDEX idx_user_requirement_wmsu_cet_irr ON user_requirements(user_requirement_wmsu_cet_irr(10));');
        DB::statement('CREATE INDEX idx_user_letter_of_request ON user_requirements(user_letter_of_request(10));');
        DB::statement('CREATE INDEX idx_user_requirement_birth_certificate ON user_requirements(user_requirement_birth_certificate(10));');
        DB::statement('CREATE INDEX idx_user_requirement_birth_certificate_nso_auth ON user_requirements(user_requirement_birth_certificate_nso_auth(10));');
        DB::statement('CREATE INDEX idx_user_requirement_proof_of_early_completion ON user_requirements(user_requirement_proof_of_early_completion(10));');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_requirements');
    }
}
