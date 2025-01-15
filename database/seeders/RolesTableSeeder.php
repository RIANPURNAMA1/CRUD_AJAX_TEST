<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('roles')->insert([
        [
            'id' => 1,
            'name' => 'Supper Admin',
        ],
        [
            'id' => 2,
            'name' => 'Admin',
            ],
            [
                'id' => 3,
                'name' => 'Staff',
                ],
                [
                    'id' => 4,
                    'name' => 'User',
                    ],
        ],
        
    );
    }
}
