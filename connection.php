<?php
//start connection

$connect = mysqli_connect('localhost','root','','supermarket');
if(!$connect)
	die("Database connection Error".mysqli_connect_error());
 ?>