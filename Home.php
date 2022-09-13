<?php
session_start(); 
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <title>Home</title>
        <script>
            arr=new Array("images/slider1.jpg","images/slider2.png","images/slide3.jpg","images/slider4.jpg"."images/slider5.jpg");
            i=0;
            function ChangeImage()
            {
                if(i<5)
                {
                    document.images[2].src=arr[i];
                    i++;
                }
                else
                {
                    i=0;
                }
            }
            function start()
            {
               setInterval(ChangeImage,5000);
            }
        </script>
    </head>
    <body onload="start()">
        <?php include 'Header.php'; ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <img src="images/slider1.jpg" width='100%' height="500px"/>
                </div>
            </div>
        </div>
        <?php include 'Footer.php'; ?>
    </body>
</html>
