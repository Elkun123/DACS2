<?php
    include_once('user/model/paymentModel.php');

    class PaymentController{
        private $payment_sign;

        public function __construct($conn) {
            $this->payment_sign = new PaymentModel($conn);
        }

        public function selectInfoUser($iduser){
            $row = $this->payment_sign->selectInfoUser($iduser);
            $addresses = explode("|", $row['T_address']);
            echo'
                <h3 class="title">thông tin thanh toán</h3>
                <div class="inputBox">
                    <span>họ và tên :</span>
                    <input type="text" placeholder="Họ tên của bạn" value="'.$row['T_name'].'">
                </div>
                <div class="flex">
                    <div class="inputBox">
                        <span>số điện thoại :</span>
                        <input type="text" placeholder="Số điện thoại của bạn" value="'.$row['T_number_phone'].'">
                    </div>
                    <div class="inputBox">
                        <span>địa chỉ email :</span>
                        <input type="text" placeholder="Email của bạn" value="'.$row['T_email'].'">
                    </div>
                </div>
                <div class="flex">
                    <div class="inputBox">
                        <span>tỉnh/thành phố :</span>
                        <select name="" id="province">
                            <option value="" data-district="0">--Chọn tỉnh/thành phố--</option>
            ';
            // Lấy danh sách tỉnh thành từ API
            $api_url = 'https://provinces.open-api.vn/api/p';
            $response = file_get_contents($api_url);
            $provinces_data = json_decode($response, true);

            // Hiển thị các tỉnh thành trong dropdown
            foreach ($provinces_data as $province) {
                $selected = ($addresses[0] == $province['name']) ? 'selected' : '';
                echo "<option value=\"{$province['name']}\" data-district='{$province['code']}' {$selected}>{$province['name']}</option>";
            }
            echo'
                        </select>
                    </div>
                    <div class="inputBox">
                        <span>quận/huyện :</span>
                        <select name="" id="district">
                            <option value="">'.$addresses[1].'</option>
                            
                        </select>
                    </div>
                </div>
                <div class="flex">
                    <div class="inputBox">
                        <span>Chọn phường/xã</span>
                        <select name="" id="ward">
                            <option value="">'.$addresses[2].'</option>
                        </select>
                    </div>
                    <div class="inputBox">
                        <span>địa chỉ :</span>
                        <input type="text" placeholder="Ví dụ: số 20, ngõ 90" value="'.$addresses[3].'">
                    </div>
                </div>
                <div class="inputBox">
                    <input type="checkbox">
                    <span style="color: #444;">giao hàng tới địa điểm khác?</span>
                </div>
                <div class="inputBox">
                    <span>ghi địa chỉ đơn hàng (tùy chọn)</span>
                    <textarea placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn."></textarea>
                </div>
            ';
        }

        public function selectInfoPro($idsps, $idtsps, $counts){
            $result = $this->payment_sign->selectInfoUser($idsps,$idtsps);
            $count = 0;
            while($row=mysqli_fetch_assoc($result)){
                echo'
                    <tr class="row">
                        <td class="col-2"><img src="'.$row['T_image_sample_type_pro'].'" alt=""></td>
                        <td class="col-2">'.$row['T_name_pro'].'-'.$row['T_name'].' <br>'.$counts[$count].'</td>
                        <td class="col-6"></td>
                        <td class="col-2">'.$row['T_price'].'</td>
                    </tr>
                ';
                $count++;
            }
        }
    }
?>