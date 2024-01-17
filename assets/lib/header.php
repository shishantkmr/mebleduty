<!-- This page just use in personal.php -->
<?php include('auth_session.php')?> 
<!-- just html header tag -->

<?php 
include('link.php');
include('user_details.php');
$result = mysqli_query($con,"SELECT * FROM users where email = '" . $T_UserName. "'");
$row= mysqli_fetch_array($result);
// cart 
$cart = mysqli_query($con,"SELECT count(id) as 'id' FROM percentage where meble_confirm Is Null ");
$cart_value = mysqli_fetch_array($cart);
$user =mysqli_query($con," Select * from users");
// user group code
$group_name=$row['group_name'];// take login users group no
$group_code=$row['group_no'];// take login users group no
$user_code =mysqli_query($con,"Select * from users where group_no ='$group_code'");
$user_remove =mysqli_query($con,"Select * from users where group_no ='$group_code'");
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta  name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="#e86d1c">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="#e86d1c">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#e86d1c">

	<title>Duty Index</title>
	<meta content="" name="descriptison">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="assets/img/favicon.png" rel="icon">
	<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.10.2.js" type="text/javascript" ></script>
	<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js" type="text/javascript" ></script>
	<!-- Vendor CSS Files -->
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
	<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
	<link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
	<link href="assets/vendor/aos/aos.css" rel="stylesheet">
	<link href="assets/css/timeline.css" rel="stylesheet">
	<!-- Template Main CSS File -->
	<link href="assets/css/style.css" rel="stylesheet">
	<!-- <link rel="stylesheet" href="assets/css/timeline.css"> -->
	<!-- <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script> -->
</head>
<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-none d-lg-block">
	<div class="container clearfix">
		<div class="contact-info float-left">
			<i class="icofont-envelope"></i><a href="mailto:shishantkmrs@gmail.com">shishantkmrs@gmail.com</a>
			<i class="icofont-phone"></i> +48 727825007
		</div>
		<div class="social-links float-right">
			<a href="#" class="twitter"><i class="icofont-twitter"></i></a>
			<a href="#" class="facebook"><i class="icofont-facebook"></i></a>
			<a href="#" class="instagram"><i class="icofont-instagram"></i></a>
			<a href="#" class="skype"><i class="icofont-skype"></i></a>
			<a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
		</div>
	</div>
</section>

<!-- ======= Header ======= -->
<header id="header">
	<div class="container">

		<div class="logo float-left ">
			<h1 class="text-light"><a href="index.php"><span>Neplese </span><i class="text-uppercase badge badge-primary" style="font-size:15px;"><?php echo $user_name; ?></i></a></h1>
			<!-- Uncomment below if you prefer to use an image logo -->
		</div>

		<nav class="nav-menu float-right d-none d-lg-block">
			<ul>

				<?php if($usr_depart_unlocks>0){?>


					<li ><a href="meble_cart_temp.php" class="cart-font"><i class="icofont-cart cart"><sup class="badge badge-primary badgeno"><?php echo $cart_value['id'];?></sup></i></a></li>
				<?php }?>
				<!-- <li class="active"><a href="index.php">Home</a></li> -->

				<li class="active"><a href="#header">Top</a></li>

				<li class='drop-down'><a href=''>Profile</a>
					<ul>
						<li><a href='personal.php'>Personal Entry</a></li>
						<li><a href="team.php">Team</a></li>

					</ul>
				</li>	<li class='drop-down'><a href=''>Duty</a>
					<ul>

						<li><a href="duty_post.php">Duty Post</a></li>
						<li><a href="duty_list.php">Edit List</a></li>
						<li><a href="monthly_rocords.php">Monthly Hour</a></li>

					</ul>
				</li>
				<!-- <li><a href="#portfolio">Portfolio</a></li> -->




				<?php    if($user_role==1){ echo "
				<li class='drop-down'><a href=''>Mess Control</a>
				<ul>
				<li><a href='mess_post.php'>Expenses Entry</a></li>
				<li><a href='user_check_paid.php'>Friends Paid</a></li>
				<li><a href='mess_ledger.php'>This Month Details</a></li>
				<li><a href='monthly_mess_records.php'>Monthly Record</a></li>
				</ul>
				</li>";
				} elseif($member==1){echo "
				<li class='drop-down'><a href=''>Mess Ledger</a>
				<ul>
				<li><a href='user_check_paid.php'>Friends Paid</a></li>
				<li><a href='monthly_mess_records.php'>Monthly Record</a></li>
				<li><a href='mess_ledger.php'>Details</a></li>
				</ul>
				</li>";}?>
				<?php    if($user_email=='shishantkmrs@gmail.com'&&'Shishantkmrs@gmail.com'){ echo "
				<li class='drop-down'><a href='#'>Settings</a>
				<ul>
				<li><a href='anually_todo_post.php'>Annually Todo Entry</a></li>
				<li><a href='daily_todo.php'>Daily RPT</a></li>
				<li><a href='timeline.php'>TmLne RPT</a></li>
				<li><a href='levelup.php'>Daily happen</a></li>
				<li><a href='todo_day.php'>Todo</a></li>
				<li><a href='permission.php'>Change Role</a></li>
				</ul>
				</li>
				";
			} ?>
			<?php    if(isset($row['group_name'])){ echo "
			<li class='drop-down'><a class=' text-capitalize' href='#'><span class='badge badge-primary p-2 h2'>".$row['group_name']."</span></a>
			<ul>
			<li ><a id='myBtn_addmember'><button class='btn btn-primary pl-2 pr-2'>Add Member</button></a></li>
			<li><a href='meble_live_search.php'>Meble Entry</a></li>
			<li><a href='meble_percent_list.php'>Meble Percent List</a></li>
			<li><a href='meble_percent.php'>Meble Percent</a></li>
			</ul>
			</li>";
		} else{ echo"<li><a id='myBtn_group_create'>Create Page</a></li>";}?>
		<li><a href="directory.php">Directory</a></li>
		<li><a href="logout.php">logout</a></li>
	</ul>
</nav><!-- .nav-menu -->

</div>
</header><!-- End Header -->
<span class="msg" style="position: absolute; z-index: 11; color:green; width:auto; background-color: white; line-height: 30px; text-align: center; border:1px solid yellow; border-radius:4px; margin-top:2px;">


	<?php 
	if (!empty($_SESSION['message'])) {
		echo '<p class="message"> '.$_SESSION['message'].'</p>';
		unset($_SESSION['message']);
	}





	if(isset($_GET['message']))
		{ echo $_GET['message'];}
	?>

	<?php 
	if(isset($_GET['message_update']))
		{ echo $_GET['message_update'];}
	?>


</span>




<!-- Trigger/Open The Modal -->


<!-- The Modal -->
<div id="myModal_addgroup" class="modal">

	<!-- Modal content -->
	<div class="modal-content">
		<span class="close">&times;</span>
		<div class="card">
			<div class="card-header">
				<h4>
					<?php if(isset($row['group_name'])){

						echo "<span class='badge badge-primary'><h3>" .$row['group_name'].'</h3></span>';
					}
					else{
						echo "Create Page";
					}?>

				</h4>
			</div>
			<div class="card-body">
				<input type="hidden" id="id">
				<!-- meble name -->
				<?php if(isset($row['group_name'])){
					// echo "<span class='badge badge-primary'><h3>" .$row['group_name'].'</h3></span>';
				}
				else{

					?>

					<tr><div class="input-group mb-2">
						<td>
							<div class="input-group-prepend">
								<span class="input-group-text" id="">Group Name</span>
							</div>
						</td>
						<td><input data-target="group_name" type="text" id="meble_name_edit" class="form-control" placeholder="Nazwa grupy ..."></td>
						<td><a data-id="<?php echo $row['id'];?>"data-role="add_group"class="btn btn-success">Create group</a></td>
					</div>
				</tr>
			<?php } ?>        
		</div>
		<!-- select list of users -->


		<?php 

		if(isset($row['group_name'])){ ?><div class="cart-footer mt-3 mb-1">
			<button data-role="EDIT_Meble" class="btn btn-primary float-left ml-3">Submit</button>
			<button class="btn_edit btn btn-danger float-right close_btn_edit mr-3">Cancel</button>
		</div>
	<?php } ?>

</div>
</div>

</div>

<script>
	// Get the modal
	var modals = document.getElementById('myModal_addgroup');

// Get the button that opens the modal
	var btns = document.getElementById("myBtn_group_create");

// Get the <span> element that closes the modal
	var spans = document.getElementsByClassName("close")[0];



// When the user clicks on <span> (x), close the modal
	spans.onclick = function() {
		modals.style.display = "none";
	}

// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modals) {
			modals.style.display = "none";
		}
	}



	// select list of user 
	var expanded = false;

	function showCheckboxes() {
		var checkboxes = document.getElementById("checkboxes");
		if (!expanded) {
			checkboxes.style.display = "block";
			expanded = true;
		} else {
			checkboxes.style.display = "none";
			expanded = false;
		}
	}

	// store the group name
	$(document).on('click','a[data-role=add_group]',function(){
		var id =$(this).data('id');
    // alert(id);

		var group_name = $(this).closest('div').find('input[data-target=group_name]').val();
		// alert (group_name);

 // create group no randomly
		var currentdate = new Date(); 
		var group_code = currentdate.getFullYear () + ""
		+ (currentdate.getMonth()+1)  + "" 
		+ currentdate.getDate() + ""  
		+ currentdate.getHours() + ""  
		+ currentdate.getMinutes() + "" 
		+ currentdate.getSeconds();
		// alert (gg);
		console.log(group_code);
		if(group_name!=""){$.ajax({
			url : 'percentage/ajax_group_create.php',
			method :'post',
			data:{id:id,group_name:group_name,group_code:group_code},
			success : function(response){
				console.log(response);


			}

		});window.location.reload();
          // alert
			document.getElementById("success_alert").style.display = "block";
			localStorage.setItem('show','true');


			$("#success_alert").fadeTo(300, 300).slideUp(300, function() {
				$("#success_alert").slideUp(300);
			});

   //  setTimeout(function(){         //set time for reload
   //   window.location.reload();
   // }, 300);
		}


		else{

			document.getElementById("danger_alert").style.display = "block";
			localStorage.setItem('show','true');


			$("#danger_alert").fadeTo(2000, 500).slideUp(500, function() {
				$("#danger_alert").slideUp(500);
			});
		}
	});
</script>

<div id="myModal_addmember" class="modal">

	<!-- Modal content -->
	<div class="modal-content">
		
		<div class="card">


			<!-- tab panel -->
			<div class="nav-tabs-outer">
				<ul class="nav nav-tabs js-tabs">
					<li class="active text-center"><a href="#tab1" data-toggle="tab">ADD</a></li>
					<li class="text-center"><a href="#tab2" data-toggle="tab">REMOVE</a></li>
					
				</ul>
				<div class="tab-content">
					<div id="tab1" role="tabpanel" class="tab-pane active fade in">
						<p>
							<!-- add member -->
							<div class="card-header bg-primary">

								<h5>
									<?php if(isset($row['group_name'])){
										$i=0;
										echo "<span class='badge badge-primary text-capitalize'><h3>" .$row['group_name'].'</h3></span>';


										echo "<ul><li class='member_name text-capitalize h6 text-center text-warning'>";

						// get user name which already add member					
										while($add_member=mysqli_fetch_array($user_code)){

											echo $add_member['username']."<br>";
											$i++;
										}
										echo "</li></ul>";

									}
									else{
										echo "Create Page";
									}?>
									<span class="close_addmember float-right ">&times;</span>
								</h5>
							</div>
							<!-- list -->
							<form method="POST">
								<input type="hidden" name="group_name" value="<?php echo $group_name;?>">
								<input type="hidden" name="group_no" value="<?php echo $group_code;?>">
								<?php if(isset($row['group_name'])){ ?>
									<div class="multiselect">
										<div class="selectBox" onclick="showCheckboxes()">
											<select>
												<option class="opt">Choose member</option>
											</select>
											<div class="overSelect"></div>
										</div>
										<div id="checkboxes">

											<?php $i=0;

											while($rows=mysqli_fetch_array($user)){
												?>

												<label class="text-capitalize" for="one<?php echo$rows['id']; ?>">
													<input type="checkbox" name="member[]" class="members[]" value="<?php echo$rows['id'];?>" id="one<?php echo $rows['id']; ?>" />	<?php echo $rows['username'].$rows['id']; ?></label>


												<?php } ?>
											</div>

										<?php } ?>
									</div>
									<?php 

									if(isset($row['group_name'])){ ?>
										<div class="card-footer mt-5 mb-1">
											<button data-id="<?php echo $row['id']?>" data-role="add_member" class="btn btn-primary float-left ml-3" name="member_submit">Submit</button>
											<button id="close_addmember"class=" btn btn-danger float-right close_btn_edit mr-3">Cancel</button>
										</div>
									<?php } ?>
								</form>

							</p>
						</div>
						<!-- second panel -->
						<div id="tab2" role="tabpanel" class="tab-pane fade in">
							<p>
								<!-- delete member -->
								<div class="card-header bg-primary">

									<h5>
										<?php if(isset($row['group_name'])){
											$i=0;
											echo "<span class='badge badge-primary text-capitalize'><h3>" .$row['group_name'].'</h3></span>';


											echo "<ul><li class='member_name text-capitalize h6 text-center text-warning'>";

						// get user name which already add member
											while($add_member=mysqli_fetch_array($user_code)){

												echo $add_member['username']."<br>";
												$i++;
											}
											echo "</li></ul>";

										}
										else{
											echo "Create Page";
										}?>
										<span class="close_addmember float-right ">&times;</span>
									</h5>
								</div>
								<!-- list -->
								<form method="POST">
									<input type="hidden" name="group_name" value="<?php echo $group_name;?>">
									<input type="hidden" name="group_no" value="<?php echo $group_code;?>">
									<?php if(isset($row['group_name'])){ ?>
										<div class="multiselect1">
											<div class="selectBox1" onclick="showCheckboxes1()">
												<select>
													<option class="opt1">Choose member</option>
												</select>
												<div class="overSelect1"></div>
											</div>
											<div id="checkboxes1">
												
												<?php $i=0; 
												while($rows=mysqli_fetch_array($user_remove)){
													?>
													dvsdgsda
													<label class="text-capitalize" for="one<?php echo$rows['id']; ?>">
														<input type="checkbox" name="member[]" class="members[]" value="<?php echo$rows['id'];?>" id="one<?php echo $rows['id']; ?>" />	<?php echo $rows['username'].$rows['id']; ?></label>

														<?php echo $row['username'].$row['id']; ?>sdfsdf
													<?php } ?>
												</div>

											<?php } ?>
										</div>
										<?php 

										if(isset($row['group_name'])){ ?>
											<div class="card-footer mt-5 mb-1">
												<button data-id="<?php echo $row['id']?>" data-role="add_member" class="btn btn-primary float-left ml-3" name="member_submit">Submit</button>
												<button id="close_addmember"class=" btn btn-danger float-right close_btn_edit mr-3">Cancel</button>
											</div>
										<?php } ?>
									</form>

								</p>
							</div>			
						</div>
					</div>




					<!-- select list of users -->


				</div>
			</div>

		</div>

		<?php
		if(isset($_POST['member_submit']))
		{
			if(isset($_POST['member']))
			{
				$name =$_POST['group_name'];
				$no =$_POST['group_no'];
				$members = $_POST['member'];

			// $member_arrya ="";

				foreach ($members as $member ) 
				{
					// $member_arrya.=$member.",";	
					$info = mysqli_query($con, "UPDATE  users set group_name='$name', group_no='$no' where id='$member'");
				}
				if($info==1)
					{ "<script>window.location.reload();</script>";
			}

		// store member into database

		}
	}
	?>
	<script>
	// Get the modal
		var modal_addmember = document.getElementById('myModal_addmember');

// Get the button that opens the modal
		var btn_addmember = document.getElementById("myBtn_addmember");
	//close add member model through the cancel button
		var close_addmember = document.getElementById("close_addmember");

// Get the <span> element that closes the modal
		var span_addmember = document.getElementsByClassName("close_addmember")[0];

// When the user clicks the button, open the modal 
		btn_addmember.onclick = function() {
			modal_addmember.style.display = "block";
		}

// When the user clicks on <span> (x), close the modal
		span_addmember.onclick = function() {
			modal_addmember.style.display = "none";
		}
// close the modal by cancel button
		close_addmember.onclick = function() {
			modal_addmember.style.display = "none";
		}
// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
			if (event.target == modal_addmember) {
				modal_addmember.style.display = "none";
			}
		}
	// add member
		$(document).on('click','button[data-role=add_member]',function(){
			// var ids =$(this).data('id');
			var id=[];
			$(':checkbox: checked').each(function(i){
				id[i] = $(this).val();
			});
			if(id.length===0){alert("Please select one checkbox.");}
			if(id=""){$.ajax({
				url : 'ajax_meble_insert.php',
				method :'post',
				data:{id:id,piece:piece,minutes:minutes,user:user,dates:dates},
				success : function(response){
					console.log(response);


				}

			});}
		});


	</script>
