<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "admin",
            "email" => "admin@admin.com",
            "no_phone" => "08828121208",
            "username" => "admin",
            "password" => bcrypt('admin'),
            "role" => "admin",
            "status" => "aktif",
        ]);
    }
}
