<?php
include('link.php');
include('assets/lib/header.php');
include ('assets/lib/user_details.php');
// $data = mysqli_query($con,"SELECT * From percentage where meble_confirm is null");

// $result = mysqli_query($con,"SELECT mup.*,usr.username,usr.role FROM mess_user_paid mup,users usr where usr.id=mup.user_id And mup.id>$monthly_user_paid_id order by post_date asc"); 

$result = mysqli_query($con,"SELECT prsntg.*,mbl.meble_name,mbl.meble_paper_time,mbl.meble_digital_time,mbl.meble_percent_date FROM percentage prsntg,meble_list mbl where mbl.id=prsntg.meble_list_id and prsntg.meble_confirm IS NULL order by meble_cart_date asc"); 

?>

<body>
	<div class="container">
		<!-- success alert -->
		<div class="alert alert-success float-right" id="success-alert">
			<button type="button" class="close" data-dismiss="alert">x</button>
			<strong>Success! </strong> Product have added to your wishlist.
		</div>
		<!-- wrong error -->
		<div class="alert alert-danger float-right" id="danger-alert">
			<button type="button" class="close" data-dismiss="alert">x</button>
			<strong>Missed !!! </strong> Important fields there .
		</div>
	</div>
	<div class="container">

		
		<h3>Confirm the Meble</h3>
		<div class="table-responsive">
			<table class="table table-border table-hover">
				<thead><tr>
					<th>Check</th>
					<th class="toggles">Entry</th>
					<th>Made In</th>
					<th>Meble name</th>
					<th class="toggles">Minutes</th>
					<th class="text-center">Meble piece</th>
					<th>Confirm Date</th>
					<th colspan="2">Action   <button   class="btn btn-primary btn_hour ml-3 "><i class="icofont-ui-user"></button></th>
				</tr>
			</thead>
			<input type="hidden"  class="user" data-id="<?php echo $user_name;?>">
			<tbody>
				<?php $i=0;
				$j= 1; while($row=mysqli_fetch_array($result)){?>
					<tr data-id="<?php echo $row['id'];?>">
						<td><input type="checkbox" class="checkbox-size" name="opt" value="<?php echo $row['minutes']*$row['meble_pieces'];?>"></td>

						<td><span class="font-italic badge badge-info text-capitalize"><?php echo $row['user']; ?></span></td>
						<td class="badge light-color"><?php echo $row['meble_cart_date']; ?></td>
						<td><?php echo $row['meble_name']; ?></td>
						<td><?php echo $row['minutes']; ?></td>

						<td>
							<input type="number" class="inp" value="<?php echo $row['meble_pieces'];?>"/>
						</td>
						<td>
							<input type="date" class="form-control date" value="<?php echo $row['meble_cart_date'];?>"> 
							<input type="number" data-target="hour" class="form-control hour" placeholder="Today's both hour"> 
							<input type="hidden" data-target="paper" class="form-control" value="<?php echo $row['meble_paper_time'];?>">

							<input type="hidden" data-target="digital" class="form-control" value="<?php echo $row['meble_digital_time'];?>">
							<input type="hidden" data-target="minutes" class="form-control" value="<?php echo $row['minutes'];?>">
						</td>

						<td>
							<button data-role="ADD" id="myBtn"  data-id="<?php echo $row['id'];?>" class="btn btn-primary">Confirm</button>
						</td>
						<td>
							<button data-role="DELETE" id="myBtn_delete"  data-id="<?php echo $row['id'];?>" class="btn btn-danger">Delete</button>
						</td>
					</tr>

					<?php $i++;}?>
					<span class="lead badge-primary pr-3 show">Selected time: <span class="badge badge-primary" id="total"></span>min.</span>
				</tbody>
			</table>
		</div>
	</div>
</body>
<!-- model -->

<!-- Trigger/Open The Modal -->


<!-- The Modal -->
<div id="myModal" class="modal">

	<!-- Modal content -->
	<div class="modal-content">
		<!-- <span class="close ">&times;</span> -->

		<div class="card">
			<div class="card-header text-center font-weight-bold">
				<h2>Attention</h2>
			</div>
			<div class="card-body">
				<h3 class="text-center">Are you going to Confirm !!!</h3>
				<input type="hidden" id="id">
				<input type="hidden" id="user">
				<input type="hidden" id="piece">
				<input type="hidden" id="date">
				<input type="hidden" id="hour">
				<input type="hidden" id="paper_time_sum">
				<input type="hidden" id="digital_time_sum">
				<input type="hidden" id="minutes">
			</div>
			<div class="card-footer">
				<button data-role="confirm"class="btn btn-success float-left confirm">Confirm</button>
				<button class="btn btn-danger float-right exit">Cancel</button>
			</div>
		</div>
	</div>

</div>

<!-- end model -->
<!-- delete modal //////////////////////////////////////////////////////////////// -->
<div id="myModal_delete" class="modal_delete">

	<!-- Modal content -->
	<div class="modal-content_delete">

		<!-- <p class="close_btn float-right">&times;</p> -->
		<div class="card">
			<div class="card-header text-center"><h4>Delete Meble</h4></div>
			<div class="card-body text-center">
				<input type="hidden" id="delete_id">

				<h5>Sure!!! Are you going to delete.</h5>
			</div>
			<div class="cart-footer mt-3 mb-1">
				<button data-role="DELETE_Meble" class="btn btn-primary float-left ml-3">Delete</button>
				<button class="btn_delete btn btn-danger float-right close_btn_delete mr-3">Cancel</button>
			</div>
		</div>
	</div>

</div>

<script>
		$("#success-alert").hide(); //alert hide tag for not open to before procedure
		$("#danger-alert").hide(); 

		$(".hour").hide(); //user temp hour input box
$(document).on('click', '.btn_hour', function () {
  $(".hour").toggle();
 });

	// Get the modal
		var modal = document.getElementById("myModal");

// Get the button that opens the modal
// var btn_id = $('.btn').data('id');

// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("exit")[0];


		$(document).on('click','button[data-role=ADD]',function(){modal.style.display = "block";
	//console.log($(this).data('id'));
			var id = $(this).data('id');
			var pieces = $(this).closest('tr').find("input[type=number]").val();
			var users = $('.user').data('id');
			var dates = $(this).closest('tr').find("input[type=date]").val();
			var hour = $(this).closest('tr').find("input[data-target=hour]").val();
			var paper_time = $(this).closest('tr').find("input[data-target=paper]").val();
			var digital_time = $(this).closest('tr').find("input[data-target=digital]").val();
			var minutes = $(this).closest('tr').find("input[data-target=minutes]").val();

			// calculate paper time
			var paper_time_sum = paper_time*pieces;
			// calculate digital time
			var digital_time_sum = digital_time*pieces;
			var temp_digital_time_sum = minutes*pieces;

 // store the data in input field
			$('#id').val(id);  
			$('#user').val(users);
			$('#piece').val(pieces);
			$('#date').val(dates);
			$('#hour').val(hour);
			$('#paper_time_sum').val(paper_time_sum);
			$('#digital_time_sum').val(digital_time_sum);
			$('#minutes').val(temp_digital_time_sum);
			// console.log(dates);


		});
		// confrim button
		$(document).on('click','button[data-role=confirm]',function(){
			var id = $('#id').val();
			var user =$('#user').val();
			var piece =$('#piece').val();
			var dates =$('#date').val();
			var hour = $('#hour').val();
			var total_digital_temp_minutes = $('#minutes').val();
			var paper_time_sum = $('#paper_time_sum').val();
			var digital_time_sum = $('#digital_time_sum').val();
			// console.log(dates);
			if((piece!="")&&(dates!="")){$.ajax({
				url : 'ajax_confirm_page.php',
				method :'post',
				data:{id:id,piece:piece,user:user,dates:dates,total_digital_temp_minutes:total_digital_temp_minutes,hour:hour,paper_time_sum:paper_time_sum,digital_time_sum:digital_time_sum},
				success : function(response){
					console.log(response);
				}

			});
          // alert
				$("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
					$("#success-alert").slideUp(500);

				});
				$(this).closest('tr').find("input").val("");
				

				location.reload(); 
			}
			else{
				$("#danger-alert").fadeTo(2000, 500).slideUp(500, function() {
					$("#danger-alert").slideUp(500);
				});
			}
			modal.style.display = "none";

		});
		// delete
		$(document).on('click','button[data-role=DELETE]',function(){document.getElementById("myModal_delete").style.display = "block";
			var id= $(this).data('id');
			$('#delete_id').val(id);
	// console.log($(this).data('id'));

		});
		$(document).on('click','button[data-role=DELETE_Meble]',function(){
			var delete_id =$('#delete_id').val();
			// console.log(delete_id);
			$.ajax({
				url:'ajax_confirm_page.php',
				method:'POST',
				data:{delete_id:delete_id},
				success:function(response){
					console.log(response);
				}
			});
			$("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
					$("#success-alert").slideUp(500);
		});
					location.reload();
});
// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
			modal.style.display = "none";
		}

// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}

// sum the checked item
		$('.show').hide();
		$("input[name='opt']").change(function() {
			totalCount = calculateAll()
			$('#total').html(totalCount);
      // alert(totalCount);
			$('.show').show();
		});
		function calculateAll(){
			count = 0;
			$("input[name='opt']").each(function(index, checkbox){
				if(checkbox.checked)
					count += parseInt(checkbox.value)
			})
			return count;  
		}
		// delete modal box /////////////////////////////////////////////////////////
// Get the modal
		$(document).ready(function(){
			var modal_delete = document.getElementById("myModal_delete");

// Get the button that opens the modal
			var btn_delete = document.getElementById("myBtn_delete");

// Get the <span> element that closes the modal
			var close_delete = document.getElementsByClassName("close_btn_delete")[0];

// When the user clicks the button, open the modal 
  // btn_delete.onclick = function() {
  //   // alert('hello');
  //   modal_delete.style.display = "block";
  // }

// When the user clicks on <span> (x), close the modal
			close_delete.onclick = function() {
				modal_delete.style.display = "none";
			}

// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
				if (event.target == modal_delete) {
					modal_delete.style.display = "none";
				}
			}
		});
		</script>
		<style>
			/* delete modal //////////////////////////////////////////////////// */
/* The Modal (background) */
.modal_delete {
	display: none; /* Hidden by default */
	position: fixed; /* Stay in place */
	z-index: 1; /* Sit on top */
	padding-top: 100px; /* Location of the box */
	left: 0;
	top: 0;
	width: 100%; /* Full width */
	height: 100%; /* Full height */
	overflow: auto; /* Enable scroll if needed */
	background-color: rgb(0,0,0); /* Fallback color */
	background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content_delete {
	background-color: #fefefe;
	margin: auto;
	padding: 0px;
	border: 1px solid #888;
	width: 44%;
}

/* The Close Button */
.close_delete {
	color: #aaaaaa;
	float: right;
	font-size: 28px;
	font-weight: bold;
}

.close_delete:hover,
.close_delete:focus {
	color: #000;
	text-decoration: none;
	cursor: pointer;
}
/*custfom badge of meble made date*/
.light-color{background-color: #bff5e4;}
/*edit input box hide*/
input.checkbox-size{width:17px; height: 17px;}
</style>