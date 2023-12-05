<?php
session_start();
include('dbcon.php');

if(isset($_POST['save_student']))
{
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    try {

        $query = "INSERT INTO students (fullname, email, phone, course) VALUES (?, ?, ?, ?)";
        $statement = $conn->prepare($query);
        $statement->bindParam(1, $fullname);
        $statement->bindParam(2, $email);
        $statement->bindParam(3, $phone);
        $statement->bindParam(4, $course);
        $query_execute = $statement->execute();

        if($query_execute)
        {
            $_SESSION['message'] = "Added Successfully";
            header('Location: index.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Added";
            header('Location: index.php');
            exit(0);
        }

    } catch (PDOException $e) {

        echo "My Error Type:". $e->getMessage();
    }
}

?>