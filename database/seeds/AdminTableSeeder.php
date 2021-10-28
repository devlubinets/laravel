<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::create
        ([
            'name' => 'Admin',
            'email' => 'admin@admin.admin',
            'password' => \Illuminate\Support\Facades\Hash::make('secret123'),
        ]);
    }
}
