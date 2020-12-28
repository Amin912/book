<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'admin',
               'email'=>'admin@example.com',
                'is_admin'=>'1',
               'password'=> bcrypt('123456789'),
            ],
            [
               'name'=>'user',
               'email'=>'user@example.com',
                'is_admin'=>'0',
               'password'=> bcrypt('123456789'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
