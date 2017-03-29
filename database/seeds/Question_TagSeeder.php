<?php

use App\Question_Tag;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class Question_TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory(Question_Tag::class, 100)->create();

        Model::reguard();
    }
}
