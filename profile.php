<?php
session_start();
if(!isset($_SESSION['User_Email']))
{
    header("Location:SignIn.php");
}


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <title>Profile</title>
        <style>
            
        </style>
    </head>
    <body>
        
        <div class="container-fluid">
            <?php include 'Header.php'; ?>  
            <div class="row">
                <div class="col-sm-12">
                    <?php
                    $email=$_SESSION['User_Email'];
                    include 'dbconnect.php';
                    $con= mysqli_connect(Host,Username,Password);
                    mysqli_select_db($con, Dbname);
                    $qry="select * from user_master where Email='$email'";
                    $resultset=mysqli_query($con, $qry);
                    $row= mysqli_fetch_array($resultset);
                    echo "<img src='$row[7]' width='200px'/>";
                    echo "<table class=table table-stripped>";
                    echo "<tr><th>Name</th><td>$row[0]</td></tr>";
                    echo "<tr><th>Email Id</th><td>$row[1]</td></tr>";
                    echo "<tr><th>Password</th><td>$row[2]</td></tr>";
                    echo "<tr><th>Gender</th><td>$row[3]</td></tr>";
                    echo "<tr><th>Phone No</th><td>$row[4]</td></tr>";
                    echo "<tr><th>Address</th><td>$row[5]</td></tr>";
                    echo "<tr><th>Country</th><td>$row[6]</td></tr>";
                    echo "</table>";
                    ?>
                </div>
            </div>
        </div>
    </body>
<html>