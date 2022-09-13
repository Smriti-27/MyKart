<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
        <title></title>
        <style>
        .box{
                box-shadow: 0 4px 8px 0 dimgrey;
                width: 300px;
                margin: 5px;
                height: 250px;
            } 
            .text{
                font-size:20px;
                font-weight: bold;
                color:black;
                font-family:Constantia;
            }
            .sub{
                font-size:19px;
                color: royalblue;
                font-family:Constantia;
            }
        </style>
    </head>
    <body>
        
        <div class="container-fluid">
            <?php include 'Header.php'; ?>
        <?php
        $pid=$_GET['pid'];
        include 'dbconnect.php';
        $con= mysqli_connect(Host,Username,Password);
        mysqli_select_db($con,Dbname);
        $result=mysqli_query($con, "select * from product_master where P_id=$pid");
        $result1= mysqli_query($con,"select * from laptop_spc where P_id=$pid");
        if(mysqli_num_rows($result)>0)
        {
            $row=mysqli_fetch_array($result);
            $row2= mysqli_fetch_array($result1);
            echo "<div class='row'>";
            echo "<div class='col-sm-3 box'><img src='$row[4]'></div>";
            echo "<div class='col-sm-8 text'><div class='row'><div class='col-sm-12 '>Product Name: $row[1]</div></div><div class='row'><div class='col-sm-12'>Description:</div></div><div class='row'><div class='col-sm-12'>Processor Brand: $row2[1]</div></div><div class='row'><div class='col-sm-12'>Processor Name: $row2[2]</div></div><div class='row'><div class='col-sm-12'>Brand: $row2[3]</div></div><div class='row'><div class='col-sm-12'>Price: $row[2]</div></div><div class='row' style='margin-top:10px'><div class='col-sm-3'><a href='Cartlouge.php?id=$pid&page=laptopdesc'><input type='Submit' name='n1' style='background-color:#c6d636' value='Add TO Cart'/ ></a></div><div class='col-sm-3'><a href='BuyNow.php'><input type='Submit' name='n2' style='background-color:#f0a23c' value='BUY NOW'/></a></div><div class='col-sm-6'></div></div> </div>";
            echo "</div>";
            echo "<div class='row'>";
            echo "<div class='col-sm-12'>";
            echo "<div class='row'><div class='col-sm-12' style='font-size:25px; font-weight:bold; color:black; font-family:Constantia;'>Specification</div></div>";
            echo "<div class='sub'>";
            echo "<div class='row'><div class='col-sm-12'>Processor Generation: $row2[4]</div></div>";
            echo "<div class='row'><div class='col-sm-12'>SSD: $row2[5]</div></div>";
            echo "<div class='row'><div class='col-sm-12'>HDD: $row2[6]</div></div>";
            echo "<div class='row'><div class='col-sm-12'>RAM: $row2[7]</div></div>";
            echo "<div class='row'><div class='col-sm-12'>Graphics Processor: $row2[8]</div></div>";
            echo "<div class='row'><div class='col-sm-12'>Operating System Architecture: $row2[9]</div></div>";
            echo "<div class='row'><div class='col-sm-12'>Operating System: $row2[10]</div></div>";
            echo "<div class='row'><div class='col-sm-12'>Touch: $row2[11]</div></div>";
            echo "<div class='row'><div class='col-sm-12'>Screen Size: $row2[12]</div></div>";
            echo "<div class='row'><div class='col-sm-12'>Warranty: $row2[13]</div></div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            
            
        }
        mysqli_close($con);
        ?>
            <?php include 'Footer.php'; ?>
        </div>
    </body>
</html>
