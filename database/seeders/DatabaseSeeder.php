<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(4)->create();

        // // \App\Models\User::factory()->create([
        // //     'name' => 'Test User',
        // //     'email' => 'test@example.com',
        // // ]);
        // // User::create([
        // //     'name' => 'Azzam',
        // //     'email' => 'azzamezra@gmail.com',
        // //     'password' => bcrypt('12345')
        // // ]);
        // // User::create([
        // //     'name' => 'Ezra',
        // //     'email' => 'ezra@gmail.com',
        // //     'password' => bcrypt('12345')
        // // ]);
        Category::create([
            'name' => 'Progamming',
            'slug' => 'progamming'
        ]);
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);
        Post::factory(20)->create();
        // Post::create([
        //     'tittle' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.Dolorum ipsum placeat harum, aliquid enim laboriosam deserunt quod, minima sapiente doloribus commodi consequuntur obcaecati. Voluptatibus reiciendis voluptatum possimus iste distinctio vitae.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'tittle' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.Dolorum ipsum placeat harum, aliquid enim laboriosam deserunt quod, minima sapiente doloribus commodi consequuntur obcaecati. Voluptatibus reiciendis voluptatum possimus iste distinctio vitae.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'tittle' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.Dolorum ipsum placeat harum, aliquid enim laboriosam deserunt quod, minima sapiente doloribus commodi consequuntur obcaecati. Voluptatibus reiciendis voluptatum possimus iste distinctio vitae.',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }
}
