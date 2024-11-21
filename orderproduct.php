<?php session_start(); 
require_once('connection.php'); 
// include('ajaxdata.php');
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
    <link rel="stylesheet" href="css/orderproduct.css">
    <title>Order Products</title>
</head>
<body>

    <div class="container">
        <nav>
            <div class="nav-container">

                <div class="logo">
                    <div class="ico">
                        <img src="icon/cart.svg" alt=""height = "20px" width="20px">
                    </div>
                    <p>YSMS</p> 
                </div>
                <div class="nav">
                <form action="home.php" method="POST" class="navigate">
                    <input type="submit" name="home" value="HOME" style="background-color: red;color:#fFFF; font-weight:bold; border-style:none; width:5rem;height:1.5rem;border-radius:.5rem; cursor:pointer;margin-top:.7rem;"> 
                    <?php
                        if(isset($_SESSION['previlege'])){  
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
                            if(isset($_POST['logout'])){
                                session_destroy();
                                header("location:login.php");
                            }

                        ?>
                </div>
            </div>
            </nav>

                <form action="orderproduct.php" method="post">

                    <h2>Order here</h2>

                        <select name="product-type" id="protype" required>
                            <option value=selecttype>select product type</option>
                            <option value="electronics">electronics</option>
                            <option value="food">food</option>
                            <option value="stationary">stationary</option>
                            <option value="cloth">cloth</option>
                        </select><br>
                        <button name="viewpro">view</button>
                    <select name="pros" id="pros" >
                        <option value=selectproduct>select product</option>
                        <?php
    if(isset($_POST['viewpro'])){
    $type = $_POST['product-type'];
                                
    $query = "SELECT product_name from product where type = '$type'";
    $result = mysqli_query($connect,$query);
    while($results = mysqli_fetch_array($result))
            echo "<option value='".$results['product_name']."'>".$results['product_name']."</option>";
    }


?>
                    </select><br>
                    <?php

                        if(isset($_POST['viewprice'])){
                        $prod = $_POST['pros'];
                        $query = "SELECT * from product where product_name = '$prod'";
                        $result = mysqli_query($connect,$query);
                        while($results = mysqli_fetch_array($result)){

                            $price = $results['price'];
                            echo "<span>Each price : {$results['price']}<br>Amount left : {$results['quantity']}<br></span>";}
                        }
                    ?>
                    <span>Enter amount</span> <input type="number" name="amount" ><br>

                    <select name="employee" id="employees">
                    <?php 
                                echo "<option value='selectemployee'>select employee</option><br>";

                                $query = "SELECT * from login where previlege = 'employee'";
                                $result = mysqli_query($connect,$query);
                                
                                while($results = mysqli_fetch_array($result)){
                                    echo "<option value='{$results['username']}'>".$results['username']."</option><br>";
                                }
                            

                        ?>


                        </select><br>

                        <!-- <i class="fa-solid fa-cart-shopping"></i> -->
                    
                    <input type="submit" value="order" name = "orderbtn" class="order">
                    
                    <?php
                        if(isset($_POST['orderbtn'])){
                                $prod = $_POST['pros'];

                                $query = "SELECT * from product where product_name = '{$prod}'";
                                $result = mysqli_query($connect,$query);
                                $results = mysqli_fetch_array($result);
                                if($_POST['amount']>$results['quantity']){
                                    echo "<script>alert('Insufficient Amount!')</script>";
                                }else{

                                    $price =$results['price']*$_POST['amount'];
                                    $quantity = $results['quantity'] - $_POST['amount'];
                                $query = "INSERT into orders (employee_username,customer_username,product,quantity,price) values ('{$_POST['employee']}','{$_SESSION['username']}','{$_POST['pros']}',{$_POST['amount']},$price)";
                                $update = "UPDATE product set quantity = {$quantity} where  product_name = '{$prod}'";
                                mysqli_query($connect,$update);
                                if(mysqli_query($connect,$query)){
                                    echo "<script>alert('Successfully orderd!')</script>";
                                }
                                }
                        }                            
            ?>
                </form>
                        <?php
                        $a=4;
                        $b=4;
                        echo  $a<=>$b;
                        ?>

            </div>
            
</body>
</html>