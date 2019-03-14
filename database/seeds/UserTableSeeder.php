<?php

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
        (new User([
            'username' => 'test',
            'email' => 'test@test.com',
            'password' => bcrypt('test'),

        ]))->save();
    }
}
