<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/code/manage.css">
        <link rel="stylesheet" href="css/code/banner.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <title>Manage Room</title>
    </head>
    <body>
        <nav class="row fix-top">
            <div class="col-md-2 icon-bg">
                <img src="Picture/icon.png" alt="logo" width="100px" height="100px" style="padding: 0 auto; position: center; display: block; margin: auto;">
            </div>
            <div id="top" class="col-md-10 banner">
                <p class="banner">@ADMIN</p>
                <div class="row">
                    <div class="col-md-4 space-bottom"><a href="main_admin.php">Main Menu</a></div>
                    <div class="col-md-4 space-bottom"><a href="manage.php">Manage Room</a></div>
                    <div class="col-md-4 space-bottom"><a href="contact_us.php">Contact Us</a></div>
                </div>
            </div>
        </nav>
        <?php
            $roomid = $_GET['Room'];

            $host = "localhost";
            $user = "root";
            $pass = "";
            $dbname = "myDorm";

            $mysqli = new mysqli($host,$user,$pass,$dbname);

            $sql = "SELECT `billIDPresent`, `billIDLast`, `price` FROM `room` WHERE roomID = $roomid";
            $result =  $mysqli->query($sql);

            while ($w = mysqli_fetch_array($result)){
                $billPresent = $w[0];
                $billLast = $w[1];
                $roomPrice = $w[2];
            }
            $room = $roomid[1].$roomid[2].$roomid[3];
            mysqli_close($mysqli);
        ?>
        <main role="main">
            <div class="row">
                <div class="container">
                    <h1 class="top_name" style="float: right;">Room <?php echo $room ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="container information">
                    <h1 style="margin-top:10px">Room Receipt</h1>
                    <p>This month</p>
                    <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>Description</p>
                            <p><i>Monthly Rate</i></p>
                            <p><i>Electric Service Rate</i></p>
                            <p><i>Water Service Rate</i></p>
                        </div>
                        <div class="col-sm-2">
                            <p>Quantity</p>
                            <input style="width:100%; margin-bottom:10px; border-radius:5px;" type="number" name="quantity" value="1" disabled>
                            <input style="width:100%; margin-bottom:10px; border-radius:5px;" type="number" name="quantity" min="0" placeholder="0">
                            <input style="width:100%; margin-bottom:10px; border-radius:5px;" type="number" name="quantity" min="0" placeholder="0">
                        </div>
                        <div class="col-sm-2">
                            <p>Price</p>
                            <input style="width:100%; margin-bottom:10px; border-radius:5px;" type="number" name="rate" value="<?php echo $roomPrice?>" disabled>
                            <input style="width:100%; margin-bottom:10px; border-radius:5px;" type="number" name="rate" min="0" value="8" disabled>
                            <input style="width:100%; margin-bottom:10px; border-radius:5px;" type="number" name="rate" min="0" value="18" disabled>
                            <a href="#link">edit?</a>
                        </div>
                        <div class="col-sm-2">
                            <p>Total</p>
                            <p id="price1"></p>
                            <p id="price2"></p>
                            <p id="price3"></p>
                            <p id="total"></p>
                            <script>
                                document.getElementById("price1").innerHTML = document.getElementsByName("rate")[0].value*document.getElementsByName("quantity")[0].value;
                                document.getElementById("price2").innerHTML = document.getElementsByName("rate")[1].value*document.getElementsByName("quantity")[1].value;
                                document.getElementById("price3").innerHTML = document.getElementsByName("rate")[2].value*document.getElementsByName("quantity")[2].value;
                                document.getElementById("total").innerHTML = 
                                (document.getElementsByName("rate")[0].value*document.getElementsByName("quantity")[0].value)+
                                (document.getElementsByName("rate")[1].value*document.getElementsByName("quantity")[1].value)+
                                (document.getElementsByName("rate")[2].value*document.getElementsByName("quantity")[2].value);
                            </script>
                        </div>
                    </div>
                    <button class="btn btn-primary" style="margin-bottom:1rem; width: 20%;" type="submit">Submit</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="container information">
                    <h1>Profile</h1>
                    <p>name, nickname, personal ID, Birth Day, Address and Picture from database</p>
                </div>
            </div>
        </main>
    </body>
</html>