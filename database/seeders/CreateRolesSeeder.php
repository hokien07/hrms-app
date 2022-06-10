<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::query()->truncate();
        $user = [
            [
                'name'=>'SuperAdmin',
                'created_at' => now()
            ],
            [
                'name'=>'HRAdmin',
                'created_at' => now()
            ]
        ];

        foreach ($user as $value) {
            Role::create($value);
        }
    }
}
