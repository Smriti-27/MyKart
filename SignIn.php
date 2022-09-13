<?php
session_start();
    $msg="";
    if(isset($_POST['s4']))
    {
        $username=$_POST['s1'];
        $password=$_POST['s2'];
        include 'dbconnect.php';
        $con= mysqli_connect(Host,Username,Password);
        mysqli_select_db($con, Dbname);
        $qry="select * from user_master where Email='$username' and Password='$password'";
        $resultset= mysqli_query($con, $qry);
        $row= mysqli_fetch_array($resultset);
        if(mysqli_num_rows($resultset)>0)
        {
            if(isset($_POST['s3']))
            {
                setcookie("username",$username,time()+60*60*24);
                setcookie("password",$password,time()+60*60*24);
            }
            $_SESSION['User_Email']=$username;
            $_SESSION['name']=$row[0];
            header("Location:Home.php");
        }
        else
        {
            $msg="LogIn Unsuccessfull :(";
        }
        
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
        <title>Sign In</title>
        <style>
            .up{
                margin-top:7px;
            }
            .side{
                padding-top: 15px;
            }
        </style>
        <script>
            function ValidateForm()
            {
                temp=true;
                s1=document.getElementById("r1").value;
                if(s1=="")
                {
                    temp=false;
                    document.getElementById("r1").style="border-color:red";
                }
                else
                {
                    document.getElementById("r1").style="";
                }
                s1=document.getElementById("r2").value;
                if(s1=="")
                {
                    temp=false;
                    document.getElementById("r2").style="border-color:red";
                }
                else
                {
                    document.getElementById("r2").style="";
                }
                return temp;
            }
        </script>
    </head>
    <body>
       <div class="container-fluid">
           <?php include 'Header.php'; ?>
           <div class="row">
               <div class="col-sm-12" style="text-align:center; font-size:30px; font-weight:bold; margin-top:50px">
                   Sign In Form
               </div>
           </div>
           <div class="row">
               <div class="col-sm-4">  
               </div>
               <div class="col-sm-4" style="background-color:#97d3f9; margin-bottom:140px;margin-top: 20px; border-radius:10px">
                   <form method="post" onsubmit="return ValidateForm()" class="form-horizontal">
                       <div class="form-group">
                           <div class="col-sm-5">
                               <label class="side">UserName</label>
                           </div>
                           <div class="col-sm-7">
                               <input type="text" class="form-control up" id="r1" name="s1" value="<?php if(isset($_COOKIE['username'])) echo $_COOKIE['username']; ?>"/>
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-sm-5">
                               <label class="side">Password</label>
                           </div>
                           <div class="col-sm-7">
                               <input type="password" class="form-control up" id="r2" name="s2" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>"/>
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-sm-12">
                               <input type="checkbox" class="up" name="s3" value=""/> Remember Me!!
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-sm-12">
                               <input type="submit" class="form-control up" style="background-color:#6293f9; border-radius:10px" name="s4" value="SignIn"/>
                           </div>
                       </div>
                       <div class="form-group">
                            <div class="col-sm-12" style="text-align: center; font-size: 20px; font-weight:bold"> 
                                <?php
                                    echo $msg;
                                ?>
                            </div>
                        </div>
                   </form>
               </div>
               <div class="col-sm-4">   
               </div>
           </div>
           <?php include 'Footer.php'; ?>
       </div>
       
    </body>
</html>
