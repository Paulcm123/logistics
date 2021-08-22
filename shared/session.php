<?php 
session_start();

$conn = mysqli_connect("localhost", "logistics", "Logistics@1", "logistics");

if ($conn -> connect_error) {
	die("No connection: ". $conn-> connect_error);
}


?>