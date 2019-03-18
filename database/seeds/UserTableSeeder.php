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
        $user = new User([
            'username' => 'test',
            'email' => 'test@test.com',
            'password' => bcrypt('test'),
        ]);
        $user->save();

        $user = new User([
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'status' => 'admin',
        ]);
        $user->save();
    }
}
