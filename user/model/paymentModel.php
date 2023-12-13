<?php
    class PaymentModel{
        private $conn;

        public function __construct($conn) {
            $this->conn = $conn;
        }

        public function selectInfoUser($iduser){
            $sql = "SELECT * FROM users WHERE I_id_user = $iduser";
            $result = mysqli_query($this->conn, $sql);
            $row = mysqli_fetch_assoc($result);
            return $row;
        }

        public function selectInfoPro($idsps,$idtsps){
            $idspsString = implode(",", $idsps);
            $idtspsString = implode(",", $idtsps);
            $sql = "SELECT * FROM product 
            JOIN product_type ON product.I_id_pro = product_type.I_id_pro
            WHERE product_type.I_id_pro IN ($idspsString) AND I_id_type_pro IN ($idtspsString)";
            $result = mysqli_query($this->conn, $sql);
            return $result;
        }
    }
?>