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
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'status' => 'Admin',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
                'image' => 'user.png'
            ],[
                'name' => 'User',
                'email' => 'user@mail.com',
                'status' => 'User',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
                'image' => 'user.png'
            ],[
                'name' => 'Pimpinan',
                'email' => 'pimpinan@mail.com',
                'status' => 'Pimpinan',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
                'image' => 'user.png'
            ],
        ];

        App\User::insert($user);
        
    }
}
