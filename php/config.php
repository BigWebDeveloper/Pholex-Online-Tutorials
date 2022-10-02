<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pholexLogin";
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if(!$link){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>