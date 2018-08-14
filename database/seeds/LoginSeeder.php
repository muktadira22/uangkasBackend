<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;

        $user->username = 'admin';
        $user->email = 'admin@uangkas.com';
        $user->password = Hash::make('admin');
        $user->role = 'admin';
        $user->save();
    }
}
