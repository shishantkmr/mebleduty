<?php 
include('../link.php');
if(isset($_POST['find'])){
	$search = $_POST['searchField'];
	$query = mysqli_query($con,"SELECT * FROM meble_list WHERE meble_name LIKE '%$search%' ") or die('error');

	if(mysqli_num_rows($query)>0){
		foreach($query as $row){
			echo "<tr id=".$row['id'].">
                <td data-target='meble'>".$row['meble_name']."</td>
                <!-- this input is hidden beacuse use for edit -->
                <td style='display:none;'>
               	 <input class='hidden' data-target='meble_digital_time' value='".$row['meble_digital_time']."'/>
                </td>
                <td style='display:none;'>
                	<input class='hidden' data-target='meble_paper_time' value='".$row['meble_paper_time']."'>
                </td>

                
                  <td>
                    <input type='text' data-target='minutes' class='minutes' placeholder='Minutes'></td>
                    <td >
                  <input type='number' data-target='piece' class='inp' placeholder='123456789..?👻'/></td>
                    <td>
                      <input type='date' class='form-control date'>

                    </td>


                    <td >
                      <a class='btn btn-success store button' data-role='ADD' data-id='".$row['id']."'>Store</a></td>

                     
                      <td><a  id='myBtn_edit' class='btn btn-success store buttons text-white' data-role='EDIT' data-id='".$row['id']."'>Edit</a></td>
                    
                      <td><a  id='myBtn_delete' class='btn btn-danger store buttons text-white' data-role='DELETE' data-id='".$row['id']."'>Delete</a>

                      </td>
                    </tr>";
		}
	}
}
// data insert
if(isset($_POST['piece'])){
    $id = $_POST['id'];
    $piece = $_POST['piece'];
    $minutes = $_POST['minutes'];
    $user =$_POST['user'];
    $dates =$_POST['dates'];

    if (isset($dates) && ($dates !== '')) {
        mysqli_query($con,"INSERT INTO percentage set meble_list_id='$id',meble_pieces='$piece', user ='$user', minutes = '$minutes', meble_cart_date ='$dates', created_at =Now()");
    }
    else{ 
      mysqli_query($con,"INSERT INTO percentage set meble_list_id='$id',meble_pieces='$piece', user ='$user',minutes = '$minutes', meble_cart_date = Now(), created_at =Now()");
  }
}
if(isset($_POST['delete_id'])){
    $delete_id = $_POST['delete_id'];
    mysqli_query($con,"DELETE from meble_list where id='$delete_id'");
   }

// insert new meble on data base



if(isset($_POST['meble_add'])){
$meble_name = $_POST['meble_name'];
$meble_digital_time = $_POST['meble_digital_time'];
$meble_paper_time =$_POST['meble_paper_time'];
if (isset($meble_name) && $meble_name !== '') {

  mysqli_query($con,"INSERT INTO meble_list set meble_name='$meble_name',meble_digital_time='$meble_digital_time', meble_paper_time ='$meble_paper_time', meble_percent_date =Now()");
 }}
 // meble list edit and update
if(isset($_POST['meble_edit'])){
 $id =$_POST['id'];
$meble_name_edit = $_POST['meble_name_edit'];
$meble_digital_time_edit = $_POST['meble_digital_time_edit'];
$meble_paper_time_edit =$_POST['meble_paper_time_edit'];



if (isset($meble_name_edit)) {

   mysqli_query($con,"UPDATE meble_list set meble_name='$meble_name_edit',meble_digital_time='$meble_digital_time_edit', meble_paper_time ='$meble_paper_time_edit', meble_percent_date =Now() where id = '$id'");
  
   }}
 
 ?>
 