<?php 
include('connection/connect.php');
date_default_timezone_set('Asia/Kuala_Lumpur');
$time = date("H:i:s");

if(isset($_POST['submit'])){
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$role = $_POST['role'];
	$id = $_POST['staff_id'];
// echo $phone;
// echo $address;
// echo $id;
	// if($status=="Completed"){
	if(strlen($phone) == '10' || strlen($phone) == '11'){	
	$sql = "CALL `updateStaff`('$id', '$phone', '$address', '$role')";
	$result=mysqli_query($connect, $sql);
		if($result == TRUE){
	 	echo '<script language="javascript">';
	 	echo 'alert("Staff profile updated.");';
	 	echo 'window.location.href="staff.php";';
	 	echo '</script>';
			
	}else{
		echo '<script language="javascript">';
	 	echo 'alert("Fail to update.");';
		echo 'window.location.href="staff.php";';
		echo '</script>';
	 }
		
	}else{
	 	echo '<script language="javascript">';
	 	echo 'alert("Fail to update.");';
		echo 'window.location.href="staff.php";';
		echo '</script>';
	 		}





	// $sql = "UPDATE `queue` SET `status` = '$status' WHERE `queue`.`queue_id` = '$queueid'";
	// $result = mysqli_query($connect, $sql);

	// if($result == TRUE){
	// 			echo '<script language="javascript">';
	// 			echo 'window.location.href="index.php";';
	// 			echo '</script>';
	// 		}else{
	// 			echo '<script language="javascript">';
	// 			echo 'alert("delete Fail");';
	// 			echo 'window.location.href="../admin/assign.php";';
	// 			echo '</script>';
	// 		}
	// 	}

	 		mysqli_close($connect);
	 	}
		
?>
