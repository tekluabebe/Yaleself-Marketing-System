<?php session_start(); 
require_once('connection.php'); 
if(!isset($_SESSION['username'])){
    header("location:loginfirst.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <div class="container">
        <nav>
            <div class="nav-container">
                <div class="ico">
                        <!-- <i class="fa-solid fa-cart-shopping"></i> -->
                       <img src="icon/cart.svg" alt=""height = "20px" width="20px" >
                 </div>
                 <div class="logo">
                    <p>YSMS</p> 
                </div>
                <div class="nav">
                <form action="home.php" method="POST">
                    <input type="submit" name="home" value="HOME" style="background-color: red;color:#fFFF; font-weight:bold; border-style:none; width:5rem;height:1.5rem;border-radius:.5rem; cursor:pointer;margin-top:.7rem;"> 
                    <?php
                        if(isset($_SESSION['previlege'])){
                            if($_SESSION['previlege']=='admin'){
                                echo "<input type='submit' name='addproduct' value='ADD PRODUCT' style='background-color: red;color:#fFFF; font-weight:bold; border-style:none; width:7rem;height:1.5rem;border-radius:.5rem; cursor:pointer;margin-top:.7rem;'>";
                                echo "<input type='submit' name='addemployee' value='ADD EMPLOYEE' style='background-color: red;color:#fFFF; font-weight:bold; border-style:none; width:7rem;height:1.5rem;border-radius:.5rem; cursor:pointer;margin-top:.7rem;'>";

                            }
                            if($_SESSION['previlege']=='customer'){
                                echo "<input type='submit' name='order' value='ORDER' style='background-color: red;color:#fFFF; font-weight:bold; border-style:none; width:5rem;height:1.5rem;border-radius:.5rem; cursor:pointer;margin-top:.7rem;'>";
                            }else
                            if($_SESSION['previlege']=='employee'){
                                echo "<input type='submit' name='orderlist' value='ORDER LIST' style='background-color: red;color:#fFFF; font-weight:bold; border-style:none; width:5rem;height:1.5rem;border-radius:.5rem; cursor:pointer;margin-top:.7rem;'>";
                            }
                        }
                    ?>
                    <input type="submit" name="about" value="ABOUT US" style="background-color: red;color:#fFFF; font-weight:bold; border-style:none; width:5rem;height:1.5rem;border-radius:.5rem; cursor:pointer;margin-top:.7rem;"> 
                    <input type="submit" name="account" value="ACCOUNT" style="background-color: red;color:#fFFF; font-weight:bold; border-style:none; width:5rem;height:1.5rem;border-radius:.5rem; cursor:pointer;margin-top:.7rem;"> 
                    <input type="submit" name="logout" value="LOGOUT" style="background-color: red;color:#fFFF; font-weight:bold; border-style:none; width:5rem;height:1.5rem;border-radius:.5rem; cursor:pointer;margin-top:.7rem;"> 
                </form>
                </div>
            </div>
            </nav>
            
            <?php
                            if(isset($_POST['home'])){
                                header("location: home.php");
                            }
                            if(isset($_POST['about'])){
                                header("location: about.php");
                            }
                            if(isset($_POST['account'])){
                                header("location: account.php");
                            }
                            if(isset($_POST['order'])){
                                header("location:orderproduct.php");
                            }
                            if(isset($_POST['orderlist'])){
                                header("location:orderlist.php");
                            }
                            if(isset($_POST['addemployee'])){
                                header("location:addemployee.php");
                            }
                            if(isset($_POST['addproduct'])){
                                header("location:addproduct.php");
                            }
                            if(isset($_POST['logout'])){
                                session_destroy();
                                header("location:login.php");
                            }

                        ?>
       <header>
            <div class="welcome">
                <h1>Welcome to yaleself supermarket management system</h1>
                <img src=download.jpg alt="">
            </div>
        </header>
        <footer>
            copyright 2021
        </footer>
    </div>
</body>
</html>