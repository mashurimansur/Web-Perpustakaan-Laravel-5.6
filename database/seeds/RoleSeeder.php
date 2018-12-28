<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_seed = [
            [
                'id' => 1,
                'nama_role' => 'Admin',
                'permissions' => json_encode([
                    'admin_dashboard'=> true,
                    'admin_buku'=> true,
                    'admin_transaksi'=> true,
                    'admin_member'=> true,
                    
                ])
            ],
            [
                'id' => 2,
                'nama_role' => 'Pimpinan',
                'permissions' => json_encode([
                    'admin_dashboard'=> true,
                    'admin_transaksi'=> true,
                ])
            ],
            [
                'id' => 3,
                'nama_role' => 'User',
                'permissions' => json_encode([
                    'user_setting'=> true,
                    'user_transaksi' => true,
                ])
            ],
        ];

        try {
            DB::table('role')->insert($role_seed);
        } catch(\Exception $exception){
        }
    }
}
