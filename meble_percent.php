<?php include('assets/lib/header.php');include('link.php');?>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<!-- get data from percentage table when the confirm is 1 -->
<!-- https://codepen.io/byrnecode/pen/GxdQdQ -->
<?php 
$month_name = mysqli_query($con, "SELECT meble_cart_date,meble_who_confirm, sum(digital_temp_sum_minutes) as total_time,sum(user_hours_temp) as hour from percentage where meble_confirm = '1' GROUP BY MONTH(meble_cart_date) ");



?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<div class="container">
	<section class="nav-wrap">

		<!-- start accordion nav block -->
		<nav class="acnav" role="navigation">
			<!-- start level 1 -->
			<ul class="acnav__list acnav__list--level1">

				<!-- start group 1 -->
				<li class="has-children">
					<div class="acnav__label">
						Current Year 2023 
					</div>
					<!-- start level 2 -->
					<?php
					while($row = mysqli_fetch_array($month_name)){ 
						// echo'total time'. $row
						// ['total_time'].'<br>'; echo 'hour'.$row['hour'].'<br>'; 

						$month =
						$row['meble_cart_date'];  $months=date('F', strtotime($month));	


						?>
						<ul class="acnav__list acnav__list--level2">


							<li class="has-children">
								<div class="acnav__label acnav__label--level2">
									<?php echo $months;?> <aside class="float-right"><?php  $total_meble_minute=$row['total_time'];	 
									$total_job_time = $row['hour']*60;
									$percent=($row['total_time']/$total_job_time)*100; echo number_format((float)$percent, 2);?>%</aside>
								</div>
								<!-- start level 3 -->
								<ul class="acnav__list acnav__list--level3">

									<li class="has-children">
										<?php 

										$meble_time = mysqli_query($con, "SELECT meble_cart_date,meble_who_confirm, user_hours_temp, sum(digital_temp_sum_minutes) as total_time, sum(user_hours_temp)as working_time from percentage where meble_confirm = '1' and MONTHNAME(meble_cart_date)='$months' GROUP BY meble_cart_date order");


										while($row = mysqli_fetch_array($meble_time))
											{?>
												<div class="acnav__label acnav__label--level3">
													<?php $cart_date = $row['meble_cart_date']; echo date("d F, ",strtotime($row['meble_cart_date']));?>
													<span class="font-weight-bold">Minute (<?php echo number_format((float)$row['total_time'], 2).'/ H ';echo $row['working_time'];?>)</span>
													<span class="float-right"><?php  $total_work_minute=$row['total_time']; $row['total_time'];  $user_work_minute= $row['working_time']*60;   $percentage = ($total_work_minute/$user_work_minute)*100 ; echo number_format((float)$percentage, 2);?>%</span>

												</div>
												<!-- start level 4 -->
												<ul class="acnav__list acnav__list--level4">
													<li><table class="table table-hover">
														<thead >
															<tr class="bg-info">
																<th>S.N.</th>
																<th>Meble Name</th>
																<th>Meble Pieces</th>
																<th>Minutes</th>
																<th>Total Minutes</th>

															</tr>
														</thead>
														<body>
															<?php daily_rpt_list($cart_date);?></a>
														</body>
													</table>
												</li>
											</ul>
											<!-- end level 4 -->
											<?php
											$i=0;




		// daily_rpt_list($cart_date);

										} ?>
									</li>

								</ul>
								<!-- end level 3 -->
							</li>


						</ul>
					<?php }?>
					<!-- end level 2 -->
				</li>
				<!-- end group 1 -->

				<!-- start group 2 -->

				<!-- end group 2 -->

				<!-- start group 3 -->

				<!-- end group 3 -->

			</ul>
			<!-- end level 1 -->
		</nav>
		<!-- end accordion nav block -->

	</section>

</div>







<?php  function daily_rpt_list($cart_date)
                                // get data from another table with cat id
{

	$j=1;
	global $con;


	$result = mysqli_query($con, "SELECT pr.*,mb.* from percentage pr,meble_list mb where meble_cart_date='$cart_date' and pr.meble_list_id = mb.id and meble_confirm = 1 order by created_at asc ");
	?>
	<?php 
	while($row=mysqli_fetch_array($result))
		{?> 

			<tr>
				<td><?php echo $j++;?></td>
				<td><?php echo $row['meble_name'];?></td>
				<td><?php echo $row['meble_pieces'];?></td>
				<td><?php echo $row['minutes'];?></td>
				<td><?php echo $row['digital_temp_sum_minutes'];?></td>
			</tr>


		<?php  }$j++;} ?>


		<script>
	// ==========================================================================
//	Multi-level accordion nav
// ==========================================================================
			$(".acnav__label").click(function () {
				var label = $(this);
				var parent = label.parent(".has-children");
				var list = label.siblings(".acnav__list");

				if (parent.hasClass("is-open")) {
					list.slideUp("fast");
					parent.removeClass("is-open");
				} else {
					list.slideDown("fast");
					parent.addClass("is-open");
				}
			});
// ==========================================================================

		</script>
		<style>
			@charset "UTF-8";
			body {
				font-family: "Lato", sans-serif;
				font-size: 16px;
			}

			a {
				text-decoration: none;
			}
			a:hover {
				text-decoration: underline;
			}

			.nav-wrap {
				width: 100%;
				margin: 1em auto 0;
			}
			@media (min-width: 992px) {
				.nav-wrap {
					width: 100%;
				}
			}

			[hidden] {
				display: none;
				visibility: hidden;
			}

			.acnav {
				width: 100%;
			}
			.acnav__list {
				padding: 0;
				margin: 0;
				list-style: none;
			}
			.acnav__list--level1 {
				border: 1px solid #fcfcfc;
			}
			.has-children > .acnav__label::before {
				content: "\f067";
				display: inline-block;
				font: normal normal normal 14px/1 FontAwesome;
				font-size: inherit;
				text-rendering: auto;
				margin-right: 1em;
				transition: transform 0.3s;
			}
			.has-children.is-open > .acnav__label::before {
				transform: rotate(405deg);
			}
			.acnav__link, .acnav__label {
				display: block;
				font-size: 1rem;
				padding: 1em;
				margin: 0;
				cursor: pointer;
				color: #fcfcfc;
				background: #317589;
				box-shadow: inset 0 -1px #3988a0;
				transition: color 0.25s ease-in, background-color 0.25s ease-in;
			}
			.acnav__link:focus, .acnav__link:hover, .acnav__label:focus, .acnav__label:hover {
				color: #e3e3e3;
				background: #2d6b7e;
			}
			.acnav__link--level2, .acnav__label--level2 {
				padding-left: 3em;
				background: #2d6b7e;
			}
			.acnav__link--level2:focus, .acnav__link--level2:hover, .acnav__label--level2:focus, .acnav__label--level2:hover {
				background: #296272;
			}
			.acnav__link--level3, .acnav__label--level3 {
				padding-left: 5em;
				background: #296272;
			}
			.acnav__link--level3:focus, .acnav__link--level3:hover, .acnav__label--level3:focus, .acnav__label--level3:hover {
				background: #255867;
			}
			.acnav__link--level4, .acnav__label--level4 {
				padding-left: 7em;
				background: #255867;
			}
			.acnav__link--level4:focus, .acnav__link--level4:hover, .acnav__label--level4:focus, .acnav__label--level4:hover {
				background: #214f5c;
			}
			.acnav__list--level2, .acnav__list--level3, .acnav__list--level4 {
				display: none;
			}
			.is-open > .acnav__list--level2, .is-open > .acnav__list--level3, .is-open > .acnav__list--level4 {
				display: block;
			}
		</style>


