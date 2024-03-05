<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();
         \App\Models\Category::factory(10)->create()->each(function($category){

            \App\Models\Post::factory(10)->create(['category_id' => $category->id])
            ->each(function($post){
            \App\Models\Comment::factory(3)->create(['post_id' => $post->id ,'user_id' =>rand(1,10)]);
            
            });

            \App\Models\User::create([
                'name'=>'Basel Aly',
                'email'=>'baselaly32@gmail.com',
                'password'=>'123456',
                'phone'=>'01149505330'



            ]);            
         });


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
