<?php

include('connection/connect.php');

$queueid = $_GET["carid"];


	$sql = "CALL `deleteCar`('$queueid')";
	$result = mysqli_query($connect, $sql);

	if($result == TRUE){
				echo '<script language="javascript">';
				echo 'window.location.href="car.php";';
				echo '</script>';
			}else{
				echo '<script language="javascript">';
				echo 'alert("Delete fail.");';
				echo 'window.location.href="car.php";';
				echo '</script>';
			}

			mysqli_close($connect);

?>