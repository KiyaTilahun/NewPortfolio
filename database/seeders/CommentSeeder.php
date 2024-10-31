<?php

namespace Database\Seeders;

use App\Models\Blog\Comment;
use App\Models\Blog\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $posts = Post::all();

        $posts->each(function ($post) {
            Comment::factory()->count(3)->create([
                'post_id' => $post->id,
            ]);
        });
    }
}
