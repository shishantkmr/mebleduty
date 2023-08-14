<?php
include ('link.php');
include ('assets/lib/temp_head.php');
include ('assets/lib/user_details.php');
$query =mysqli_query($con,"SELECT * from meble_list");
?>

<body>
  <!-- success alert -->
  <div style="display: none;position: absolute; top:13%; left: 80%; z-index: 5;" class="alert alert-success float-right " id="success_alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Success! </strong> Product have added to your wishlist.
  </div>
  <!-- wrong error -->
  <div  style="display: none;position: absolute; top:13%; left: 80%; z-index: 5;" class=" alert alert-danger float-right " id="danger_alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Missed Number ! </strong> Missed there .
  </div>
  

  <div class="container " style="max-width: auto;">
    <h3>Search the meble</h3>

    <input class="form-control" id="myInput" type="search" placeholder="Search.." autofocus onfocus="this.select()">

    <input type="hidden" class="usr hide" data-id="<?php echo $user_name?>">
    <br>
    <div class="table-responsive">
      <table class="table table-hover " id="mytable">
        <thead>
          <tr >
            <th>Meble name</th>
            <th>Minutes</th>
            <th>Pieces</th>
            <th >Date</th>
            <!-- <th>action</th> -->
            <th class="text-center " colspan="4"> Action <button  id="myBtn"  data-id="" class="btn btn-primary ml-3"><i class="icofont-plus"></i></button>
              <!-- user hour for temp -->
            </th>
          </tr>
        </thead>
        <tbody id="myList">
          <?php 
          while($row=mysqli_fetch_array($query))
            {  ?>


              <tr id="<?php echo $row['id'];?>">
                <td data-target="meble"> <?php echo $row['meble_name'];?></td>


                <!-- this input is hidden beacuse use for edit -->
                <td style="display:none;"><input class="hidden" data-target="meble_digital_time" value="<?php echo $row['meble_digital_time'];?>"></td>
                <td style="display:none;"><input class="hidden" data-target="meble_paper_time" value="<?php echo $row['meble_paper_time'];?>"></td>

                
                  <td>
                    <input type="text" data-target="minutes" class="minutes" placeholder="Minutes"></td>
                    <td >
                  <input type="number" data-target="piece" class="inp" placeholder="123456789..?👻"/></td>
                    <td>
                      <input type="date" class="form-control date">

                    </td>


                    <td >
                      <a class="btn btn-success store button" data-role="ADD" data-id="<?php echo $row['id'];?>">Store</a></td>

                      <!-- edit -->
                      <td><a  id="myBtn_edit" class="btn btn-success store buttons text-white" data-role="EDIT" data-id="<?php echo $row['id'];?>">Edit</a></td>
                      <!-- delete -->
                      <td><a  id="myBtn_delete" class="btn btn-danger store buttons text-white" data-role="DELETE" data-id="<?php echo $row['id'];?>">Delete</a>

                      </td>
                    </tr>





                    <?php 
                  }
                  ?>

                </tbody>
              </table> 
            </div>

          </div>
          <!-- modal  -->


          <!-- The Modal -->
          <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">

              <!-- <p class="close_btn float-right">&times;</p> -->
              <div class="card">
                <div class="card-header"><h4>Add Meble</h4></div>
                <div class="card-body">
                  <!-- meble name -->
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="">Meble Name</span>
                    </div>
                    <input type="text" id="meble_name" class="form-control">
                  </div> 
                  <!-- meble paper time -->
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="">Meble Paper time</span>
                    </div>
                    <input type="text" id="meble_paper_time" class="form-control">
                  </div> 
                  <!-- meble digital time -->
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="">Meble digital time</span>
                    </div>
                    <input type="text" id="meble_digital_time" class="form-control">
                  </div> 
                </div>
                <div class="cart-footer mt-3 mb-1">
                  <button data-role="ADD_Meble" class="btn btn-primary float-left ml-3">Submit</button>
                  <button class="btn btn-danger float-right close_btn mr-3">Cancel</button>
                </div>
              </div>
            </div>

          </div>
          <!-- edit modal //////////////////////////////////////////////////////////////// -->
          <div id="myModal_edit" class="modal_edit">

            <!-- Modal content -->
            <div class="modal-content_edit">

              <!-- <p class="close_btn float-right">&times;</p> -->
              <div class="card">
                <div class="card-header"><h4>Edit Meble</h4></div>
                <div class="card-body">
                  <input type="hidden" id="id">
                  <!-- meble name -->
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="">Meble Name</span>
                    </div>
                    <input type="text" id="meble_name_edit" class="form-control">
                  </div> 
                  <!-- meble paper time -->
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="">Meble Paper time</span>
                    </div>
                    <input type="text" id="meble_paper_time_edit" class="form-control">
                  </div> 
                  <!-- meble digital time -->
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="">Meble digital time</span>
                    </div>
                    <input type="text" id="meble_digital_time_edit" class="form-control">
                  </div> 
                </div>
                <div class="cart-footer mt-3 mb-1">
                  <button data-role="EDIT_Meble" class="btn btn-primary float-left ml-3">Submit</button>
                  <button class="btn_edit btn btn-danger float-right close_btn_edit mr-3">Cancel</button>
                </div>
              </div>
            </div>

          </div>
          <!-- delete modal //////////////////////////////////////////////////////////////// -->
          <div id="myModal_delete" class="modal_delete">

            <!-- Modal content -->
            <div class="modal-content_delete">

              <!-- <p class="close_btn float-right">&times;</p> -->
              <div class="card">
                <div class="card-header"><h4>delete Meble</h4></div>
                <div class="card-body text-center">
                  <input type="hidden" id="id_delete">
                  <p class="mt-3 "><h3>Sure!!! Do you want Delete</h3></p>

                  <div class="cart-footer mt-3 mb-1">
                    <button data-role="delete_Meble" class="btn btn-primary float-left ml-3">Submit</button>
                    <button class="btn_delete btn btn-danger float-right close_btn_delete mr-3">Cancel</button>
                  </div>
                </div>
              </div>

            </div>
          </div>


          <style>
            .minutes{border-top:  none; border-left:none; border-right: none; font-size: 17px;line-height: 30px;}
            .minutes:hover{border: none;}
            .minutes:focus{border: none;}
            .inp {
              border:none;
              border-bottom: 1px solid #1890ff;
              padding: 5px 10px;
              outline: none;
              text-align: center;
            }

            [placeholder]:focus::-webkit-input-placeholder {
              transition: text-indent 0.4s 0.4s ease; 
              text-indent: -170%;
              opacity: 1;
            }
/*modal box*/
/* The Modal (background) */
.modal {
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
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 0px;
  border: 1px solid #888;
  width: 44%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
/* edit modal //////////////////////////////////////////////////// */
/* The Modal (background) */
.modal_edit {
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
.modal-content_edit {
  background-color: #fefefe;
  margin: auto;
  padding: 0px;
  border: 1px solid #888;
  width: 44%;
}

/* The Close Button */
.close_edit {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close_edit:hover,
.close_edit:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
/*edit input box hide*/

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
/*delete input box hide*/
#success-alert{display: none!important;}
#danger-alert{display: none!important;}
.show{display: none!important;}

</style>
<script>
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {

      var value = $(this).val().toLowerCase(); 
      $("#myList tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });

  });

  // $("#success-alert").css("display", "none");
  // $("#danger-alert").css("display", "none");
// $("#success-alert").hide(); //alert hide tag for not open to before procedure
// $("#danger-alert").hide(); //alert hide tag for not open to before procedure

  $(document).on('click','a[data-role=ADD]',function(){
    // alert($(this).data('id'));
    var id =$(this).data('id');
    var user = $('.usr').data('id').replace(/\s+/g, '');
    var meble =$('#'+id).children('td[data-target=meble]').text().replace(/\s+/g, '');
    var piece = $(this).closest('tr').find('input[data-target=piece]').val().replace(/\s+/g, '');
    var minutes = $(this).closest('tr').find('input[data-target=minutes]').val().replace(/\s+/g, '');
    var dates = $(this).closest('tr').find("input[type=date]").val().replace(/\s+/g, '');

    if(piece!=""){$.ajax({
      url : 'ajax_meble_insert.php',
      method :'post',
      data:{id:id,piece:piece,minutes:minutes,user:user,dates:dates},
      success : function(response){
        console.log(response);


      }

    });
          // alert
      document.getElementById("success_alert").style.display = "block";
      localStorage.setItem('show','true');


      $("#success_alert").fadeTo(300, 300).slideUp(300, function() {
        $("#success_alert").slideUp(300);
      });

    setTimeout(function(){         //set time for reload
     window.location.reload();
   }, 300);
  }


  else{

    document.getElementById("danger_alert").style.display = "block";
    localStorage.setItem('show','true');


    $("#danger_alert").fadeTo(2000, 500).slideUp(500, function() {
      $("#danger_alert").slideUp(500);
    });
  }
}


// auto close alert



);
// Add New meble in database////////////////////////////////////////////////////////

  $(document).on('click','button[data-role=ADD_Meble]',function(){
    // alert($(this).data('id'));
   var meble_name = $('#meble_name').val();
   var meble_digital_time = $('#meble_digital_time').val().replace(/\s+/g, '');
   var meble_paper_time = $('#meble_paper_time').val().replace(/\s+/g, '');


// alert (meble_name);
   if(meble_name!=""){$.ajax({
    url : 'ajax_meble_add.php',
    method :'post',
    data:{meble_name:meble_name,meble_digital_time:meble_digital_time,meble_paper_time:meble_paper_time},
    success : function(response){
      console.log(response);
    }

  });
          // alert
    location.reload();

  }
  else{
   document.getElementById("danger_alert").style.display = "block";
   localStorage.setItem('show','true');


   $("#danger_alert").fadeTo(2000, 500).slideUp(500, function() {
    $("#danger_alert").slideUp(500);
  });
 }


// auto close alert



});
// edit meble name /////////////////////////////////////////////////////////////////////////
  $(document).on('click','a[data-role=EDIT]',function(){document.getElementById("myModal_edit").style.display = "block";
  // console.log($(this).data('id'));
    var id = $(this).data('id');
    var meble_name = $(this).closest('tr').find("td[data-target=meble]").text();
    var meble_digital_time = $(this).closest('tr').find("input[data-target=meble_digital_time]").val();
    var meble_paper_time = $(this).closest('tr').find("input[data-target=meble_paper_time]").val();



// console.log(meble_name);
 // store the data in input field
    $('#id').val(id);  
    $('#meble_name_edit').val(meble_name);
    $('#meble_paper_time_edit').val(meble_paper_time);
    $('#meble_digital_time_edit').val(meble_digital_time);



  });
  $(document).on('click','button[data-role=EDIT_Meble]',function(){
    var id = $('#id').val();
  var meble_name_edit =$('#meble_name_edit').val(); //replace(/\s+/g, '') for remove white space
  var meble_paper_time_edit =$('#meble_paper_time_edit').val().replace(/\s+/g, '');
  var meble_digital_time_edit =$('#meble_digital_time_edit').val().replace(/\s+/g, '');
          // alert(meble_name_edit);
  if(meble_name_edit!=""){$.ajax({
    url : 'ajax_meble_edit.php',
    method :'post',
    data:{id:id,meble_name_edit:meble_name_edit,meble_paper_time_edit:meble_paper_time_edit,meble_digital_time_edit:meble_digital_time_edit},
    success : function(response){
      console.log(response);
    }

  });
    document.getElementById("success_alert").style.display = "block";
      localStorage.setItem('show','true'); //store in local storage


      $("#success_alert").fadeTo(2000, 500).slideUp(500, function() {
        $("#success_alert").slideUp(500);
      });

      document.getElementById("myModal_edit").style.display = "none";
      location.reload();
    } else{
     $("#danger-alert").fadeTo(2000, 500).slideUp(500, function() {
      $("#danger-alert").slideUp(500);
    });
   }


 });
// Delete the meble //////////////////////////////////////////////////////////////////
  $(document).on('click','a[data-role=DELETE]',function(){document.getElementById("myModal_delete").style.display = "block";
  // console.log($(this).data('id'));
    var id = $(this).data('id');


// console.log(meble_name);
 // store the data in input field
    $('#id_delete').val(id);  

  });
  $(document).on('click','button[data-role=delete_Meble]',function(){
    var delete_id = $('#id_delete').val();
    console.log(id);
    $.ajax({
      url : 'ajax_meble_insert.php',
      method :'post',
      data:{delete_id:delete_id},
      success : function(response){
        console.log(response);
      }

    });


    document.getElementById("success_alert").style.display = "block";
      localStorage.setItem('show','true'); //store in local storage

// success notifiaction
      $("#success_alert").fadeTo(500, 500).slideUp(500, function() {
        $("#success_alert").slideUp(500);
      });

      location.reload();





    });
// end //////////////////////////////////////////////////////////////////////////////////
// modal box
// Get the modal
  $(document).ready(function(){
    var modal = document.getElementById("myModal");

// Get the button that opens the modal
    var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
    var close = document.getElementsByClassName("close_btn")[0];

// When the user clicks the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "block";
    }

// When the user clicks on <span> (x), close the modal
    close.onclick = function() {
      modal.style.display = "none";
    }

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  });
// edit modal box /////////////////////////////////////////////////////////
// Get the modal
  $(document).ready(function(){
    var modal_edit = document.getElementById("myModal_edit");

// Get the button that opens the modal
    var btn_edit = document.getElementById("myBtn_edit");

// Get the <span> element that closes the modal
    var close_edit = document.getElementsByClassName("close_btn_edit")[0];

// When the user clicks the button, open the modal 
  // btn_edit.onclick = function() {
  //   // alert('hello');
  //   modal_edit.style.display = "block";
  // }

// When the user clicks on <span> (x), close the modal
    close_edit.onclick = function() {
      modal_edit.style.display = "none";
    }

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal_edit) {
        modal_edit.style.display = "none";
      }
    }});

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
    }});

  </script>

</body>