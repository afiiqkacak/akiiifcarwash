<?php
$servername = "den1.mysql4.gear.host"; 
$username = "akiiifcarwash"; 
$password = "Wm4YBu_6CHr?"; //ikut je
$dbname = "akiiifcarwash"; //nama database


// Create connection
$connect = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$connect) 
	{
		die("Connection failed: " . mysqli_connect_error());
	}
?> 
