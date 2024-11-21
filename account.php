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
    <link rel="stylesheet" href="css/account.css">
    <title>accounts</title>
</head>
<body>
<nav>
            <div class="nav-container">

                <div class="logo">
                    <div class="ico">
                        <!-- <i class="fa-solid fa-cart-shopping"></i> -->
                        <img src="icon/cart.svg" alt=""height = "20px" width="20px">
                    </div>
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


            <div class="details">
                     <?php
                     $query = "SELECT * from login where username = '{$_SESSION['username']}'";
                     $result = mysqli_query($connect,$query);
                     $result = mysqli_fetch_array($result);
                     echo ("<span>Name : {$result['firstN']}"."   {$result['lastN']}</span><br>");
                     echo ("<span>Gender : {$result['gender']}</span><br>");
                     echo ("<span>Username : {$result['username']}</span><br>");
                     echo ("<span>Email : {$result['email']}</span><br>");
                     echo ("<form action='account.php' method='POST' class='form'>
                     <input type='password' name='pass' placeholder='change password'><br>
                     <input type='password' name='confirmpass' placeholder='confirm password'><br>
                     <input type='submit' name='change' value='change password'><br>
                 </form>");
                     if(isset($_POST['change'])){
                         $pass = $_POST['pass'];
                        $confirmPass = $_POST['confirmpass'];
                         if(strlen($pass)<8){
                             echo("<script> alert('Password must not less than 8 character.') </script>");
                         }elseif($pass!= $confirmPass){
                             echo("<script> alert('The two passwords do not match!') </script>");

                         }
                         else{
                             $password = md5($pass);
                             $q = "UPDATE table login set password = '$pass' where username = '{$_SESSION['username']}'";
                             mysqli_query($connect,$q);
                             echo("<script> alert('Password changed successfully!') </script>");

                         }
                     }
                     
                ?>
            </div>
</body>
</html>