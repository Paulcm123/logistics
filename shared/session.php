<?php 
session_start();

$conn = mysqli_connect("localhost", "root", "", "logistics");

if ($conn -> connect_error) {
	die("No connection: ". $conn-> connect_error);
}


?>