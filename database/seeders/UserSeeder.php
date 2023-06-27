<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'saif',
            'email' => 'saifaliansari477@gmail.com',
            'password' => bcrypt('saif123'),
            'remember_token' => Str::random(60),
            'created_at' => Carbon::now(),
            'updated_at' => null
        ]);
    }
}
