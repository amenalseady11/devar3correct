   
        
         <br>
         <div class="loginBlock" style="height: 150px;">
            <div class="loginTop triggerBlock">
               <div class="orderBlock">
                 
                  <div class="orderFlow">
                     <div class="orderFlowRibbon circle-ribbon"></div>
                     <ul class="orderFlowItems">
                        <li class="orderFlowItem1 done" >
                           <p>Address Details</p>
                           <div class="icon">1</div>
                        </li>
                        <li class="orderFlowItem2 active">
                           <p>Shipping Methods</p>
                           <div class="icon">2</div>
                        </li>
                      
                        <li class="orderFlowItem4">
                           <p>Place Order</p>
                           <div class="icon">3</div>
                        </li>
                     </ul>
                  </div>
                 
               </div>
            </div>
         </div>
         <div class="contantBlock blockEnd">
            <div class="container">
               <div class="row">
                  <div class="col-md-8 col-lg-8">
                  <div class="box_newcheck">
                    
                       <div class="row">
                        <div class="col-lg-12 d-md-flex justify-content-md-between align-items-center bor_bot">
                           <h4 class="mb-0 font-weight-bold">Shipping Methods</h4>
                          
                        </div>
                     </div>
                 
            <?php $shipid= $this->session->flashdata('shipid');?>
            <?php $billid= $this->session->flashdata('billid');?>
                  <br>
           <form method="post" action="<?php echo base_url()?>checkout_completed">
         <input type="hidden" name="shipid" value="<?php echo $shipid?>">
          <input type="hidden" name="billid" value="<?php echo $billid?>">
                    <div class="row ">
                    <div class="col-md-12">
                     <table style="width: 100%;">
                        <tr>
                           <td>
                             <input type="radio" name="optradio" value="15"  checked> 
                           </td>
                            <td>
                            SAR 15.000
                           </td>
                           <td>
                              Delivery
                           </td>
                           <td>
                              Flat Rate
                           </td>
                        </tr>
             <tr>
                           <td>
                             <input type="radio" name="optradio" value="0"  > 
                           </td>
                            <td>
                            SAR 0.000
                           </td>
                           <td>
                             Pickup
                           </td>
                           <td>
                             The customer will visit the shop and collect the items ordered
                           </td>
                        </tr>
                     </table>
                    </div>
                 </div>
              <br>
            
                     <div class="row ">
                         <div class="col-lg-6 co-sm-6 col-6 text-left">
                           <a class="btn pinkcss animatedBtn darckBtn btn_style2" href="checkout" role="button"><< Address Details</a>
                        </div>
                        <div class="col-lg-6 co-sm-6 col-6 text-right">
                           <button class="btn pinkcss animatedBtn darckBtn btn_style1"   type="submit" role="button">Next</button>
                        </div>
                     </div>
<br>
                 
            </form>
                  </div>
          </div>
                  <div class="col-md-4 col-lg-4">
                     <div class="cart_summary sticky_new">
                        <div class="justify-content-md-between ">
                           <h5 class="mb-0 head_sum"><b>Your Orders</b> </h5>
                        </div>
                        <div>
                       
                           <table class="table">
                               <thead>
                                   <tr>
                                       <th>Product</th>
                                       <th class="text-righta" style="width: 130px;">Total</th>
                                   </tr>
                               </thead>
                               <tbody class="body_table">
								   <?php 
				$total="0";
				foreach ($this->cart->contents() as $items)
{
					
					if($items['type_price'])
					{
						
						$items['subtotal']=$items['price'];
					$total=$total+$items['price'];	
					}
					else
					{
						 $total=$total+$items['subtotal'];
						
					}
					
					 
					 $totaldisp=number_format($total,2);
								   
								   ?>
					
                                   <tr>
                                       <td><?php echo $items['name']?> <span class="product-qty">x <?php echo $items['qty']?></span></td>
                                       <td class="text-righta">SAR <?php echo number_format($items['subtotal'],2);?></td>
                                   </tr>
									   
									   <?php } ?>
                                    
                                
                               </tbody>
                               <tfoot>
                                   <tr>
                                       <th>SubTotal</th>
                                       <td class="product-subtotal text-righta"><b>SAR <?php echo $totaldisp?></b></td>
                                   </tr>
								   <?php
								   $vat=number_format($total*(15/100),2);
										   
									$vatprice=$total*(15/100);
								   
				$grandtotal=$total+$vatprice;
				
		 	$grandtotal=number_format($grandtotal,2);
										   ?>
                                  
                                    <tr>
                                    <th class="cart_total_label">VAT (15%)</th>
                                    <td class="cart_total_amounta text-righta">SAR <?php echo $vat;?></td>
                                 </tr>
								   
                                   <tr>
                                       <th>Total</th>
                                       <td class="product-subtotal text-righta"><b>SAR <?php echo $grandtotal;?></b></td>
                                   </tr>
                               </tfoot>
                           </table>
                          
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
