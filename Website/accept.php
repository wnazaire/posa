<?php
    require_once "./php/db_connect.php";
    require_once "./php/functions.php";

    $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname); 
    if ($connection->connect_error) die($connection->connect_error);

    if(isset($_POST["tempId"])){
        $id = $_POST["tempId"];
        $sql = "UPDATE Appointments SET approval='a' WHERE id='$id'";
        if ($connection->query($sql) === TRUE){
            echo "Appointment accepted";
        }else {
            echo "Error" . $connection->error;
        }
        header("Location: http://lamp.cse.fau.edu/~wnazaire2013/kopje/appt.php");
    }
    $db->close();
?>