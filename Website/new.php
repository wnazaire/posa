<?php
    require_once "./php/db_connect.php";
    require_once "./php/functions.php";
    session_start();
if(isset($_POST['device']) && isset($_POST['date']) && isset($_POST['time']) && isset($_POST['reason']))
    {
        $device = sanitizeString($db, $_POST['device']);
        $date = sanitizeString($db, $_POST['date']);
        $time = sanitizeString($db, $_POST['time']);
        $reason = sanitizeString($db, $_POST['reason']);
        
        $user = $_SESSION['user'];
        $id = queryMySQL("SELECT id FROM USERS_K WHERE username='$user'")->fetch_assoc()['id'];
        
        SaveApptToDB($db, $id, $device, $date, $time, $reason);
        
        /*$query = "INSERT INTO Appointments VALUES(null, null, default, $id, $device, $reason, '$date', '$time')";
        queryMySQL($query);
        if(!$result = $_db->query($query))
        {
            die('There was an error running the query [' . $_db->error . ']');
        }*/
    }
?>