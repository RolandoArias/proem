<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder{

    public function run(){
        DB::table('users')->delete();

        $adminRole = Role::whereName('administrator')->first();
        $userRole = Role::whereName('user')->first();

        $user = User::create(array(
            'name'    => 'John',
            'last_name'     => 'Doe',
            'email'         => 'rolando@promocereales.com',
            'picture'         => '/assets/images/avatar.png',
            'password'      => Hash::make('promo321'),
            'token'         => str_random(64),
            'activated'     => true
        ));
        $user->assignRole($adminRole);

        $user = User::create(array(
            'name'    => 'Jane',
            'last_name'     => 'Doe',
            'email'         => 'user@promocereales.com',
            'password'      => Hash::make('user321'),
            'picture'         => '/assets/images/avatar.png',            
            'token'         => str_random(64),
            'activated'     => true
        ));
        $user->assignRole($userRole);
    }
}