<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
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

        $admin = User::create([
        'name'=> 'admin',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('admin')
        ]);
        $admin->assignRole('admin');

        $user = User::create([
        'name'=> 'firdaus',
        'email' => 'firdaus@gmail.com',
        'password' => bcrypt('firdaus')
        ]);
        $user->assignRole('user');
    }
}
