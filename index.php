<!DOCTYPE html>
<html lang="en">
<?php
$session_lifetime = 3600 * 24 * 2; // 2 days
session_set_cookie_params ($session_lifetime);
session_start();
	
	if(isset($_SESSION["staff_id"])){
			$user = $_SESSION["staff_id"];
	}else{
		header('Location: loginpage.php');
	}
	 include('connection/connect.php');
?>
  <head>
<!--   	<meta http-equiv="refresh" content="5"/> -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AKIF CARWASH</title>
    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" href="akif.png" type="image/gif">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<style>
	.foo {
  float: left;
  width: 100px;
  height: 55px;
  margin: 5px;
  border: 2px solid rgba(0, 0, 0, .2);
}
.queue {
  background: #f2dede;
}
.blue {
  background: rgba(0, 0, 0, 0.075);
}
.completed {
  background: #fcf8e3;
}
.collected {
  background: #dff0d8;
}
</style>
  </head>
  <body>
    <div class="container-fluid">
	<div class="row" style="background-image: linear-gradient(to bottom right, #4fdce0,#9ad5fc );">
		<div class="col-md-12">
			<div class="page-header" align="center">
				<br>
				<img align="center" src="akif.png" height="50" width="150"/>
				<h1>
					<small>CAR 'Q'</small>
				</h1>
<?php
date_default_timezone_set('Asia/Kuala_Lumpur');
$datenow = date("l, d F Y");
$timenow = date("g:i a", time());
?>
<h4>
<?php echo $datenow ?>
<?php echo "\n" ?>
<?php echo $timenow;
$tar= date("Y-m-d");?>
</h4>
			</div>
			
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a class="nav-link" href="dashboard.php"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="index.php"><i class="fa fa-hand-paper-o" aria-hidden="true"></i> Queue</a>
				</li>
				
				<li class="nav-item">
					<a class="nav-link" href="customer.php"><i class="fa fa-id-card-o" aria-hidden="true"></i> Customer</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="car.php"><i class="fa fa-car" aria-hidden="true"></i> Car</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="services.php"><i class="fa fa-wrench" aria-hidden="true"></i> Service</a>
				</li>
				<li class="nav-item dropdown ml-md-auto">
					 <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown"><i class="fa fa-user-circle" aria-hidden="true"></i> <?php echo $_SESSION ['name']; ?></a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
						<?php
						if ($_SESSION ['role']=="Admin"){
							?>
						 <a class="dropdown-item" href="staff.php"><i class="fa fa-user-o" aria-hidden="true"></i> Staff</a> 
						 <?php
						}else{
							?>
						<a class="dropdown-item" href="profile.php"><i class="fa fa-user-o" aria-hidden="true"></i> Profile</a>
						<?php
						}
						?>
						<a class="dropdown-item" href="password.php"><i class="fa fa-key" aria-hidden="true"></i> Change Password</a>
						<?php
						if ($_SESSION ['question']==NULL){
						?>
						<a class="dropdown-item" href="question.php"><i class="fa fa-lock" aria-hidden="true"></i> Security Question</a>
						<?php
					}
					?>
						<div class="dropdown-divider">
						</div> <a class="dropdown-item" href="logout.php" onClick="return confirm('Are you sure?')"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-4">
			<form action="" method="post" role="form">
				<div class="form-group">
					 
					<label for="platenum">
						Plate Number: <span style="color:red;">*</span>
					</label>
					<!-- <input type="text" class="form-control" name="platenum"> -->
					 <select class="form-control" data-live-search="true" name="platenum" required>
					 	<option></option>
					 	<?php
					 $sql2="SELECT * FROM car WHERE car_id NOT IN (SELECT car.car_id
FROM `car` INNER JOIN queue 
WHERE car.car_id=queue.car_id AND date='$tar')";
					 $result2 = mysqli_query($connect, $sql2);
					if (mysqli_num_rows($result2)) 
					{
						while($row2 = mysqli_fetch_array($result2)) 
						{					
					 ?>
    <option value="<?php echo $row2['car_id'];?>"><?php echo $row2['plate_num'];?></option>
<?php
		}
	
	}
?>
					 	
					 	</select>
				</div>
				<!-- <div class="form-group">
					 
					<label for="exampleInputPassword1">
						Password
					</label>
					<input type="password" class="form-control" id="exampleInputPassword1">
				</div>
				<div class="form-group">
					 
					<label for="exampleInputFile">
						File input
					</label>
					<input type="file" class="form-control-file" id="exampleInputFile">
					<p class="help-block">
						Example block-level help text here.
					</p>
				</div> -->
				<div class="checkbox">
				<label for="service">Select Service(s): <span style="color:red;">*</span></label>
  <select class="form-control" multiple data-live-search="true" name="service[]" required>
     <?php
					 $sql="select * from service ORDER BY type ASC, service_id";
					 $result = mysqli_query($connect, $sql);
					if (mysqli_num_rows($result)) 
					{
						while($row = mysqli_fetch_array($result)) 
						{					
					 ?>
    <option value="<?php echo $row['service_id'];?>"><?php echo $row['service_type'];?> (<?php echo $row['type'];?>)</option>
<?php
		}
	
	}
	else
	{
		echo "0 result";
	}
 
 
// mysqli_close($connect);
?>
  </select><br><br>
  
				
					
				</div> 
				<button type="submit" name="submit" class="btn btn-info">Insert <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
				</button>
				
			</form>
			<br>
			<p>Legend:</p>
<div class="foo queue"><p style="text-align:center;">Queuing<br/>
<?php
$que="SELECT COUNT(queue.status) AS status 
FROM car INNER JOIN queue 
WHERE car.car_id=queue.car_id AND queue.status='Queuing' AND queue.date LIKE '$tar' ORDER BY status DESC, queue_id ASC";
$rque=mysqli_query($connect,$que);
$row=mysqli_fetch_row($rque);
$someString=implode("",$row);
echo $someString;
?></p></div>
<div class="foo blue"><p style="text-align:center;">In Progress<br/>
<?php
$que="SELECT COUNT(queue.status) AS status 
FROM car INNER JOIN queue 
WHERE car.car_id=queue.car_id AND queue.status='In Progress' AND queue.date LIKE '$tar' ORDER BY status DESC, queue_id ASC";
$rque=mysqli_query($connect,$que);
$row=mysqli_fetch_row($rque);
$someString=implode("",$row);
echo $someString;
?></p></div>
<div class="foo completed"><p style="text-align:center;">Completed<br/>
<?php
$que="SELECT COUNT(queue.status) AS status 
FROM car INNER JOIN queue 
WHERE car.car_id=queue.car_id AND queue.status='Completed' AND queue.date LIKE '$tar' ORDER BY status DESC, queue_id ASC";
$rque=mysqli_query($connect,$que);
$row=mysqli_fetch_row($rque);
$someString=implode("",$row);
echo $someString;
?></p></div>
<div class="foo collected"><p style="text-align:center;">Collected<br/>
<?php
$que="SELECT COUNT(queue.status) AS status 
FROM car INNER JOIN queue 
WHERE car.car_id=queue.car_id AND queue.status='Collected' AND queue.date LIKE '$tar' ORDER BY status DESC, queue_id ASC";
$rque=mysqli_query($connect,$que);
$row=mysqli_fetch_row($rque);
$someString=implode("",$row);
echo $someString;
?></p></div>
		</div>
		<div class="col-md-8" style="overflow-y:auto;height: 500px">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							Plate Number
						</th>
						<th>
							Arrival Time
						</th>
						<th>
							Completed Time
						</th>
						<th>
							Service(s)
						</th>
						<th>
							Status
						</th>
						<th style="text-align:center" colspan="2">
							Action
						</th>
					</tr>
				</thead>
				<tbody>
		<?php
		$tar= date("Y-m-d");
		  $sql = "SELECT queue.queue_id, car.plate_num, queue.arrival_time, queue.completed_time, GROUP_CONCAT(service.service_type SEPARATOR'<br>') AS service, queue.status 
FROM car JOIN queue JOIN queue_service JOIN service
WHERE car.car_id=queue.car_id AND queue.queue_id=queue_service.queue_id AND queue_service.service_id=service.service_id AND queue.date LIKE '$tar' GROUP BY queue_id ORDER BY status DESC, queue_id ASC";
					$result = mysqli_query($connect,$sql);
					$x = 1;
					if(mysqli_num_rows($result) > 0 )
					{
					while($row = mysqli_fetch_array($result))
					{
						if($row['status'] == "Queuing"){
							echo '<tr class="table-danger">';
						}elseif($row['status'] == "In Progress"){
							echo '<tr class="table-active">';
						}elseif($row['status'] == "Completed"){
							echo '<tr class="table-warning">';
						}else{
							echo '<tr class="table-success">';
						}
			?>
			
					
						<td>
							<?php echo $row['plate_num'];?>
						</td>
						<td>
							<?php echo $row['arrival_time'];?>
						</td>
						<td>
							<?php echo $row['completed_time'];?>
						</td>
						<td>
							<?php echo $row['service'];?>
						</td>
						<td>
							<form action="update.php" method="post">
					<!-- <tr class="table-warning"> -->
					
							<input name="queueid" autofocus class="input" type="hidden" value="<?php echo $row['queue_id']; ?>">
							<select class="form-control" name="status" onchange="this.form.submit()">
							<option><?php echo $row['status'];?></option>
							<?php
							if ($row['status'] == "Queuing"){
							?>
							<option value="In Progress">In Progress</option>
							<option value="Completed">Completed</option>
							<option value="Collected">Collected</option>
	        		  
	        		  <?php
	        		  }elseif ($row['status'] == "In Progress"){
	        		  	?>
							<option value="Queuing">Queuing</option>
							<option value="Completed">Completed</option>
							<option value="Completed">Completed</option>
							<option value="Collected">Collected</option>

	        		  <?php
	        		  }elseif ($row['status'] == "Completed"){
							?>
							<option value="Queuing">Queuing</option>
							<option value="In Progress">In Progress</option>
							<option value="Collected">Collected</option>
							
						<?php
	        		  }elseif ($row['status'] == "Collected"){
							?>
							<option value="Queuing">Queuing</option>
							<option value="In Progress">In Progress</option>
							<option value="Completed">Completed</option>
							</select>
							<?php
							}
							?>
							
						</td>
						<td style="text-align:right">
						<noscript><input type="submit" value="submit"></noscript>
					    </td>
					<td style="text-align:left">
					<a href="deletequeue.php?queueid=<?php echo $row['queue_id'];?>" 
					onclick="return confirm('Delete from queue?')" class="danger" style="color: red; "><i class="fa fa-times fa-lg" aria-hidden="true"></i>
						</button>
						<!-- <a href="update.php?queue_id=<?php //echo $row['queue_id'];?>"><i class="fa fa-window-close" aria-hidden="true"></i> --></td>
				</tr>
				</form>
				<?php
				}
					}
				?>
				
					
				</tbody>
			</table>
		</div>
	</div>
</div>
<!--     <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script> -->
    <script>
    	$('select').selectpicker();
    </script>

<?php
include('connection/connect.php');
date_default_timezone_set('Asia/Kuala_Lumpur');
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


} else {
  		 echo '<script language="javascript">';
		echo 'alert("'.$pele.' something went wrong.");';
		echo 'window.location.href="index.php";';
		echo '</script>';
}





mysqli_close($connect);

?>

  </body>
</html>