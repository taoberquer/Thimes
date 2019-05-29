<?php

use App\User;
use Illuminate\Database\Seeder;
use function Sodium\randombytes_random16;

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
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => bcrypt('test'),
        ]);
        $user->save();

        $user = new User([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'status' => 'admin',
        ]);
        $user->save();

        User::create([
           'name' => 'Engine',
           'email' => 'engine@engine.com',
           'password' => bcrypt(uniqid()),
           'status' => 'engine'
        ]);
    }
}
