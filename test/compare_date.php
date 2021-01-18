<?php
    
 	$now = new DateTime();
	$c= $now->format('Y-m-d H:i:s');    // MySQL datetime format
    $register_date=date_create("2017-08-09 00:00:00");
    $current_date=date_create($c);
    $diff=date_diff($register_date,$current_date);
    //echo $diff->format("%R%a days");
    $date_dff=$diff->format("%R%a");
    $date_dff=(int)$date_dff;

    echo $date_dff;
    echo "<br>";
    if($date_dff>=25){
    	echo"out of date";
    }else{
    	echo"ok";
    }



   
	//echo $now->getTimestamp();   
    ?>