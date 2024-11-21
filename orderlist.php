<?php session_start(); 
require_once('connection.php'); 
if(!isset($_SESSION['username'])){
    header("location:loginfirst.php");
}
?>
<?php error_reporting (E_ALL ^ E_NOTICE); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/orderlist.css">
    <title>order list</title>
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
<form action="orderlist.php" method="POST" class="list">
    <table>
            <tr>
                <td>ID</td>
                <td>customer-username</td>
                <td>product</td>
                <td>quantity</td>
                <td>price</td>
                <td>payed</td>

            </tr>
            <?php

    $qu = "SELECT * from orders where employee_username = '{$_SESSION['username']}'";
                $result = mysqli_query($connect,$qu);
                // $results = mysqli_fetch_array($result);
            // for($i = 0;$i<mysqli_num_rows($result);$i++){
            while($results = mysqli_fetch_array($result)){
                echo "<tr>
                <td>{$results['id']}</td>
                <td>{$results['customer_username']}</td>
                <td>{$results['product']}</td>
                <td>{$results['quantity']}</td>
                <td>{$results['price']}</td>
                <td><input type='submit' value='payed' name'{$results['id']}'></td>
            </tr>";
            }
            ?>

</table>

</form>
<?php
                $query = "SELECT * from orders where employee_username = '{$_SESSION['username']}'";
                $result = mysqli_query($connect,$query);
                $results = mysqli_fetch_array($result);
                
            for($i = 0;$i<mysqli_num_rows($result);$i++){
                if(isset($results['id'])){
                    $qu = "DELETE from orders where id = '{$results['id']}'";
                    mysqli_query($connect,$qu);

                }
            }
?>
</body>
</html>