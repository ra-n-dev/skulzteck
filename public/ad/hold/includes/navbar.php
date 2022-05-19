<!-- Sidebar -->


<?php 

$uname= $_SESSION['admin'];
include("../../db/connection.php");



   if(isset($_POST['adminexpense'])){
        $item = $_POST['item'];
        $purpose =$_POST['purpose'];
        $amount =$_POST['amount'];
        $req_date =date('Y-m-d');
        $department ="Admin";

        $quee ="INSERT INTO expenditure_request_table (purpose,amount,request_date,accountant_name,request_status,spender_name,department,item) VALUES('$purpose','$amount','$req_date','Not yet','pending','$uname','$department','$item')";
        $result =mysqli_query($connect,$quee);

}

 ?>


  <?php 

     if(isset($_GET['reject'])){
        $id =$_GET['reject'];

        $query = "SELECT * FROM expenditure_request_table WHERE ex_id ='$id' ";
        $res =mysqli_query($connect, $query);
        $row =mysqli_fetch_array($res);
        $ex_id =$row['ex_id'];
        $spender =$row['spender_name'];
        $amount =$row['amount'];
        $accountant =$row['accountant_name'];
        $purpose =$row['purpose'];
        $request_date =$row['request_date'];
        $status =$row['request_status'];
        $department =$row['department'];

        

     }


     if(isset($_POST['sub'])){
        $category =$_POST['category'];
        $price =$_POST['price'];
        $working_days = $_POST['working_days'];
        $working_hours = $_POST['working_hours'];
        $qwery = "INSERT INTO services_table(category,price,working_days,working_hours)VALUES('$category','$price','$working_days','$working_hours')";
        $saam =mysqli_query($connect,$qwery);
        echo "<script>window.location.href='../admin2/services.php'</script>";

     }


     ?>

 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <title></title>
 </head>

 <style type="text/css">



     .adminexpense{

        margin-top: 10%;
        margin-left: 3%;

     }
    .adx form input{
        width: 100%;
        height: 2.5em;
        border-radius: 5px;
        border: 0.3px solid black;
        padding-left: 2%;

     }

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
        width: 65%;
     }
     .subb .canc{
        background: red;
     }
     .canc{
        opacity: 2;
     }
     .pro{
        opacity: 2;
        background: green;
     }

    #wwwwe{
        width: 28%;
        height: 2em;
       
     }

     #wwww{
        width: 28%;
        height: 2em;
    
     }

     .sideb{
        background: #2C3E50;
        overflow-y: scroll;

     }
 </style>
 <body>
 
 
        <ul class="navbar-nav sideb  sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">CCCL Admin </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Navigations
            </div>

            <!-- Nav Item - Pages Collapse Menu -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Admin: Task</h6>
                        <a class="collapse-item" href="index.php">Dashboard</a>
                        <a class="collapse-item" href="services.php">Services</a>
                        <a class="collapse-item" href="#" data-toggle="modal" data-target="#expensesModal">Make Expense</a>
                        <a class="collapse-item" href="requested_expenses.php">Requested Expenses</a>
                        <a class="collapse-item" href="staff_list.php">Staff</a>
                        <a class="collapse-item" href="forgot-password.html">Equipments</a>
                        <div class="collapse-divider"></div>                        
                     </div>
                </div>
            </li>

            <!-- Nav Item - reports Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Reports</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Accounting Reports:</h6>
                        <a class="collapse-item" href="income_statement.php">Income Statement</a>
                        <a class="collapse-item" href="new_dashboard.php">Expenditure</a>
                        <a class="collapse-item" href="dashboard/index.php">Income & Expenditure</a>
                        <h6 class="collapse-header">Other Reports:</h6>
                        <a class="collapse-item" href="buttons.html">Drug List</a>
                        <a class="collapse-item" href="cards.html">Equipment List</a>
                        <a class="collapse-item" href="buttons.html">Patient List</a>
                        <a class="collapse-item" href="cards.html">Staff List</a>
                    </div>
                </div>
            </li>
            

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Salary & bills - Pages Collapse Menu -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Bills & Salaries</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Salaries:</h6>
                        <a class="collapse-item" href="utilities-color.html">Medical Staff</a>
                        <a class="collapse-item" href="utilities-border.html">Non Medical Staff</a>
                        <h6 class="collapse-header">Bills:</h6>
                        <a class="collapse-item" href="utilities-color.html">Water</a>
                        <a class="collapse-item" href="utilities-border.html">Electricity</a>
                        <a class="collapse-item" href="utilities-color.html">Rent</a>
                        <a class="collapse-item" href="utilities-border.html">Sewage</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
          

        </ul>
        <!-- End of Sidebar -->



         <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


        <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:blue; font-family: monospace;">Ready to Logut?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Hello Admin  <?php echo "<a style='color:blue;font-style:italic;padding-left:2%;padding-right:2%'>$uname</a>"; ?>  You are about Leaving Admins Dashboard and can only re-access it if you login, proceed?</div>
                <div class="modal-footer">
                    <button class="btn  btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Proceed</a>
                </div>
            </div>
        </div>
    </div>





        <!-- expenses Modal-->
    <div class="modal fade adminexpense" id="expensesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:blue; font-style: italic;margin-left: 14%;">Admin's Expenses Requisition Form</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body makeexpense" >
                <form method="POST" enctype="multipart/form-data">
                    <label>Item</label><br>
                    <input type="text" name="item"><br>
                    <label>Purpose</label><br>
                    <input type="text" name="purpose"><br>
                    <label>Amount</label><br>
                    <input type="text" name="amount"><br>
                



                </div>
                <div class="modal-footer bg-gradient-primary sub">
                     <div class="subb justify-content-center">
                        <button class="btn  canc btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn pro btn-secondary " name="adminexpense" type="submit">Proceed</button>                          
                      
                    </div>
                    
                </div>
                </form>
            </div>
        </div>
    </div>
<div class='modal fade adx' id='addservices' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'aria-hidden='true'>
                        <div class='modal-dialog' role='document'>
                             <div class='modal-content'>
                                <div class='modal-header hed'>
                                 <h5 class='modal-title ' id='exampleModalLabel' style='color:red; font-family: monospace'><center><h3 class="m-0 font-weight-bold text-primary" >Add New Services</h3></center>
                                    </h5>
                                    <button class='close'type='button'data-dismiss='modal' aria-label='Close'>
                                     <span aria-hidden='true'>×</span>
                                    </button>
                                 </div>

                                <div class='modal-body update'>
                                <form method='POST' enctype='multipart/form-data'>
                                    <label>Type of Service</label><br>
                                    <input type='text' name='category' placeholder ='Enter Service'><br>
                                    <label>Price</label><br>
                                    <input type='text' name='price'  placeholder='Enter Price'><br>
                                    <label>Working Days</label><br>
                                    <input type='text' name='working_days' placeholder ='Enter working days you render the service'><br>
                                    <label>Working Hours</label><br>
                                    <input type='text' name='working_hours' placeholder ='Enter working_hours'>
                                    
                                </div>
                                 <div class='modal-footer subbx '>
                                    <input type='button' value ='Back' class='pro' data-dismiss='modal' id='wwwwe'>
                                    <input type='submit' name='sub' value ='Submit' class='cancc' id='wwww'>
                                    
                                </div>
                            </form>
                     </div>
                </div>
         </div>  
    </body>
 </html>