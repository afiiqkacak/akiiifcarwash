<!DOCTYPE html>
<html lang="en">
<?php

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


<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" >

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

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
					<a class="nav-link" href="index.php"><i class="fa fa-hand-paper-o" aria-hidden="true"></i> Queue</a>
				</li>
				
				<li class="nav-item">
					<a class="nav-link" href="customer.php"><i class="fa fa-id-card-o" aria-hidden="true"></i> Customer</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="car.php"><i class="fa fa-car" aria-hidden="true"></i> Car</a>
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
					 
					<label for="plate">
						Plate Number: <span style="color:red;">*</span>
					</label>
					
					 <input class="form-control" name="plate" type="text" maxlength="20" id="someInput" placeholder="eg: W1908Q" required>

					 <label for="model">
						Car Model:
					</label>
					
					 <input class="form-control" name="model" type="text" maxlength="20">

					 <label for="colour">
						Car Colour:
					</label>
					
					 <input class="form-control" name="colour" type="text" maxlength="15">
					 </div>

					 

				
				
				<div class="checkbox">
					<label for="category">Car Category: <span style="color:red;">*</span></label>
  <select class="form-control" name="category" required>
  	<option></option>
    <option value="1">Small</option>
    <option value="2">Medium</option>
    <option value="3">Large</option>

  </select>


				<label for="name">Owner: <span style="color:red;">*</span></label>
  <select class="form-control" data-live-search="true" name="name" required>
					 	<option></option>
					 	<?php
					 $sql2="SELECT * FROM customer";
					 $result2 = mysqli_query($connect, $sql2);
					if (mysqli_num_rows($result2)) 
					{
						while($row2 = mysqli_fetch_array($result2)) 
						{					
					 ?>
    <option value="<?php echo $row2['customer_id'];?>"><?php echo $row2['name'];?></option>
<?php
		}
	
	}
?>
					 	
					 	</select><br><br>
  
				
					
				</div> 
				<button type="submit" name="submit" class="btn btn-info">Insert <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
				</button>
				
			</form>
			<br>

		</div>

		<div class="col-md-8">
			
			<table id="example" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>
							Plate Number
						</th>
						<th>
							Car Model
						</th>
						<th>
							Car Colour
						</th>
						<th>
							Car Category
						</th>
						<th>
							Owner
						</th>
						<th style="text-align:center">
							Delete
						</th>
					</tr>
				</thead>
				<tbody class="table-warning">
		<?php
		$tar= date("Y-m-d");
		  $sql = "SELECT car.car_id, car.plate_num, car.car_model, car.car_colour, car_category.category_of_car, customer.name
FROM car
JOIN car_category JOIN customer
WHERE car.customer_id = customer.customer_id AND car.car_category_id = car_category.car_category_id
ORDER BY plate_num";
					$result = mysqli_query($connect,$sql);
					$x = 1;
					if(mysqli_num_rows($result) > 0 )
					{
					while($row = mysqli_fetch_array($result))
					{
			?>
			
					

						<td>
							<?php echo $row['plate_num'];?>
						</td>
						<td>
							<?php echo $row['car_model'];?>
						</td>
						<td>
							<?php echo $row['car_colour'];?>
						</td>
						<td>
							<?php echo $row['category_of_car'];?>
						</td>
						<td>
							<?php echo $row['name'];?>
						</td>

					<td style="text-align:center">
					<a href="deletecar.php?carid=<?php echo $row['car_id'];?>" 
					onclick="return confirm('All data related to this car will be deleted. Are you sure?')" class="danger" style="color: red; "><i class="fa fa-times fa-lg" aria-hidden="true"></i>
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
<?php

if(isset($_POST['submit'])){
	$plate=$_POST['plate'];
	$model=$_POST['model'];
	$colour=$_POST['colour'];
	$category=$_POST['category'];
	$name=$_POST['name'];

	// echo $plate;
	// echo $model;
	// echo $colour;
	// echo $category;
	// echo $name;



	
	$sql = "CALL `insertCar`('$plate', '$model', '$colour', '$category', '$name')";
	$result = mysqli_query($connect, $sql);

	if($result == TRUE){
				echo '<script language="javascript">';
				echo 'alert("Car added.");';
				echo 'window.location.href="car.php";';
				echo '</script>';
			}else{
				echo '<script language="javascript">';
				echo 'alert("Data is already present! Avoid duplicate entry.");';
				echo 'window.location.href="car.php";';
				echo '</script>';
			}

			mysqli_close($connect);

}
?>

<!--     <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script> -->
    <script>
    	$('select').selectpicker();
    </script>
    <script>
var someInput = document.querySelector('#someInput');
someInput.addEventListener('input', function () {
    someInput.value = someInput.value.toUpperCase();
});
    </script>

    <script>
    	$(document).ready(function() {
    $('#example').DataTable();
} );
    </script>

  </body>
</html>
