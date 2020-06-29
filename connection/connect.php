<?php
$servername = "localhost"; //ikut je
$username = "root"; //ikut je
$password = ""; //ikut je
$dbname = "carwash"; //nama database


// Create connection
$connect = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$connect) 
	{
		die("Connection failed: " . mysqli_connect_error());
	}
?> 