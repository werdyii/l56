<?php
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         User::create([
         	'name' => 'werdy',
         	'email' => 'werdy@example.com',
         	'password' => bcrypt('password')
         ]);

         factory( User::class, 10)->create();
    }
}
