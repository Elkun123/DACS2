<?php
    $qlkh = new QlkhController($conn);
    $result = $qlkh->selectData1();
    $row = mysqli_fetch_array($result);

    $qlkh->updateData();
    
?>

<form action="" method="post" enctype="multipart/form-data">
<table class="table table-hover">
    <tr>
        <td class="tr_first">Họ tên</td>
        <td>
            <input type="text" name="ten" value=" <?php echo $row['T_name']?> ">
        </td>
    </tr>
    <tr>
        <td class="tr_first">Số điện thoại</td>
        <td>
            <input type="text" name='sdt' value=" <?php echo $row['T_number_phone']?> ">
        </td>
    </tr>
    <tr>
        <td class="tr_first">Email</td>
        <td>
            <input type="text" name='email' value=" <?php echo $row['T_email']?> ">
        </td>
    </tr>
    <tr>
        <td class="tr_first">Địa chỉ</td>
        <td>
            <input type="text" name='diachi' value=" <?php echo $row['T_address']?> ">
        </td>
    </tr>
    <tr>
        <td class="tr_first">Ngày sinh</td>
        <td>
            <input type="text" name='ngaysinh' value=" <?php echo $row['D_day_of_birth']?> ">
        </td>
    </tr>
    <tr>
        <td class="tr_first">Loại</td>
        <td>
            <input type="text" name='loai' value=" <?php echo $row['B_type']?> ">
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <button type="submit" name='btn'>Sửa</button>
        </td>
    </tr>
</table>
</form>