<?php

include('connection/connect.php');

$queueid = $_GET["staffid"];


	$sql = "CALL `deleteStaff`('$queueid')";
	$result = mysqli_query($connect, $sql);

	if($result == TRUE){
				echo '<script language="javascript">';
				echo 'window.location.href="staff.php";';
				echo '</script>';
			}else{
				echo '<script language="javascript">';
				echo 'alert("Delete fail.");';
				echo 'window.location.href="staff.php";';
				echo '</script>';
			}

			mysqli_close($connect);

?>