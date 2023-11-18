<?php
    include_once("user/model/detailProductModel.php");

    class DetailProductController{
        private $detailProduct_sign;

        public function __construct($conn) {
            $this->detailProduct_sign = new DetailProductModel($conn);
        }

        public function select($idsp){
            $result = $this->detailProduct_sign->select($idsp);
            $result_detail1 = $this->detailProduct_sign->select_detail($idsp);
            $result_detail2 = $this->detailProduct_sign->select_detail($idsp);
            $row = mysqli_fetch_array($result);
            $link_imgs = explode(",", $row['T_img_sample_pro']);
            $link_imgs_length = count($link_imgs);
            $features = explode("|", $row['T_feature']);
            echo '
                <div class="column column1 col-3">
                    <div class="slider-container">
                    <div class="main-image"><img src="'.$link_imgs[0].'" alt="Product Image"></div>
                    <div class="slider-thumbnails">
            ';
            for($i=0; $i<$link_imgs_length; $i++){
                echo '<div class="thumbnail"><img src="'.$link_imgs[$i].'" alt="Thumbnail"></div>';
            }
            echo'
                    </div>
                    </div>
                    <div class="features">
                    <h2>Đặc điểm nổi bật</h2>
                    <div class="row">
            
                        <p>
                        <i class="fa-solid fa-circle-check"></i>
                        '.$features[0].'
                        </p>
                    </div>
            
                    <div class="row">
            
                        <p>
                        <i class="fa-solid fa-circle-check"></i>
                        '.$features[1].'
                        </p>
                    </div>
            
                    <div class="row">
            
                        <p>
                        <i class="fa-solid fa-circle-check"></i>
                        '.$features[2].'
                        </p>
                    </div>
                    </div>
                </div>
                <div class="column column2 col-5">
                    <div class="info">
                        <h4><i class="fa-solid fa-circle-check"></i>Chính hãng</h4>
            ';
            while($row_detail = mysqli_fetch_array($result_detail1)){
                if(!strcmp($row_detail['T_name'],"Thương hiệu")){
                    echo '<p>Thương hiệu: '.$row_detail['T_value'].'</p>';
                    break;
                }
            }
            echo'
                    </div>
                    <h1>'.$row['T_name_pro'].'</h1>
                    <div class="rate">
                        5.0
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span>(527) | Đã bán '.$row['I_sold'].'</span>
                    </div>
                    <div class="price">
                        <h1>'.$row['I_price'].' <span>-21%</span></h1>
                    </div>
                    <div class="details">
                        <h2>Thông tin chi tiết</h2>
            '; 
            while($row_detail = mysqli_fetch_array($result_detail2)){
                echo '
                    <div class="row">
                        <span>'.$row_detail['T_name'].'</span>
                        <div>'.$row_detail['T_value'].'</div>
                    </div>
                ';
            }
            echo'
                    </div>
                    <div class="description cutoff-text">
                        <h2>Mô tả sản phẩm</h2>
                        <div class="box">
                        <h2>Nội dung quảng cáo</h2>
                        <p>iPhone 14 Pro Max. Bắt trọn chi tiết ấn tượng với Camera Chính 48MP. Trải nghiệm iPhone theo cách hoàn toàn mới với Dynamic Island và màn hình Luôn Bật. Công nghệ an toàn quan trọng – Phát Hiện Va Chạm1 thay bạn gọi trợ giúp khi cần kíp</p>
                        </div>

                        <div class="box">
                        <h2>Tính năng nổi bật</h2>
                        <ul>
                            <li>Màn hình Super Retina XDR 6,7 inch2 với tính năng Luôn Bật và ProMotion</li>
                            <li>Dynamic Island, một cách mới tuyệt diệu để tương tác với iPhone</li>
                            <li>Camera Chính 48MP cho độ phân giải gấp 4 lần</li>
                            <li>Chế độ Điện Ảnh nay đã hỗ trợ 4K Dolby Vision tốc độ lên đến 30 fps</li>
                            <li>Chế độ Hành Động để quay video cầm tay mượt mà, ổn định</li>
                            <li>Công nghệ an toàn quan trọng – Phát Hiện Va Chạm1 thay bạn gọi trợ giúp khi cần kíp</li>
                        </ul>
                        </div>

                        <div class="box">
                        <h2>Pháp lý</h2>
                        <p>1SOS Khẩn Cấp sử dụng kết nối mạng di động hoặc Cuộc Gọi Wi-Fi.
                            2Màn hình có các góc bo tròn. Khi tính theo hình chữ nhật, kích thước màn hình theo đường chéo là 6,69 inch. Diện tích hiển thị thực tế nhỏ hơn.
                            3Thời lượng pin khác nhau tùy theo cách sử dụng và cấu hình; truy cập apple.com/batteries để biết thêm thông tin.
                            4Cần có gói cước dữ liệu. Mạng 5G chỉ khả dụng ở một số thị trường và được cung cấp qua một số nhà mạng. Tốc độ có thể thay đổi tùy địa điểm và nhà mạng. Để biết thông tin về hỗ trợ mạng 5G, vui lòng liên hệ nhà mạng và truy cập apple.com/iphone/cellular.
                            5iPhone 14 Pro Max có khả năng chống tia nước, chống nước và chống bụi. Sản phẩm đã qua kiểm nghiệm trong điều kiện phòng thí nghiệm có kiểm soát đạt mức IP68 theo tiêu chuẩn IEC 60529 (chống nước ở độ sâu tối đa 6 mét trong vòng tối đa 30 phút). Khả năng chống tia nước, chống nước và chống bụi không phải là các điều kiện vĩnh viễn. Khả năng này có thể giảm do hao mòn thông thường. Không sạc pin khi iPhone đang bị ướt. Vui lòng tham khảo hướng dẫn sử dụng để biết cách lau sạch và làm khô máy. Không bảo hành sản phẩm bị hỏng do thấm chất lỏng.
                            6Một số tính năng không khả dụng tại một số quốc gia hoặc khu vực.</p>
                        </div>

                        <div class="box">
                        <h2>Thông số kỹ thuật</h2>
                        <p>Truy cập <a href="apple.com/iphone/compare">apple.com/iphone/compare</a> <br> <br>
                            Giá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....</p>
                        </div>
                    </div>
                    <input type="checkbox" class="expand-btn">
                </div>
            ';
        }
    }
?>