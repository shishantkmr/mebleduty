<?php
include('link.php');
if(isset($_POST['piece']))
{
 mysqli_query($con,"SELECT count(id) as 'id' FROM percentage");
}

?>