	<section  class="wrapper site-min-height">  
		<h3><i class="fa  fa-angle-right"></i> All Customers</h3>
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
										include 'functions.php';
                              $results = findClientByThis($_POST["clientName"]);
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
		
	</section><!--/wrapper --> 
