<?php

include('../link.php');
if(isset($_POST['group_name'])){
    $id = $_POST['id'];
    $group_name = $_POST['group_name'];
    $group_code =$_POST['group_code'];

   
        // mysqli_query($con,"UPDATE INTO users set id='$id',group_name='$group_name'");
        mysqli_query($con,"UPDATE users
SET group_name='$group_name',group_no='$group_code'
WHERE id = $id;");

   }
if(isset($_POST['delete_id'])){
    $delete_id = $_POST['delete_id'];
    mysqli_query($con,"Delete from meble_list where id='$delete_id'");  
}



?>