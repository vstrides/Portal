<?php

use App\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory(Comment::class, 1000)->create();

        Model::reguard();
    }
}
