<?php

namespace Database\Seeders;

use App\Models\Kategori;
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
        Kategori::create([
            'kode' => 2910920,
            'nama' => 'Fantasi',
            'verif' => 'verifikasi'
        ]);
    }
}
