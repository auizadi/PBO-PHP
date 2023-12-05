<?php
session_start();

include('dbconn.php');
include('StudentController.php');

$db = new DatabaseConnection;

if (isset($_POST['save_student'])) {
    $inputData = [
        'fullname' => mysqli_real_escape_string($db->getConnection(), $_POST['fullname']),
        'email' => mysqli_real_escape_string($db->getConnection(), $_POST['email']),
        'phone' => mysqli_real_escape_string($db->getConnection(), $_POST['phone']),
        'course' => mysqli_real_escape_string($db->getConnection(), $_POST['course']),
    ];

    $student = new StudentController;
    $result = $student->create($inputData);

    if ($result) {
        $_SESSION['message'] = "Student Added Successfully";
    } else {
        $_SESSION['message'] = "Failed to insert student";
    }

    header("Location: student-add.php");
    exit();
}

?>