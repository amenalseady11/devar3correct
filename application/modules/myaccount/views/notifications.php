  
        
                  <div class="col-md-8 col-lg-9">
                    <div class="box_address">
                       <h4>My Notifications</h4>

                       <div>
       
  <div class="table-responsive">
                                    <table class="table order-table">
                                        <thead>
                                            <tr>
                                                <th width="50%">Notifications</th>
                                                <th>Order Id</th>
                                                <th> Date</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
											
						<?php foreach ($notifications as $not)	 {
	
	
    $commentdate = date("d-m-Y H:i", strtotime($not['comment_date']));  
	  
    
	
	
?>				
                                            <tr>
                                                <td width="50%"><?php echo $not['order_comments'];?></td>                                                
                                                <td class="pending_color"><?php echo $not['order_id'];?></td>
                                                <td><?php echo $commentdate;?></td>
                                                                              </tr>
			<?php } ?>								
											
                                              
                                        </tbody>
                                    </table>
                                </div>


       <!--   <ul class="nav nav-tabs new_tab">
    <li class="active"><a data-toggle="tab" href="#home" class="active show">All</a></li>
    <li><a data-toggle="tab" href="#menu1">Processing</a></li>
    <li><a data-toggle="tab" href="#menu2">Completed</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane  in active">
    
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
   
  </div> -->





                       </div>
                    </div>
                  </div>
               </div>
            </div>
         </div>


        

        