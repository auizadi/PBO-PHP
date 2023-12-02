<?php

class StudentController
{
    private $conn;

    public function __construct()
    {
        // Membuat objek koneksi
        $db = new DatabaseConnection();
        $this->conn = $db->getConnection();
    }

    public function create($inputData)
    {
        // Melindungi dari serangan SQL Injection dengan menggunakan parameter terikat
        $fullname = $this->conn->real_escape_string($inputData['fullname']);
        $email = $this->conn->real_escape_string($inputData['email']);
        $phone = $this->conn->real_escape_string($inputData['phone']);
        $course = $this->conn->real_escape_string($inputData['course']);

        // Pernyataan SQL menggunakan parameter terikat
        $studentQuery = "INSERT INTO students (fullname, email, phone, course) VALUES (?, ?, ?, ?)";
        
        // Menyiapkan pernyataan SQL
        $stmt = $this->conn->prepare($studentQuery);
        
        // Memasukkan nilai parameter
        $stmt->bind_param("ssss", $fullname, $email, $phone, $course);

        // Menjalankan pernyataan SQL
        $result = $stmt->execute();

        // Menutup pernyataan
        $stmt->close();

        return $result;
    }
}

?>
