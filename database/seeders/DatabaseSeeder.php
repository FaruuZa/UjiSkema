<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Pemilih::factory(10)->create();

        \App\Models\User::create([
            'username' => 'SuperAdmin',
            'email' => 'test@example.com',
            'password' => Hash::make('12345678')
        ]);

        \App\Models\Pemilih::create([
            'username' => 'Pemilih1',
            'nama' => 'Pemilih1nama',
            'password' => Hash::make('123'),
            'NISN' => '13212255544662',
            'alamat' => 'jalan dimana aja boleh',
        ]);

        \App\Models\Kandidat::create([
            'nama_ketos' => 'Farelliya Adiwijaya',
            'nama_waketos' => 'Sarjono Farel Utomo',
            'image' => 'kandidat 1.png',
            'visi' => 'Memajukan sekolah 5cm kedepan',
            'Misi' => '1. bertakwa 2. sama aja tapi rasa strawberry'
        ]);

        \App\Models\Kandidat::create([
            'nama_ketos' => 'Jeki Wahyudi',
            'nama_waketos' => 'Kh. Ikrom Nur Cahaya',
            'image' => 'kandidat 2.png',
            'visi' => 'Memajukan sekolah 4cm kedepan',
            'Misi' => '1. MengCopy misi kandidat 1'
        ]);

        \App\Models\Kandidat::create([
            'nama_ketos' => 'Abi Ghufron',
            'nama_waketos' => 'Cahaya Nur Hikari',
            'image' => 'kandidat 3.png',
            'visi' => 'Memajukan sekolah ke jalan',
            'Misi' => '1. Sama seperti Kandidat 2'
        ]);

    }
}
