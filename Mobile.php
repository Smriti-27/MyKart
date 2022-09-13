<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <title>Mobile</title>
        <style>
            .box{
                box-shadow: 0 4px 8px 0 dimgrey;
                width: 300px;
                margin: 5px;
                text-align: center;
                font-family: fantasy;
                color:#3133f4;
                height: 350px;
            }                
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <?php include 'Header.php'; ?>
            <?php
                $con=mysqli_connect('localhost','root','');
                mysqli_select_db($con,"shopping");
                $result= mysqli_query($con,"select * from product_master where P_type='Mobile'");
                if(mysqli_num_rows($result)>0)
                {
                    $x=0;
                    while($row= mysqli_fetch_array($result))
                    {
                        if($x==0)
                        {
                            echo "<div class='row'>";
                        }
                        echo "<div class='col-sm-3'>";
                        echo"<div class='box'>";
                            echo "<div class='row'><div class='col-sm-12'><a href='mobiledesc.php?pid=$row[0]'><img src='$row[4]'></a></div></div>";
                            echo "<div class='row'><div class='col-sm-12'>$row[1]</div></div>";
                            echo "<div class='row'><div class='col-sm-12'>Price:$row[2]</div></div>";
                        echo" </div>";
                            echo "</div>";
                        $x++;
                        if($x==4)
                        {
                            echo "</div>";
                            $x=0;
                        } 
                    }
                    
                }
                else
                {
                    echo 'No Product Available';
                }
                mysqli_close($con);
            ?>
            <?php include 'Footer.php'; ?>
        </div>
        
    </body>
</html>

