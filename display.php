<!DOCTYPE html>
<html lang="en">

  <head>
  	<!-- <meta http-equiv="refresh" content="1"/> -->
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js"></script> -->
<script type="text/javascript" src="reloader.js"></script>

<link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<script type="text/javascript">// <![CDATA[
$(document).ready(function() {
$.ajaxSetup({ cache: false }); // This part addresses an IE bug. without it, IE will only load the first number and will never refresh
setInterval(function() {
$('#divToRefresh').load('dbcheck.php');
}, 10000); // refers to the time to refresh the div. it is in milliseconds.
});
// ]]></script>



</head>

<!-- <div id="liveData"> -->
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
<h4><?php echo $datenow ?>
<?php echo "\n" ?>
<?php echo $timenow;
$tar= date("Y-m-d");
?>



</h4></div>
<marquee class="marquee" scrollamount="10"><h5>It's our pleasure to extend a cheerful welcome to you all! Your presence makes us very happy!</h5></marquee>
						
<br>

</div>
</div>

<br>
	<div class="row">
		<div class="col-md-4">
			<table class="table">
				<thead>
					<tr>
						<th style="text-align:center;">
							Queuing <i class="fa fa-car" aria-hidden="true"></i>
						</th>
					</tr>
				</thead>
				<tbody class="table-danger" id="liveData3">
				</tbody>
				
			</table>
		</div>
		<div class="col-md-4">
			<table class="table">
				<thead>
					<tr>
						<th style="text-align:center;">
							In progress <i class="fa fa-wrench" aria-hidden="true"></i>
						</th>
					</tr>
				</thead>
				<tbody class="table-active" id="liveData2">
					<tr>

						<td style="text-align:center">
						</td>
					</tr>
				</tbody>
			</table>

		</div>

		<div class="col-md-4">
			<table class="table">
				<thead>
					<tr>
						<th style="text-align:center;">
							Completed <i class="fa fa-check-square-o" aria-hidden="true"></i>
						</th>
					</tr>
					
				</thead>
				<tbody class="table-warning" id="liveData">
					<tr>

						<td style="text-align:center">
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">

		<div class="col-md-12" id="divToRefresh">
				
		</div>
	</div>
	<div class="row">
		<div class="col-md-12" id="check">


		</div>
		<div class="col-md-12" id="sound">

			
		</div>
	</div>
</div>
<!-- </div> -->

<script>
window.addEventListener('load', function()
{
    var xhr = null;

    getXmlHttpRequestObject = function()
    {
        if(!xhr)
        {               
            // Create a new XMLHttpRequest object 
            xhr = new XMLHttpRequest();
        }
        return xhr;
    };

    updateLiveData = function()
    {
        var now = new Date();
        // Date string is appended as a query with live data 
        // for not to use the cached version 
        var url = 'complete.php?' + now.getTime();
        xhr = getXmlHttpRequestObject();
        xhr.onreadystatechange = evenHandler;
        // asynchronous requests
        xhr.open("GET", url, true);
        // Send the request over the network
        xhr.send(null);
    };

    updateLiveData();

    function evenHandler()
    {
        // Check response is ready or not
        if(xhr.readyState == 4 && xhr.status == 200)
        {
            dataDiv = document.getElementById('liveData');
            // Set current data text
            dataDiv.innerHTML = xhr.responseText;
            // Update the live data every 1 sec
            setTimeout(updateLiveData(), 10000);
        }
    }
});


window.addEventListener('load', function()
{
    var xhr2 = null;

    getXmlHttpRequestObject2 = function()
    {
        if(!xhr2)
        {               
            // Create a new XMLHttpRequest object 
            xhr2 = new XMLHttpRequest();
        }
        return xhr2;
    };

    updateLiveData2 = function()
    {
        var now2 = new Date();
        // Date string is appended as a query with live data 
        // for not to use the cached version 
        var url2 = 'progress.php?' + now2.getTime();
        xhr2 = getXmlHttpRequestObject2();
        xhr2.onreadystatechange = evenHandler2;
        // asynchronous requests
        xhr2.open("GET", url2, true);
        // Send the request over the network
        xhr2.send(null);
    };

    updateLiveData2();

    function evenHandler2()
    {
        // Check response is ready or not
        if(xhr2.readyState == 4 && xhr2.status == 200)
        {
            dataDiv = document.getElementById('liveData2');
            // Set current data text
            dataDiv.innerHTML = xhr2.responseText;
            // Update the live data every 1 sec
            setTimeout(updateLiveData2(), 10000);
        }
    }
});

window.addEventListener('load', function()
{
    var xhr3 = null;

    getXmlHttpRequestObject3 = function()
    {
        if(!xhr3)
        {               
            // Create a new XMLHttpRequest object 
            xhr3 = new XMLHttpRequest();
        }
        return xhr3;
    };

    updateLiveData3 = function()
    {
        var now3 = new Date();
        // Date string is appended as a query with live data 
        // for not to use the cached version 
        var url3 = 'q.php?' + now3.getTime();
        xhr3 = getXmlHttpRequestObject3();
        xhr3.onreadystatechange = evenHandler3;
        // asynchronous requests
        xhr3.open("GET", url3, true);
        // Send the request over the network
        xhr3.send(null);
    };

    updateLiveData3();

    function evenHandler3()
    {
        // Check response is ready or not
        if(xhr3.readyState == 4 && xhr3.status == 200)
        {
            dataDiv = document.getElementById('liveData3');
            // Set current data text
            dataDiv.innerHTML = xhr3.responseText;
            // Update the live data every 1 sec
            setTimeout(updateLiveData3(), 10000);
        }
    }
});


</script>
