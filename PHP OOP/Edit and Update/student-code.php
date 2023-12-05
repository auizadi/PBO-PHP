<?php
include('dbconn.php');
include_once('StudentController.php');

if(isset($_POST['update_student']))
{
    $id = mysqli_real_escape_string($db->conn,$_POST['student_id']);
    $inputData = [
        'fullname' => mysqli_real_escape_string($db->conn,$_POST['fullname']),
        'email' => mysqli_real_escape_string($db->conn,$_POST['email']),
        'phone' => mysqli_real_escape_string($db->conn,$_POST['phone']),
        'course' => mysqli_real_escape_string($db->conn,$_POST['course']),
    ];
    $student = new StudentController;
    $result = $student->update($inputData, $id);

    if($result)
    {
        $_SESSION['message'] = "Student Added Successfully";
        header("Location: student-view.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Added";
        header("Location: student-view.php");
        exit(0);
    }
}

?>