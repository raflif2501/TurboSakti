<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelanggan;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class UserPelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('pelanggan')->delete();
         DB::table('users')->delete();
        Role::create(['name'=> 'admin']);
        Role::create(['name'=> 'user']);
         /***********************************
         *** SIAPKAN SEEDER DOSEN DISINI ***
         ***********************************/

         //

         // Kita akan membuat 3 orang produk sebagai sampel
         // Disinilah alasan kenapa saya membuat model terlebih dahulu
         // Karena saya memanfaatkan model untuk mengcreate record

         # Produk Pertama bernama Noviyanto Rachmadi. Dengan NIM 1015015072.
         $user = User::create(array(
         'name' => 'Firdaus',
         'email' => 'firdaus@gmail.com',
         'password' => bcrypt('firdaus')
        ));
         $user->assignRole('user');

         $this->command->info('User telah diisi!');

         # Ciptakan wali si $ayu
         Pelanggan::create(array(
         'alamat' => 'Manding',
         'no_tlp' => '085330276771',
         'id_pelanggan' => $user->id,
         ));
         # Informasi ketika semua wali telah diisi.
         $this->command->info('User dan Pelanggan telah diisi!');


         $admin = User::create(array(
         'name' => 'ADMIN',
         'email' => 'admin@gmail.com',
         'password' => bcrypt('admin')
        ));
         $admin->assignRole('admin');

         $this->command->info('Admin telah diisi!');

         Pelanggan::create(array(
         'alamat' => 'Manding',
         'no_tlp' => '085330276771',
         'id_pelanggan' => $admin->id,
         ));
         # Informasi ketika semua wali telah diisi.
         $this->command->info('User dan Pelanggan telah diisi!');

        $admin1 = User::create(array(
        'name' => 'Firdaus',
        'email' => 'daus@gmail.com',
        'password' => bcrypt('daus')
        ));
        $admin1->assignRole('admin');

        $this->command->info('Admin telah diisi!');

        Pelanggan::create(array(
        'alamat' => 'Manding',
        'no_tlp' => '085330276771',
        'id_pelanggan' => $admin1->id,
        ));
        # Informasi ketika semua wali telah diisi.
        $this->command->info('User dan Pelanggan telah diisi!');
    }
}
