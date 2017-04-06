<?php

use App\QuestionTag;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class QuestionTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory(QuestionTag::class, 200)->create();

        Model::reguard();
    }
}
