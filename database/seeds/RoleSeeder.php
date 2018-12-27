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
                'uuid' => (string)\Illuminate\Support\Str::uuid(),
                'permissions' => json_encode([
                    'admin'=> true,
                    
                ])
            ],
            [
                'id' => 2,
                'nama_role' => 'Pimpinan',
                'uuid' => (string)\Illuminate\Support\Str::uuid(),
                'permissions' => json_encode([
                    'admin'=> true,
                ])
            ],
            [
                'id' => 3,
                'nama_role' => 'User',
                'uuid' => (string)\Illuminate\Support\Str::uuid(),
                'permissions' => json_encode([
                    'setting'=> true,
                    'transaksi' => true,
                ])
            ],
        ];

        try {
            DB::table('role')->insert($role_seed);
        } catch(\Exception $exception){
        }
    }
}
