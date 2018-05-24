<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 100)->create();
    }
}
