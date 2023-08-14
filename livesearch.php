<script src="https://code.jquery.com/jquery-1.10.2.js" type="text/javascript" ></script>
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<?php

// first seaches
include ('link.php');
if (isset($_POST['query'])) {
	$query = "SELECT * FROM meble_list WHERE meble_name LIKE '{$_POST['query']}%' LIMIT 100";
	$result = mysqli_query($con, $query);
	echo" <div class='alert alert-success mt-3 text-left' role='alert'>";
	if (mysqli_num_rows($result) > 0) {


		?>
		<table class="table table-bordered">
			<caption>Searches list....</caption>
			<thead>
				<tr>
					<th class="pr-4">Meble Name</th>
					<th>Action</th>
					
				</tr>
			</thead>

			<tbody>
				<?php
				while ($res = mysqli_fetch_array($result)) {

					?>


					<tr>
						<td><?php echo $res['meble_name'];?></td>
						<td>
							<a href='#'>
								<input class="meble" type="hidden" value="<?php echo $res['meble_name']?>">



								<button class="btn btn-success button">ADD</button><?php ?></a>
							</td>

						</tr>



						<?php

					}
					?>
				</tbody>
			</table>


			<?php
		} else {
			echo "

			Sorry Didn't Find !!!

			";
		}
		echo       "</div> ";
	}
	?>
	<script>
		// $('.button').click(function(e){
		// 	e.preventDefault();
		// 	alert('ehllo');
			// var meble = $('.meble').val();
			// console.log(meble);
			// $.ajax({
			// 	type:"POST",
			// 	url:"ajax.php",
			// 	data:{
			// 		'checking_add':true,
			// 		'meble' : meble,
			// 	}
			// 	success: function(response){
			// 		console.log(response);
			// 	}
			// });
		// });
	</script>
