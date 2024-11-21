<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/forgetpass.css">
    <title>Recover password</title>
</head>
<body>
    <div class="container">
        <div class="text">
            <h2>Recover your account</h2>
        </div>
            <form action="forgetpass.php" method="POST">

                <input type="email" name = "recover-email" placeholder = "Email Address" class="in" required>
                <input type="submit" name = "recover" class="btn" value="Recover">
            </form>
<?php
            include("connection.php");

            $email = $_POST['recover-email'];
            // $email = "admin@gmail.com";
            
            $query = "SELECT * from login where email = '$email'";
            $result = mysqli_query($connect,$query);
            $results = mysqli_fetch_array($result);
            if(isset($_POST['recover']) && $results){
                
                if(mail($email,'ysms password recover',$result['password'])){

                    echo "<script>alert('password has sent to your email.')</script>";
                    header("location:login.php");
                }else{
                    echo "<script>alert('error has occured')</script>";

                }
            }
            elseif(isset($_POST['recover-email'])){
                echo "<script>alert('there is no account with this email')</script>";
                
            }

?>
    </div>

</body>
</html>