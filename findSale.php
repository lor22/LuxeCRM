	<section  class="wrapper site-min-height">  
		<h3><i class="fa  fa-angle-right"></i> All Sales</h3>
    	<div class="row mt">
    		<div class="col-md-12">
               	  <div class="content-panel">
               	  	  <h4><i class="fa fa-angle-right"></i>Sales</h4>
               	  	  <hr>
                      <table class="table table-hover">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Product</th>
                              <th>Date</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
										include 'functions.php';
                              $results = findSaleByThis($_POST["saleSomething"]);
                              if($results -> rowCount()<=0){
                                 echo '<tr><td>No clients available</td></tr>';
                              }else{
                                 foreach ($results as $row) {
                                    echo '<tr>';
                                    echo '<td>'.$row['SalesId']. '</td>';
                                    echo '<td>'.$row['ClientName'].' '.$row['ClientSurname'].'</td>';
                                    echo '<td>'.$row['ProdName'].'</td>';
                                    echo '<td>'.$row['SaleDate'].'</td>';
                                    echo '</tr>';
                                 }
                              }
                           ?>
                        </tbody>
                      </table>
               	  </div><!--/content-panel -->
         </div><!-- /col-md-12 -->
			<div class="col-md-6 mt">
				<a href="sales.php" class="btn btn-theme"><i class="fa fa-arrow-left"></i> Return</a>
			</div>
		
	</section><!--/wrapper --> 
