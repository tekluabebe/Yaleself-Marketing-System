<?php include('server.php') ?>
<?php error_reporting (E_ALL ^ E_NOTICE); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <title>signup page</title>
   
</head>

<body>
    <div class="container">
        <header>
            <h3>Welcome to Yaleself supermarket mamagement signup page!</h3>
            <p>Fill the bellow form and click signup.</p>
        </header>
        <form action="register.php"  id="nameForm " name="name" method="POST">
                <?php include('error.php'); ?>    
                <div class="name">
                    <input type="text" placeholder="First Name" name="firstName" required>
                    <input type="text" placeholder="Last Name" name="lastName" required>
                </div>
                <div class="personal">

                    <select name="gender" id="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <div class="dateob">

                        <label for="dob">Date of birth :  </label><input type="date" name="dob" name ="dob" required>
                    </div>
                </div>

                <div class="account user">
                    <div>

                        <input type="text" name="username" placeholder="Username"  required>
                        <input type="email" name="email" placeholder="Email"  required><br>
                    </div>
                    <div>
                        <input type="password" name="password" placeholder="password" required>
                        <input type="password" name="confirmPassword" placeholder="confirm password" required>

                    </div>
                </div>
            <input type="submit" value="submit" id="submit" name="submit" >
            
            </form>
                

        
        
    </div>
    
<script  src="signup.js"></script>
   
</body>
</html>