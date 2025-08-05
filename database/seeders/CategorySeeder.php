<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Cyber Security',
            'slug' => 'cyber-security',
            'bgColor' => 'bg-red-200',
            'textColor' => 'text-red-900'
        ]);

        Category::create([
            'name' => 'Artificial Intelligence',
            'slug' => 'artificial-intelligence',
            'bgColor' => 'bg-blue-200',
            'textColor' => 'text-blue-900'
        ]);

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming',
            'bgColor' => 'bg-green-200',
            'textColor' => 'text-green-900'
        ]);
    }
}
