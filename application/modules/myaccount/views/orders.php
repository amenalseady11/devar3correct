  
        
                  <div class="col-md-8 col-lg-9">
                    <div class="box_address">
                       <h4>My Orders</h4>

                       <div>
       
  <div class="table-responsive">
                                    <table class="table order-table">
                                        <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											
						<?php foreach ($orders as $ord)	 {
	
	$total=$ord['price']+$ord['shipping_price'];
	
	$total=number_format($total, 2);
	
	  
    $orddate = date("d-m-Y H:i", strtotime($ord['order_date']));  
	
	
?>				
                                            <tr>
                                                <td>#<?php echo $ord['order_id'];?></td>
                                                <td><?php echo $orddate;?></td>
                                                <td class="pending_color"><?php echo ucfirst($ord['status']);?></td>
                                                <td>SAR <?php echo $total?> </td>
                                                <td><a href="<?php echo base_url()?>order_details/<?php echo $ord['order_id'];?>" class="btn pinkcss animatedBtn darckBtn btn_style2">View</a></td>
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


        

        