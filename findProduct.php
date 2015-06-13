	<section  class="wrapper site-min-height">  
		<h3><i class="fa  fa-angle-right"></i> All Products</h3>
    	<div class="row mt">
    		<div class="col-md-12">
               	  <div class="content-panel">
               	  	  <h4><i class="fa fa-angle-right"></i>ALL</h4>
               	  	  <hr>
                      <table class="table table-hover">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Price</th>
                              <th>Units</th>
										<th>Product Active</th>
										<th>Edit</th>
										<th></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
										include 'functions.php';
                           	$results = findProductByThis($_POST["productName"]);
                              if($results -> rowCount()<=0){
                                 echo '<tr><td>No products available</td></tr>';
                              }else{
                                 foreach ($results as $row) {
                                    echo '<tr>';
                                    echo '<td>'. $row['ProdId'] . '</td>';
                                    echo '<td>'. $row['ProdName'].'</td>';
                                    echo '<td>'. $row['ProdPrice'].'</td>';
                                    echo '<td>'. $row['ProdUnits'].'</td>';
												if ($row['ClientActive'] == 'YES') echo '<td><span class="label label-success">'.$row['ProdActive'].'</span></td>';
												if ($row['ClientActive'] == 'NO') echo '<td><span class="label label-danger">'.$row['ProdActive'].'</span></td>';
                                    echo '<td>
                                         <a href="editProduct.php?id='.$row['ProdId'].'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                         </td>';
                                    echo '</tr>';
                                 }
                              }
                           ?>
                        </tbody>
                      </table>
               	  </div><!--/content-panel -->
         </div><!-- /col-md-12 -->
			<div class="col-md-6 mt">
				<a href="inventory.php" class="btn btn-theme"><i class="fa fa-arrow-left"></i> Return</a>
			</div>
	</section><!--/wrapper --> 
