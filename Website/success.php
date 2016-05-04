<?php
    echo <<<_END
            <!DOCTYPE html>\n<html>
            <head>
                <title>Success!</title>
                <META http-equiv="refresh" content="3;URL=http://lamp.cse.fau.edu/~wnazaire2013/kopje/appt.php">
                <link href='./css/bootstrap.min.css' rel='stylesheet'>
                <link rel="icon" type="image/png" href="../favicon-k-32x32.png" sizes="32x32" />
                <link rel="icon" type="image/png" href="../favicon-k-16x16.png" sizes="16x16" />
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="icon" type="../image/png" href="favicon-k-32x32.png" sizes="32x32" />
                <link rel="icon" type="../image/png" href="favicon-k-16x16.png" sizes="16x16" />
                <link href="./css/bootstrap.min.css" rel="stylesheet">
                <link href="./css/signin.css" rel="stylesheet">
            </head>
            <div class="container">
            <form class="form-signin" method='post' action='success.php'>
            <h2 class="form-signin-heading">Appointment created!</h2>
            <a href='./appt.php'>Click here</a> to continue if you are not redirected in 3 seconds.
_END;
?>