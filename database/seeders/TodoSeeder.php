<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Todo::create(['title' => 'Belajar Laravel', 'description' => 'Belajar Laravel 8', 'completed' => true]);
        Todo::create(['title' => 'Belajar Vue.js', 'description' => 'Belajar Vue.js 3', 'completed' => false]);
        Todo::create(['title' => 'Belajar React.js', 'description' => 'Belajar React.js 17', 'completed' => false]);
    }
}
