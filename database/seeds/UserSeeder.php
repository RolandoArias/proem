<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder{

    public function run(){
        DB::table('users')->delete();

        $adminRole = Role::whereName('administrator')->first();
        $userCliente = Role::whereName('cliente')->first();

        $user = User::create(array(
            'name'    => 'John',
            'last_name'     => 'Doe',
            'email'         => 'john@admin.com',
            'picture'         => '/assets/images/avatar.png',
            'password'      => Hash::make('admin123'),
            'token'         => str_random(64),
            'activated'     => true,
            'tipo_user'     => 'email'
        ));
        $user->assignRole($adminRole);

        $user = User::create(array(
            'name'    => 'Jane',
            'last_name'     => 'Doe',
            'email'         => 'user1@front.com',
            'password'      => Hash::make('u123'),
            'picture'         => '/assets/images/avatar.png',            
            'token'         => str_random(64),
            'activated'     => true,
            'tipo_user'     => 'email'

        ));
        $user->assignRole($userCliente);

        $user1 = User::create(array(
            'name'    => 'Jane',
            'last_name'     => 'Doe',
            'email'         => 'user2@front.com',
            'password'      => Hash::make('u123'),
            'picture'         => '/assets/images/avatar.png',            
            'token'         => str_random(64),
            'activated'     => true,
            'tipo_user'     => 'facebook'

        ));
        $user1->assignRole($userCliente);
    }
}