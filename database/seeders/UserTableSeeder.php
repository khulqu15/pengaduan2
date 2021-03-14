<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 5; $i ++) {
            $user = new User();
            $user->name = "User $i";
            $user->email = "user$i@adu.co";
            $user->password = Hash::make('12345');
            $user->level = 'User';
            $user->save();
        }
    }
}
