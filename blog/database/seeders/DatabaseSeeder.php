<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();


         $user = User::factory()->create();

            $personal = Category::create([
                'name' => 'Personal',
                'slug' => 'personal'
            ]);

            $work = Category::create([
                'name' => 'Work',
                'slug' => 'work'
            ]);
            
            $hobbies = Category::create([
                'name' => 'Hobbies',
                'slug' => 'hobbies'
            ]);
        
            Post::create([
                'category_id' => $work->id,
                'user_id' => $user->id,
                'slug' => 'my-first-post',
                'title' => 'My First Post',
                'resumen' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when ',
                'body' =>'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum'
            ]);
 
    }
}
