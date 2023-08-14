<head>
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }

    table, td, th {
      border: 1px solid black;
      padding: 5px;
    }

    th {text-align: left;}
  </style>
</head>


<?php
include('link.php');


$q = intval($_GET['q']);

if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

$sql="SELECT * FROM occur_day WHERE  cat_id = '".$q."' AND daily = 0 OR daily IS NULL order by occur_date desc";
$result = mysqli_query($con,$sql);


while($row = mysqli_fetch_array($result)) {
  // daily date for get data within 7 days
  $daily_date = $row['occur_date'];
 echo " 
 <li>
 <span class='occur_date'>".$row['occur_date']."</span> <span class='lead '>"; 
 $date1 = strtotime($row['occur_date']);
 $date2 = strtotime(date('y-m-d'));
 
  // Formulate the Difference between two dates
 $diff = abs($date2 - $date1);
 
  // To get the year divide the resultant date into
  // total seconds in a year (365*60*60*24)
 $years = floor($diff / (365*60*60*24));
 
  // To get the month, subtract it with years and
  // divide the resultant date into
  // total seconds in a month (30*60*60*24)
 $months = floor(($diff - $years * 365*60*60*24)
   / (30*60*60*24));
 
  // To get the day, subtract it with years and
  // months and divide the resultant date into
  // total seconds in a days (60*60*24)
 $days = floor(($diff - $years * 365*60*60*24 -
   $months*30*60*60*24)/ (60*60*24));
 
  // To get the hour, subtract it with years,
  // months & seconds and divide the resultant
  // date into total seconds in a hours (60*60)

 
  // To get the minutes, subtract it with years,
  // months, seconds and hours and divide the
  // resultant date into total seconds i.e. 60
 
 
  // To get the minutes, subtract it with years,
  // months, seconds, hours and minutes

 
  // Print the result

 if($years==0 && $months==0){ printf("%d days ", $days);}
 elseif($years==0){ printf("%d months %d days ",$months, $days);}
 else(printf("%d years, %d months, %d days", $years, $months,
   $days) );
  echo "</span>
<div class='content'>
<h3>".$row['occur_title']."</h3>

".$row['occur_text']."

</div>";


 
if ($row['cat_id']==2){

getdata($daily_date);
}
echo "</li>";
}
echo "</table>";
// geting data from the each 7 days
function getdata($daily_date)
{
  $date = $daily_date; // get date from database
  $to =date('Y-m-d', strtotime('-1 days', strtotime($daily_date)));// substract one day because get before last date
$from = date('Y-m-d', strtotime('-7 days', strtotime($date))); 
$sum=0; // asume
global $con;
$first_date = mysqli_query($con, "select * from bmi where bmi_date between '$from' and '$to' and daily = 1");
 while($rows = mysqli_fetch_array($first_date)){
echo "<table class='table-bordered   text-info ' style='border-style:hidden; overflow-x:auto; table-layout: fixed; width: auto; color:white; line-height:15px;'>
<tbody>
<tr  >
<td class='border-1' ><i class='pr-2'>".date('D' ,strtotime($rows['bmi_date']))." </i> " .$rows['calory_item']." </td>
<td>".$rows['calory_value']."kcl</td>
</tr>


</tbody>
</table>";
$sum += $rows['calory_value'];
 }
 echo "<tr><td style=''> Total calory: </td><td> ".$sum." kcl </td></tr>";
}
mysqli_close($con);
?>
