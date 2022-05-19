
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">


    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">



      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <title>new dashboard</title>
  </head>
  <style type="text/css">
   body{
   	margin: 0;
   	padding: 0;
   	overflow: hidden;
   }
   .sideb{
   	overflow-y: scroll;
   }
  	.sidenav{
  		background: #2C3E50;
  		height: 100%;
  		overflow-y: scroll;
  		
  	}
  	.bodyy{
  		background: gold;
  		height: 100vh;
  		overflow-y: scroll;
  	}
  </style>
  <body>

    <div class="row">
    	<div class="col-2 sidenav">
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
                        <a class="collapse-item" href="cards.html">Income & Expenditure</a>
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
    	</div>
    	<div class="col bodyy"></div>
    	
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>