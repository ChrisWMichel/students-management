<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'id' => 1,
                'title' => Role::ROLES['admin'],
            ],
            [
                'id' => 2,
                'title' => Role::ROLES['user'],
            ],
        ];

        Role::insert($roles);
    }
}
