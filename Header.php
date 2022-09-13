
        <style>
            a{
                color:#0f0f0f;
            }
        </style>
            <div class="row" style="background-color:#44cff1">
                <div class="col-sm-2">
                    <img src="Shopping_Logo.png" width="80px" height="60px" >
                </div>
                <div class="col-sm-9 form-horizontal" >
                    <form method="POST" class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-9">
                            <input type="text" name="r1" class="form-control" value="" style="margin-top:10px; height:35px; border-radius:10px; border-color:#05c2a8;" placeholder="Search for products,brands and more"/>
                        </div>
                        <div class="col-sm-3" style="font-size:18px; padding-top:15px">
                            <?php
                             if(isset($_SESSION['name']))
                                 echo "Welcome, ".$_SESSION['name'];
                             else 
                                 echo "Welcome, Guest";
                            ?>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="col-sm-1">
                    <a href="Cart.php"><img src="Shopping_Cart.png" width="50px" height="40px" style="padding-top:10px;padding-right:10px"><h4 style="font-weight:bold">Cart</h4></a>
                </div>
            </div>
            <div class="row">
                <nav class="navbar navbar-inverse" style="background-color:#5ff4fb; font-family:Constantia; font-size:19px; border-radius:5px; border-color:#17d0dc;color:#0f0f0f ">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-8">
                        <ul class="nav navbar-nav ">
                            <li><a href="Home.php">Home</a></li>
                            <li><a href="laptop.php">Laptop</a>
                            </li>
                            <li><a href="Mobile.php">Mobiles</a>
                            </li>
                            <li><a href="Camera.php">Camera</a>
                            </li>
                            <li><a href="" class="dropdown-toggle" data-toggle="dropdown">Member<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <?php
                                    if(isset($_SESSION['User_Email']))
                                    {
                                        echo"<li><a href='profile.php'>Profile</a></li>";
                                        echo"<li><a href='Edit_Profile.php'>Edit Profile</a></li>";
                                        echo"<li><a href='LogOut.php'>Log Out</a></li>";
                                    }
                                    else
                                    {
                                        echo"<li><a href='SignIn.php'>Sign In</a></li>";
                                        echo"<li><a href='SignUp.php'>Sign Up</a></li>";
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li><a href="ContactUs.php">Contact Us</a></li>
                            <li><a href="FAQ.php">FAQ</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-1">
                    </div>
                </nav>
            </div>
    

