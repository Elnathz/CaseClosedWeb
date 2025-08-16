<?php

namespace Database\Seeders;

use App\Models\User;
<<<<<<< HEAD
=======
use Illuminate\Support\Str;
>>>>>>> backend-breeze
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run(): void
    {
<<<<<<< HEAD
        User::factory(1)->create([
            'name'      => 'Elnath',
            'email'     => 'elnath1213@gmail.com',
            'username'  => 'Eln1213',
            'password'  => Hash::make('elnath')
=======
        User::factory()->create([
            'name'      => 'Elnath',
            'email'     => 'elnath1213@gmail.com',
            'username'  => 'Eln1213',
            'email_verified_at' => now(),
            'password'  => Hash::make('elnath'),
            'remember_token' => Str::random(10)
>>>>>>> backend-breeze
        ]);

        User::factory(4)->create();
    }
}
