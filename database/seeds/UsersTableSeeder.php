<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$PTh7KwoUtW4TlzDC76kpJey7jgCLqMFnyY56Cl23hWRsqPE8MKnBq',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
