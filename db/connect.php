<?php 

    $mysql_server_name='localhost'; 
    $mysql_username='steelcase'; 
    $mysql_password='steelcase';
    $mysql_database='steelcase';
  
    
    
    $conn = mysqli_connect($mysql_server_name, $mysql_username, $mysql_password,$mysql_database);
    mysqli_query($conn,"SET NAMES 'utf8mb4'");

?>