<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\User\Entities\Role;
use Modules\User\Entities\User;
use Cartalyst\Sentinel\Laravel\Facades\Activation;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::find(1);

        $codeNevis = User::create([
            'first_name' => 'Code',
            'last_name'  => 'Nevis',
            'phone'      => '09145769644',
            'email'      => 'info@codenevis.net',
            'password'   => bcrypt(123456),
        ]);

        $activation = Activation::create($codeNevis);
        Activation::complete($codeNevis, $activation->code);

        $adminRole->users()->attach($codeNevis);
    }
}
