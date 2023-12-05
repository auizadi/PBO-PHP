<?php
session_start();
include('dbcon.php');

if(isset($_POST['update_student']))
{
    $student_id = $_POST['student_id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    try {

        $query = "UPDATE students SET fullname=:fullname, email=:emailid, phone=:phoneno, course=:course WHERE id=:stud_id LIMIT 1";
        $statement = $conn->prepare($query);
        $statement->bindParam(':fullname', $fullname);
        $statement->bindParam(':emailid', $email);
        $statement->bindParam(':phoneno', $phone);
        $statement->bindParam(':course', $course);
        $statement->bindParam(':stud_id', $student_id, PDO::PARAM_INT);
        $query_execute = $statement->execute();

        if($query_execute)
        {
            $_SESSION['message'] = "Updated Successfully";
            header('Location: index.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Updated";
            header('Location: index.php');
            exit(0);
        }

    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}

?>
