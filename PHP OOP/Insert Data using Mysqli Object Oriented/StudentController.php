<?php

class StudentController
{
    private $conn;
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->getConnection();
    }

    public function create($inputData)
    {
        $fullname = $inputData['fullname'];
        $email = $inputData['email'];
        $phone = $inputData['phone'];
        $course = $inputData['course'];

        $studentQuery = "INSERT INTO students (fullname,email,phone,course) VALUES ('$fullname','$email','$phone','$course')";
        $result = $this->conn->query($studentQuery);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}