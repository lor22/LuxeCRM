<?php require_once 'accesscontrol.php'; ?>
<?php require_once 'functions.php';?>
<?php confirmLoggedIn(); ?>
<?php
  $client = findClientById($_GET["idC"]);
  
  if (!$client) {
    // admin ID was missing or invalid or 
    // admin couldn't be found in database
    echo "error";
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Inventory Edit Product</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
	 <link href="assets/css/bootstrap-switch.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.php" class="logo"><b>Luxe</b></a>
            <!--logo end-->
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
       <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><img src="assets/img/ui-juan.jpg" class="img-circle" width="60"></p>
              	  <h5 class="centered"><?php echo htmlentities($_SESSION["usr"]); ?></h5>
                  <li class="mt">
                      <a href="index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Products</span>
                      </a>
                      <ul class="sub">
                          <li><a href="formInventory.php">Insert</a></li>
                          <li><a href="inventory.php">Check</a></li>
                      </ul>
                  </li>
						
                  <li class="sub-menu">
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>Clients</span>
                      </a>
                      <ul class="sub">
                          <li><a href="formClient.php">Insert</a></li>
                          <li><a  href="clients.php">Check</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="sales.php">
                          <i class="fa fa-money"></i>
                          <span>Sales</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i>Clients</h3>
          	<div class="row mt">
          	   <div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Client: <?php echo $client['ClientName'].' '.$client['ClientSurname'];?></h4>
                      <form class="form-horizontal style-form" action="controlador.php" method="post">
                           <div class="form-group" style="display: none;">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                 <input name="function" id="function" type="text" value="editClient" style="display: none;">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Name</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="clientName" value="<?php echo $client['ClientName'];?>">
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Surname</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="clientSurname" value="<?php echo $client['ClientSurname'];?>">
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Mail</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="clientMail" value="<?php echo $client['ClientMail'];?>">
                              </div>
                          </div>
								  
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Phone</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="clientPhone" value="<?php echo $client['ClientPhone'];?>">
                              </div>
                          </div>
								  
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Address</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="clientAddress" value="<?php echo $client['ClientAddress'];?>">
                              </div>
                          </div>
								  
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Active</label>
                              <div class="col-sm-6 text-left">
                                  <input type="checkbox" name="my-checkbox">
                              </div>
                          </div>
								  
                          <div class="form-group" style="display: none;">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="clientActive" value="<?php echo $client['ClientActive'];?>">
                              </div>
                          </div>
								  
                          <div class="form-group" style="display: none;">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="clientId" value="<?php echo $client['ClientId'];?>">
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <div class="col-lg-10">
					 						<p class="btn btn-info" data-toggle="modal" data-target="#myModal">
					 						  Edit
					 						</p>
                              </div>
                          </div>
								  
		  						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  						  <div class="modal-dialog">
		  						    <div class="modal-content">
		  						      <div class="modal-header">
		  						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		  						        <h4 class="modal-title" id="myModalLabel">Edit Client</h4>
		  						      </div>
		  						      <div class="modal-body">
		  						        Are you sure you want to edit this client?
		  						      </div>
		  						      <div class="modal-footer">
		  						        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		  						        <button type="submit" class="btn btn-success ">Save changes</button>
		  						      </div>
		  						    </div>
		  						  </div>
		  						</div>
                      </form>
                  </div>
          		</div><!-- col-lg-12--> 
          	</div>
			
		</section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2015 - Luxe
              <a href="editClient.php#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
	 <script src="assets/bootstrap-switch.js"></script>
	
 	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>

    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box
	 $( document ).ready(function() {
 	 	$("[name='my-checkbox']").bootstrapSwitch();
 		$("[name='my-checkbox']").bootstrapSwitch("size", 'normal');
		
		var isActive = $('input[name="clientActive"]').val();
		
		if(isActive === 'YES'){
			$('input[name="my-checkbox"]').bootstrapSwitch('state', true);
		}else{
			$('input[name="my-checkbox"]').bootstrapSwitch('state', false);
		}
		
		
	 });
	 	
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
