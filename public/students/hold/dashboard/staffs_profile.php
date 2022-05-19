
<?php

 session_start();
 $uname= $_SESSION['admin'];
// include("../includes/header.php");
 //include("../includes/navbar.php");
 include("../../../db/connection.php");


    $queryy ="SELECT * FROM linechart";
    $res =mysqli_query($connect, $queryy);
    $myarray=[];
 
    while($row =mysqli_fetch_array($res)){
        $month =$row['month'];
        $income =$row['income'];
        $expenses =$row['expenses'];
        $profit =$row['profit'];   

        array_push($myarray,$income);

                                 
        }
        //convert array to string with implode;
                 $con= implode(",", $myarray);
        // concatinate [ ] with $con to make it list          
                 $new_con = '['.$con.']';


//$qry ="SELECT * FROM staff_table";
//$rst =mysqli_query($connect,$qry) or die($connect);
//$row =mysqli_fetch_array($rst);
//$ssum =mysqli_num_rows($rst);
//echo"$ssum";

$qryy ="SELECT * FROM customers_table";
$rstt =mysqli_query($connect,$qryy) or die($connect);
$row =mysqli_fetch_array($rstt);
$ssumm =mysqli_num_rows($rstt);

$qqr ="SELECT * FROM drug_available_table ";
$wrs =mysqli_query($connect,$qqr);
$row =mysqli_fetch_array($wrs);
$ssummz =mysqli_num_rows($wrs);
$abena =$row['expiry_date'];
$fun = date("Ymd ");


$sam =0;
   //$ash =[];
foreach ($wrs as $row) {
           $abena =$row['expiry_date'];
           $wow =preg_replace('/-|:/', null, $abena);
         
         
           $name =$row['drug_name'];
           $quantz =$row['quantity'];
           $mx =(int)$wow -(int)$fun;
           if($mx <=0){  
             $sam =(int)$sam + (int)$quantz;
            // $ash[] =$name;
          
           }
           
      }        

      //$sam =count($ash);
  
// how to add items in one column
$drug_cost =0;
$drug_sell =0;
$drug_quantity =0;

foreach ($wrs as $row) {
        
         $drug_cost += (int)$row['total_cost_price'];
         $drug_sell += (int)$row['total_selling_price'];
         $drug_quantity += (int)$row['quantity'];
}
     
 //look below this codes makes sense .
// how to get monthly income

    $first = date("Y-m-d", strtotime("first day of this month"));
    $last = date("Y-m-d", strtotime("last day of this month"));
    $firstDayNextMonth = date('Y-m-d', strtotime('first day of next month'));
    

/*
    $try ="SELECT * FROM cash_inflow_book WHERE pay_date BETWEEN '$first' AND '$last' " ;
    $trial = mysqli_query($connect,$try);
    $row =mysqli_fetch_array($trial);


    
    if(mysqli_num_rows($trial)>0){
        $sum =0;
       // echo "$sum <br>";
        foreach ($trial as $row) {
        
            $income =$row['income'];
            $pname =$row['patient_name'];
            $day =$row['pay_date'];
            $sum =$sum + $income;
             //echo "$pname<br>";
            //echo "$income<br>";
             //echo "$day<br>";

        }
       //echo "$sum <br>";


    }else{
        echo"No data available";
    }
*/




  //look below this codes makes sense.
    // how to get yearly income


    $ma1 = date('Y-m-d',strtotime('first day of January ' . date('Y')));
    $ma2 = date('Y-m-d',strtotime('last day of December ' . date('Y')));
    

/*
    $endofyear ="SELECT * FROM cash_inflow_book WHERE pay_date BETWEEN '$ma1' AND '$ma2' " ;
    $yeardata = mysqli_query($connect,$endofyear);
    $row =mysqli_fetch_array($yeardata);


    
    if(mysqli_num_rows($yeardata)>0){
        $yearsum =0;
       // echo "$sum <br>";
        foreach ($yeardata as $row) {
        
            $income =$row['income'];
            $pname =$row['patient_name'];
            $day =$row['pay_date'];
            $yearsum =$yearsum + $income;
             //echo "$pname<br>";
            //echo "$income<br>";
             //echo "$day<br>";

        }
      // echo"$ma1<br>";
       //echo"$ma2<br>";


    }else{
        echo"No data available";
    }
*/




//Plotting a linechart for monthly icome for a particular year

$pay ="select date_format(pay_date,'%Y-%m'),sum(income) from cash_inflow_book WHERE pay_date BETWEEN '$ma1' AND '$ma2' group by date_format(pay_date,'%Y-%m')";
 $resulted = mysqli_query($connect,$pay);


 $monthly_income =[];
 $date_income =[];

  while($row =mysqli_fetch_array($resulted)){
    $date1 =$row["date_format(pay_date,'%Y-%m')"];
    $incom =$row["sum(income)"];

   array_push($date_income, date('MY', strtotime($date1)));
    
    $date2 =explode("-",$date1);
    $date3 =implode("",$date2);
    array_push($monthly_income,$incom);

   
  }

  $final ='['. implode(',',$monthly_income).']';
  $date_final = implode(',',$date_income);








// getting the monthly drugs expenses
    $tro ="SELECT * FROM drug_available_table WHERE stock_date BETWEEN '$first' AND '$last' " ;
    $vat = mysqli_query($connect,$tro);
    $row =mysqli_fetch_array($vat);


    
    if(mysqli_num_rows($vat)>0){
        $drug_expenses =0;
        foreach ($vat as $row) {
        
            $exp =$row['total_cost_price'];
            $drug_expenses =$drug_expenses + $exp;

        }


    }

    // look above this codes makes sense.
    

    $flax ="SELECT * FROM expenditure_request_table WHERE request_date BETWEEN '$first' AND '$last' AND request_status='cash released' ";
    $fla =mysqli_query($connect,$flax);
    $row =mysqli_fetch_array($fla);
    $lol =mysqli_num_rows($fla);
    $sweet =$row['amount'];

    if(mysqli_num_rows($fla)>=0){
        $normal_expenses =0;
        foreach ($fla as $row) {
        
            $pay =$row['amount'];
            $normal_expenses =$normal_expenses + $pay;

        }


    }




    //$quer ="SELECT * FROM expenditure_request_table WHERE request_date BETWEEN '$first' AND '$last' AND request_status ='pending' ";
    // $reess =mysqli_query($connect, $quer);
     //$pedreq =mysqli_num_rows($reess);


   //$month_expenses =$normal_expenses;
   //$monthly_net =$sum - $month_expenses


     if(isset($_GET['approve'])){
               $id =$_GET['approve'];
               $que ="UPDATE expenditure_request_table SET request_status ='approved' WHERE ex_id ='$id' ";
               $resultt = mysqli_query($connect,$que) ;

               
             echo "<script>window.location.href='../admin2/requested_expenses.php'</script>";
 }


 if (isset($_GET['reject'])){
               
               $idd =$_GET['reject'];
               $que ="UPDATE expenditure_request_table SET request_status ='rejected' WHERE ex_id ='$idd' ";
               $resultt = mysqli_query($connect,$que) ;

              echo "<script>window.location.href='../admin2/requested_expenses.php'</script>";



     }




     if(isset($_GET['id'])){           
         $idd =$_GET['id'];
         $que ="SELECT * FROM staff_table WHERE id ='$idd' ";
            $resultt = mysqli_query($connect,$que) ;
            $row =mysqli_fetch_array($resultt)or die(mysqli_error($connect));
            $name =$row['username'];
            $salary =$row['salary'];
            $position =$row['usertype'];
            $course =$row['qualification'];
            $email =$row['email'];
            $contact =$row['contact'];
            $date_employed =$row['date_employed'];
            $contract_type =$row['employment_mode'];
            $age =$row['age'];
            $dob =$row['dob'];
            $work_experience =$row['work_experience'];
            $job_description =$row['role_description'];
            $institution =$row['institution'];
            $year_completed =$row['year_of_complete'];
            $cert =$row['certificate_title'];
            $employment_type =$row['employment_mode'];



                           // echo $ma;

       }  


        ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>CCCL Services</title>

   <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/"> -->
    <!--<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">-->

    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
   <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css"> -->



    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">



    <!-- -->
     <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap4.min.css">

   <!--  
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"> -->

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
 <link href="dashboard.css" rel="stylesheet">

 








<style>

    
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
       #topp{
        width:15.4%;
        background: white;
        color: black; 
      }

      .sideb{
        background: #2C3E50;
        overflow-y: scroll;
      }
      .sideb #aa{
        color: white;
      }
      .sideb #aaa{
        color: #D35400;
      }
      .sideb #aaa1{
        color: #D35400;
        margin-left: 9%;
      }
      .sideb #aaa hover:{
        color: white;
      }
      .sideb .endside{
        background:#2C3E50 ;
      }
      #userbg{

      }

      #user{
        color: black;
      }

     

      .tre{
        background: red;
        border-radius: 5px;
        margin-left: -5%;
        margin-right: 13%;
        padding-left: 2%;
        padding-right: 2%;
        color: white;
        margin-left: -8%;
        opacity: 0.7;
        font-size: 10px;
      }
      .bel{
       color: #808B96;
       margin-left: -8%;
       padding-right: 2%;

      }
      .prof{
        width: 2.5em;
        height: 2em;
        border-radius: 35px;
        margin-left: 4%;
      }
      .dropp1{
        margin-left:8%;
        margin-right: 1%;
      }
      
      .dropp2{
        color: white;
        cursor: pointer;
        text-decoration: none;
        font-size: 14px;
      }
      .dropp2:hover {
        color: white;
        text-decoration: none;
      }
      .menuu{
        width: 90%;
        margin-top: 2%;
      } 
 

      .menuu  a{
        width: 100%;
        text-decoration: none;
        color: black;
        margin-left: 2%;
      }
      .menuu #aaa{
        padding-right: 2%;
      }
      .menuu #wok{
        margin-left: 2%;
        margin-top: -9%;
      }
      .menuu #wok:hover{
        background: #F2F3F4;
      }

      .menuu a:hover {
        background: #F2F3F4;
        width: 100%;
        margin-bottom: 1%;
      }

      .doit{
        margin-top: 3%;
      }


      .doit .dropdown .pagess{
        margin-left: 9%;
      }

      .co{
        color:    #34495e  ;
      }

      
      .excell{

        background:  #566573 ;
      }
      .pdff{
        background:   #d35400 ;
      }



    table{
    justify-content: center;
    width: 100%;
  }

  table tr{
    border: 0.1px solid black;
  }
  table th{
    border: 0.1px solid black;
  }
  table td{
    border: 0.1px solid black;
  }
  .pure{
    width: 80%;
  }  

  .cover{
    background: #F8F9F9 ;
    border: 0.1px solid black;
    overflow-x: scroll;
  } 

     .ruk{
    background: transparent;
    width: 30%;
  }
  .ruk2{
    background: transparent;
    width: 15%;
  }
  .ruk3{
    background: transparent;
    width: 25%;
  }

  .ruk4{
    background: transparent;
    width: 15%;
  }
  .ruk5{
    background: transparent;
    width: 15%;
  }

  h6{
    align-items: center;
    color: white;
    background: #AEB6BF;
  }



      /* width */
    .mk::-webkit-scrollbar {
      width: 20px;
     }

      /* Track */
      .mk::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey; 
        border-radius: 10px;
      }
 
      /* Handle */
      .mk::-webkit-scrollbar-thumb {
        background: red; 
        border-radius: 10px;
      }

      /* Handle on hover */
      .mk::-webkit-scrollbar-thumb:hover {
        background: #b30000; 
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
        


      }

      @media(max-width: 768px){
        #topp{
        width:30.4%;
        background: transparent;
        color: black;
        border: 0.1px solid white; 
      }


      .dropp1{
        margin-left:3%;
        margin-right: 1%;
      }
      }


    </style>

    
    <!-- Custom styles for this template -->
   
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-light flex-md-nowrap p-0 shadow" >
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#" id="topp">Classic Care Clinic</a>
  <button style="background: #707B7C;" class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon" id="menu" ></span>
  </button>
  <input class="form-control form-control-dark w-100" type="button"  aria-label="Search" >
  <div class="navbar-nav endside" id="userbg">
    <div class="nav-item text-nowrap">
       
       <ul style="list-style-type:none">
        <li class="nav-item dropdown no-arrow">
      <a class="nav-link px-3" href="#" id="user">

        <i class="fas fa-bell fa-fw bel"></i>
        <span class="tre">3+</span>
        
        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $uname ?></span>
        <img class="img-profile rounded-circle" src="../img/undraw_profile.svg" style="height: 2em; width:2em">


       </a> 

     </li>
    
    </ul>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block  sidebar collapse sideb">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php" id="aa">
              <span data-feather="home" id="aaa"></span>
              Dashboard
            </a>
          </li>

    
         <li class="nav-item doit" >
               
                  <div class="dropdown" style="width:100%; background: transparent;">
                    <i data-feather="folder" id="aaa1" class="pagess"></i>
                   <a class=" dropdown-toggle dropp2" data-toggle="dropdown">Pages
                   <span class="caret"></span></a>                
                    
                   <ul class="dropdown-menu menuu" >

                    <a href="service.php" ><li id="wok" ><i data-feather="shopping-cart" id="aaa"></i>services</li></a>

                    <a href="expenses.php" ><li id="wok" ><i data-feather="file" id="aaa"></i>expenses</li></a>
                    

                    <a href="patients.php" ><li id="wok" ><i data-feather="users" id="aaa"></i>patients</li></a>


                    <a href="requested_expenses.php" ><li id="wok" ><i data-feather="shopping-cart" id="aaa"></i>requested expenses</li></a>

                    <a href="staffs.php" ><li id="wok" ><i data-feather="user" id="aaa"></i>staff</li></a>

                    <a href="expenses_statement.php" ><li id="wok" ><i data-feather="shopping-cart" id="aaa"></i>equipment</li></a>
                   
                    </ul>
                 </div>
            </li>

            <li class="nav-item doit" >
               
                  <div class="dropdown" style="width:100%; background: transparent;">
                    <i data-feather="file" id="aaa1" class="pagess"></i>
                   <a class=" dropdown-toggle dropp2" data-toggle="dropdown">Salary
                   <span class="caret"></span></a>                
                    
                   <ul class="dropdown-menu menuu" >

                    <a href="income_statement.php" ><li id="wok" ><i data-feather="shopping-cart" id="aaa"></i>to-pay</li></a>

                    <a href="expenses_statement.php" ><li id="wok" ><i data-feather="file" id="aaa"></i>dept</li></a>
                    

                    <a href="income_statement.php" ><li id="wok" ><i data-feather="users" id="aaa"></i>bonus</li></a>


                    <a href="expenses_statement.php" ><li id="wok" ><i data-feather="shopping-cart" id="aaa"></i>loocom</li></a>

                
                   
                    </ul>
                 </div>
            </li>




            <li class="nav-item doit" >
               
                  <div class="dropdown" style="width:100%; background: transparent;">
                    <i data-feather="copy" id="aaa1" class="pagess"></i>
                   <a class=" dropdown-toggle dropp2" data-toggle="dropdown">Bills
                   <span class="caret"></span></a>                
                    
                   <ul class="dropdown-menu menuu" >

                    <a href="income_statement.php" ><li id="wok" ><i data-feather="shopping-cart" id="aaa"></i>rent</li></a>

                    <a href="expenses_statement.php" ><li id="wok" ><i data-feather="file" id="aaa"></i>light</li></a>
                    

                    <a href="income_statement.php" ><li id="wok" ><i data-feather="users" id="aaa"></i>water</li></a>


                    <a href="expenses_statement.php" ><li id="wok" ><i data-feather="shopping-cart" id="aaa"></i>dept</li></a>

                
                   
                    </ul>
                 </div>
            </li>


           <li class="nav-item doit" >
               
                  <div class="dropdown" style="width:100%; background: transparent;">
                    <i data-feather="bar-chart-2" id="aaa1" class="pagess"></i>
                   <a class=" dropdown-toggle dropp2" data-toggle="dropdown">Reports
                   <span class="caret"></span></a>                
                    
                   <ul class="dropdown-menu menuu" >

                    <a href="income_statement.php" ><li id="wok" ><i data-feather="shopping-cart" id="aaa"></i>income</li></a>

                    <a href="expenses_statement.php" ><li id="wok" ><i data-feather="file" id="aaa"></i>expenses</li></a>
                    

                    <a href="income_expenditure.php" ><li id="wok" ><i data-feather="users" id="aaa"></i>income & expenses</li></a>


                    <a href="expenses_statement.php" ><li id="wok" ><i data-feather="shopping-cart" id="aaa"></i>staff</li></a>

                    <a href="income_statement.php" ><li id="wok" ><i data-feather="user" id="aaa"></i>assets</li></a>

                    <a href="expenses_statement.php" ><li id="wok" ><i data-feather="shopping-cart" id="aaa"></i>drug</li></a>
                   
                    </ul>
                 </div>
            </li>


          <li class="nav-item">
            <a class="nav-link" href="#" id="aa">
              <span data-feather="layers" id="aaa"></span>
              Integrations
            </a>
          </li>
        </ul>

        <h7 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span style="color:gold; ">Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report" id="aa">
            <span data-feather="plus-circle" id="aaa"></span>
          </a>
        </h7>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#" id="aa">
              <span data-feather="file-text" id="aaa"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" id="aa">
              <span data-feather="file-text" id="aaa"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" id="aa">
              <span data-feather="file-text" id="aaa"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" id="aa">
              <span data-feather="file-text" id="aaa"></span>
              Year-end sale
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 ">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-0 pb-0 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
          

          </div>
         
        </div>
      </div>

      
      <div class="card shadow mb-4">

       <div class="card-header py-3" style="margin-bottom: 2%;">                          
         <a href="#" style="text-decoration:none;font-size: 25px;" class="m-0 font-weight-bold co">Staff Details</a>

        <span style="float:right"><button class="btn btn-primary addd" data-toggle="modal" data-target="#addservices">Add</button></span>
       </div> 



    
      
      <div class="card-body">
      <div class="table-responsive " style="display: block;">
        <div id="profile">
         <center>
                        <div class='table-responsive mass'  style="border: 0.3px solid gray;">
                            <div class="roww" style="overflow: none;" >
                                <div class="column"><img src="../../../image/admin1.jpg"></div>
                                <h4>Staff Bio</h4>
                                <div class="col"  class="pure">

                                

                                <!--   New trial here -->
                         <div class="cover">       

                         <table>
                                  <center><h6>Pesonal Info</h6></center>  
                                  <tr>
                                    <thead>
                                        <th class="ruk">Name</th>
                                        <th class="ruk2">Contact</th>
                                        <th class="ruk3">Email</th>
                                        <th class="ruk4">Age</th>
                                        <th class="ruk5">DoB</th>

                                    </thead>
                                </tr>
                                <tr>
                                <tbody>    
                                    <td class="ruk"><?php echo $name ?></td>
                                    <td class="ruk2"><?php echo $contact ?></td>
                                    <td class="ruk3"><?php echo $email ?></td>
                                    <td class="ruk4"><?php echo $age ?></td>
                                    <td class="ruk5"><?php echo $dob ?></td>
                                </tbody>   
                                </tr>
                        </table>
                            <!--   New trial here -->

                        <table>
                                <center><h6>Academic Info</h6></center>
                                
                                <tr>
                                    <thead>
                                        <th class="ruk">Institution</th>
                                        <th class="ruk2">Cerificate</th>
                                        <th class="ruk3">Course</th>
                                        <th class="ruk4">Year of complete</th>
                                        <th class="ruk5">Cert File</th>

                                    </thead>
                                </tr>
                                <tr>
                                <tbody>    
                                    <td class="ruk"><?php echo $institution ?></td>
                                    <td class="ruk2"><?php echo $cert ?></td>
                                    <td class="ruk3"><?php echo $course ?></td>
                                    <td class="ruk4"><?php echo $year_completed ?></td>
                                    <td class="ruk5"><?php echo "file"?></td>
                                </tbody>   
                                </tr>
                     </table>
                                <!--   New trial here -->

                    <table>
                               <center><h6>Job Info</h6></center> 
                                
                                <tr>
                                    <thead>
                                        <th class="ruk">Job Title</th>
                                        <th class="ruk2">Work Experience</th>
                                        <th class="ruk3">Job Description</th>
                                        <th class="ruk4">Date Employed</th>
                                        <th class="ruk5">Employement Type</th>

                                    </thead>
                                </tr>
                                <tr>
                                <tbody>    
                                    <td class="ruk"><?php echo $position ?></td>
                                    <td class="ruk2"><?php echo $work_experience ?></td>
                                    <td class="ruk3"><?php echo $job_description ?></td>
                                    <td class="ruk4"><?php echo $date_employed ?></td>
                                    <td class="ruk5"><?php echo $employment_type?></td>
                                </tbody>   
                                </tr>
                                </table>

                                </div>
                                </div><br>
                            </div>                     
                     </div>   
                 </center>
      </div>
    </div>
      </div>
    </div>
    </main>
  </div>
</div>


      <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>



   








    <?php 

     include("../includes/scripts.php");
     include("../includes/footer.php");

     ?>

<script type="text/javascript">
        

        // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels:document.getElementById('daat').innerText.split(","),

    datasets: [{
      label: "Earnings",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
     /* data: [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000],*/
      data:<?php 
         
                 echo("$final");
                  

       ?>

    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return 'Ghc' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': Ghc' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});

    </script>

  <script>
    $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: true,
        buttons: [
        {
          extend:'excelHtml5',
          title:'cccl services',
          className:'btn btn-dark btn-sm btn-rounded excell'
        },
        {
          extend:'pdfHtml5',
          title:'Classic Care Clinic Services',
          className:' btn btn-dark btn-sm btn-rounded pdff'
        },
      
        
       
         ],

        pageLength: 0,
        lengthMenu: [ 5, 10, 20, 50, 100, 200, 500, -1],
        
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );





</script>

    

    <script src="//code.jquery.com/jquery-3.5.1.js"></script>
   <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
   <script src="//cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
   <script src="//cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
   <script src="//cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap4.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
   <script src="//cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
   <script src="//cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
   <script src="//cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>


  </body>
</html>
