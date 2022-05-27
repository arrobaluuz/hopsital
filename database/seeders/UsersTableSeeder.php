<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin Admin',
            'email' => 'admin@paper.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'Luz Lopez',
            'email' => 'luz@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('luz123456789'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'Angel Yañez',
            'email' => 'yelux24r@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1Angel123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
