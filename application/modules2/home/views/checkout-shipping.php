   
         <!-- 
            <div class="headerSpace"></div> -->
         <br>
         <div class="loginBlock" style="height: 150px;">
            <div class="loginTop triggerBlock">
               <div class="orderBlock">
                  <!-- <h3 class="sliderUp50d1">How to Order</h3> -->
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
                       <!--  <li class="orderFlowItem3">
                           <p>Payment Options</p>
                           <div class="icon">3</div>
                        </li> -->
                        <li class="orderFlowItem4">
                           <p>Place Order</p>
                           <div class="icon">3</div>
                        </li>
                     </ul>
                  </div>
                  <!-- <h4 class="sliderUp50d1">valuble and easy to print</h4> -->
               </div>
            </div>
         </div>
         <div class="contantBlock blockEnd">
            <div class="container">
               <div class="row">
                  <div class="col-md-8 col-lg-8">
                     <div class="row">
                        <div class="col-lg-12 d-md-flex justify-content-md-between align-items-center bor_bot">
                           <h4 class="mb-0 font-weight-bold">Shipping Methods</h4>
                           <!-- <a class="btn mt-md-0 mt-3 conti_shop" href="#" >Continue Shoping</a> -->
                        </div>
                     </div>
                  <!--  <div class="row ">
                    <div class="col-md-12">
                     <h6> <b>Free pick up from location</b> </h6>
                   </div>
                   <br>
                  <div class="col-md-12">
                     <div class="radio ">
  <label><input type="radio" name="optradio" checked>   Dubaiprint.com HQ DPC, Plot 36  </label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio">  Dubaiprint.com d3 Lounge </label>
</div>


                     
                   </div>
                  </div> -->
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
                              Fixed
                           </td>
                           <td>
                              Flat Rate
                           </td>
                        </tr>
                     </table>
                    </div>
                 </div>
              <br>
            
                     <div class="row ">
                         <div class="col-lg-6 co-sm-6 col-6 text-left">
                           <a class="btn animatedBtn darckBtn" href="checkout" role="button"><< Address Details</a>
                        </div>
                        <div class="col-lg-6 co-sm-6 col-6 text-right">
                           <button class="btn animatedBtn darckBtn"   type="submit" role="button">Next</button>
                        </div>
                     </div>
<br>
                  </div>
					  </form>
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
					 $total=$total+$items['subtotal'];
								   
								   ?>
					
                                   <tr>
                                       <td><?php echo $items['name']?> <span class="product-qty">x <?php echo $items['qty']?></span></td>
                                       <td class="text-righta">SAR <?php echo $items['subtotal']?></td>
                                   </tr>
									   
									   <?php } ?>
                                    
                                
                               </tbody>
                               <tfoot>
                                   <tr>
                                       <th>SubTotal</th>
                                       <td class="product-subtotal text-righta"><b>SAR <?php echo $total?></b></td>
                                   </tr>
								   <?php
								   $vat=number_format($total*(15/100),2);
								   
				$grandtotal=$total+$vat;
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

        