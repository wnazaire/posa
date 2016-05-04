<?php
    require_once "./php/db_connect.php";
    require_once "./php/functions.php";

    session_start();
    
    if(isset($_POST['title']) && isset($_POST['text']))
    {    
            $name = $_SESSION['user'];
            $title = sanitizeString($db, $_POST['title']);
            $text = sanitizeString($db, $_POST['text']);
            $filter = $_POST['tempFilter'];

            $time = $_SERVER['REQUEST_TIME'];
            $temp = $time . $_SESSION['user'];
            $file_name =  hash('ripemd128', "$temp"). '.jpg';

            if ($_FILES)
            {
                $tmp_name = $_FILES['upload']['name'];
                $dstFolder = 'quarantine';
                move_uploaded_file($_FILES['upload']['tmp_name'], $dstFolder . DIRECTORY_SEPARATOR . $file_name);
            }

            SavePostToDB($db, $name, $title, $text, $time, $file_name, $filter);
                                                            //Redirect to prevent form resubmission
            header("Location: http://lamp.cse.fau.edu/~wnazaire2013/fp/rd.php");
    }
    

    if (isset($_SESSION['user']))                           //Check to see if the user has logged in
    {
        $name = $_SESSION['name'];
        $user = $_SESSION['user'];
        $priv = queryMySQL("SELECT privilege FROM USERS_K WHERE username='$user'")->fetch_assoc()['privilege'];
        echo <<<_END
        <!DOCTYPE html>
        <html lang="en">

        <head>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">

            <title>Appointments</title>

            <!-- Bootstrap Core CSS -->
            <link href="css/bootstrap.min.css" rel="stylesheet">

            <!-- Custom CSS -->
            <link href="css/1-col-portfolio.css" rel="stylesheet">

            <!-- Tweaks -->
            <link href="css/wall.css" rel="stylesheet">
            <link href="css/signin.css" rel="stylesheet">

            <!-- Favicon -->
            <link rel="icon" type="image/png" href="../favicon-k-32x32.png" sizes="32x32" />
            <link rel="icon" type="image/png" href="../favicon-k-16x16.png" sizes="16x16" />
            
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->

        </head>
        <body>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <p class="navbar-brand">$name</p>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="dne.php">Products</a>
                        </li>
                        <li>
                            <a href="appt.php">Appointments</a>
                        </li>
                        <li>
                            <a  href="dne.php">Shopping Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i> </a>
                        </li>
                        <li></li>
                        <li>
                            <a href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Content -->
        <div class="container" id="top">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Appointments</h1>
                </div>
            </div>
            <div class="container" id="content">
            <ul class="list-inline">
                        <li>
                            <a id="adda" class="btn btn-primary btn-sm" role="button">Add an appointment</a>
                        </li>
_END;
        if ($priv == 1)
        {
            echo '<li>
                     <a id="viewmy" class="btn btn-primary btn-sm" role="button">View my appointments</a>
                 </li>';
        }

        if ($priv > 1)
        {
            echo '<li>
                    <a id="viewall" class="btn btn-primary btn-sm" role="button">View all appointments</a>
                 </li>';
            echo '<li> <a id="accept" class="btn btn-primary btn-sm" role="button">Unaccepted appointments</a> </li>';
        }
        
        echo <<<_END
            </ul>
            
           <p>Please note that all appointments will take place in our store location<p>
           <p class="text-center"><b>Store location:</b> 123 Rainbow Road, Boca Raton, FL 33428</p>
           <section id="contact" class="map">
                <iframe width="100%" height="350px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3575.822084585666!2d-80.21654704931937!3d26.332259983299544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d91bbcb42de16f%3A0xee0d415ca5e6cd73!2sRainbow+Rd%2C+Boca+Raton%2C+FL+33428!5e0!3m2!1sen!2sus!4v1462281402046"></iframe>
                <br />
                <small>
                    <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3575.822084585666!2d-80.21654704931937!3d26.332259983299544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d91bbcb42de16f%3A0xee0d415ca5e6cd73!2sRainbow+Rd%2C+Boca+Raton%2C+FL+33428!5e0!3m2!1sen!2sus!4v1462281402046"></a>
                </small>
           </section>
           <div style="display: none" id="add_form">
                <h3>Add an appointment</h3>
                <hr>
                <form id="add_appt" action='new.php' method='POST'>
                  <fieldset class="form-group">
                    <label for="device">Device Name</label>
                    <input type="text" class="form-control" id="device" name="device" placeholder="Example: Toshiba Satellite L645 Laptop" autofocus>
                  </fieldset>

                  <fieldset class="form-group">
                    <label for="date">Date</label>
                    <input type="text" class="form-control" id="date" name="date" placeholder="Example: 05/04/2016">
                  </fieldset>
                  
                  <fieldset class="form-group">
                    <label for="time">Time</label>
                    <input type="text" class="form-control" id="time" name="time" placeholder="Example: 4:00 pm">
                  </fieldset>

                 <fieldset class="form-group">
                    <label for="reason">What is the reason for your appointment?</label>
                    <textarea class="form-control" id="reason" name="reason" rows="3"></textarea>
                  </fieldset>
                    <br>
                    <input id="appt_button" class="btn btn-primary btn-sm" type="button" value="Submit">
                </form>
           </div>
           <div style="display: none" id="viewall_appt">
                <h3>All appointments</h3>
                <hr>
_END;
           $result = queryMySQL("SELECT * FROM Appointments");
            while($row = mysqli_fetch_array($result))
               {
                   $cust_id = $row['cust_id'];
                    $customer = queryMySQL("SELECT name FROM USERS_K WHERE id = '$cust_id'");
                    $id = $row['id'];
                    $time = strtotime($row['appt_time']);
                    $made = strtotime($row['made']);

                    echo "<p><b>ID: </b>" . $id . "</p>";
                    echo "<p><b>Customer: </b>" . $customer->fetch_assoc()['name'] . "</p>";
                    echo "<p><b>Device: </b>" . $row['device'] . "</p>";
                    echo "<p><b>Reason: </b>" . $row['reason'] . "</p>";
                    echo "<p><b>Date: </b>" . date_format(date_create($row['appt_date']), "F d, Y") . "</p>";            
                    echo "<p><b>Time: </b>" . date_format(date_create("@$time"), "g:i a") . "</p>";

                    if ($row['approval'] == "p")
                        echo "<p><b>Status: </b>Pending approval </p>";
                    else if ($row['approval'] == "a")
                        echo "<p><b>Status: </b>Approved </p>";
                    else if ($row['approval'] == "n")
                        echo "<p><b>Status: </b>Not approved </p>";

                    echo "<p><b>Date Created: </b>" . date_format(date_create("@$made"), "F d, Y g:i:s") . "</p><hr>";
               }
           
           echo <<<_END
           </div>
           <div style="display: none" id="view_appt">
                <h3>My appointments</h3>
                <hr>
_END;
        $customerid = queryMySQL("SELECT id FROM USERS_K WHERE username='$user'")->fetch_assoc()['id'];
        $result2 = queryMySQL("SELECT * FROM Appointments WHERE cust_id = '$customerid'");
        if($result2->num_rows === 0)
        {
            echo 'You have no scheduled appointments!';
        }
        else
        {
            while($row = mysqli_fetch_array($result2))
            {
                    echo "<p><b>Device: </b>" . $row['device'] . "</p>";
                    echo "<p><b>Reason: </b>" . $row['reason'] . "</p>";
                    echo "<p><b>Date: </b>" . date_format(date_create($row['appt_date']), "F d, Y") . "</p>";            
                    echo "<p><b>Time: </b>" . date_format(date_create("@$time"), "g:i a") . "</p>";

                    if ($row['approval'] == "p")
                        echo "<p><b>Status: </b>Pending approval </p>";
                    else if ($row['approval'] == "a")
                        echo "<p><b>Status: </b>Approved </p>";
                    else if ($row['approval'] == "n")
                        echo "<p><b>Status: </b>Not approved </p>";
                    echo "<p><b>Date Created: </b>" . date_format(date_create("@$made"), "F d, Y g:i:s") . "</p><hr>";
            }
        }
        echo <<<_END
           </div>
           <div style="display: none" id="accept_appt">
                <h3>Accept appointments</h3>
                <hr>
_END;
            $appr = "p";
            $result = queryMySQL("SELECT * FROM Appointments WHERE approval = '$appr'");
                    
            while($row = mysqli_fetch_array($result))
            {
                $cust_id = $row['cust_id'];
                $customer = queryMySQL("SELECT name FROM USERS_K WHERE id = '$cust_id'");
                $id = $row['id'];
                $time = strtotime($row['appt_time']);
                $made = strtotime($row['made']);
                
                echo "<p><b>ID: </b>" . $id . "</p>";
                echo "<p><b>Customer: </b>" . $customer->fetch_assoc()['name'] . "</p>";
                echo "<p><b>Device: </b>" . $row['device'] . "</p>";
                echo "<p><b>Reason: </b>" . $row['reason'] . "</p>";
                echo "<p><b>Date: </b>" . date_format(date_create($row['appt_date']), "F d, Y") . "</p>";            
                echo "<p><b>Time: </b>" . date_format(date_create("@$time"), "g:i a") . "</p>";
                
                if ($row['approval'] == "p")
                    echo "<p><b>Status: </b>Pending approval </p>";
                else if ($row['approval'] == "a")
                    echo "<p><b>Status: </b>Approved </p>";
                else if ($row['approval'] == "n")
                    echo "<p><b>Status: </b>Not approved </p>";
                
                echo "<p><b>Date Created: </b>" . date_format(date_create("@$made"), "F d, Y g:i:s") . "</p>";
                echo <<<_END
                <form action='accept.php' method='POST'"> <input type='hidden' name='tempId' value="$id"/> <input type="submit" id="accept2" value="Accept" class="btn btn-success btn-sm"/> </form>
                <form action='deny.php' method='POST'"> <input type='hidden' name='tempId' value="$id"/> <input type="submit" id="deny2" value="Deny" class="btn btn-danger btn-sm"/> </form> <hr>
_END;
            }
        echo "</div>";
        
        
        echo <<<_END
        </div>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p><a href="http://startbootstrap.com/template-overviews/1-col-portfolio/">Template</a> from Start Bootstrap</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

        </div>
        <!-- /.container -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <script src="functions.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
    </html>
_END;
    }
    else                                                    //Otherwise tell them to login properly
    {
        echo <<<_END
        <!DOCTYPE html>\n<html><head> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>The Wall</title>
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <link href="./css/signin.css" rel="stylesheet">
        <div class="container">
        <form class="form-signin" method='post' action='index.php'>
        <h2 class="form-signin-heading">Access denied</h2>
        Please <a href='./index.php'>log in</a> or <a href='./signup.php'>sign up</a> if you don't have an account.
_END;
    }
    $db->close(); 
?>