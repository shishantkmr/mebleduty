<?php
include('assets/lib/header.php');

?>
<?php

if (isset($_SESSION['email'])){
	$T_UserName=$_SESSION['email'];
}
if (isset($_GET['id'])){
	$loginid=$_GET['id'];

//Get  login username if using GET
	$loginid=mysql_real_escape_string($loginid);
	$query = "SELECT `id` FROM `users` WHERE id=$loginid";
	$result = mysql_query($query);
	$row = mysql_fetch_row($result);
	$T_UserName=$row['id'];
}
?>
<?php
include('link.php');
$result = mysqli_query($con,"SELECT * FROM users where email = '" . $T_UserName. "'");
$row= mysqli_fetch_array($result);
?>


<div class="container mt-3">
	
	<div class="row ">
		<div class="col-sm-12 col-lg-10 col-md-10 col-xl-10 col-xxl-10 mt-5">
			<form  action="insert.php" method="Post" enctype="multipart/form-data">
				
				<label class=" font-weight-bold text-white form-control bg-success">Create Post <span class="bg-primary float-right text-white"><a href="duty_list.php"> List </a></span></label>


				<input type="hidden" name="user_id" class="txtField" value="<?php echo $row['id']; ?>"> 
				
				<!-- {{-- date --}} -->
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroupPrepend2"><i class="icofont-ui-calendar"></i></span>
						</div>
						<input type="text" id="datepicker" class="keyboard form-control"  name="date" placeholder="date....." aria-describedby="inputGroupPrepend2" required autocomplete="off">
						
					</div>
				</div>
				<!--  hours - -->
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroupPrepend2"><i class="icofont-ui-alarm"></i></span>
						</div>
						<input class="form-control" id="validationDefaultUsername" name="hour" placeholder="hours ... " aria-describedby="inputGroupPrepend2" required>

						
					</div>
				</div>
				<!-- {{-- Remarks --}} -->
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text " id="inputGroupPrepend2"><i class="icofont-ui-copy text-danger"></i></span>
						</div>
						<input class="form-control" id="remark" name="remark" placeholder="Remarks Today ... " aria-describedby="inputGroupPrepend2" >
						
						
					</div>
				</div>

				






				<div class="form-group">

					<button name="submit" type="submit" id ="success"class="btn btn-success"> Send Post</button>
				</div>
			</form>
		</div>   
	</div>
</div>

<?php

include('footer.php');
?>