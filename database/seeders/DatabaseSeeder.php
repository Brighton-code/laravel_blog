<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()
            ->has(Post::factory(random_int(3, 5)))
            ->create([
            'name' => 'Brighton',
            'email' => 'brighton@vanrouendal.nl',
        ]);
        User::factory(10)
            ->has(Post::factory(random_int(3, 5)))
            ->create();
    }
}
