<?php include('server.php');
if(isset($_SESSION['username'])){
    header("location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>login</title>
   
</head>
<body>
<div class="container">
<header>
    <h2>Welcome to Yaleself Supermarket Management System</h2>
    <p>Enter username and password to login.</p>
</header>
<div class="form">

    <form action="login.php" id="loginForm" method="POST" >
        <?php include('error.php'); ?>
   
        
        <input type="text" id="userfield" placeholder="username" name="username" required>  
        
        <input type="password" id="passfield" placeholder="password" name ="password" required><br>
        
        <input type="submit"  value="submit" id = "submit" name="log_in">

    </form> 
</div>

<div class="signup">
    <p id="info">Don't you have an account yet? Register <a href="register.php">here</a></p>
    <p style="text-align:center;">Forget your password? <a href="forgetpass.php">Recover</a></p>
</div>
</div>

<footer>
    <p>Copyright reserved © 2021</p>
</footer>

<script src="login.js"></script>
</body>
</html>