<?php
session_start(); 
?>
<?php
    $msg="";
    $pic="";
    if(isset($_POST['n10']))
    {
        include 'dbconnect.php';
        $con=mysqli_connect(Host,Username,Password);
        mysqli_select_db($con,Dbname);
        $name=$_POST['n1'];
        $email=$_POST['n2'];
        $password=$_POST['n3'];
        $gender=$_POST['n5'];
        $phone=$_POST['n6'];
        $address=$_POST['n7'];
        $country=$_POST['n8'];
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
        $qry="insert into user_master values('$name','$email','$password','$gender',$phone,'$address','$country','$image')";
        mysqli_query($con, $qry);
        if(mysqli_affected_rows($con)>0)
        {
            $msg="Sign Up Sucessfull!!!!";
        }
        else
        {
            $msg="Sign Up Unsucessfull";
        }
        mysqli_close($con);
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

        <title>SignUp</title>
        <style>
            .adjust{
                padding-left:30px;
                padding-top: 15px;
            }
            .shape{
                margin-top:7px;
            }
        </style>
        <script>
            function ValidateForm()
            {
                temp=true;
                s1=document.getElementById("t1").value;
                if(s1=="")
                {
                    temp=false;
                    document.getElementById("t1").style="border-color:red";
                }
                else
                {
                    document.getElementById("t1").style="";
                }
                s1=document.getElementById("t2").value;
                if(s1=="")
                {
                    temp=false;
                    document.getElementById("t2").style="border-color:red";
                }
                else
                {
                    document.getElementById("t2").style="";
                }
                s1=document.getElementById("t3").value;
                if(s2=="")
                {
                    temp=false;
                    document.getElementById("t3").style="border-color:red";
                }
                else
                {
                    document.getElementById("t3").style="";
                }
                s1=document.getElementById("t4").value;
                if(s3=="")
                {
                    temp=false;
                    document.getElementById("t4").style="border-color:red";
                }
                else
                {
                    document.getElementById("t4").style="";
                }
                a1=document.getElementById("t5").checked;
                a2=document.getElementById("t6").checked
                if(a1==true || a2==true)
                {
                    document.getElementById("d1").innerHTML="";
                }
                else
                {
                    temp=false;
                    document.getElementById("d1").innerHTML="Select Gender First";
                }
                s1=document.getElementById("t7").value;
                if(s1=="")
                {
                    temp=false;
                    document.getElementById("t7").style="border-color:red";
                }
                else
                {
                    document.getElementById("t7").style="";
                }
                s1=document.getElementById("t8").innerHTML;
                if(s1=="")
                {
                    temp=false;
                    document.getElementById("t8").style="border-color:red";
                }
                else
                {
                    document.getElementById("t8").style="";
                }
                s1=document.getElementById("t9").value;
                if(s1=="")
                {
                    temp=false;
                    document.getElementById("t9").style="border-color:red";
                }
                else
                {
                    document.getElementById("t9").style="";
                }
                s1=document.getElementById("t10").value;
                if(s1=="")
                {
                    temp=false;
                    document.getElementById("t10").style="border-color:red";
                }
                else
                {
                    document.getElementById("t10").style="";
                }
                return temp;     
            }
        </script>
    </head>
    <body>
        
        <div class="container-fluid">
            <?php include 'Header.php'; ?>  
            <div class="row">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-6">
                    <h2 style="text-align:center;font-weight: bold"> User Sign Up Form </h2>
                    <form method="Post" onsubmit="return ValidateForm()" enctype="multipart/form-data" class="form-horizontal" style="border-style:bold; background-color:#97d3f9; border-radius:7px">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="adjust">Name</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control shape" id="t1" name="n1" value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="adjust">Email ID</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="email" class="form-control shape" id="t2" name="n2" value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="adjust">Password</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control shape" id="t3" name="n3" value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="adjust">Confirm Password</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control shape" id="t4" name="n4" value=""/>
                                <div id="d2"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="adjust">Gender</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="radio" name="n5" style="margin-top:15px" id="t5" value="Male"/>Male <input type="radio" style="margin-top:15px" id="t6" name="n5" value="Female"/>Female
                                <div id="d1" style="color:red"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="adjust">Phone No.</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="number" class="form-control shape" id="t7" name="n6" value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="adjust">Address</label>
                            </div>
                            <div class="col-sm-6">
                                 <textarea rows="4" class="form-control shape" id="t8" cols="50" name="n7"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="adjust">Country Name</label>
                            </div>
                            <div class="col-sm-6">
                                <select name="n8" id="t9" style="margin-top:15px">
                                    <option>Select Country</option>
                                    <option>India</option>
                                    <option>USA</option>
                                    <option>Canada</option>
                                    <option>Japan</option>
                                    <option>Nepal</option>
                                    <option>France</option>
                                    <option>Australia</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label class="adjust">Upload Picture</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="file" id="t10" style="margin-top:15px" name="n9"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="Submit" class="btn btn-primary btn-block" name="n10" value="Register"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="reset" class="btn btn-danger btn-block" name="n11" value="Reset"/>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-3">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12" style="text-align: center; font-size: 20px; font-weight:bold">
                    <?php
                    echo $pic, "&nbsp";
                    echo $msg;
                    ?>
                </div>
            </div>
             <?php include 'Footer.php'; ?>
        </div>
       
    </body>
</html>
