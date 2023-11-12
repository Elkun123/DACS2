<?php
    $cate = new CategoryController($conn);
    $cate->insertData();
 
?>

<form action="" method="post">
<table class="table table-hover">
    <tr>
        <td class="tr_first">Tên danh mục</td>
        <td>
            <input type="text" name="tendm">
        </td>
    </tr>
    <tr>
        <td class="tr_first">Mô tả danh mục</td>
        <td>
            <input type="text" name='mota'>
        </td>
    </tr>
    <tr>
        <td class="tr_first">Mã danh mục cha</td>
        <td>
            <input type="text" name='iddm'>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <button type="submit" name='btn'>Thêm</button>
        </td>
    </tr>
</table>
</form>