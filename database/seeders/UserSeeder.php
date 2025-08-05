<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(1)->create([
            'name'      => 'Elnath',
            'email'     => 'elnath1213@gmail.com',
            'username'  => 'Eln1213',
            'password'  => Hash::make('elnath')
        ]);

        User::factory(4)->create();
    }
}
