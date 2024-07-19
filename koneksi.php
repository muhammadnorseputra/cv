<?php
class Database {
    // Properti untuk menyimpan detail koneksi
    private $host = "localhost"; // Host database
    private $db_name = "cv_rasidah"; // Nama database
    private $username = "root"; // Username database
    private $password = ""; // Password database
    public $conn;

    // Metode untuk mendapatkan koneksi ke database
    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Koneksi error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}


?>