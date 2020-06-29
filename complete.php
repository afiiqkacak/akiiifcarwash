<?php
include('connection/connect.php');
date_default_timezone_set('Asia/Kuala_Lumpur');	
?>			
<tbody class="table-warning">
					<tr>
						<?php
					
					$tar= date("Y-m-d");
		  			$sql = "SELECT car.plate_num 
					FROM car INNER JOIN queue 
					WHERE car.car_id=queue.car_id AND queue.date LIKE '$tar' AND status='Completed' ORDER BY status DESC, queue_id ASC";
					$result = mysqli_query($connect,$sql);
					$x = 1;

					if(mysqli_num_rows($result) > 0 )
					{
					
					// echo '<audio src="bell.mp3" autoplay></audio>';


					while($row = mysqli_fetch_array($result))
					{
	

						?>
						<td style="text-align:center">
							<?php echo $row['plate_num'];?>
						</td>
					</tr>
					<?php
				}
			

			}
			?>
				</tbody>


