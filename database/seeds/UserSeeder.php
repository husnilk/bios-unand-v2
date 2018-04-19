<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\User::class)->create([
            'name' => 'Azaria',
            'username' => 'azaria',
            'password' => bcrypt('azaria'),
            'email' => 'azaria@rektorat.unand.ac.id'
        ]);
    }
}
