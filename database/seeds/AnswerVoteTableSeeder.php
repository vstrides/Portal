<?php

use App\AnswerVote;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AnswerVoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory(AnswerVote::class, 2000)->create();

        Model::reguard();
    }
}
