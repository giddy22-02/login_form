<?php
$hostname = "localhost";
$username ="root";
$password ="";
$database ="system_db";

//Connection to the database
$conn = mysqli_connect($hostname, $username, $password, $database)or die("Database Connection Failed");

?>