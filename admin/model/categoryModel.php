<?php
    require_once('../model/categoryModel.php');

    class CategoryModel{
        private $conn;

        public function __construct($conn) {
            $this->conn = $conn;
        }

        public function selectData($name_table){
            $sql = "SELECT * FROM $name_table";
            $result = mysqli_query($this->conn, $sql);
            return $result;
        }

        public function selectData1($id_sua){
            $sql = "SELECT * FROM category WHERE I_id_category=$id_sua";
            $result = mysqli_query($this->conn, $sql);
            return $result;
        }

        public function insertData($name, $mota, $iddm) {    
            $sql = "INSERT INTO category (T_name_category, T_description, I_id_parent) VALUES ('$name', '$mota', '$iddm') ";
            $result = mysqli_query($this->conn, $sql);
            return $result;
        }


        public function updateData($name, $mota, $iddm, $id_sua) {
            $sql = "UPDATE category SET T_name_category = '$name', T_description = '$mota', T_id_parent = '$iddm' WHERE I_id_category = $id_sua ";
            $result = mysqli_query($this->conn, $sql);
            return $result;
        }

        public function deleteData($id_xoa){
            $sql = "DELETE FROM category WHERE I_id_category=$id_xoa";
            $result = mysqli_query($this->conn, $sql);
            return $result;
        }
    }
?>