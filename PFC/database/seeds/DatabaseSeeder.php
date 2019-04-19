<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	//agregamos otro por que se debe ejecutar otro primero
    	$this->call(RoleTableSeeder::class);
         $this->call(UserTableSeeder::class);
    }
}
