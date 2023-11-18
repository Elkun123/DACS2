<?php
    class DetailProductModel{
        private $conn;

        public function __construct($conn) {
            $this->conn = $conn;
        }

        public function select($idsp){
            $sql = "SELECT * FROM product WHERE I_id_pro = $idsp";
            $result = mysqli_query($this->conn, $sql);
            return $result;
        }

        public function select_detail($idsp){
            $sql = "SELECT * FROM product_details WHERE I_id_pro = $idsp";
            $result = mysqli_query($this->conn,$sql);
            return $result;
        }
    }
?>