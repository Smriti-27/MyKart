<?php
session_start(); 
?>
<?php
    $msg1="";
    if(isset($_POST['a5']))
    {
        include 'dbconnect.php';
        $con= mysqli_connect(Host,Username,Password);
        mysqli_select_db($con, Dbname);
        $name=$_POST['a1'];
        $emailId=$_POST['a2'];
        $phone=$_POST['a3'];
        $message=$_POST['a4'];
        $qry="insert into Query values('$name','$emailId','$phone','$message')";
        mysqli_query($con, $qry);
        if(mysqli_affected_rows($con)>0)
        {
            $msg1="Query Successfully submitted!!";
        }
        else
        {
            $msg1="Unable to Submit your Query";
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

        <title>Contact Us</title>
        <style>
            .align
            {
                padding-top: 15px;
                font-size:18px;
            }
            .controls
            {
                padding-left:10px;
                padding-top: 15px;
            }
            .contact
            {
                margin-top:10px;
                margin-right:7px;
            }
        </style>
    </head>
    <body>
        
        <div class="container-fluid">
            <?php include 'Header.php'; ?>
            <div class="row">
                <div class="col-sm-12" style="text-align:center; font-size:30px; font-weight:bold">
                    Contact Us
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-12" style="color:#b41746 ;font-family:Constantia; font-size:40px">
                            E-kart
                        </div>
                    </div>
                    <div class="row">
                        <div class='col-sm-12' style="height:30px ;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 align" style="padding-right:30px">
                            <b>Address: </b>E-kart Internet Private Limited, Buildings Alyssa, Begonia and Clove Embassy Tech Village, Outer Ring Road, Devarabeesanahalli Village, Bengaluru 560103, Karnataka, India
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 align">
                            <b> PhoneNo.</b>- 99337261863
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 align">
                            <b>Email at</b>: ekart@gmail.com
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-12" style="padding-top:10px; font-family:Constantia; font-size:35px; color:#3133f4">
                            Query Form
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <form method="post" class="form-horizontal" style="background-color:#47d7e5; border-radius:10px">
                                <div class="form-group">
                                    <div class="col-sm-5">
                                        <label class="controls">Name</label>
                                    </div> 
                                     <div class="col-sm-7">
                                         <input type="text" class="form-control contact" name="a1" value=""/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-5 ">
                                        <label class="controls">Email ID</label>
                                    </div> 
                                     <div class="col-sm-7">
                                         <input type="email" class="form-control contact" name="a2" value=""/>
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-5 ">
                                        <label class="controls">Phone No</label>
                                    </div> 
                                     <div class="col-sm-7">
                                         <input type="number" class="form-control contact" name="a3" value=""/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-5 ">
                                        <label class="controls">Message</label>
                                    </div> 
                                     <div class="col-sm-7">
                                         <textarea row="7" class="form-control contact" col="50" name="a4"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="submit" name="a5" class="btn btn-primary btn-block" style="margin-top: 15px" value="Send Query"/>
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12" style="text-align: center; font-size: 20px; font-weight:bold"> 
                                        <?php
                                        echo $msg1;
                                        ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'Footer.php'; ?> 
        </div>
          
       
    </body>
</html>
