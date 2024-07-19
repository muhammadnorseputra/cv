<?php 
    include_once "koneksi.php";

    class Query extends Database {
        public static $db;

        public function __construct()
        {
            // Membuat instance dari kelas Database dan memanggil metode getConnection
            self::$db = $this->getConnection();
        }

        protected static function isNull($value) {
            $data = $value ?? "Data Tidak Ditemukan";
            return $data;   
        }
        
        public static function Profile() {
            $sql = self::$db->query("select * from me");
            return self::isNull($sql->fetchObject());
        }

        public static function getTable($table) {
            $sql = self::$db->query("select * from $table");
            return $sql->fetchAll(PDO::FETCH_OBJ);
        }
    }
?>