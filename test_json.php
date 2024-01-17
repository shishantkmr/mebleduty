<?php 
include('./link.php');
// $myObj = new stdClass();
$users = mysqli_query($con,"SELECT * FROM meble_list "); //select data by user email

// start php data to json
$json_array = array();
while ($row = mysqli_fetch_assoc($users))
{
$json_array [] = $row;
}
echo json_encode ($json_array);
$data =json_encode ($json_array);
// end
// create js file if something update in data base
$meble_name =mysqli_query($con, "SELECT * from meble_list");
$myfile = fopen("test_url.js", "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $data);


fclose($myfile);
// end

 ?>
 