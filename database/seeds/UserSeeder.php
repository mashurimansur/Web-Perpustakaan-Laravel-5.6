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
                'id_role' => 1,
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
                'image' => 'user.png'
            ],[
                'name' => 'Pimpinan',
                'email' => 'pimpinan@mail.com',
                'id_role' => 2,
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
                'image' => 'user.png'
            ],[
                'name' => 'User',
                'email' => 'user@mail.com',
                'id_role' => 3,
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
                'image' => 'user.png'
            ],
        ];

        App\Models\User::insert($user);

        factory(App\Models\User::class, 7)->create();        
    }
}
