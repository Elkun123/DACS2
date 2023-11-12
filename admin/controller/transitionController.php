<?php
    if($_GET){
        $sign = $_GET['ql'];

        switch ($sign) {
            case 'db':
                include('../view/content/dashBoard.php');
                break;
            case 'qltk':
                include('../view/content/qltk.php');
                break;
            case 'cate':
                include('../view/content/category.php');
                break;
            case 'cate_add':
                include('../view/content/category_add.php');
                break;
            case 'cate_update':
                include('../view/content/category_update.php');
                break;
            case 'cate_delete':
                include('../view/content/category.php');
                break;
            case 'pw':
                include('../view/content/warehouse.php');
                break;
            case 'cart':
                include('../view/content');
                break;
        }
    }else{
        include('../view/content/dashBoard.php');
    }


?>