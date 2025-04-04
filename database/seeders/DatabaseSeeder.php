<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kontak;
use App\Models\Pengurus;
use App\Models\Fasilitas;
use App\Models\TataTertib;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'user',
            'guard_name' => 'web'
        ]);

        $admin = User::create([
            'name' => 'Admin',
            'alamat' => 'ADMIN',
            'status' => 'Dihuni',
            'no_hp' => '081818607319',
            'email' => 'admin@gmail.com',
            'keterangan' => '',
            'rt' => '001',
            'password' => Hash::make('admin123'),
        ]);
        $admin->assignRole('admin');
        $admin->assignRole('user');

        $user = User::create([
            'name' => 'Ricky Ramadhan',
            'alamat' => 'Q00/00',
            'status' => 'Dihuni',
            'no_hp' => '085171744592',
            'email' => 'rickykiki260198@gmail.com',
            'keterangan' => 'Test',
            'rt' => '001',
            'password' => Hash::make('madrid123'),
        ]);
        $user->assignRole('user');

        Kontak::create([
            'nama' => 'Call Center Kota Bekasi',
            'nomor' => '1500444',
        ]);

        Kontak::create([
            'nama' => 'Ambulance Kota Bekasi',
            'nomor' => '119',
        ]);

        Kontak::create([
            'nama' => 'Dinas Pemadam Kebakaran Kota Bekasi',
            'nomor' => '02188957805',
        ]);

        Kontak::create([
            'nama' => 'BPBD Kota Bekasi',
            'nomor' => '081283957877',
        ]);

        Fasilitas::create([
            'nama' => 'ONE GATE SYSTEM',
            'fasilitas' => 'fasilitas/onegate.jpg',
        ]);

        Fasilitas::create([
            'nama' => 'KEAMANAN 24/7',
            'fasilitas' => 'fasilitas/security.jpg',
        ]);

        Fasilitas::create([
            'nama' => 'CCTV 24/7',
            'fasilitas' => 'fasilitas/cctv.jpg',
        ]);

        Fasilitas::create([
            'nama' => 'RUANG TERBUKA HIJAU',
            'fasilitas' => 'fasilitas/pohon.jpg',
        ]);

        Fasilitas::create([
            'nama' => 'FASILITAS UMUM',
            'fasilitas' => 'fasilitas/fasilitas.jpeg',
        ]);

        Fasilitas::create([
            'nama' => 'POSYANDU',
            'fasilitas' => 'fasilitas/posyandu.png',
        ]);

        TataTertib::create([
            'nama' => 'Hanya penghuni, tamu yang diundang, dan pihak berkepentingan yang diperbolehkan masuk.',
        ]);

        TataTertib::create([
            'nama' => 'Penghuni wajib melaporkan tamu yang datang larut malam atau menginap.',
        ]);

        TataTertib::create([
            'nama' => 'Setiap penghuni wajib menjaga kebersihan lingkungan.',
        ]);

        TataTertib::create([
            'nama' => 'Tidak diperbolehkan membuat kebisingan yang mengganggu, terutama pada malam hari (biasanya setelah pukul 22.00).',
        ]);

        TataTertib::create([
            'nama' => 'Kendaraan penghuni harus diparkir di area yang telah ditentukan, tidak boleh menghalangi jalan atau rumah tetangga.',
        ]);

        TataTertib::create([
            'nama' => 'Fasilitas umum seperti taman, jalan, dan tempat bermain harus dijaga bersama.',
        ]);

        Pengurus::create([
            'nama' => 'Hadi',
            'posisi' => 'Ketua RT',
            'foto_pengurus' => 'foto_pengurus/team-1.jpg',
            'instagram' => 'https://www.instagram.com/hadi.tjahjanto/',
            'youtube' => 'https://www.youtube.com/channel/UCVen6wAtr65yRkZjtPeuKYA',
            'whatsapp' => 'https://wa.me/6281310455221',
            'facebook' => 'https://web.facebook.com/hadi.ngesot',
        ]);

        Pengurus::create([
            'nama' => 'Pahlevi',
            'posisi' => 'Wakil RT',
            'foto_pengurus' => 'foto_pengurus/team-2.jpg',
        ]);

        Pengurus::create([
            'nama' => 'Ibrahim',
            'posisi' => 'Ketua RW',
            'foto_pengurus' => 'foto_pengurus/team-4.jpg',
        ]);

        Pengurus::create([
            'nama' => 'Susi',
            'posisi' => 'Bendahara',
            'foto_pengurus' => 'foto_pengurus/team-3.jpg',
        ]);

        DB::statement('ALTER TABLE transactions AUTO_INCREMENT = 1007');
    }
}
