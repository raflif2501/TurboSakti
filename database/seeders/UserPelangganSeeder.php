<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        Role::create(['name'=> 'admin']);
        Role::create(['name'=> 'user']);

         $user = User::create(array(
         'name' => 'Firdaus',
         'email' => 'firdaus@gmail.com',
         'password' => bcrypt('firdaus')
        ));
         $user->assignRole('user');

         $this->command->info('User telah diisi!');

         $admin = User::create(array(
         'name' => 'ADMIN',
         'email' => 'admin@gmail.com',
         'password' => bcrypt('admin')
        ));
         $admin->assignRole('admin');

         $this->command->info('Admin telah diisi!');
    }
}
