<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class notication_icons extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("INSERT INTO `notification_icons` VALUES (NULL, '<i class=\"fas fa-calendar-check\"\></i>', NOW(),NOW());");
        DB::statement("INSERT INTO `notification_icons` VALUES (NULL, '<i class=\"fas fa-file-alt\"\></i>', NOW(),NOW());");
        DB::statement("INSERT INTO `notification_icons` VALUES (NULL, '<i class=\"fas fa-cogs\"\></i>', NOW(),NOW());");
        DB::statement("INSERT INTO `notification_icons` VALUES (NULL, '<i class=\"fas fa-user-cog\"\></i>', NOW(),NOW());");
        DB::statement("INSERT INTO `notification_icons` VALUES (NULL, '<i class=\"fas fa-user\"\></i>', NOW(),NOW());");

    }
}
