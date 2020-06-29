<?php
include('connection/connect.php');
date_default_timezone_set('Asia/Kuala_Lumpur');
$checkBox = implode(',', $_POST['service']);
$date = date("Y-m-d");
$time = date("H:i:s");

if(isset($_POST['submit'])){
	$platenum = $_POST['platenum'];
	$checkBox = $_POST['service'];
	// $checkBox = implode(',', $_POST['service']); jangandelete
	$q="SELECT plate_num FROM car WHERE car_id = '$platenum'";
	$r=mysqli_query($connect, $q);
	$rr=mysqli_fetch_row($r);

	$pele=implode("",$rr);
	// echo $pele;

	$sql="INSERT INTO `queue`(`arrival_time`,`date`,`status`,`car_id`) VALUES ('$time','$date','Queuing','$platenum')";
	
		if (mysqli_query($connect, $sql)==TRUE) {

  		$sql2="SELECT MAX(queue_id) FROM `queue`";
		$result= mysqli_query($connect, $sql2);
		$row=mysqli_fetch_row($result);
		$someString=implode("",$row);
	// $someString = $row[0];
// 	 // echo $someString;
// 	 // echo $checkBox;

		// echo $count;
			foreach ($_POST['service'] as $icon) {
			$sql3="INSERT INTO `queue_service`(`queue_id`, `service_id`) VALUES ('$someString','$icon')";
			mysqli_query($connect, $sql3);
			}	





// 	$sql3="INSERT INTO `queue_service`(`queue_id`, `service_id`) VALUES ('$someString','$checkBox')";
// 		if(mysqli_query($connect, $sql3)==TRUE){
		echo '<script language="javascript">';
		echo 'alert("'.$pele.' is now in queue.");';
		echo 'window.location.href="index.php";';
		echo '</script>';
	}


// } else {
//   echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}





mysqli_close($connect);

?>