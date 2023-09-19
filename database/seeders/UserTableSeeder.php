<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    
    public function run()
    {
        $users = [
            ['name'=>'nayem','email'=>'nayemabu926@gmail.com','password'=>'123456'],
            ['name'=>'rakib','email'=>'rakib@gmail.com','password'=>'123456'],
            ['name'=>'nasir','email'=>'nasir@gmail.com','password'=>'123456'],
        ];
        User::insert( $users);
    }
}
