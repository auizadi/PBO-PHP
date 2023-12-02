<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'adminpanel');

class DatabaseConnection
{
    private $conn;

    public function __construct()
    {
        // Membuat koneksi ke database
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        // Memeriksa apakah koneksi berhasil atau tidak
        if ($this->conn->connect_error) {
            die("<h1>Database Connection Failed</h1>");
        }

        // Jika ingin memberikan pesan konfirmasi bahwa koneksi berhasil, gunakan baris berikut
        // echo "Database Connected Successfully";
    }

    // Getter untuk mendapatkan objek koneksi
    public function getConnection()
    {
        return $this->conn;
    }
}

?>
