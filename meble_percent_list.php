<?php include('assets/lib/header.php');include('link.php');?>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<!-- get data from percentage table when the confirm is 1 -->
<?php $meble_time = mysqli_query($con, "SELECT meble_cart_date,meble_who_confirm, sum(digital_temp_sum_minutes) as total_time from percentage where meble_confirm = '1' GROUP BY meble_cart_date ");?>

<div class="container mt-2">
	
	<div class="row">
		<!-- Accordion  -->
		<section class="accordion" role="tablist" aria-live="polite" data-behavior="accordion">
			<?php while($row = mysqli_fetch_array($meble_time))
			{
				$i=0;
				$cart_date = $row['meble_cart_date'];?>
				<article class="accordion__item js-show-item-default" data-binding="expand-accordion-item">
					<span id="tab5" tabindex="0" class="accordion__title" aria-controls="panel5" role="tab" aria-selected="false" aria-expanded="false" data-binding="expand-accordion-trigger">

						<h5><?php echo date("d F, Y (l) ",strtotime($row['meble_cart_date'])); ?></h5>
						<h5 class="float-right pr-5">
							<?php if($row['total_time']>0){echo number_format((float)$row['total_time'], 2).' min';}else{echo "Don't have minutes.";}?>

						</h5>
					</span>

					<div id="panel5" class="accordion__content" role="tabpanel" aria-hidden="true" aria-labelledby="tab5" data-binding="expand-accordion-container">
						<div class="accordion__content-inner">
							<p><table class="table table-hover tables mr-3">
								<tr class="bg-info table-header">
									<th>Meble Name</th>
									<th class="text-center">Meble Piece</th>
									<th class="text-center">Meble Time</th>
									<th class="text-center">Meble total time</th>
								</tr>
								<?php daily_rpt_list($cart_date);?>

							</table>

						</p>
					</div>
				</div>

			</article>
		<?php } ?>


	</section>
</div>
</div>
<?php  function daily_rpt_list($cart_date)
                                // get data from another table with cat id
{

	$j=0;
	global $con;


	$result = mysqli_query($con, "SELECT pr.*,mb.* from percentage pr,meble_list mb where meble_cart_date='$cart_date' and pr.meble_list_id = mb.id and meble_confirm = 1 order by created_at asc ");







	?>
	<?php 
	while($row=mysqli_fetch_array($result))
		{?> 


			<!-- percentage table data should be in table -->


			<tr>
				<td ><?php echo $row['meble_name'];?> </td>
				<td class="text-center"><?php echo $row['meble_pieces'];?> </td>
				<td class="text-center"><?php echo $row['minutes'];?> </td>
				<td class="text-center"><?php echo $row['digital_temp_sum_minutes'];?> </td>
			</tr>





			<?php  $j++;}} ?>


			<style>
				.tables{ width:800px;}
				.table-header{color:lavender;}
				.table-header:hover{color:lavender!important;}

				h1 {
					font-family: "Lobster Two", cursive;
					text-align: center;
					margin-top: 30px;
					font-size: 50px;
					color: #2b3a40;
				}

				.accordion {
					background-color: #fefffa;
					max-width: 900px;
					margin: 50px auto;
					border-top: 6px solid #44BBA4;
					line-height: 1.6;
					box-shadow: 5px 5px 10px 0px #a4bac1;
				}
				.accordion__item {
					border-bottom: 1px solid #dce7eb;
				}
				.accordion__title {
					padding: 15px 15px 15px 40px;
					display: block;
					position: relative;
					font-weight: 400;
				}
				.accordion__title:before {
					font-family: FontAwesome;
					content: "\00BB";
					font-size: 20px;
					position: absolute;
					left: 15px;
					top: 12px;
					color: #44BBA4;
				}
				.accordion__title h5 {
					border-bottom: 1px solid #fefffa;
					display: inline-block;
				}
				.accordion__title:hover, .accordion__title:focus {
					cursor: pointer;
					outline: none;
				}
				.accordion__title:hover h5, .accordion__title:focus h5 {
					border-bottom-color: #a8bdc4;
					display: inline-block;
				}
				.is-expanded .accordion__title:before {
					content: "\00D7";
				}
				.accordion__content-inner {
					padding: 0 40px 10px 40px;
				}
				.accordion__content {
					transition: height 0.3s ease-out;
					height: 0;
					overflow: hidden;
				}
			</style>
			<script>
				var accordion = $("body").find('[data-behavior="accordion"]');
				var expandedClass = "is-expanded";

				$.each(accordion, function () {
  // loop through all accordions on the page

					var accordionItems = $(this).find('[data-binding="expand-accordion-item"]');

					$.each(accordionItems, function () {
    // loop through all accordion items of each accordion
						var $this = $(this);
						var triggerBtn = $this.find('[data-binding="expand-accordion-trigger"]');

						var setHeight = function (nV) {
      // set height of inner content for smooth animation
							var innerContent = nV.find(".accordion__content-inner")[0],
							maxHeight = $(innerContent).outerHeight(),
							content = nV.find(".accordion__content")[0];

							if (!content.style.height || content.style.height === "0px") {
								$(content).css("height", maxHeight);
							} else {
								$(content).css("height", "0px");
							}
						};

						var toggleClasses = function (event) {
							var clickedItem = event.currentTarget;
							var currentItem = $(clickedItem).parent();
							var clickedContent = $(currentItem).find(".accordion__content");
							$(currentItem).toggleClass(expandedClass);
							setHeight(currentItem);

							if ($(currentItem).hasClass("is-expanded")) {
								$(clickedItem).attr("aria-selected", "true");
								$(clickedItem).attr("aria-expanded", "true");
								$(clickedContent).attr("aria-hidden", "false");
							} else {
								$(clickedItem).attr("aria-selected", "false");
								$(clickedItem).attr("aria-expanded", "false");
								$(clickedContent).attr("aria-hidden", "true");
							}
						};

						triggerBtn.on("click", event, function (e) {
							e.preventDefault();
							toggleClasses(event);
						});

    // open tabs if the spacebar or enter button is clicked whilst they are in focus
						$(triggerBtn).on("keydown", event, function (e) {
							if (e.keyCode === 13 || e.keyCode === 32) {
								e.preventDefault();
								toggleClasses(event);
							}
						});
					});
				});

			</script>