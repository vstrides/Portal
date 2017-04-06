<?php

use App\QuestionVote;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class QuestionVoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory(QuestionVote::class, 1000)->create();

        Model::reguard();
    }
}
