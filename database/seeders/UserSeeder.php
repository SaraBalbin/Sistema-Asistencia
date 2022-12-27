<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Carlos Sanchez';
        $user->username = 'admin';
        $user->email = 'admin@gmail.com';
        $user->setPasswordAttribute('admin');
        $user->role = 'Administrador';
        $user->save();

        $user = new User;
        $user->name = 'Sara Ramirez';
        $user->username = 'sramirez';
        $user->email = 'sramirez@gmail.com';
        $user->setPasswordAttribute('1234');
        $user->role = 'Estudiante';
        $user->save();

        $user = new User;
        $user->name = 'Francisco Zapata';
        $user->username = 'fzapata';
        $user->email = 'fzapata@gmail.com';
        $user->setPasswordAttribute('1234');
        $user->role = 'Profesor';
        $user->save();
    }
}
