<?php include('assets/lib/header.php') ?>
<body style="background-color: #306293;">
	
<!-- first seaches -->
    <div class="container mt-5" style="max-width: 1000px">
        <div class="card-header alert alert-warning text-center mb-3">
            <h2>Search Furniture Names</h2>
        </div>
        <input type="text" class="form-control input-line-color" style="line-height: 55px;" name="live_search" id="live_search" autocomplete="off"
            placeholder="Search ...">
        <div id="search_result"></div>
       
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#live_search").keyup(function () {
                var query = $(this).val();
                if (query != "") {
                    $.ajax({
                        url: 'livesearch.php',
                        method: 'POST',
                        data: {query: query},

                        success: function (data) {

                        
                            $('#search_result').html(data);
                            $('#search_result').css('display', 'block');
                            $("#live_search").focusout(function () {
                                // $('#search_result').css('display', 'none');
                            });
                            $("#live_search").focusin(function () {
                                $('#search_result').css('display', 'block');
                               	
                            });
                           
                        }
                    });
                } else {
                    $('#search_result').css('display', 'none');
                }
            });

$('.button').click(function(e){
			e.preventDefault();
			alert('ehllo');
});

        });


       
       
    </script>
    
    </body>