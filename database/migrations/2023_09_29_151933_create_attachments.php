<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE TABLE attachments(
            attachement_id INT PRIMARY KEY AUTO_INCREMENT,
            attachment_user_id INT NOT NULL,
            attachment_type_id INT NOT NULL,
            attachment_photo VARCHAR(100) UNIQUE,
            attachment_name VARCHAR(100) DEFAULT NULL,
            attachment_description VARCHAR(255) DEFAULT NULL,

            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (attachment_user_id) REFERENCES users(user_id),
            FOREIGN KEY (attachment_type_id) REFERENCES attachment_types(attachment_type_id)
        );');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attachments');
    }
}
