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
            $data = $value ?? "-";
            return $data;   
        }
        
        public static function Profile($key) {
            $sql = self::$db->query("select * from me");
            return self::isNull($sql->fetchObject()->$key);
        }

        public static function getTable($table) {
            $sql = self::$db->query("select * from $table");
            return $sql->fetchAll(PDO::FETCH_OBJ);
        }
    }
?>