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
        
        header("Location: http://lamp.cse.fau.edu/~wnazaire2013/kopje/success.php");
    }
?>