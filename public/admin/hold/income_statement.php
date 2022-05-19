<?php 

 session_start();
 $uname= $_SESSION['admin'];
 include("includes/header.php");
 include("includes/navbar.php");
 include("../../db/connection.php");


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


 ?>





<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
  

    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap4.min.css">


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <title>SB Admin 2 - Tables</title>

</head>
 <style type="text/css">
     
     

     .makeexpense form input{
        width: 100%;
        height: 2.5em;
        border-radius: 5px;
        border: 0.3px solid black;

     }
     .sub{
        margin-right: 0.1%;
        opacity: 0.8;
     }
   
     .sub a{
        background: green;
     }
     .subb{
        width: 70%;
     }

     .subbx{
        width: 73%;
     }
     .subb .canc{
        background: red;
        color: white;
        border-radius: 5px;
        border: 0.3px solid red;
        text-decoration: none;
     }
     .subb .cancc{
        opacity: 2;
        background: green;
        color: white;
        border-radius: 5px;
        border: 0.3px solid green;
        text-decoration: none;
     }

     .subbx .canc{
        background: red;
        color: white;
        border-radius: 5px;
        border: 0.3px solid red;
        text-decoration: none;
     }

     .subbx .cancc{
        opacity: 2;
        background: green;
        color: white;
        border-radius: 5px;
        border: 0.3px solid green;
        text-decoration: none;
     }
     .canc{
        opacity: 2;
     }
     .pro{
        opacity: 2;
        background: black;
        border-radius: 5px;
        color: white;
        border: 0.3px solid black;

     }

    
     .ac{
        color: red;
     }

     .ad{
        margin-top: 10%;
        margin-left: 3%;
     }


     .hed{
        background: transparent;
        margin-left: 0.1%;
        opacity: 0.7;

     }

     .hed h5{
        margin-left: 20%;
     }
  
     .fro{
        background: black;
     }
     .expo{
        
     }
     .expo button{
        width: 4em;
        border-radius: 3px;
        border-color: transparent;
        background: #D6DBDF;
        margin-bottom: 0%;
     }
     .aa{
        font-size: 20px;
        text-decoration: none;
     }
     .aa:hover{
        text-decoration: none;
     }
     .boddy{
        overflow-y: scroll;
     }

     .sort{
        background: #F7F9F9;
     }

     .cccl{
        margin-left: 25%;
     }
     .cccl a{
        width: 20%;
        background: red;
     }
     .cccl input{
        width: 20%;
     }
     .cccl .send{
        width: 12%;
     }

     @media(max-width: 900px){
           .cccl{
        margin-left: 0%;
       }
       .cccl input{
        width: 10em;
     }
     .cccl .daat{
        background: red;
        margin-right: 2%;
     }
     .cccl .send{
        width: 10em;
     }

     }
     @media(max-width: 780px){
        .cccl .daat{
        background: gold;
        margin-right: 90%;
        width: 20%;
     }
        .cccl{
        margin-left: 0%;
     }
     .cccl input{
        width: 22em;
        height: 2.1em;
        border-radius: 3px;
     }
     .cccl .send{
        width: 8em;
        margin-left: 30%;
        margin-top: 2%;
     }
     .cccl .leb2{
        margin-left: 15%;
     }
     .cccl .leb1{
        margin-left: 3%;
     }
     .cccl .in1{
        margin-bottom: 2%;
     }
     }



     @media(max-width: 750px){
     .cccl .daat{
        background: green;
        margin-right: 90%;
        width: 20%;
     }
        .cccl{
        margin-left: 0%;
     }
     .cccl input{
        width: 22em;
        height: 2.1em;
        border-radius: 3px;
     }
     .cccl .send{
        width: 8em;
        margin-left: 30%;
        margin-top: 2%;
     }
     .cccl .leb2{
        margin-left: 4.4%;
     }
     .cccl .leb1{
        margin-left: 3%;
     }
     .cccl .in1{
        margin-bottom: 2%;
     }

     }


     @media(max-width: 700px){
     .cccl .daat{
        background: green;
        margin-right: 90%;
        width: 20%;
     }
        .cccl{
        margin-left: 0%;
     }
     .cccl input{
        width: 22em;
        height: 2.1em;
        border-radius: 3px;
     }
     .cccl .send{
        width: 8em;
        margin-left: 30%;
        margin-top: 2%;
     }
     .cccl .leb2{
        margin-left: 4.4%;
     }
     .cccl .leb1{
        margin-left: 3%;
     }
     .cccl .in1{
        margin-bottom: 2%;
     }

     }

      @media(max-width: 600px){
        .cccl .daat{
        background: grey;
        margin-right: 90%;
        width: 20%;
     }
        .cccl{
        margin-left: 0%;
     }
     .cccl input{
        width: 22em;
        height: 2.1em;
        border-radius: 3px;
     }
     .cccl .send{
        width: 8em;
        margin-left: 30%;
        margin-top: 2%;
     }

   
      }


      .bagg{
        background: red;
      }
 </style>
      
       
       <body class="bgg">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" >

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $uname ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid ">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800" style="margin-left:2%">Income Schedule</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 ">
                    <form method="POST" enctype="multipart/form-data">    
                        <div class="card-header sort py-3">
                           
                            <div class="cccl">
                                <label class="daat">Sort-By:  </label>
                        
                            <label class="leb1">Start</label>
                            <input type="date" name="startdate" class="in1"> 
                            <label class="leb2">End</label>
                            <input type="date" name="enddate" class="in2">
                            <input type="submit" name="sort" class="send">
                            </div>
                            
                        </div>
                    </form>
                        <div class="card-body boddy">


                            <div class="table-responsive ">

                                <?php
                               if(isset($_POST['sort'])){

                                 $startdate =$_POST['startdate'];
                                 $enddate =$_POST['enddate'];



                                 $query ="SELECT * FROM cash_inflow_book WHERE pay_date  BETWEEN '$startdate' AND '$enddate'  " ;
                                $result =mysqli_query($connect, $query);
       
                           echo"<table class='table table-bordered' id='example' width='100%' cellspacing='0'>
                      <thead>
                      <tr >
                         <th style='' >Pay Date</th>
                         <th style='' >Patient Name</th>
                         <th style='' >Details</th>
                         <th style='' >Amount</th>
                      </tr>
                      </thead>
                     ";
                    if(mysqli_num_rows($result)<1){
                      echo"<tr><td style=' border: 1pt double ;background:white;color:black;'>No data for Income schedule</<td></tr>";
                      }

                     while ($row= mysqli_fetch_array($result)) {
                            $paydate = $row['pay_date'];
                            $patientname = $row['patient_name'];
                            $details = $row['purpose'];
                            $amount = $row['income'];
                       echo"<tbody>";
                       echo "<tr>
                       <td style=' padding-left:5px;padding-right:5px;'>$paydate</td>

                        <td style='padding-left:5px;padding-right:5px;'>$patientname</td>
                        <td style=' padding-left:5px;padding-right:5px;'>$details</td>
                        <td style=' padding-left:5px;padding-right:5px;'>$amount</td>          
                    </tr>";              
                 echo"</tbody";        
                }
                  echo "<tbody></tbody></table>";

             }else{
                    
                  $query ="SELECT * FROM cash_inflow_book" ;
                                $result =mysqli_query($connect, $query);
       
                           echo"<table class='table table-bordered' id='example' width='100%' cellspacing='0'>
                      <thead>
                      <tr >
                         <th style='width:20%' >Pay Date</th>
                         <th style='width:30%' >Patient Name</th>
                         <th style='width:25%' >Details</th>
                         <th style='width:25%' >Amount</th>
                      </tr>
                      </thead>
                     ";
                    if(mysqli_num_rows($result)<1){
                      echo"<tr><td style=' border: 1pt double ;background:white;color:black;'>No data for Income schedule</<td></tr>";
                      }

                     while ($row= mysqli_fetch_array($result)) {
                            $paydate = $row['pay_date'];
                            $patientname = $row['patient_name'];
                            $details = $row['purpose'];
                            $amount = $row['income'];
                       echo"<tbody>";
                       echo "<tr>
                       <td style=' padding-left:5px;padding-right:5px; width:20%'>$paydate</td>

                        <td style='padding-left:5px;padding-right:5px; width:30% '>$patientname</td>
                        <td style=' padding-left:5px;padding-right:5px;width:25% '>$details</td>
                        <td style=' padding-left:5px;padding-right:5px; width:25% '>$amount</td>          
                    </tr>";              
                 echo"</tbody";        
                }
                  echo "<tbody></tbody></table>";
                    

                    }

        ?>
                                  




                                
                </div>
             </div>
            </div>

        </div>
             <!-- /.container-fluid -->
    </div>
            <!-- End of Main Content -->

      

<script>
    $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: true,
        buttons: [ 'excel', 'csv','pdfHtml5', 'colvis' ],
        
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


    


    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Footer -->
            <footer class="sticky-footer ">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Classic care clinic Webapp 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

</body>

</html>


         

          <!-- Bootstrap core JavaScript-->
   <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
  

    <!-- Core plugin JavaScript-->
    <!--<script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

    <!-- Custom scripts for all pages-->
   <!-- <script src="js/sb-admin-2.min.js"></script> -->

    <!-- Page level plugins -->
    <!-- <script src="vendor/datatables/jquery.dataTables.min.js"></script> -->
   <!-- <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script> -->

    <!-- Page level custom scripts -->
   <!-- <script src="js/demo/datatables-demo.js"></script> -->
   