<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
               'password'=> Hash::make('123456'),
               'token'=> Str::uuid()->toString(),
               'photo' => '1.png'
            ],
            [
               'name'=>'Admin',
               'email'=>'admin@admin.com',
               'role'=> 1,
               'password'=> Hash::make('123456'),
               'token'=> Str::uuid()->toString(),
               'photo' => '1.png'
            ],
            [
               'name'=>'SuperAdmin',
               'email'=>'superadmin@superadmin.com',
               'role'=> 2,
               'password'=> Hash::make('123456'),
               'token'=> Str::uuid()->toString(),
               'photo' => '1.png'
            ],
            
        ];
    
        foreach ($users as $key => $user) 
        {
            User::create($user);
        }
    }
}
