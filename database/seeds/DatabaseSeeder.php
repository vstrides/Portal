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
        'comments'
	];

	protected $seeders = [
		'UsersTableSeeder',
		'CategoriesTableSeeder',
		'TagsTableSeeder',
		'QuestionsTableSeeder',
        'Question_TagSeeder',
        'AnswersTableSeeder',
        'CommentsTableSeeder'
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