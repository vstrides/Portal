<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	protected $tables = [
		'users',
		'categories',
		'tags',
		'questions',
        'question_tag',
        'answers',
        'comments',
        'question_vote',
        'answer_vote',
        'profiles'
	];

	protected $seeders = [
		'UsersTableSeeder',
		'CategoriesTableSeeder',
		'TagsTableSeeder',
		'QuestionsTableSeeder',
        'QuestionTagTableSeeder',
        'AnswersTableSeeder',
        'CommentsTableSeeder',
        'AnswerVoteTableSeeder',
        'QuestionVoteTableSeeder',
        'ProfilesTableSeeder'

	];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->cleanDatabase();
         foreach ($this->seeders as $seedclass)
         {
             $this->call($seedclass);
         }
    }

    private function cleanDatabase()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        foreach ($this->tables as $table)
        {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}