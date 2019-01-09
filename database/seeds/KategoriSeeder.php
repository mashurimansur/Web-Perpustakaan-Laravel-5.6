<?php

use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = [
            [
                'kategori' => 'Fiksi',
            ], [
                'kategori' => 'Sejarah',
            ], [
                'kategori' => 'Novel',
            ], [
                'kategori' => 'Cerita Rakyat',
            ]
        ];

        App\Models\Kategori::insert($kategori);
    }
}
