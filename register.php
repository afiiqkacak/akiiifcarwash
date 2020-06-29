<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">


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

.unstyled-button {
  border: none;
  padding: 0;
  background: none;
}

</style>




  </head>
  <body>
<div class="limiter">
<div class="container-login100" style="background-image: url('shining-car.jpg');">
<div class="row" >

				<div class="wrap-login100 p-t-30 p-b-50">
					<form action="" method="post">
						<div class="form-group">
							 <span style="margin:auto; display:table; font-weight:bold; color: red;"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> NOTICE: You are only required to fill in this form ONCE. If you have did this in the past, please proceed to the counter.</span><br>
							<label for="name" style="color:white;">
						Name: <span style="color:red;">*</span>
					</label>
					<!-- <input type="text" class="form-control" name="platenum"> -->
					 <input class="form-control" name="name" type="text" maxlength="50" required>
					<label for="ic" style="color:white;">
						IC Number: <span style="color:red;">*</span>
					</label>
					<input class="form-control" name="ic" type="number" min="0" placeholder="eg: 950101305451" required>
					 <label for="phone" style="color:white;">
						Phone Number: <span style="color:red;">*</span>
					</label>
					<input class="form-control" name="phone" type="number" min="0" placeholder="eg: 0123456789" required>

					<label for="address" style="color:white;">
						Address:
					</label>
					<textarea class="form-control" name="address" maxlength="150" ></textarea>
						</div>
						<button type="submit" name="submit" class="btn btn-info">Submit <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
				</button>
					</form>
				</div>
			</div>
			

</body>

</div></div>
<?php
include('connection/connect.php');
if(isset($_POST['submit'])){
	$service=$_POST['name'];
	$ic=$_POST['ic'];
	$type=$_POST['phone'];
	$address=$_POST['address'];

	
	$sql = "INSERT INTO `customer`(`name`, `ic`, `phone_number`, `address`) VALUES ('$service', '$ic', '$type', '$address')";
	$result = mysqli_query($connect, $sql);

	if($result == TRUE){
				echo '<script language="javascript">';
				echo 'alert("Details added. Please proceed to the counter.");';
				echo 'window.location.href="register.php";';
				echo '</script>';
			}else{
				echo '<script language="javascript">';
				echo 'alert("Data is already present! Avoid duplicate entry.");';
				echo 'window.location.href="register.php";';
				echo '</script>';
			}

			mysqli_close($connect);

}
?>
</html>