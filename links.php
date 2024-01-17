<?php try{
     // $pdo = new PDO("mysql:host=sql111.epizy.com;dbname=epiz_28317872_duty", "epiz_28317872", "Pv9wigHohd3");
    // $pdo = new PDO("mysql:host=localhost;dbname=duty", "root", "");
    // $servername='server347.web-hosting.com';
// $username='mebldato_shishant';
// $password='9gCOcoPfw%Ka';
// $dbname = "mebldato_meble_duty"; 

    $pdo = new PDO("mysql:host=server347.web-hosting.com;dbname=mebldato_meble_duty", "mebldato_shishant", "9gCOcoPfw%Ka");
    // Set the  PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
  ?>