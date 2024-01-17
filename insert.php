<?php
// insert duty data in database
include('link.php');
if(isset($_POST['submit']))
{
    $user_id= $_POST['user_id'];
    $duty_date= $_POST['date'];
    $duty_hour= $_POST['hour'];
    $duty_remark= $_POST['remark'];
    // echo $duty_date.$duty_hour.$duty_remark.$user_id;
    mysqli_query($con, "INSERT into duty set user_id ='$user_id',date_at = '$duty_date', hours = '$duty_hour', remark = '$duty_remark'");
    $message =urlencode( "Records inserted successfully.");
    header('location:duty_post.php?message='.$message);
}
?>