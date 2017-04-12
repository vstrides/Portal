<?php

use App\Profilephoto;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ProfilePhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory(Profilephoto::class, 100)->create();

        Model::reguard();
    }
}
