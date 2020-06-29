<?php

include('connection/connect.php');

$queueid = $_GET["customerid"];


	$sql = "CALL `deleteCustomer`('$queueid')";
	$result = mysqli_query($connect, $sql);

	if($result == TRUE){
				echo '<script language="javascript">';
				echo 'window.location.href="customer.php";';
				echo '</script>';
			}else{
				echo '<script language="javascript">';
				echo 'alert("Delete fail.");';
				echo 'window.location.href="customer.php";';
				echo '</script>';
			}

			mysqli_close($connect);

?>