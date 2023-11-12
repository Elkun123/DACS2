<?php
    include_once('../model/qlkhModel.php');

    class QlkhController{
        private $qlkh;

        public function __construct($conn) {
            $this->qlkh = new QlkhModel($conn);
        }

        public function showData($name_table){
            return $this->qlkh->selectData($name_table);
        }

        public function insert($name_table, $data) {
            return $this->qlkh->insertData($name_table, $data);
        }

        public function delete($name_table, $condition)
        {
            return $this->qlkh->deleteData($name_table, $condition);
        }
    }
?>