<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'user_type'=>\App\Helpers\Constants::ADMIN,
            'password'=>bcrypt("admin123")
        ]);
    }
}
