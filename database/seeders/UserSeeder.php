<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        User::Create([
            'name'=>'Admin User',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('admin@123'),
            'role'=>'admin',
            'address'=>"xyz"
        ]);


        User::Create([
            'name'=>'Admin User',
            'email'=>'ashish@gmail.com',
            'password'=>Hash::make('ashish@123'),
            'role'=>'user',
            'address'=>"xyz"
        ]);

        User::Create([
            'name'=>'User',
            'email'=>'user@gmail.com',
            'password'=>Hash::make('user@123'),
            'role'=>'user',
            'address'=>"xyz"
        ]);
    }
}
