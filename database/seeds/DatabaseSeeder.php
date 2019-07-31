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

          DB::table('tbl_category_product')->insert([
          ['category_name' => 'Cá Kiểng','category_desc'=>'Cá đại dương bá đạo','category_status' => '0'],
          ['category_name' => 'Thức ăn cho cá','category_desc'=>'Thức ăn cá bá đạo','category_status' => '0']
        ]);

           DB::table('tbl_brand')->insert([
          ['brand_name' => 'Pro Sea','brand_desc'=>'Hãng đại dương bá đạo','brand_status' => '0'],
          ['brand_name' => 'Pro Sea1','brand_desc'=>'Hãng đại dương 1 bá đạo','brand_status' => '0'],
          ]);

    }
}
