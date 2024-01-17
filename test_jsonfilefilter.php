<body>
	<br /><br />
	<div class="container" style="width:900px;">
		<h2 align="center">JSON Live Data Search using Ajax JQuery</h2>
		<h3 align="center">Employee Data</h3>
		<br /><br />
		<div align="center">
			<input type="text" name="search" id="search" placeholder="Search
			Employee Details" class="form-control" />
		</div>
		<ul class="list-group" id="result"></ul>
		<br />
	</div>
</body>
<script>
	$(document).ready(function(){
		$('#search').keyup(function(){
			$('#result').html('');
			var searchField = $('#search').val();
			var expression = new RegExp(searchField, "i");
			$.getJSON ('test_jsonfilefilter.php', function(data) {
				$.each (data, function(key, value) {
					if(value.name.search(expression) != -1 || value.location.search(
						expression) != -1)
					{
						$('#result').append('<li class="list-group-item"><img src="'+
							value.image+'" height="40" width="40" class="img-thumbnail" /> '+value.athlete+' | <span class="text-muted">' +value.email+ '</span></li>');
					}; 
			});
			});
			});
			});

		</script>