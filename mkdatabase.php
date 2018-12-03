<?php
$server = "localhost";
$user	= "root";
$pass	= "";

$conn = new mysqli($server, $user, $pass);
	
if ($conn->connect_error){
	die("Geen verbinding: " . $conn->connect_error);
}

$mkdata = "CREATE DATABASE blog";
if ($conn->query($mkdata) === TRUE){
	echo "Database is aangemaakt";	
}
else{
	echo "Database Error: " . $conn->error;
	}

$conn->close();
?>