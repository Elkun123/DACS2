<?php
    include("database/connect.php");
    include("user/controller/paymentController.php");

    $paymentController = new PaymentController($conn);

    if($_GET){
        $iduser = $_GET['iduser'];
        $counts = $_GET['count'];
        $idsps = $_GET['idsp'];
        $idtsps = $_GET['idtsp'];
        print_r($idtsps);
        if(!is_array($counts)) {
            $counts = array($counts);
        }

        if(!is_array($idsps)) {
            $idsps = array($idsps);
        }

        if(!is_array($idtsps)) {
            $idtsps = array($idtsps);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./user/assets/css/payment.css">
</head>
<body>
<div class="container">
    <form action="">
        <div class="row">
            <div class="col">
                <?php
                    $paymentController->selectInfoUser($iduser);
                ?>
            </div>

            <div class="col">
                <h3 class="title">Đơn hàng của bạn</h3>
                <table>
                    <tr class="row">
                        <td class="col-10" style="font-weight: 600;">SẢN PHẨM</td>
                        <td class="col-2">TẠM TÍNH</td>
                    </tr>
                    <?php
                        $paymentController->selectInfoPro($idsps,$idtsps,$counts);
                    ?>
                    <tr>
                        <td style="text-align: left">
                            <div class="inputBox" style="margin:0;">
                                <label style="font-weight: 600;" for="1">shipping</label> <br>
                                <input type="radio" name="1" id="" checked>
                                <span>giao hàng miễn phí</span> <br>
                                <input type="radio" name="1" id="">
                                <span>giao hàng hỏa tốc 50.000 đ</span> <br>
                                <small>DNK Yellow Shoes x 1, Áo dài việt nam x 6, Anchor Bracelet x 1</small>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left">
                            <div class="inputBox" style="margin: 0;">
                                <input type="radio" name="3" id="" checked>
                                <span>Trả tiền mặt khi nhận hàng</span><br>
                                <input type="radio" name="3" id="">
                                <span>Chuyển khoản ngân hàng</span><br>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <input type="submit" value="Tiến hành kiểm tra" class="submit-btn">
    </form>
</div>
<script>
        $(document).ready(function () {
            // Sự kiện khi chọn tỉnh/thành phố
            $('#province').change(function () {
                // Lấy giá trị tỉnh/thành phố được chọn
                var selectedProvince = $(this).find('option:selected').data('district');
                var selectedDistrict = $('#district');
                var selectedWard = $('#ward');
                if(selectedProvince === 0){
                    selectedDistrict.empty();
                    selectedWard.empty();
                    selectedDistrict.append("<option value='' data-district='0'>--Chọn quận huyện--</option>");
                    selectedWard.append("<option value='' data-ward='0'>--Chọn phường/xã--</option>");
                }
                else{
                    // Gửi yêu cầu Ajax để lấy danh sách quận/huyện của tỉnh/thành phố được chọn
                    $.ajax({
                        url: "https://provinces.open-api.vn/api/p/"+ selectedProvince +"?depth=2",
                        method: "GET",
                        success: function(data) {
                            console.log(data);
                            // Update the #district dropdown
                            var districtDropdown = $("#district");
                            districtDropdown.empty(); // Clear existing options
                            districtDropdown.append("<option value='' data-ward='0'>--Chọn quận huyện--</option>");
                            
                            var wardDropdown = $("#ward");
                            wardDropdown.empty(); // Clear existing options
                            wardDropdown.append("<option value='' data-ward='0'>--Chọn phường/xã--</option>");
                            // Populate options with districts
                            $.each(data.districts, function(index, district) {
                                districtDropdown.append("<option value='" + district.name + "' data-ward='" + district.code + "'>" + district.name + "</option>");
                            });

                            // Enable the #district dropdown
                            districtDropdown.prop("disabled", false);
                        },
                        error: function() {
                            console.log("Error fetching districts");
                        }
                    });
                }
            });

            //Sự kiện khi chọn quận/huyện
            $('#district').change(function () {
                // Lấy giá trị quận/huyện được chọn
                var selectedDistrict= $(this).find('option:selected').data('ward');
                var selectedWard = $('#ward');
                if(selectedDistrict === 0){
                    selectedWard.empty();
                    selectedWard.append("<option value='' data-ward='0'>--Chọn phường/xã--</option>");
                }else{
                    // Gửi yêu cầu Ajax để lấy danh sách quận/huyện của tỉnh/thành phố được chọn
                    $.ajax({
                        url: "https://provinces.open-api.vn/api/d/"+ selectedDistrict +"?depth=2",
                        method: "GET",
                        success: function(data) {
                            console.log(data);
                            // Update the #ward dropdown
                            var wardDropdown = $("#ward");
                            wardDropdown.empty(); // Clear existing options
                            wardDropdown.append("<option value='' data-ward='0'>--Chọn phường/xã--</option>");
                            // Populate options with wards
                            $.each(data.wards, function(index, ward) {
                                wardDropdown.append("<option value='" + ward.name + "'>" + ward.name + "</option>");
                            });

                            // Enable the #ward dropdown
                            wardDropdown.prop("disabled", false);
                        },
                        error: function() {
                            console.log("Error fetching wards");
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>