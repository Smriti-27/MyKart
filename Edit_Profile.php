<?php
$msg="";
session_start();
$email=$_SESSION['User_Email'];
include 'dbconnect.php';
$con= mysqli_connect(Host,Username,Password);
mysqli_select_db($con, Dbname);
$qry="select * from user_master where Email='$email'";
$resultset=mysqli_query($con, $qry);
$row= mysqli_fetch_array($resultset);
if(isset($_POST['n10']))
{
    $uname=$_POST['n1'];
    $pwd=$_POST['n3'];
    $gender=$_POST['n5'];
    $phno=$_POST['n6'];
    $address=$_POST['n7'];
    $country=$_POST['n8'];
    if($_POST['n9']!=null)
    {
        if($_FILES['n9']['error']==0)
        {
            $source=$_FILES['n9']['tmp_name'];
            $destination=$_SERVER['DOCUMENT_ROOT']."/ShoppingWebsite/images/".$_FILES['n9']['name'];
            if(move_uploaded_file($source, $destination))
                $pic="Picture Uploaded Successfully";
            else
                $pic= 'Error in uploading picture';
        }
        else
        {
            $pic='File is corrupted';
        }
    $image='images/'.$_FILES['n9']['name'];
    $qry1="update user_master set name='$uname',password='$pwd',Gender='$gender',PhoneNo='$phno',Address='$address',Country='$country',Picture='$image' where Email='$email'";
    }
    else
    {
        $qry1="update user_master set name='$uname',password='$pwd',Gender='$gender',PhoneNo='$phno',Address='$address',Country='$country' where Email='$email'";
    }
    mysqli_query($con, $qry1);
    if(mysqli_affected_rows($con)>0)
    {
        $msg="Profile Updated!!!";
    }
 else {
        $msg="Error in Updation of Profile!!"; 
    }
    mysqli_close($con);   
    
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <style>
            .adjust{
                padding-left:10px;
                padding-top: 15px;
            }
            .shape{
                margin-top:7px;
                margin-right:20px;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <?php include 'Header.php'; ?>  
            <div class="row">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-6">
                    <h2 style="text-align:center;font-weight: bold">Edit Profile </h2>
                    <form method="Post" enctype="multipart/form-data" class="form-horizontal" style="border-style:bold; background-color:#97d3f9; border-radius:7px">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="adjust">Name</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control shape" name="n1" value="<?php echo $row[0];?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="adjust">Email ID</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="email" class="form-control shape" name="n2" value="<?php echo $row[1];?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="adjust">Password</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control shape" name="n3" value="<?php echo $row[2];?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="adjust">Gender</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="radio" name="n5" style="margin-top:15px" value="Male"/>Male <input type="radio" style="margin-top:15px" name="n5" value="Female"/>Female
                                <b><font color="red">Selected: <?php echo $row[3];?></font></b>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="adjust">Phone No.</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="number" class="form-control shape" name="n6" value="<?php echo $row[4];?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="adjust">Address</label>
                            </div>
                            <div class="col-sm-6">
                                <textarea rows="4" class="form-control shape" cols="50" name="n7"><?php echo $row[5]; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="adjust">Country Name</label>
                            </div>
                            <div class="col-sm-6">
                                <select name="n8" style="margin-top:15px">
                                    <option>Select Country</option>
                                    <option>India</option>
                                    <option>USA</option>
                                    <option>Canada</option>
                                    <option>Japan</option>
                                    <option>Nepal</option>
                                    <option>France</option>
                                    <option>Australia</option>
                                </select>
                                <b><font color="red">Selected: <?php echo $row[6];?></font></b>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="adjust">Upload Picture</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="file" style="margin-top:15px" name="n9"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-primary btn-block" name="n10" value="Edit"/>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-3">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4" style="font-weight:bold;font-size:20px;color:#03b1fc;padding-left:100px">
                    <?php echo $msg; ?>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
             <?php include 'Footer.php'; ?>
        </div>
    </body>
</html>
