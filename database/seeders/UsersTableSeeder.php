<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('users')->insert([
        //     [
        //         'role_id' => 1, //Supper Admin
        //         'name' => 'John Doe',
        //         'phone' => '1234567890',
        //         'address' => '123 Main St, City, Country',
        //         'photo' => 'path/to/photo1.jpg',
        //         'email' => 'john@example.com',
               
        //     ],
        //     [
        //         'role_id' => 2, // admin
        //         'name' => 'Jane Smith',
        //         'phone' => '0987654321',
        //         'address' => '456 Elm St, City, Country',
        //         'photo' => 'path/to/photo2.jpg',
        //         'email' => 'jane@example.com',
                
        //     ],
        //     [
        //         'role_id' => 3,  //staff
        //         'name' => 'Alice Johnson',
        //         'phone' => '5555555555',
        //         'address' => '789 Oak St, City, Country',
        //         'photo' => 'path/to/photo3.jpg',
        //         'email' => 'alice@example.com',
                
        //     ],
        // ]);
    }
}