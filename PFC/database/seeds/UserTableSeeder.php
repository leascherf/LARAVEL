<?php

use Illuminate\Database\Seeder;
use PFC\Role;
use PFC\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name','User')->first();
        $role_admin = Role::where('name','Admin')->first();

        //Creo dos usuarios
        $user= new User();
        $user->name = "User";
        $user->email = "User@email.com";
        $user->password = bcrypt('query');
        $user->save();
        $user->roles()->attach($role_user);

        //Creo otro user
          $user= new User();
        $user->name = "Admin";
        $user->email = "Admin@email.com";
        $user->password = bcrypt('query');
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
