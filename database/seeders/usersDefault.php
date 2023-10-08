<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class usersDefault extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::statement('INSERT INTO `users` (`user_id`, `user_status_id`, `user_sex_id`, `user_gender_id`, `user_role_id`, `user_name`, `user_email`, `user_phone`, `user_password`, `user_name_verified`, `user_email_verified`, `user_phone_verified`, `user_firstname`, `user_middlename`, `user_lastname`, `user_suffix`, `user_address`, `user_birthdate`, `user_profile_picture`, `user_formal_id`, `date_created`, `date_updated`) VALUES
(1, 1, 1, 2, 2, "Drusha01", "bg201802518@wmsu.edu.ph", "0926582734", "$argon2i$v=19$m=65536,t=4,p=1$OVJtVVc1ekFuM3dvaFdmOQ$iNUguAwgn27AXcv4Onu57l1uUlnMpwbIQhtaSY7A15o", 1, 1, 0, "Hanricksonsadf", "Etrone", "Dumapit", "jr", "Purok-4, Malagutay, Zamboanga City, Zamboanga Del Sur", "2000-08-31", "default.png", "default.png", "2023-09-28 13:36:19", "2023-10-02 21:17:47"),
(2, 1, 1, 1, 1, "mate04", "mattalbertluna@gmail.com", "0936519205", "$argon2i$v=19$m=65536,t=4,p=1$QnF5Qzg0UllHeWl0QTlBcw$dZgxescXNjYZToLGmU3r910SQzpVKogbEgA6SnLFHjA", 1, 1, 0, "matt albert", "sumampong", "luna", "", NULL, "2002-04-04", "default.png", "default.png", "2023-09-28 13:41:53", "2023-09-28 14:01:52"),
(3, 1, 1, 1, 1, "kaikai123", "gt201901721@wmsu.edu.ph", NULL, "$argon2i$v=19$m=65536,t=4,p=1$SXhFNmxHNHJsZ0FtYi51RQ$cPmh1vH48fDXn6123ZcAID3Q8EHAq6BYKbpXNPb4mN8", 1, 1, 0, "Al-kaikai", "Abdilla", "Sali", "N/A", NULL, "2000-02-08", "default.png", "default.png", "2023-09-28 16:28:48", "2023-09-28 16:28:48"),
(4, 1, 1, 1, 1, "Drusha02", "drusha092@gmail.com", NULL, "$argon2i$v=19$m=65536,t=4,p=1$TDhxQnBxRkJ5cHlTQkxHcA$giflgEB2QqDiN6zvLI6cmsz2Qpii79fyEI8oeJ/iTIg", 1, 1, 0, "Hanrickson", "Etrone", "Dumapit", "", NULL, "2000-08-31", "default.png", "default.png", "2023-10-02 22:00:15", "2023-10-02 22:00:15");');
    }
}
