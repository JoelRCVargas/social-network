<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'name'=>'User',
               'email'=>'user@user.com',
               'role'=> 0,
               'password'=> bcrypt('123456'),
               'token'=> Str::uuid()->toString()
            ],
            [
               'name'=>'Admin',
               'email'=>'admin@admin.com',
               'role'=> 1,
               'password'=> bcrypt('123456'),
               'token'=> Str::uuid()->toString()
            ],
            [
               'name'=>'SuperAdmin',
               'email'=>'superadmin@superadmin.com',
               'role'=> 2,
               'password'=> bcrypt('123456'),
               'token'=> Str::uuid()->toString()
            ],
            
        ];
    
        foreach ($users as $key => $user) 
        {
            User::create($user);
        }
    }
}
