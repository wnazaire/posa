<?php
    require_once "./php/db_connect.php";
    require_once "./php/functions.php";

    $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname); 
    if ($connection->connect_error) die($connection->connect_error);

    if(isset($_POST["den_id"])){
        $id = $_POST["den_id"];
        $sql = "UPDATE Appointments SET approval='n' WHERE id='$id'";
        $result = mysql_query($qry);
    }
    $db->close();
?>