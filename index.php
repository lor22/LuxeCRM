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

    <title>Luxe Employee</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>

    
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
                      <a class="active" id="dashboard" href="index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a id="products" href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Products</span>
                      </a>
                      <ul class="sub">
                          <li id="newProd" style="cursor: pointer;"><a href="formInventory.php">Insert</a></li>
                          <li><a  href="inventory.php">Check</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a id="products" href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>Clients</span>
                      </a>
                      <ul class="sub">
                          <li id="newClient" style="cursor: pointer;"><a href="formClient.php">Insert</a></li>
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
          <section class="wrapper" id="wrapp">

              <div class="row">
                  <div class="col-lg-9 main-chart">         
                      <div class="row mt">
                      	
								<div class="col-md-4 col-md-4">
									<div class="product-panel-2 pn">
										<div class="badge badge-hot">HOT</div>
										<img src="assets/img/product.jpg" width="200" alt="">
										<h5 class="mt"><?php $topP = topProduct();
													$prodName = $topP['ProdName'];
													echo $prodName;?></h5>
										<h6>TOTAL SALES: <?php $count = $topP['numberOfProd'];
											echo $count; ?></h6>
										<a class="btn btn-small btn-theme04" href="sales.php">FULL REPORT</a>
									</div>
								</div><!-- /col-md-4 -->
                      	
                      	<div class="col-md-4 col-sm-4 mb">
									<!-- REVENUE PANEL -->
									<div class="darkblue-panel pn">
										<div class="darkblue-header">
											<h5>REVENUE</h5>
										</div>
										<?php
										$total = [];
										for($i = 0; $i < 12;$i++)
										{
											$total[$i] = totalProducts($i+1);
											$t = $total[$i];
										}
										?>
										<div class="chart mt">
											<div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[<?php
											for($j=0;$j<12;$j++){
												echo $total[$j]['products'];
												if($j!=11){
													echo ',';
												}
											}
											?>]"></div>
										</div>
										<p class="mt"><b></b><br/>Products sold: <?php $x = getAllProd(); echo $x['ALLproducts'];?></p>
									</div>
								</div><!-- /col-md-4 -->
                      	
								<div class="col-md-4 mb">
									<!-- WHITE PANEL - TOP USER -->
									<div class="white-panel pn">
										<div class="white-header">
											<h5>TOP CUSTOMER</h5>
										</div>
										<p><img src="assets/img/clients/ui-zac.jpg" class="img-circle" width="80"></p>
										<p><b><?php $top = topUser();
													$name = $top['ClientName'];
													$surname = $top['ClientSurname'];
													$buyRate = $top['ClientBuyRate'];
													$mail = $top['ClientMail'];
													echo $name.' '.$surname;?></b></p>
										<div class="row">
											<div class="col-md-12">
												<p class="small mt">Buy Rate per Month</p>
												<p><?php echo $buyRate;?>%</p>
											</div>
										</div>
									</div>
								</div><!-- /col-md-4 -->
                      	

                    </div><!-- /row -->
					
					<div class="row mt">
                      <!--CUSTOM CHART START -->
                      <div class="border-head">
                          <h3>SALES PER MONTH</h3>
                      </div>
                      <div class="custom-bar-chart">
                          <ul class="y-axis">
                              <li><span>1000</span></li>
                              <li><span>800</span></li>
                              <li><span>600</span></li>
                              <li><span>400</span></li>
                              <li><span>200</span></li>
                              <li><span>0</span></li>
                          </ul>
								  <?php
								  $result1 = monthlySales(1);
								  $result2 = monthlySales(2);
								  $result3 = monthlySales(3);
								  $result4 = monthlySales(4);
								  $result5 = monthlySales(5);
								  $result6 = monthlySales(6);
								  ?>
                          <div class="bar">
                              <div class="title">JAN</div>
                              <div class="value tooltips" data-original-title="<?php echo $result1['total'];?>€" data-toggle="tooltip" data-placement="top"><?php echo ($result1['total']/10);?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">FEB</div>
                              <div class="value tooltips" data-original-title="<?php echo $result2['total'];?>€" data-toggle="tooltip" data-placement="top"><?php echo ($result2['total']/10);?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">MAR</div>
                              <div class="value tooltips" data-original-title="<?php echo $result3['total'];?>€" data-toggle="tooltip" data-placement="top"><?php echo ($result3['total']/10);?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">APR</div>
                              <div class="value tooltips" data-original-title="<?php echo $result4['total'];?>€" data-toggle="tooltip" data-placement="top"><?php echo ($result4['total']/10);?>%</div>
                          </div>
                          <div class="bar">
                              <div class="title">MAY</div>
                              <div class="value tooltips" data-original-title="<?php echo $result5['total'];?>€" data-toggle="tooltip" data-placement="top"><?php echo ($result5['total']/10);?>%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">JUN</div>
                              <div class="value tooltips" data-original-title="<?php echo $result6['total'];?>€" data-toggle="tooltip" data-placement="top"><?php echo ($result6['total']/10);?>%</div>
                          </div>
                          <div class="bar">
                              <div class="title">JUL</div>
                              <div class="value tooltips" data-original-title="<?php echo $result7['total'];?>€" data-toggle="tooltip" data-placement="top"><?php echo ($result7['total']/10);?>%</div>
                          </div>
							  </div>
                      <!--custom chart end-->
					</div><!-- /row -->	
					
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                  <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
						<h3><a href="sales.php" style="color: white;">Last Sells</a></h3>
							 
							 							 <?php 
														 	$result = fiveLastClients();
														 	$result2 = fiveLastProducts();
															$i = array();
															$index = 0;
															$index2 = 0;
														 ?>
														 <?php foreach($result2 as $row){?>
															 
							                        <?php $i[$index] = $row['ProdName'];
															$index++;?>
														  
														  <?php } ?>
														 <?php foreach($result as $row){?>
															 
							                        <div class="desc">
							                       		<div class="thumb">
							                       			<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
							                       		</div>
							                       		<div class="details">
							                       			<p><muted>Date of sell <?php echo $row['day'].'-'.$row['month'].'-'.$row['year'];?></muted><br/>
							                       		  		<a><?php echo $row['ClientName'].' '.$row['ClientSurname'];?></a> bought this product <a><?php echo $i[$index2];?></a><br/>
							                       			</p>
							                       		</div>
							                       </div>
														  
														  <?php $index2++;
													  		} ?>
														  
							                       
							 
                        <!-- CALENDAR-->
                        <div id="calendar" class="mb">
                            <div class="panel green-panel no-margin">
                                <div class="panel-body">
                                    <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                        <div class="arrow"></div>
                                        <h3 class="popover-title" style="disadding: none;"></h3>
                                        <div id="date-popover-content" class="popover-content"></div>
                                    </div>
                                    <div id="my-calendar"></div>
                                </div>
                            </div>
                        </div><!-- / calendar -->
                      
                  </div><!-- /col-lg-3 -->
              </div><!--/row -->
          </section>
      </section>

      <!--main content end-->
      
      
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2015 - Luxe
              <a href="index.php#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
	<script src="assets/js/zabuto_calendar.js"></script>	
	
	
	
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
				
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  

  </body>
</html>
