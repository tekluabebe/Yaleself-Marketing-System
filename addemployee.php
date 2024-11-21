<?php session_start(); 
require_once('connection.php'); 
if(!isset($_SESSION['username'])){
    header("location:loginfirst.php");
}
?>
<?php require_once('connection.php')?>
<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add employee</title>
    <link rel="stylesheet" href="css/addemployee.css">
</head>
<body>
    <header>


                <div class="logo">
                    <div class="ico">
                        <!-- <i class="fa-solid fa-cart-shopping"></i> -->
                        <img src="icon/cart.svg" alt=""height = "20px" width="20px">
                    </div>
                    <p>YSMS</p> 
                </div>

                    <h2>Add Employee</h2>
                    
                </header>
                <main>
                    <form action="addemployee.php" method="POST" class="addemp">

                        <input type="submit" name="home" value="HOME" style="background-color: red;color:#fFFF; font-weight:bold; border-style:none; width:5rem;height:1.5rem;border-radius:.5rem; cursor:pointer;margin-top:.7rem;"> 
                    </form>
        <form action="addemployee.php" method="POST" class="form">
            <input type="text" placeholder="First Name" name="firstN" required>
            <input type="text" placeholder="Last Name"name="lastN" required>
            <input type="text" placeholder="username" name="username" required>
            <input type="date"  name="dob">
            <select name="gender" id="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <input type="email" name="email" placeholder="Email"  required><br>
            <input type="password" name="password" placeholder="password"  required><br>

            <input type="submit" value="submit" name="addEmployee" class="submit">

        </form>

    </main>
    <footer>
        <span>
            Copyright Reserved © 2021
        </span> <br>
        <span></span>
        
    </footer>
    <?php 
        if(isset($_POST['home'])){
            header("location:home.php");
        }
        $first_name = mysqli_real_escape_string($connect,$_POST['firstN']);
        $last_name = mysqli_real_escape_string($connect,$_POST['lastN']);
        $gender = mysqli_real_escape_string($connect,$_POST['gender']);
        $dob = mysqli_real_escape_string($connect,$_POST['dob']);
        $username = mysqli_real_escape_string($connect,$_POST['username']);
        $password = mysqli_real_escape_string($connect,$_POST['password']);
        $email = mysqli_real_escape_string($connect,$_POST['email']);
        $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
        
                    $user_check_query = "SELECT * FROM login WHERE username='$username'";
                    $result = mysqli_query($connect, $user_check_query);
                    $user = mysqli_fetch_array($result);

        if(isset($_POST['addEmployee'])){

            if (!preg_match ("/^[a-zA-z]*$/", $first_name) ) {  
                echo "<script>alert('Only alphabets are allowed for names.')</script>";
        }
        elseif (!preg_match ("/^[a-zA-z]*$/", $last_name) ) {  
            echo "<script>alert('Only alphabets are allowed for names.')</script>";
        }elseif (!preg_match ("/^[a-zA-z]*$/", $username) ) {  
            echo "<script>alert('Only alphabets are allowed for username.')</script>";
        }elseif(strlen($password)<8){
            echo "<script>alert('Password must not less than 8 character.')</script>";
        }elseif($user['username'] == $username){
            echo "<script>alert('Account exists with this username!')</script>";}
        else{
            $password = md5($password);
            mysqli_query($connect," INSERT into login values ('$first_name','$last_name','$gender','$dob','$username','$password','$email','employee')  ");
            echo "<script>alert('Successfuly registered')</script>";
        }
    }
        ?>
</body>
</html>