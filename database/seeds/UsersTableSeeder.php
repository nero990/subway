<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
           "name" => "Nero Okiewhru",
            "email" => "admin@example.com",
            "email_verified_at" => now(),
            "is_admin" => 1,
            "password" => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            "remember_token" => Str::random(10),
        ]);
    }
}
