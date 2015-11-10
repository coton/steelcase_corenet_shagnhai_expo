<?php 

    $mysql_server_name='localhost'; 
    $mysql_username='steelcasecorenet'; 
    $mysql_password='steelcasecorenet';
    $mysql_database='steelcasecorenet';
  
    $conn = mysqli_connect($mysql_server_name, $mysql_username, $mysql_password,$mysql_database);
    if($conn)
    	mysqli_query($conn,"SET NAMES 'utf8'");

?>