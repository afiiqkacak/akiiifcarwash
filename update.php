<?php 
include('connection/connect.php');
date_default_timezone_set('Asia/Kuala_Lumpur');
$time = date("H:i:s");

if(isset($_POST['status'])){
	$queueid = $_POST['queueid'];
	$status = $_POST['status'];

	if($status=="Completed"){
		
		$sql = "UPDATE `queue` SET `status` = '$status', completed_time= '$time' WHERE `queue`.`queue_id` = '$queueid'";
		mysqli_query($connect, $sql);
		// echo "<audio src='bell.mp3' autoplay></audio>";
		echo '<script language="javascript">';
		echo 'window.location.href="index.php";';
		echo '</script>';



	}elseif($status=="In Progress"){


	$sql = "UPDATE `queue` SET `status` = '$status', arrival_time = '$time' WHERE `queue`.`queue_id` = '$queueid'";
	$result = mysqli_query($connect, $sql);
	echo '<script language="javascript">';
	echo 'window.location.href="index.php";';
	echo '</script>';

	}else{

	$sql = "UPDATE `queue` SET `status` = '$status' WHERE `queue`.`queue_id` = '$queueid'";
	$result = mysqli_query($connect, $sql);
	echo '<script language="javascript">';
	echo 'window.location.href="index.php";';
	echo '</script>';
		}

			mysqli_close($connect);
		}
?>
