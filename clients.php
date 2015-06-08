<?php require_once 'accesscontrol.php'; ?>
<?php require_once 'functions.php';?>
<?php confirmLoggedIn(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Clients</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
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
                          <li class="active"><a href="clients.php">Check</a></li>
                      </ul>
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
          	<h3><i class="fa fa-angle-right"></i> All Customers</h3>
				
				<div class="row">
					<div class="col-md-4">
						<div class="form-panel">
							<form class="form-inline">
                         <!-- <div class="form-group" style="display: none;">
                            <label class="col-sm-2 col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                               <input name="function" id="function" type="text" value="findClient">
                            </div> 
                        </div> -->
								<div class="form-group">
									<label class="sr-only">Client</label>
									<input type="text" class="form-control" name="clientName" id="clientName" placeholder="Search Client">
								</div>
								<span id="clientFinder" class="btn btn-theme">Find</span>
							</form>
						</div><!-- /form-panel -->
					</div><!-- /col-lg-12 -->
				</div><!-- /row -->
				
          	<div class="row mt">
          		<div class="col-md-12">
	                  	  <div class="content-panel">
	                  	  	  <h4><i class="fa fa-angle-right"></i> Active Clients</h4>
	                  	  	  <hr>
		                      <table class="table table-hover">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Mail</th>
                                    <th>Phone</th>
												<th>Address</th>
												<th>Buy Rate</th>
												<th>Client Active</th>
												<th>Edit</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    $results = viewActiveClients();
                                    if($results -> rowCount()<=0){
                                       echo '<tr><td>No clients available</td></tr>';
                                    }else{
                                       foreach ($results as $row) {
                                          echo '<tr>';
                                          echo '<td>'.$row['ClientId']. '</td>';
                                          echo '<td>'.$row['ClientName'].' '.$row['ClientSurname'].'</td>';
                                          echo '<td>'.$row['ClientMail'].'</td>';
                                          echo '<td>'.$row['ClientPhone'].'</td>';
														echo '<td>'.$row['ClientAddress'].'</td>';
														echo '<td>'.$row['ClientBuyRate'].'</td>';
														echo '<td><span class="label label-success">'.$row['ClientActive'].'</span></td>';
                                          echo '<td>
                                               <a href="editClient.php?idC='.$row['ClientId'].'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                               </td>';
                                          echo '</tr>';
                                       }
                                    }
                                 ?>
                              </tbody>
                            </table>
	                  	  </div><!--/content-panel -->
	            </div><!-- /col-md-12 -->
					
          		<div class="col-md-12 mt">
	                  	  <div class="content-panel">
	                  	  	  <h4><i class="fa fa-angle-right"></i> Non Active Clients</h4>
	                  	  	  <hr>
		                      <table class="table">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Mail</th>
                                    <th>Phone</th>
												<th>Address</th>
												<th>Buy Rate</th>
												<th>Client Active</th>
												<th>Edit</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    $results = viewNonActiveClients();
                                    if($results -> rowCount()<=0){
                                       echo '<tr><td>No clients available</td></tr>';
                                    }else{
                                       foreach ($results as $row) {
                                          echo '<tr>';
                                          echo '<td>'.$row['ClientId']. '</td>';
                                          echo '<td>'.$row['ClientName'].' '.$row['ClientSurname'].'</td>';
                                          echo '<td>'.$row['ClientMail'].'</td>';
                                          echo '<td>'.$row['ClientPhone'].'</td>';
														echo '<td>'.$row['ClientAddress'].'</td>';
														echo '<td>'.$row['ClientBuyRate'].'</td>';
														echo '<td><span class="label label-danger">'.$row['ClientActive'].'</span></td>';
                                          echo '<td>
                                               <a href="editClient.php?idC='.$row['ClientId'].'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                               </td>';
                                          echo '</tr>';
                                       }
                                    }
                                 ?>
                              </tbody>
                            </table>
	                  	  </div><!--/content-panel -->
	            </div><!-- /col-md-12 mt -->
					
          	</div><!-- /row-->
			
		</section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2015 - Luxe
              <a href="clients.php#" class="go-top">
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


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

 	$('#clientFinder').click(function(){
 		$('#main-content').hide();
 		var id = 'findClient';
 	    url = id;
 	    $.ajax({
 	    	type: 'POST',
 	        url: url+'.php',
 	        data:{
 	        	clientName: $("#clientName").val()
 	        },         
 	        success: function(response){
 	            $("#main-content").html(response);
 	            $("#main-content").show('');                
 	        },
 	    });
 	});

      $(function(){
          $('select.styled').customSelect();
      });
      

  </script>

  </body>
</html>
