<?php
 include("../../db/connection.php");
  $first = date("Y-m-d", strtotime("first day of this month"));
    $last = date("Y-m-d", strtotime("last day of this month"));
    $firstDayNextMonth = date('Y-m-d', strtotime('first day of next month'));


    $ma1 = date('Y-m-d',strtotime('first day of January ' . date('Y')));
    $ma2 = date('Y-m-d',strtotime('last day of December ' . date('Y')));

if(isset($_POST['sum'])){
	$try ="SELECT sum(income) FROM cash_inflow_book WHERE pay_date BETWEEN '$first' AND '$last' " ;
    $trial = mysqli_query($connect,$try);
    $row =mysqli_fetch_array($trial);

    $endofyear ="SELECT sum(income) FROM cash_inflow_book WHERE pay_date BETWEEN '$ma1' AND '$ma2' " ;
    $yeardata = mysqli_query($connect,$endofyear);
    $rowss =mysqli_fetch_array($yeardata);

    $qry ="SELECT count(id) FROM staff_table";
    $rst =mysqli_query($connect,$qry) or die($connect);
    $roww =mysqli_fetch_array($rst);
    $ssum =mysqli_num_rows($rst);


     $quer ="SELECT count(ex_id) FROM expenditure_request_table WHERE request_date BETWEEN '$first' AND '$last' AND request_status ='pending' ";
     $reess =mysqli_query($connect, $quer);
     $raw =mysqli_fetch_array($reess);

	$ab="$row[0],$rowss[0],$roww[0],$raw[0]";
	echo "$ab";

////echo number_format($ab,2,'.',',');

}



?>