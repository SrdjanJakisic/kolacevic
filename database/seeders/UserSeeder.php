<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            "name" => "",
            'username' => 'Admin',
            'firstName' => '',
            'lastName' => '',
            'email' => 'admin@kolacevic.com',
            'password' => bcrypt('123456789'),
            'address' => '',
            'city' => '',
            'phone' => '0000',
            'role_as' => 1
        ]);

        User::factory()->create([
            "name" => "",
            'username' => 'SrdjanJakisic',
            'firstName' => 'Srdjan',
            'lastName' => 'Jakisic',
            'email' => 'srdjan.jakisic@gmail.com',
            'password' => bcrypt('123456789'),
            'address' => 'Veljka Vlahovica 18',
            'city' => 'Pancevo',
            'phone' => '0641055996',
            'role_as' => 0
        ]);

        User::factory()->create([
            "name" => "",
            'username' => 'FilipPrvulj',
            'firstName' => 'Filip',
            'lastName' => 'Prvulj',
            'email' => 'filip.prvulj@gmail.com',
            'password' => bcrypt('123456789'),
            'address' => 'Ljutice Bogdana 1a',
            'city' => 'Beograd',
            'phone' => '0638652405',
            'role_as' => 0
        ]);

        //   https://github.com/spatie/laravel-permission/issues/2016
    }
}
