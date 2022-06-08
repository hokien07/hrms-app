<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->truncate();
        $user = [
            [
                'name'=>'SuperAdmin',
                'email'=>'superadmin@example.com',
                'password'=> Hash::make('password'),
            ]
        ];

        foreach ($user as $value) {
            User::create($value);
        }
    }
}
