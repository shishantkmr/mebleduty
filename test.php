<!DOCTYPE html>
<?php 
include ('link.php');
include ('assets/lib/header.php');
include ('assets/lib/user_details.php');
$query =mysqli_query($con,"SELECT * from meble_list");

?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <!-- <script src="https://code.jquery.com/jquery-1.10.2.js" type="text/javascript" ></script> -->
  <link rel="stylesheet" href="">
</head>
<body>
  <div class="container mt-5">
    <div class="row">

     <input class="form-control col-11"  name="search" id="search"  placeholder="Search.." autofocus>
     <table class="table table-hover table-bordered">
       <thead>
         <tr>
         <th>Meble name</th>
         <th>Digital time</th>
         <th>Paper time</th>
       </tr>
       </thead>
       <tbody id="result">
        
       </tbody>
     </table>
     
  </div>
</div>

<style>
</style>
</body>
</html>

<script>
  $(document).ready(function(){


    $('#search').keyup(function(){
     var search =$('#search').val();
     var title = "title";
 // alert(search);
     $.ajax({  
      url:"test_keyup.php",
      method:"POST",
      data:{title:title,search:search},
      success:function(response){
    // alert(response);
        $('#result').html(response);
      }
    });
   });



















        // $('#search').keyup(function(){
          // $('#result').html('');
          // var searchField = $('#search').val();
          // var expression = new RegExp(searchField, "i");
          // $.getJSON ('test_url.js', function(data) {
          //   $.each (data, function(key, value) {
          //     if(value.meble_name.search(expression) != -1 )
          //     {
          // alert('hello');
            // $('#result').append('<li class="list-group-item"><img src="'+
            //  value.image+'" height="40" width="40" class="img-thumbnail" /> '+value.athlete+' | <span class="text-muted">' +value.email+ '</span></li>');
                // $('#result').append('<p id="'+value.meble_name+'"><p data-target="meble">'+value.meble_name+'</p>');
                // $('#result').append('<tr id="'+value.meble_name+'"><td data-target="meble">'+value.meble_name+'</td> <td style="display:none;"><input class="hidden" data-target="meble_digital_time" value="'+value.meble_digital_time+'"></td><td style="display:none;"> <input class="hidden" data-target="meble_paper_time" value="'+value.meble_paper_time+'"></td><td><input type="text" data-target="minutes" class="minutes" placeholder="Minutes"></td><td ><input type="number" data-target="piece" class="inp" placeholder="123456789..?👻"/></td>                    <td>                      <input type="date" class="form-control date">                    </td>                    <td >                      <a class="btn btn-success store button" data-role="ADD" data-id="'+value.user_id+'">Store</a></td>                      <!-- edit -->                      <td><a  id="myBtn_edit-data" class="btn btn-success store buttons text-white" data-role="EDIT" data-id="myBtn_edit'+value.user_id+'">Edit</a></td>                      <!-- delete -->                      <td><a  id="myBtn_delete" class="btn btn-danger store buttons text-white" data-role="DELETE" data-id="'+value.user_id+'">Delete</a>                      </td>                    </tr>                    ');
              // }; 
            // });
          // });
        // });
  });

</script>