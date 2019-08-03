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

          DB::table('users')->insert([
          ['name' => 'Hieu','email' => 'Hieu@gmail.com','password' => md5('123456'),'phone'=>'0223434234432','address'=>'Gò Vấp','admin'=>'0'],
          ['name' => 'Chau','email' => 'Chau@gmail.com','password' => md5('123456'),'phone'=>'0223434234432','address'=>'Gò Vấp','admin'=>'0']
         ]);

          DB::table('tbl_category_product')->insert([
          

          ['category_name' => 'Bơm Lọc','category_desc'=>'Phụ kiện','category_status' => '0'],
          ['category_name' => 'Đèn Bể Cá','category_desc'=>'Phụ kiện','category_status' => '0'],
          ['category_name' => 'Sục Khí','category_desc'=>'Phụ kiện','category_status' => '0'],
          ['category_name' => 'Thức Ăn Cho Cá','category_desc'=>'Phụ kiện','category_status' => '0'],


          ['category_name' => 'Bể Cá Rồng','category_desc'=>'Bể Cá','category_status' => '0'],
          ['category_name' => 'Bể Cá Thủy Sinh','category_desc'=>'Bể Cá','category_status' => '0'],
          ['category_name' => 'Bể Treo Tường','category_desc'=>'Bể Cá','category_status' => '0'],
          ['category_name' => 'Bể Cá Biển','category_desc'=>'Bể Cá','category_status' => '0'],


          ['category_name' => 'Cá Rồng','category_desc'=>'Cá đại dương','category_status' => '0'],
          ['category_name' => 'Cá Thủy Sinh','category_desc'=>'Cá đại dương','category_status' => '0'],
          ['category_name' => 'Cá Nước Ngọt','category_desc'=>'Cá đại dương','category_status' => '0'],
          ['category_name' => 'Cá Cảnh Biển','category_desc'=>'Cá đại dương','category_status' => '0'],


         
        ]);

           DB::table('tbl_brand')->insert([
          ['brand_name' => 'Cá Kiểng Pro Sea','brand_desc'=>'Hãng cung cấp cá cảnh chất lượng','brand_status' => '0'],
          ['brand_name' => 'Phụ kiện Fuzill','brand_desc'=>'Hãng phụ kiện cá châu á','brand_status' => '0'],
           ['brand_name' => 'Bể cá Aquana','brand_desc'=>'Hãng bể cá châu á','brand_status' => '0'],
          ]);

            DB::table('tbl_product')->insert([
          ['product_name' => 'Ngân Long','category_id'=>'9','brand_id' => '1', 'product_desc'=>'Cá rồng Ngân Long có màu trắng bạc rất đặc trưng', 'product_content'=>'Cá rồng Ngân Long sở hữu màu bạc toàn thân, kích thước tương đối lớn, cơ thể dài, và một cái đuôi nhọn với vây lưng và vây hậu môn kéo dài về phía vây đuôi nhỏ, nơi chúng gần như hợp nhất. Điều này có phần khác khi mà cá rồng châu Á và châu Úc có vây lưng và vây hậu môn ngắn lùi xa về phía sau, vây ngực và đuôi khá lớn so với thân mình', 'product_price'=>'2000000', 'product_image'=>'nganlong.jpg', 'product_stock'=>'10','product_status' => '0'],

          ['product_name' => 'Cá Hải Tượng','category_id'=>'9','brand_id' => '1', 'product_desc'=>'Cá Hải Tượng đang được nhân giống đưa trở lại tự nhiên', 'product_content'=>'Cá Hải Tượng là loại cá săn mồi rất được người chơi ưa chuộng. Ngoại hình dữ dằn, sở hữu những cú đớp mồi nhanh như điện xẹt, tốc độ lớn rất nhanh, kích thước khi trưởng thành có thể đạt 2-3m.', 'product_price'=>'2100000', 'product_image'=>'haituong.jpg', 'product_stock'=>'10', 'product_status' => '0'],

          ['product_name' => 'Ngân Long Albino','category_id'=>'9','brand_id' => '1', 'product_desc'=>'Cá rồng Ngân Long có màu trắng bạc rất đặc trưng', 'product_content'=>'Cá Ngân Long có nguồn gốc từ các dòng sông Amazon của Nam Mỹ. Đây là loài săn mồi đặc hữu, rất được người chơi cá cảnh trên toàn thế giới ưa chuộng. Cá Ngân Long Albino là những cá thể đột biến gien, với thân hình trắng viền vẩy thân có thể phớt đỏ hoặc vàng, tròng mắt màu đỏ rất quý hiếm và được săn lùng. Cá Ngân Long Albino thích hợp thả cùng các loại cá rồng hoặc cá săn mồi khác.', 'product_price'=>'2300000', 'product_image'=>'nganlong2.jpg', 'product_stock'=>'10','product_status' => '0'],

          ['product_name' => 'Huyết Long','category_id'=>'9','brand_id' => '1', 'product_desc'=>'Cá Huyết Long đang được nhân giống đưa trở lại tự nhiên', 'product_content'=>'Cá rồng Huyết Long 60cm với màu đỏ lên cực tốt, phải nói là hiếm. Cá có body đẹp, hài hoà, dáng bơi bệ vệ, thư thái.', 'product_price'=>'5300000', 'product_image'=>'huyetlong.jpg', 'product_stock'=>'10', 'product_status' => '0'],

          ['product_name' => 'Cá thủy tinh','category_id'=>'10','brand_id' => '1', 'product_desc'=>'Cá Thủy Tinh Đầu Bướu – Humphead Glassfish- Parambassis sp', 'product_content'=>'Cá Thủy Tinh Đầu Bướu – Humphead Glassfish rất tò mò và hiếu động. Để nuôi cá Thủy Tinh Đầu Bướu trong bể cá, bạn cần tạo một môi trường giàu oxy và nhiều khoảng trống bơi lội để chúng có thể sinh trưởng và phát triển bình thường. Chúng khá hòa bình trong các bể nuôi cộng đồng, tuy nhiên, bạn nên cẩn thận với những con cá Neon, Sóc Đầu Đỏ, Cá Tam Giác, và các loại cá thủy sinh có kích thước nhỏ khác có thể trở thành bữa ăn của Thủy Tinh Đầu Bướu.', 'product_price'=>'4500000', 'product_image'=>'thuytinh.jpg', 'product_stock'=>'10','product_status' => '0'],

          ['product_name' => 'Cá chuột ngọc trai','category_id'=>'10','brand_id' => '1', 'product_desc'=>'Cá Chuột Ngọc Trai – Emerald Green Cory Cat – Brochis splendens', 'product_content'=>'Cá Chuột Ngọc Trai giúp cho đáy của bể cá nhà bạn thêm phần sinh động. Loài cá ăn tầng đáy này có một cơ thể màu ngọc bích óng ả với phần bụng hơi hồng. Ngoài việc trang trí cho hồ cá thêm hấp dẫn hơn, cá Chuột Ngọc Trai còn giúp loại bỏ thức ăn thừa nơi đáy bể, giúp bể cá sạch sẽ hơn.', 'product_price'=>'1300000', 'product_image'=>'cachuot.jpg', 'product_stock'=>'10', 'product_status' => '0'],


           ['product_name' => 'Cá Hoàng Bảo Yến Hoa Kelberi','category_id'=>'11','brand_id' => '1', 'product_desc'=>'Cá Hoàng Bảo Yến Hoa Kelberi size 18cm', 'product_content'=>'Cá Hoàng Bảo Yến Hoa Kelberi là một trong những loại cá săn mồi độc đáo, chúng thường được thả trong bể săn mồi cùng với cá rồng, cá hổ, sá sam, hoặc thả theo đàn cũng vô cùng ấn tượng. Sở hữu màu vàng rực rỡ với những hoa văn cuốn hút, Hoàng Bảo Yến  Hoa Kelberi là một trong những loại cá săn mồi được yêu thích nhất.', 'product_price'=>'2400000', 'product_image'=>'baoyen.jpg', 'product_stock'=>'10','product_status' => '0'],

          ['product_name' => 'Cá Ali Lam Bảo Thạch','category_id'=>'11','brand_id' => '1', 'product_desc'=>'Cá Ali Lam Bảo Thạch là một trong những cá thể xuất sắc nhất của ali hồ Malawi.', 'product_content'=>'Cá Ali Lam Bảo Thạch là một trong những cá thể xuất sắc nhất của ali hồ Malawi. Cá nhỏ sở hữu một màu lam ngọc đẹp mê hồn, khi trưởng thành, những đốm trắng nhũ xuất hiện dần trên thân, tạo nên một kiệt tác của tạo hóa. Đây là một trong những loại cá ali gây nghiện nhất từng được biết tới. Cá ali Lam Bảo Thạch có thể chơi một đàn của riêng nó trong một bể hoặc mix với các loại cá ali Malawi khác.', 'product_price'=>'1300000', 'product_image'=>'baothach.jpg', 'product_stock'=>'10', 'product_status' => '0'],

           ['product_name' => 'Cá Thù Lù','category_id'=>'12','brand_id' => '1', 'product_desc'=>'Cá Thù Lù – Moorish Idol – Zanclus cornutus', 'product_content'=>'Những con cá Thù Lù – Moorish Idol thường được biết đến ở Hawaii với cái tên ” Kihikihi” có nghĩa là “đường cong”, “góc”, hoặc “zigzags” để miêu tả những dải mầu tuyệt diệu trên cơ thể chúng. Cá Thù Lù là thành viên duy nhất của gia đình Zanclidae, và là họ hàng gần của Tangs hoặc Surgeonfish. Đây là một trong những loài cá phổ biến nhất, bạn có thể tìm thấy nó ở khắp Ấn Độ Dương, Biển Đỏ, khắp Thái Bình Dương nhiệt đới. Trong tự nhiên, cá Thù Lù có thể đạt tới kích thước 18 cm, nhưng trong bể nuôi, chúng thường chỉ đạt 10 cm.', 'product_price'=>'2450000', 'product_image'=>'thulu.jpg', 'product_stock'=>'10','product_status' => '0'],

          ['product_name' => 'Cá hề','category_id'=>'12','brand_id' => '1', 'product_desc'=>'Cá Hề – cá Khoang Cổ – Saddleback Clownfish- Amphiprion polymunus', 'product_content'=>'Cá Hề Saddleback là một trong những loài cá cảnh biển phổ biến nhất trên thế giới, được lựa chọn để thả trong những bể chứa nhiều san hô mềm, chúng khá khỏe mạnh và dễ thương khi xuất hiện bên cạnh những con san hô. Cá Hề thường được tìm thấy ở phía Tây Thái Bình Dương, Trung Quốc, Việt Nam, Đài Loan, phía nam Indonesia, Philippines, Australia, phía tây New Guinea và quần đảo Soloman. Loài cá này có tính khí tương tự như những con cá Hề Sebae hoặc cá Hề Clarkii, nên nuôi chúng theo những nhóm nhỏ hay thành từng cặp trong thời gian sinh sản. Những con cá Hề này dường như sinh ra để làm cảnh, những con cá Hề trong bể dường như có khả năng thích nghi cao hơn cả những con cá ngoài hoang dã, tuy nhiên cả hai đều rất dễ chăm sóc.', 'product_price'=>'1400000', 'product_image'=>'cahe.jpg', 'product_stock'=>'10','product_status' => '0'],


           ['product_name' => 'Thức ăn cá Ali – Hikari Sinking Cichlid Excel 342g','category_id'=>'4','brand_id' => '2', 'product_desc'=>'Cá Thù Lù – Moorish Idol – Zanclus cornutus', 'product_content'=>'Những con cá Thù Lù – Moorish Idol thường được biết đến ở Hawaii với cái tên ” Kihikihi” có nghĩa là “đường cong”, “góc”, hoặc “zigzags” để miêu tả những dải mầu tuyệt diệu trên cơ thể chúng. Cá Thù Lù là thành viên duy nhất của gia đình Zanclidae, và là họ hàng gần của Tangs hoặc Surgeonfish. Đây là một trong những loài cá phổ biến nhất, bạn có thể tìm thấy nó ở khắp Ấn Độ Dương, Biển Đỏ, khắp Thái Bình Dương nhiệt đới. Trong tự nhiên, cá Thù Lù có thể đạt tới kích thước 18 cm, nhưng trong bể nuôi, chúng thường chỉ đạt 10 cm.', 'product_price'=>'500000', 'product_image'=>'thucanali.jpg', 'product_stock'=>'10','product_status' => '0'],

          ['product_name' => 'Thức ăn cá Ali – Hikari Cichlid Gold 250g (Tăng màu)','category_id'=>'4','brand_id' => '2', 'product_desc'=>'Thức ăn cá Ali – Hikari Sinking Cichlid Excel 342g', 'product_content'=>'Đây là một loại thức ăn cân bằng, các thành phần dinh dưỡng của nó phù hợp với nhu cầu của  ngay cả các loại cá ăn thực vật. Hương vị tuyệt vời của nó làm hài lòng cả những con cá khó tính nhất.
            Chứa một thành phần quan trọng từ mầm lúa mạch giúp cá dễ dàng tiêu hóa thức ăn cũng như bổ sung dinh dưỡng cần thiết cho các loài cá ăn thực vật.
            Chúng được trộn thêm Tảo Xoắn siêu sạch, thành phần này của thức ăn giúp cá phát triển tốt về màu sắc.
            Công nghệ trộn thức ăn độc đáo hỗ trợ cho hệ miễn dịch hoạt động tốt hơn.
            Tóm lại, khi bạn cần một loại thức ăn tốt nhất cho cá Ali, Hikari Sinking Cichlid Excel là một loại thức ăn tuyệt vời không thể bỏ qua.', 'product_price'=>'400000', 'product_image'=>'thucanaligold.jpg', 'product_stock'=>'10','product_status' => '0'],

           ['product_name' => 'Máy bơm điện 1 chiều Chaning CN','category_id'=>'1','brand_id' => '2', 'product_desc'=>'Máy bơm Chaning CN 8100 thực sự là một series quá chất lượng so với các sản phẩm máy bơm nước bể cá trên thị trường hiện nay.', 'product_content'=>'Thiết kế máy đẹp, chắc chắn, được sản xuất từ nhựa cao cấp, giúp máy bền hơn rất nhiều.
             Cải tiến công nghệ động cơ giúp tiết kiệm điện 50%.
              Động cơ vận hành cực kỳ êm ái.
            Có cảm biến chống cạn và cảm biến chống quá tải khi bị kẹt.
            Chạy điện 24V an toàn tuyệt đối khi sử dụng trong bể cá hay các bể non bộ tiểu cảnh gia đình hoặc công cộng.
            Có điều chỉnh lưu lượng và chế độ dừng cho ăn cực kỳ tiện lợi.
            Bảo hành 1 năm.', 'product_price'=>'350000', 'product_image'=>'maybomcha.png', 'product_stock'=>'10','product_status' => '0'],

          ['product_name' => 'Máy bơm Jebao FA','category_id'=>'1','brand_id' => '2', 'product_desc'=>'Máy Bơm Jebao FA Series được thiết kế để phục vụ bể cá, thác nước, đài phun nước cỡ vừa và nhỏ.', 'product_content'=>'Thiết kế đẹp, nhỏ gọn, có van điều chỉnh lưu lượng đầu vào nên rất tiện lợi cho người sử dụng mà không ảnh hưởng tuổi thọ máy.
            Máy vận hành cực êm ái, được các thị trường khó tính Âu – Mỹ chấp nhận, là sản phẩm bán rất chạy trên Amazon Mỹ và EU.
            Sử dụng được cả cho nước ngọt và nước mặn.
            Rất phù hợp sử dụng cho lọc tràn trên, lọc tràn dưới, lọc vách, non bộ tiểu cảnh nhỏ, đài phun nước.
            Được bảo hành 6 tháng nên bạn hoàn toàn có thể tin tưởng vào chất lượng của sản phẩm.', 'product_price'=>'1400000', 'product_image'=>'jebao.jpg', 'product_stock'=>'10','product_status' => '0'],


              ['product_name' => 'Bể cá rồng','category_id'=>'5','brand_id' => '3', 'product_desc'=>'Bể cá rồng lắp đặt tại KĐT Việt Hưng', 'product_content'=>'Bể cá được thiết lập công nghệ hiện đại nhất, hệ thống lọc cao cấp nhất để phục vụ gia chủ chăm sóc chú cá rồng yêu dấu. Cảm ơn quý khách đã lựa chọn Thái Hòa, chúc gia đình quý khách an – khang – thịnh – vượng, hi vọng sản phẩm của chúng tôi sẽ đem đến những phong thủy tích cực và các giá trị bền vững cho ngôi nhà.', 'product_price'=>'2400000', 'product_image'=>'becarong.jpg', 'product_stock'=>'10','product_status' => '0'],

          ['product_name' => 'Bể cá rồng gỗ Hương','category_id'=>'5','brand_id' => '3', 'product_desc'=>'Mẫu bể cá cảnh cao cấp với hệ thống lọc chuyên nghiệp thường được dùng để nuôi cá rồng, một loại cá cảnh bá vương nhất trong các loại cá cảnh.', 'product_content'=>'Bể cá cảnh cao cấp được dùng nuôi cá rồng thường rất chú trọng chiều rộng, để con cá có thể thong dong quay đầu, không bị giật cục, gây cảm giác tức mắt cho người ngắm chơi. Trong hình là bể có kích thước 158x69x81, chân cao 75cm, Khung Lim – Vỏ Hương, mẫu cột tiện, cánh đục chữ thọ. Với các trang thiết bị và hệ thống lọc chuyên nghệp dành để nuôi cá rồng Huyết Long.', 'product_price'=>'1300000', 'product_image'=>'becahuong.jpg', 'product_stock'=>'10', 'product_status' => '0'],


          ]);
    }
}
