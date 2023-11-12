<?php
    include_once('../model/categoryModel.php');

    class CategoryController{
        private $cate;

        public function __construct($conn) {
            $this->cate = new CategoryModel($conn);
        }

        public function showData($name_table){
            return $this->cate->selectData($name_table);
        }

        public function showData1(){
            if(isset($_GET['id_sua'])){
                $id_sua = $_GET['id_sua'];
                $data = $this->cate->selectData1($id_sua);
                return $data;
            }
        }

        public function insertData(){
            if(isset($_POST['btn'])){
                $name = $_POST['tendm'];
                $mota = $_POST['mota'];
                $iddm = $_POST['iddm'];

                $result = $this->cate->insertData($name, $mota, $iddm);
                header('location: main.php?ql=cate');
            }
        }

        public function updateData(){
            if(isset($_POST['btn'])){
                $name = $_POST['tendm'];
                $mota = $_POST['mota'];
                $iddm = $_POST['iddm'];
                $id_sua = $_GET['id_sua'];

                $this->cate->updateData($name, $mota, $iddm, $id_sua);
                header('location: main.php?ql=cate');
            }
        }

        public function deleleData(){
            if(isset($_GET['id_xoa'])){
                $id_xoa = $_GET['id_xoa'];
                $this->cate->deleteData($id_xoa);
            }
        }
    }
?>