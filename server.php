<?php
session_start();
require_once("connection.php");
$username = "";
$email    = "";
$error = array(); 

// $connect = mysqli_connect('localhost', 'root', '', 'ysms');

// REGISTER USER
if (isset($_POST['submit'])) {





  $firstN = mysqli_real_escape_string($connect,$_POST['firstName']);
  $lastN = mysqli_real_escape_string($connect,$_POST['lastName']);
  $gender = mysqli_real_escape_string($connect,$_POST['gender']);
  $dateob = mysqli_real_escape_string($connect,$_POST['dob']);
  $username = mysqli_real_escape_string($connect, $_POST['username']);
  $email = mysqli_real_escape_string($connect, $_POST['email']);
  $pass = mysqli_real_escape_string($connect, $_POST['password']);
  $confirmPass = mysqli_real_escape_string($connect, $_POST['confirmPassword']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $error array
  if (!preg_match ("/^[a-zA-z]*$/", $firstN) ) {  
    array_push($error, "Only alphabets are allowed for names.");
}
elseif (!preg_match ("/^[a-zA-z]*$/", $lastN) ) {  
  array_push($error, "Only alphabets are allowed for names.");
}
  if (empty($username)) 
  { 
    array_push($error, "Username is required");
   }
  elseif (!preg_match ("/^[a-zA-z]*$/", $username) ) {  
    array_push($error, "Only alphabets are allowed for username.");  
}
  $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
  if (empty($email)) { array_push($error, "Email is required"); }
  else
    if (!preg_match ($pattern, $email) ){  
      array_push($error, "Email is not valid.");  

     }
  if (empty($pass)) { array_push($error, "Password is required"); }
  if(strlen($pass)<8){
    array_push($error, "Password must not less than 8 character.");
    
  }
  if ($pass!= $confirmPass) {
	array_push($error, "<script>alert('The two passwords do not match')</script>");
  }

//already exist?
  $user_check_query = "SELECT * FROM login WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($connect, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($error, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($error, "email already exists");
    }
  }

  //register
  if (count($error) == 0) {
  	$password = md5($pass);

  	$query = "INSERT INTO login 
  			  VALUES('$firstN','$lastN','$gender','$dateob','$username', '$password', '$email','customer')";
  	mysqli_query($connect, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: login.php');
  }
}
// LOGIN USER
if (isset($_POST['log_in'])) {
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $pass = mysqli_real_escape_string($connect, $_POST['password']);
  
    if (empty($username)) {
        array_push($error, "Username is required");
    }
    if (empty($pass)) {
        array_push($error, "Password is required");
    }
  
    if (count($error) == 0) {
        $password = md5($pass);
        $query = "SELECT * FROM login WHERE username='$username' AND password='$password'";
        $results = mysqli_query($connect, $query);

          if (mysqli_num_rows($results)) {
              $row = mysqli_fetch_array($results,MYSQLI_ASSOC);
              $_SESSION['username'] = $username;
              $_SESSION['success'] = "You are now logged in";
              $_SESSION['previlege'] = $row['previlege'];
              header('location: home.php');
              
            
            }else {
              
              array_push($error, "<script> alert('Wrong username/password combination')</script>");
            }

        }
  }
  
  ?>