<?php

// $servername='sql111.epizy.com';
// $username='epiz_28317872';
// $password='Pv9wigHohd3';
// $dbname = "epiz_28317872_duty";

// $servername='server347.web-hosting.com';
// $username='mebldato_shishant';
// $password='9gCOcoPfw%Ka';
// $dbname = "mebldato_meble_duty"; 



$servername='localhost';
$username='root';
$password='';
$dbname = "duty"; 
$con=mysqli_connect($servername,$username,$password,"$dbname");
if(!$con){
	die('Could not Connect My Sql:' .mysql_error());
}
?>

