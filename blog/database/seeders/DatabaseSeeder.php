<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory()->create();

            Category::created([
                'name' => 'Personal',
                'slug' => 'personal'
            ]);
            Category::created([
                'name' => 'Work',
                'slug' => 'work'
            ]);
            Category::created([
                'name' => 'Hobbies',
                'slug' => 'hobbies'
            ]);

    }
}
