<?php
session_start();
include('dbcon.php');

if(isset($_POST['delete_student']))
{
    $student_id = $_POST['delete_student'];

    try {

        $query = "DELETE FROM students WHERE id=? LIMIT 1";
        $statement = $conn->prepare($query);
        $statement->bindParam(1, $student_id, PDO::PARAM_INT);
        $query_execute = $statement->execute();

        if($query_execute)
        {
            $_SESSION['message'] = "Deleted Successfully";
            header('Location: index.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Deleted";
            header('Location: index.php');
            exit(0);
        }

    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}

?>
