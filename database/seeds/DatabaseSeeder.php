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
    	//$this->call(UsersTableSeeder::class);
         $this->call(adminSeeder::class);


    }
}

class userSeeder extends Seeder{
	public function run(){
		DB::table('users')->insert([
          ['name' => 'Hieu','email' => 'Hieu034.@gmail.com','password' => bcrypt('12w3456')],
          ['name' => 'abc','email' => 'ds.@gmail.com','password' => bcrypt('12r3456')]
		]);
	}
}
class adminSeeder extends Seeder{
    public function run(){
        DB::table('tbl_admin')->insert([
          ['admin_name' => 'Hieu','admin_phone'=>'0223434234432','admin_email' => 'Hieu034@gmail.com','admin_password' => md5('123456')],
          ['admin_name' => 'abc','admin_phone'=>'06576545466466','admin_email' => 'tui@gmail.com','admin_password' => md5('123456')]
        ]);
    }
}
