<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call([
            userRoles::class,
            userGenders::class,
            userSex::class,
            userStatus::class,
            schoolTypes::class,
            usersDefault::class,
            moduleList::class,
            testTypes::class,
            schoolYears::class,
            testStatus::class,
            cet_type_lists::class,
            fb_defaults::class,
            test_samples::class,
            Rooms_sample::class,
        ]);
        
    }
}
