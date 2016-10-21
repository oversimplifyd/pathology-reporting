<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(Pathology\User::class, 5)->create();
        factory(Pathology\User::class, 'operator')->create();
    }
}
