<?php

use App\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory(Profile::class, 100)->create();

        Model::reguard();
    }
}
