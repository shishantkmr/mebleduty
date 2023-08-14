<?php
include('link.php');
include('assets/lib/header.php');
include ('assets/lib/user_details.php');
// $data = mysqli_query($con,"SELECT * From percentage where meble_confirm is null");

// $result = mysqli_query($con,"SELECT mup.*,usr.username,usr.role FROM mess_user_paid mup,users usr where usr.id=mup.user_id And mup.id>$monthly_user_paid_id order by post_date asc"); 
$dates =date('Y-m-d');
																// RC current  day duty hours
$day_hours_rc = mysqli_query($con, "SELECT hours,user_id,date_at from duty where user_id='1' and  date_at='$dates' ");
$day_hour_rc= mysqli_fetch_array($day_hours_rc);
if($day_hour_rc){$duty_hour_rc = $day_hour_rc['hours'];
}

 													// Dipesh current  day duty hours
$day_hours_dipesh = mysqli_query($con, "SELECT hours,user_id,date_at from duty where user_id='7' and  date_at='$dates' ");
$day_hour_dipesh= mysqli_fetch_array($day_hours_dipesh);
if($day_hour_dipesh){ $duty_hour_dipesh = $day_hour_dipesh['hours'];
}
 														// both hours
// $total_hour = $duty_hour_rc+$duty_hour_dipesh;
// echo 'total'.$total_hour;
 // percent


// $result = mysqli_query($con,"SELECT prsntg.id,prsntg.user,prsntg.meble_cart_date, prsntg.meble_pieces,.prsntg.meble_who_confirm_date,prsntg.user_hours_temp,prsntg.meble_paper_temp_sum,prsntg.meble_digital_temp_sum,sum(prsntg.user_hours_temp) as 'user_hour', sum(prsntg.minutes) as 'digital_time',sum(prsntg.digital_temp_sum_minutes) as 'digital_temp_sum_time',sum(prsntg.meble_paper_temp_sum) as 'paper_time',mbl.meble_name,mbl.meble_paper_time,mbl.meble_digital_time,mbl.meble_percent_date FROM percentage prsntg,meble_list mbl where mbl.id=prsntg.meble_list_id and MONTH(prsntg.meble_who_confirm_date)=MONTH(Now()) and YEAR(prsntg.meble_who_confirm_date)=YEAR(NOW()) and prsntg.meble_confirm IS NOT NULL group by prsntg.meble_who_confirm_date"); 
// var_dump($result);
$result = mysqli_query($con,"SELECT prsntg.id,prsntg.user,prsntg.meble_cart_date, prsntg.meble_pieces,.prsntg.meble_who_confirm_date,prsntg.user_hours_temp,prsntg.meble_paper_temp_sum,prsntg.meble_digital_temp_sum,sum(prsntg.user_hours_temp) as 'user_hour', sum(prsntg.minutes) as 'digital_time',sum(prsntg.digital_temp_sum_minutes) as 'digital_temp_sum_time',sum(prsntg.meble_paper_temp_sum) as 'paper_time',mbl.meble_name,mbl.meble_paper_time,mbl.meble_digital_time,mbl.meble_percent_date FROM percentage prsntg,meble_list mbl where mbl.id=prsntg.meble_list_id and prsntg.meble_confirm IS NOT NULL group by prsntg.meble_cart_date"); 
// var_dump($result);
?>

<body>
	
	<div class="container">

		
		<h3>Percentage</h3>
		<div class="table-responsive">
			<table class="table table-border table-hover">
				<thead><tr>
					<th>Date</th>
					<!-- <th>Meble name</th>
					<th>Meble paper time</th>
					<th>Meble digital time</th>
					<th>meble_piece</th>
					<th>user_hours_temp</th> -->
					
					<!-- <th class="text-center">Meble paper percentage</th> -->
					<th class="text-center">Total hours </th>
					<th class="text-center">Total Minutes </th>
					<th class="text-center">Meble digital percentage</th>

				</tr>
			</thead>
			<input type="hidden"  class="user" data-id="<?php echo $user_name;?>">
			<tbody>
				<?php $i=0;
				
				$j= 1; while($row=mysqli_fetch_array($result)){?>
					<tr data-id="<?php echo $row['id'];?>">
						<td><span class="badge badge-info"><h6><?php $date_at= strtotime($row['meble_cart_date']);echo date('Y-M-d',$date_at);?></h6></span></td>
						<?php //echo $row['paper_time'];?>
						<!-- <td><?php //echo $row['meble_name'];?></td>
						<td><?php //echo $row['paper_time'];?></td>
						<td><?php //echo $row['digital_time'];?></td>
						<td><?php //echo $row['meble_pieces'];?></td>
						<td><?php //echo $row['user_hour'];?></td>-->
						<!-- <td class="text-center "><span class="badge badge-info pl-2 pr-2"><h6><?php // $meble_paper= ($row['paper_time']/($row['user_hour']*60))*100; echo number_format((float)$meble_paper, 2)."%";?></h6></span></td> -->
						
						<td class="text-center "><?php echo $row['user_hour'];?></td>
						<td class="text-center font-weight-bold"><?php echo number_format((float)$row['digital_temp_sum_time'], 2);?></td>

						<td class="text-center ">
							<span class="badge badge-success pl-2 pr-2"><h6><?php
							$hour=$row['user_hour']*60; 

							$meble_digital= ($row['digital_temp_sum_time']/$hour)*100; echo number_format((float)$meble_digital, 2)."%";?></h6></span></td>
						</tr>

						<?php $i++;}?>
						<!-- <span class="lead badge-primary pr-3 show">Selected time: <span class="badge badge-primary" id="total"></span>min.</span> -->
					</tbody>
				</table>
			</div>
		</div>

	</body>
	<!-- model -->
