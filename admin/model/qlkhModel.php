<?php
    class QlkhModel{
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
            $sql = "SELECT * FROM users WHERE I_id_user=$id_sua";
            $result = mysqli_query($this->conn, $sql);
            return $result;
        }

        public function updateData($name, $phone, $email, $address, $birth, $type, $id_sua){
            $sql = "UPDATE users SET T_name='$name', T_number_phone='$phone', T_email='$email', T_address='$address', D_day_of_birth='$birth', B_type='$type'
                    WHERE I_id_user=$id_sua";
            $result = mysqli_query($this->conn, $sql);
            return $result;
        }

        public function deleteData($id_xoa){
            $sql = "DELETE FROM users WHERE I_id_user=$id_xoa";
            $result = mysqli_query($this->conn, $sql);
            return $result;
        }
    }
?>