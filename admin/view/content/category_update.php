<?php
    $cate = new CategoryController($conn);
    $result = $cate->showData1();
    $row = mysqli_fetch_assoc($result);

    $cate->updateData();
?>

<form action="" method="post" enctype="multipart/form-data">
<table class="table table-hover">
    <tr>
        <td class="tr_first">Tên danh mục</td>
        <td>
            <input type="text" name="tendm" value=" <?php echo $row['T_name_category']?> ">
        </td>
    </tr>
    <tr>
        <td class="tr_first">Mô tả danh mục</td>
        <td>
            <input type="text" name='mota'  value=" <?php echo $row['T_description']?> ">
        </td>
    </tr>
    <tr>
        <td class="tr_first">Mã danh mục cha</td>
        <td>
            <input type="text" name='iddm' value=" <?php echo $row['I_id_parent']?> ">
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