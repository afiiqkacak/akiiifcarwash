<?php
date_default_timezone_set('Asia/Kuala_Lumpur');
include('connection/connect.php');
$sql3 = "SELECT *, TIME_FORMAT(completed_time, '%H:%i') AS masa FROM queue WHERE status='Completed' ORDER BY queue_id DESC LIMIT 1;";
$result2 = mysqli_query($connect, $sql3);
if (mysqli_num_rows($result2)) {
	while($row2 = mysqli_fetch_array($result2)) {

	$masa=$row2['masa'];

	$time=date("H:i");

		if ($masa == $time){
				echo "<audio src='bell.mp3' autoplay hidden></audio>";
		}else{
		}
}

	
}
?>