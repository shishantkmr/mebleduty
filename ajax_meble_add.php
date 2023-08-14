<?php
include('link.php');
$meble_name = $_POST['meble_name'];
$meble_digital_time = $_POST['meble_digital_time'];
$meble_paper_time =$_POST['meble_paper_time'];



    if (isset($meble_name) && $meble_name !== '') {
        
  mysqli_query($con,"INSERT INTO meble_list set meble_name='$meble_name',meble_digital_time='$meble_digital_time', meble_paper_time ='$meble_paper_time', meble_percent_date =Now()");
   
}


 
?>