
 <!DOCTYPE html>
 <html>
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ram Chandra Report</title>
  <link rel="stylesheet" href="assets/css/styl.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>




  
</head>
<body>



    <div class='container-fluid'>
      <div class='timeline'>
        <div class='start'></div>
    </div>
    <div class='entries'>

        <?php
        include('link.php');
    // just for row count
        $rows_count = mysqli_query($con, "SELECT COUNT(id) as 'row_count'  from life_event_reocord");
        $row =mysqli_fetch_array($rows_count);

        $life_happen = mysqli_query($con, "SELECT DISTINCT(post_date) from life_event_reocord order by id desc");
        while($life = mysqli_fetch_array($life_happen))
        {

            $post_date = $life['post_date'];?>
            <div class='entry project'>
              <div class='dot'></div>
              <div class='label'>
                <div class='time lead'>
                    <?php echo date("j M Y", strtotime("$post_date"));?>
<span class="symp-date">
                    <?php


// shows on month
                    $date1 = strtotime($life['post_date']);
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

                    if($years==0 && $months==0){ printf(" ("."%d days )", $days);}
                    elseif($years==0){ printf("( "."%d months %d days )",$months, $days);}
                    else(printf("("." %d years, %d months, %d days )", $years, $months,
                     $days));



                 ?>
                 </span>
             </div>
             <div class='detail'>



                <?php daily_rpt_list($post_date); ?>
            </div>
        </div>
    </div>  
<?php } function daily_rpt_list($post_date)
                                // get data from another table with cat id
{
    global $con;
    $daily_rpt = mysqli_query($con, "SELECT * from life_event_reocord where post_date='$post_date' order by post_date desc ");
    $i=0;
    while($daily=mysqli_fetch_array($daily_rpt))
        {?> 

         <div class="row">
             <div class="col-12"><li><span> <?php echo $daily['post_time'];?> </span> 
                <?php if($daily['symptoms']>0 ){?>
                    <span class="text-left symp-color">  <?php echo $daily['post_text'];?> </span>
                <?php } else {?>
                   <span class="text-left">  <?php echo $daily['post_text'];}?> 
               </li><br>
           </div>
       </div>


   <?php } $i++; }?>


   <?php  $content = 11.9*$row['row_count'];// echo $content;?>

</div>
</div>
<style>
    @import url(https://fonts.googleapis.com/css?family=PT+Sans);
    body {
      margin: 0;
      font-family: PT Sans, sans-serif;
      background-color: #fcfcfc;
      color: #000;
  }

  .container-fluid {
      margin: none!important;
      width: 100%!important;
      position: relative;
      overflow-x: scroll;
      padding-top: 2rem;
      padding-bottom: 2rem;
  }
  .container-fluid::-webkit-scrollbar {
      height: 45px;
  }

  .container-fluid::-webkit-scrollbar-thumb {
 /* background-color: lavender;
  width: 10px;
  background-clip: content-box;
  border-radius: 100%;
  border: 5px solid blue;*/
  border-radius: 100px;
  background-color: #fff;
  border: 5px solid lavender;height:50px;
}

.entries {
  margin-right: -10000px;
  margin-left: 1rem;
}

.timeline {
  position: absolute;
  box-sizing: border-box;
  width: <?php echo $content;?>%; //default 125% then add 20% each content
  height: 0.7rem;
/*  background-color: beige;*/
background-clip: content-box;
border-width: 0.2rem 0;
border-style: solid;
border-color: powderblue;
box-shadow: 0 0 2rem 0 rgba(0, 0, 0, 0.1), inset 255 255 4em rgba(0, 0, 0, 0.1);
}

.entry {
  float: left;
  max-width: 400px;
  position: relative;
  text-align: center;
  margin: 0 1rem;
  margin-top: 0.7rem;
}
.entry .dot {
  position: absolute;
  width: 1.2rem;
  height: 1.2rem;
  background-color: powderblue;
  left: 50%;
  margin-left: -0.6rem;
  margin-top: -0.95rem;
  border-radius: 100%;
  box-sizing: border-box;
  background-clip: content-box;
  border-width: 0.16rem;
  border-style: solid;
  border-color: #fff;
  box-shadow: 0 0.1rem 1rem 0 rgba(0, 0, 0, 0.1), inset 0 0 0.4em rgba(255, 255, 255, 0.1), inset 0 0.4rem 0.1rem rgba(255, 255, 255, 0.3);
  -moz-transition: height 0.2s linear, width 0.2s linear, margin 0.2s linear, background-color 0.3s ease-out;
  -o-transition: height 0.2s linear, width 0.2s linear, margin 0.2s linear, background-color 0.3s ease-out;
  -webkit-transition: height 0.2s linear, width 0.2s linear, margin 0.2s linear, background-color 0.3s ease-out;
  transition: height 0.2s linear, width 0.2s linear, margin 0.2s linear, background-color 0.3s ease-out;
}

.entry:hover .dot {
  width: 1.6rem;
  height: 1.6rem;
  margin-left: -0.8rem;
  margin-top: -1.15rem;
  background-color: thistle;
}
.entry:hover .label {
  margin-top: 2.5rem;
  background-color: #d0e8e4;
  border-bottom: 0.5rem solid transparent;
}

.label {
  display: inline-block;
  position: relative;
  background-color: #E1F0EE;
  background-clip: padding-box;
  margin-top: 3rem;
  padding: 0.4rem 0.8rem 0.8rem;
  border-radius: 0.2rem;
  -moz-transition: margin-top 0.2s linear, background-color 0.2s linear, border-bottom 0.2s linear;
  -o-transition: margin-top 0.2s linear, background-color 0.2s linear, border-bottom 0.2s linear;
  -webkit-transition: margin-top 0.2s linear, background-color 0.2s linear, border-bottom 0.2s linear;
  transition: margin-top 0.2s linear, background-color 0.2s linear, border-bottom 0.2s linear;
  border-bottom: 0 solid transparent;
}
.label .time {
  text-transform: uppercase;
  font-size: 0.7rem;
  margin: 0 0 0.4rem;
  padding: 0 0.3rem 0.3rem;
  letter-spacing: 1px;
  display: inline-block;
  border-bottom: 1px solid rgba(255, 255, 255, 0.8);
}
.label .detail {
  font-size: 0.8rem;
  text-align: left;
}
.label:before {
  content: '';
  display: block;
  position: absolute;
  background-color: inherit;
  background-clip: content-box;
  box-sizing: border-box;
  width: 1rem;
  height: 1rem;
  left: 50%;
  margin-top: -0.9rem;
  margin-left: -0.5rem;
  transform-origin: center;
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);
  z-index: -1;
}
.label a {
  color: #000;
  text-decoration: none;
}
.label a:before {
  content: '[';
  }
  .label a:after {
      content: ']';
  }

  .entry.life .label {
      background-color: #e1f0e4;
  }

  .entry.life:hover .label {
      background-color: #d0e8d5;
  }

  .entry.study .label {
      background-color: #e1e8f0;
  }

  .entry.study:hover .label {
      background-color: #d0dbe8;
  }
  .symp-color{
    color:#c87d38;
  }
  .symp-date{font-size: 7px;}

</style>
<script>

    var width = document.getElementsByClassName("container-fluid")[0].clientWidth;
// alert(width);

</script>
</body>
</html>