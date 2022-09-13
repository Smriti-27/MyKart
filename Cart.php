<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start(); 
if(!isset($_SESSION['User_Email']))
{
    header("Location:SignIn.php");
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid">
        <?php
            if(isset($_COOKIE['cart']))
            {
                $x=$_COOKIE['cart'];
                include 'dbconnect.php';
                $con= mysqli_connect(Host,Username,Password);
                mysqli_select_db($con, Dbname);
                $qry="select * from product_master where p_id=$x[1]";
                $result=mysqli_query($con,$qry);
                $sum=0;
                echo "<table class='table table-stripped'>";
                echo "<tr>";
                echo "<tr>";
                echo "<th>";
                echo "Product Image";
                echo "</th>";
                echo "<th>";
                echo "Product Name";
                echo "</th>";
                echo "<th>";
                echo "Product Price";
                echo "</th>";
                echo "</tr>";
                while($row= mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    echo "<td><img src='$row[4]' width='50' height='50'/></td>";
                    echo "<td>$row[1]</td>";
                    echo "<td>$row[2]</td>";
                    echo "<td><a href='deleteproduct.php?$row[0]'>Delete</a></td>";
                    echo "</tr>";
                    $sum=$sum+row[2];
                }
                echo "</table>";
                echo "<h3 class='text-right'>Total Price= $sum</h3>";
                
            }
            else
            {
                echo "Cart is Empty!!";
            }
            
       
            
        ?>
            <div>
                <a href='BuyNow.php?$sum'><input type="submit" name='s1' style='margin-left:1200px' value="Buy Now" /></a>
            </div>
            
        </div>
    </body>
</html>
