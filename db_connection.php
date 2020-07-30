<?php
$host = 'localhost';  
$user = 'root';  
$pass = '';  
$dbname = 'test'; 
$conn = mysqli_connect($host, $user, $pass,$dbname) ;

if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }  
?>