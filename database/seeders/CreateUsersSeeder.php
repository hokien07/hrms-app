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
                'firstname'=>'Admin',
                'lastname'=>'Super',
                'status'=>'active',
                'gender'=>'male',
                'role_id' => 1,
                'password'=> Hash::make('password'),
            ]
        ];

        foreach ($user as $value) {
            User::create($value);
        }
    }
}
