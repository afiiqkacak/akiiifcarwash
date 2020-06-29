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
<?php
date_default_timezone_set('Asia/Kuala_Lumpur');
$tar= date("Y-m-d");
$sql = "SELECT * FROM `top5`";
$result = mysqli_query($connect,$sql) or die (mysqli_error($connect));


$sql2 = "SELECT * FROM `frequent`";
$result2 = mysqli_query($connect,$sql2) or die (mysqli_error($connect));

$sql3 = "SELECT service_type, COUNT(service_type) AS total
FROM queue_service INNER JOIN service INNER JOIN queue
WHERE queue_service.queue_id=queue.queue_id AND service.service_id=queue_service.service_id AND date LIKE '$tar'
GROUP BY service_type
ORDER BY total DESC";
$result3 = mysqli_query($connect,$sql3) or die (mysqli_error($connect));

$sql4 = "SELECT * FROM `avgtime`";
$result4 = mysqli_query($connect,$sql4) or die (mysqli_error($connect));

$sql5 = "SELECT DATE_FORMAT(queue_start, '%H') AS time, COUNT(queue_id) AS jumlah
FROM `queue`
WHERE date LIKE '$tar'
GROUP BY time";
$result5 = mysqli_query($connect,$sql5) or die (mysqli_error($connect));
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

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Service', 'Frequency'],

    				<?php
					
				 	while($row = mysqli_fetch_assoc($result))
					{
						?>

				 		["<?php echo $row['service_type']?>", <?php echo $row['frequency']?>],
				 		<?php
				 	}
				 	?>

        ]);

        var options = {
          title: 'Top 5 Services',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
</script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Category', 'Frequency'],

    				<?php
					
				 	while($row2 = mysqli_fetch_assoc($result2))
					{
						?>

				 		["<?php echo $row2['category_of_car']?>", <?php echo $row2['frequency']?>],
				 		<?php
				 	}
				 	?>

        ]);

        var options = {
          title: 'Frequent Car Category',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
</script>

<script type="text/javascript">
      google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = google.visualization.arrayToDataTable([
        ['Service', 'Cars',],
        <?php
					
				 	while($row3 = mysqli_fetch_assoc($result3))
					{
						?>

				 		["<?php echo $row3['service_type']?>", <?php echo $row3['total']?>],
				 		<?php
				 	}
				 	?>
      ]);

      var options = {
        title: "Today's Car Services",
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Total Cars',
          minValue: 0
        },
        vAxis: {
          title: 'Services'
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
    </script>


<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Category', 'Average'],
         

    	 			<?php
					
				 	while($row4 = mysqli_fetch_assoc($result4))


					{
						$masa=$row4['avgtime'];

					$str = str_replace(":", ".", "$masa");

				 	$avg = floatval($str);
				 	
						?>

				 		["<?php echo $row4['kereta']?>", <?php echo $avg;?>],
				 		<?php
				 	}
				 	?>

        ]);

        var options = {
          title: 'Average Time Spent',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart4'));

        chart.draw(data, options);
      }
</script>

<script type="text/javascript">
      google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawBackgroundColor);

function drawBackgroundColor() {
      var data = new google.visualization.DataTable();
      data.addColumn('number', 'X');
      data.addColumn('number', 'Cars');

      data.addRows([
           <?php
					
				 	while($row5 = mysqli_fetch_assoc($result5))
					{
						?>

				 		[<?php echo $row5['time']?>, <?php echo $row5['jumlah']?>],
				 		<?php
				 	}
				 	?>
      ]);

      var options = {
      	title: "Today's Cars",
        hAxis: {
          title: 'Time (H)'
        },
        vAxis: {
          title: 'Cars'
        },
        backgroundColor: ''
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div2'));
      chart.draw(data, options);
    }
</script>


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
					<a class="nav-link active" href="dashboard.php"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php"><i class="fa fa-hand-paper-o" aria-hidden="true"></i> Queue</a>
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
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4" id="piechart" style="width: 600px; height: 250px;">
		       
				</div>
				<div class="col-md-4" id="piechart2" style="width: 600px; height: 250px;">
					
				</div>
				<div class="col-md-4" id="piechart4" style="width: 600px; height: 250px;">
					
				</div>
			</div><br>
			<div class="row">
				<div class="col-md-6"  id="chart_div" style="width: 600px; height: 250px;">
					
				</div>
				<div class="col-md-6" id="chart_div2" style="width: 600px; height: 250px;">
					
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
