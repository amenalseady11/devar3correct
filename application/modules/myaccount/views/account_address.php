  
        
                  <div class="col-md-8 col-lg-9">
                    <div class="box_address">
                       <h4>Address Book    <div class="right_button" align="right"><a href="new_address" class="btn pinkcss animatedBtn darckBtn btn_style2" role="button">Add New Address</a></div></h4>
  <div class="row">
  <div class="col-md-6 col-lg-6">
<div class="box box-address-billing">
                <strong class="box-title">
                    <span>Billing Address</span>
                </strong>
                <div class="box-content">
                    <address>
 <?php echo $addressbilling['first_name']?>&nbsp;<?php echo $addressbilling['last_name']?><br>
 <?php echo $addressbilling['address']?><br>
<?php echo $addressbilling['city']?><br>
<?php echo $billingcountry['country_name'];?><br>
<a href="tel:580760706">  <?php echo $addressbilling['phone_number']?> </a>

                    </address>
                </div>
                <div class="box-actions">
                    <a class="action edit btn pinkcss animatedBtn darckBtn btn_style1" href="editaddress/<?php echo $addressbilling['id']?>">
                        <span>Change Address</span>
                    </a>
                </div>
            </div>
  </div>
   <div class="col-md-6 col-lg-6">
  <div class="box box-address-shipping">
                <strong class="box-title">
                    <span> Shipping Address</span>
                </strong>
                <div class="box-content">
					<?php //print_r($addressshipping) ?>
                          <address>
 <?php echo $addressshipping['first_name']?>&nbsp;<?php echo $addressshipping['last_name']?><br>
 <?php echo $addressshipping['address']?><br>
<?php echo $addressshipping['city']?><br>
<?php echo $shippingcountry['country_name'];?><br>
<a href="tel:<?php echo $addressshipping['phone_number']?>">  <?php echo $addressshipping['phone_number']?> </a>

                    </address>
                </div>
                <div class="box-actions">
                    <a class="action edit btn pinkcss animatedBtn darckBtn btn_style1" href="editaddress/<?php echo $addressshipping['id']?>">
                        <span>Change Address</span>
                    </a>
                </div>
            </div>
  </div>
  </div>
  <br>
    <br>
                       <div>
        <h5>Additional Address Entries</h5>
  <div class="table-responsive">
                                    <table class="table address-table">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Address</th>
                                                  <th>Country</th>
                                                <th>City</th>
                                                <th>State / Province</th>
                                                <th>ZIP / Postal Code</th>
                                              
                                                   <th style="width: 110px;">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
											
											
											
			<?php foreach ($alladdress as $add)	{
	
	$country=$add[country_code];
	
	
	
				?>			
                                            <tr>
                            <td data-th="First Name" class=" firstname"><?php echo $add[first_name] ?></td>
                            <td data-th="Last Name" class=" lastname"><?php echo $add[last_name] ?></td>
                            <td data-th="Street Address" class=" streetaddress"><?php echo $add[address] ?></td>
                                <td data-th="Country" class=" country"><?php echo $allname[$country]['country_name']; ?></td>
                            <td data-th="City" class=" city"><?php echo $add[city] ?></td>
                              <td data-th="State" class=" state"><?php echo $add[state] ?></td>
                           <td data-th="Zip/Postal Code" class=" zip"><?php echo $add[zip_code] ?></td>
                         
                            <!-- <td data-th="Phone" class="col phone">9061323302</td> -->
                            <td data-th="Actions" class=" actions">
                                <a class="action edit" href="editaddress/<?php echo $add['id']?>"><span>Edit</span></a>
                                <a class="action delete" onclick="return confirm('Are you sure you want to delete this Address?');" href="deleteaddress/<?php echo $add['id']?>" role="delete-address" data-address="6"><span>Delete</span></a>
                            </td>
                        </tr>
                         
                     <?php } ?>                   </tbody>
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


        

        