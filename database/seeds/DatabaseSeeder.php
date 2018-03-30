<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MarketTableSeeder::class);
        $this->call(FarmTableSeeder::class);
        $this->call(LinkTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(SeasonTableSeeder::class);
        $this->call(GameTableSeeder::class);
    }
}
