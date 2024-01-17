<?php
include('link.php');
// confirm 


if (isset($_POST['piece'])) {
    $id = $_POST['id'];
    $piece = $_POST['piece'];
    $user =$_POST['user'];
    $usr_id =$_POST['usr_id'];
    $dates =$_POST['dates'];
    $hour =$_POST['hour'];
    $paper_time_sum =$_POST['paper_time_sum'];
    $digital_time_sum =$_POST['digital_time_sum'];
    $total_digital_temp_minutes = $_POST['total_digital_temp_minutes'];
    mysqli_query($con,"UPDATE  percentage set meble_confirm='1',meble_pieces='$piece',digital_temp_sum_minutes = '$total_digital_temp_minutes', meble_who_confirm ='$usr_id',meble_who_confirm_date ='$dates',user_hours_temp='$hour',meble_digital_temp_sum='$digital_time_sum', meble_paper_temp_sum='$paper_time_sum' where id='$id'");
    
}
// delete
if(isset($_POST['delete_id'])){
    $delete_id = $_POST['delete_id'];
    mysqli_query($con,"Delete from percentage where id='$delete_id'");  
} 
?>