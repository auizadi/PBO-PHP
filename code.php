<?php
session_start();

include 'dbconn.php';
include 'StudentController.php';

$db = new DatabaseConnection();

if (isset($_POST['save_student'])) {
    $inputData = [
        'fullname' => mysqli_real_escape_string($db->conn, $_POST['fullname']),
        'email' => mysqli_real_escape_string($db->conn, $_POST['email']),
        'phone' => mysqli_real_escape_string($db->conn, $_POST['phone']),
        'course' => mysqli_real_escape_string($db->conn, $_POST['course']),
    ];

    $student = new StudentController();
    $result = $student->create($inputData);

    if ($result) {
        $_SESSION['message'] = "Student Added Successfully";
    } else {
        $_SESSION['message'] = "Failed to Insert Student";
    }

    // Mengarahkan kembali ke halaman student-add.php setelah penambahan selesai
    header("Location: student-add.php");
    exit();
}
?>
