<?php 

	require_once 'db/connect.php';

	$name= $_POST['name'];
	$company= $_POST['company'];
	$phone= $_POST['phone'];
	$email= $_POST['email'];
	$area= $_POST['area'];
	$product= $_POST['product'];

	$query = "INSERT INTO user (name, company, phone, email, area, product) 
				VALUES('中文','$_POST[company]','$_POST[phone]','$_POST[email]','$_POST[area]','$_POST[product]')";

	$result = mysqli_query($conn , $query) or die("Error in query: $query. ".mysql_error());  
	mysqli_close($conn); 
?>﻿