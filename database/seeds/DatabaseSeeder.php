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
          ['admin_name' => 'Hieu','admin_phone'=>'0223434234432','admin_email' => 'Hieu@gmail.com','admin_password' => md5('123456')],
          ['admin_name' => 'Chau','admin_phone'=>'06576545466466','admin_email' => 'Chau@gmail.com','admin_password' => md5('123456')]
        ]);

          DB::table('tbl_category_product')->insert([
          

          ['category_name' => 'Chân Sắt','category_desc'=>'Phụ kiện','category_status' => '0'],
          ['category_name' => 'Tranh 3D','category_desc'=>'Phụ kiện','category_status' => '0'],
          ['category_name' => 'Bơm Lọc','category_desc'=>'Phụ kiện','category_status' => '0'],
          ['category_name' => 'Đèn Bể Cá','category_desc'=>'Phụ kiện','category_status' => '0'],
          ['category_name' => 'Sục Khí','category_desc'=>'Phụ kiện','category_status' => '0'],
          ['category_name' => 'Thức Ăn Cho Cá','category_desc'=>'Phụ kiện','category_status' => '0'],


          ['category_name' => 'Bể Cá Rồng','category_desc'=>'Bể Cá','category_status' => '0'],
          ['category_name' => 'Bể Cá Thủy Sinh','category_desc'=>'Bể Cá','category_status' => '0'],
          ['category_name' => 'Bể Cá Sam','category_desc'=>'Bể Cá','category_status' => '0'],
          ['category_name' => 'Bể Treo Tường','category_desc'=>'Bể Cá','category_status' => '0'],
          ['category_name' => 'Bể Cá Biển','category_desc'=>'Bể Cá','category_status' => '0'],
          ['category_name' => 'Bể Phong Thủy','category_desc'=>'Bể Cá','category_status' => '0'],


          ['category_name' => 'Cá Rồng','category_desc'=>'Cá đại dương','category_status' => '0'],
          ['category_name' => 'Cá Hổ','category_desc'=>'Cá đại dương','category_status' => '0'],
          ['category_name' => 'Cá Sam','category_desc'=>'Cá đại dương','category_status' => '0'],
          ['category_name' => 'Cá Thủy Sinh','category_desc'=>'Cá đại dương','category_status' => '0'],
          ['category_name' => 'Cá Nước Ngọt','category_desc'=>'Cá đại dương','category_status' => '0'],
          ['category_name' => 'Cá Cảnh Biển','category_desc'=>'Cá đại dương','category_status' => '0'],


         
        ]);

           DB::table('tbl_brand')->insert([
          ['brand_name' => 'Cá Kiểng Pro Sea','brand_desc'=>'Hãng cung cấp cá cảnh chất lượng','brand_status' => '0'],
          ['brand_name' => 'Phụ kiện cá Fuzill','brand_desc'=>'Hãng phụ kiện cá châu á','brand_status' => '0'],
           ['brand_name' => 'Bể cá Aquana','brand_desc'=>'Hãng bể cá châu á','brand_status' => '0'],
          ]);

            DB::table('tbl_product')->insert([
          ['product_name' => 'Ngân Long','category_id'=>'1','brand_id' => '1', 'product_desc'=>'Cá rồng Ngân Long có màu trắng bạc rất đặc trưng', 'product_content'=>'Cá rồng Ngân Long sở hữu màu bạc toàn thân, kích thước tương đối lớn, cơ thể dài, và một cái đuôi nhọn với vây lưng và vây hậu môn kéo dài về phía vây đuôi nhỏ, nơi chúng gần như hợp nhất. Điều này có phần khác khi mà cá rồng châu Á và châu Úc có vây lưng và vây hậu môn ngắn lùi xa về phía sau, vây ngực và đuôi khá lớn so với thân mình', 'product_price'=>'2000000', 'product_image'=>'nganlong.jpg', 'product_stock'=>'10','product_status' => '0'],

          ['product_name' => 'Cá Hải Tượng','category_id'=>'2','brand_id' => '1', 'product_desc'=>'Cá Hải Tượng đang được nhân giống đưa trở lại tự nhiên', 'product_content'=>'Cá Hải Tượng là loại cá săn mồi rất được người chơi ưa chuộng. Ngoại hình dữ dằn, sở hữu những cú đớp mồi nhanh như điện xẹt, tốc độ lớn rất nhanh, kích thước khi trưởng thành có thể đạt 2-3m.', 'product_price'=>'2100000', 'product_image'=>'haituong.jpg', 'product_stock'=>'10', 'product_status' => '0'],
          
          ]);
    }
}
