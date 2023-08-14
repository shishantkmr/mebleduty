<?php
include('link.php');
$id =$_POST['id'];
$meble_name_edit = $_POST['meble_name_edit'];
$meble_digital_time_edit = $_POST['meble_digital_time_edit'];
$meble_paper_time_edit =$_POST['meble_paper_time_edit'];



    if (isset($meble_name_edit)) {
        
  mysqli_query($con,"UPDATE meble_list set meble_name='$meble_name_edit',meble_digital_time='$meble_digital_time_edit', meble_paper_time ='$meble_paper_time_edit', meble_percent_date =Now() where id = '$id'");
   
}


 
?>