<?php

include('link.php');
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
    mysqli_query($con,"Delete from meble_list where id='$delete_id'");  
}



?>