<?php 

	require_once '../db/connect.php';

	// ip address
	function get_ipaddress()
	{
		if (!empty($_SERVER["HTTP_CLIENT_IP"])){
		    $ip = $_SERVER["HTTP_CLIENT_IP"];
		}elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
		    $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		}else{
		    $ip = $_SERVER["REMOTE_ADDR"];
		}

		return $ip;
	}

	// params
	$ip    = get_ipaddress();
	$type  = $_POST['type'];
	$url   = $_POST['url'];
	date_default_timezone_set(PRC);
	$odate = date("Y-m-d H:i",time());

	if ($conn)
	{
		// insert to database
		$query = "INSERT INTO tracking (ip, type, url, odate) VALUES('$ip','$type','$url','$odate')";
		mysqli_query($conn , $query) or die("Error in query: $query. ".mysql_error());  
	}else
	{
		echo 'database is disconnect!';
	}

	mysqli_close($conn);
?>﻿