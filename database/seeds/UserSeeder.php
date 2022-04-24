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
        DB::table('users')->insert([
            [
                'nama' => 'Muhammad Fadhil Adha',
                'email' => 'fadhil.adhaa26@gmail.com',
                'foto' => 'saya.jpg',
                'alamat' => 'Jl. Karya Gg. Salak',
                'bujur' => '"3.605379528848106"',
                'lintang' => '"98.66630215197802"',
                'harga_ambil' => 19000,
                'harga_jemput' => 8000,
                'nomor_hp' => '082273318016',
                'email_verified_at' => '2022-01-21 04:35:20',
                'password' => Hash::make('fadhil0226'),
                'status' => 'aktif',
                'jenis' => 'depot',

            ],
            [
                'nama' => 'User',
                'email' => 'user@gmail.com',
                'foto' => 'saya.jpg',
                'alamat' => 'Jl. Karya Gg. Salak',
                'bujur' => '"3.605379528848106"',
                'lintang' => '"98.66630215197802"',
                'harga_ambil' => 19000,
                'harga_jemput' => 8000,
                'nomor_hp' => '082273318016',
                'email_verified_at' => '2022-01-21 04:35:20',
                'password' => Hash::make('12345678'),
                'status' => 'aktif',
                'jenis' => 'user',

            ],
            [
                'nama' => 'Editor',
                'email' => 'editor@gmail.com',
                'foto' => 'saya.jpg',
                'alamat' => 'Jl. Karya Gg. Salak',
                'bujur' => '"3.605379528848106"',
                'lintang' => '"98.66630215197802"',
                'harga_ambil' => 19000,
                'harga_jemput' => 8000,
                'nomor_hp' => '082273318016',
                'email_verified_at' => '2022-01-21 04:35:20',
                'password' => Hash::make('12345678'),
                'status' => 'aktif',
                'jenis' => 'editor',

            ],
        ]);
    }
}
