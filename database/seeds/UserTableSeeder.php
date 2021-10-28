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
        \App\Models\User::create
        ([
            'name' => 'test',
            'email' => 'test@test.test',
            'password' => \Illuminate\Support\Facades\Hash::make('secret123'),
        ]);
    }
}
