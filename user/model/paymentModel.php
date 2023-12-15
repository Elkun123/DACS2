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

        public function selectInfoPro($idsps,$idtsps,$counts){
            $idspsString = implode(",", $idsps);
            $idtspsString = implode(",", $idtsps);

            $sql = "SELECT * FROM product 
            JOIN product_type ON product.I_id_pro = product_type.I_id_pro
            WHERE product_type.I_id_pro IN ($idspsString) AND I_id_type_pro IN ($idtspsString)";
            $result = mysqli_query($this->conn, $sql);
            return $result;
        }

        public function insertOrder($iduser,$orderCode,$name,$numberPhone,
        $address,$email,$orderDate,$ship,$payment){
            $sql="INSERT INTO orders (I_id_user, T_code_orders, T_name_user, T_number_phone, T_address, T_email,
            T_order_date, T_method_ship, T_method_payment, I_status) 
            VALUES ($iduser, '$orderCode', '$name', '$numberPhone', '$address', '$email', '$orderDate',
            '$ship', '$payment', 0)";
            $result = mysqli_query($this->conn,$sql);
            return $this->conn->insert_id;
        }

        public function insertOrderDetail($resultOrder,$idtsps,$idsps,$counts){
            $idtspString = implode(',',$idtsps);
            $prices = [];
            $sql = "SELECT I_price FROM product_type WHERE I_id_type_pro IN ($idtspString)";
            $result = mysqli_query($this->conn,$sql);
            while($row=mysqli_fetch_assoc($result)){
                $prices[] = $row['I_price'];
            }

            $check = true;
            $sqlInsert = "INSERT INTO order_detail (I_id_orders, I_id_type_pro, I_id_pro, I_qty, I_price) VALUES";
            for ($i = 0; $i < count($idtsps); $i++) {
                $sqlInsert .= "($resultOrder, $idsps[$i], $idtsps[$i], $counts[$i], $prices[$i])";
                $resultInsert = mysqli_query($this->conn,$sqlInsert);
                if(!$resultInsert){
                    $check = flase;
                }
            }
            return $check;
        }
    }
?>