<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for( $i = 0; $i < 100; $i++) {
            DB::table('posts')->insert([
                'title' => Str::random(10),
                'slug' => Str::random(10),
                'description' => Str::random(20),
                'content' => Str::random(100),
                'keywords' => Str::random(20),
                'image' => 'https://picsum.photos/400/150',
                'views' => rand(0, 100),
                'likes' => rand(0, 100),
                'comments_count' => rand(0, 100),
                'is_published' => true,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' => 1,
                'category_id' => rand(1, 10),
            ]);
        }
        
    }
}
