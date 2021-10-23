 


        
               <!-- main-content-body -->
               <div class="main-content-body">
                  <div class="row row-sm">
                     <!--div-->
                     <div class="col-xl-12">
                        <div class="card mg-b-20">
                           <div class="card-header pb-0">
                              <div class="justify-content-between" style="display: inline-block;">
                                 <h3 class="card-title mg-b-2 mt-2">  Invoice  #00001  <span class="status-symble  badge badge-success" style="display: inline-block;font-size: 11px;margin-left: 10px;">Paid</span></h3>
                                 <p>Recipient: <?php echo "nnnn".$hello; ?><?php echo "kkkkkkk"; ?></p>
                              </div>
                              <div class="btn_right wid_ri">
                                 <a href="#" class="btn btn-success btn-block"><span class="fa fa-credit-card" aria-hidden="true"></span> Add Payment</a>
                                 <a href="#" class="btn btn-outline-success btn-block"><span class="fa fa-print" aria-hidden="true"></span> Print PDF</a>
                              </div>
                           </div>
                           <div class="card-body">
                              <div class="row ">
                                 <div class="col-12 col-lg-12">
                                    <div id="FilterDiv" class="filter-results rounded-item panel panel-default listing-filters">
                                       <div class="panel-heading">
                                          <div class="invoice-actions btn-group dropdown-btn-group">
                                             <a href="#" class="btn btn-default btn-sm quick-action-btn">
                                             <span class="far fa-edit" aria-hidden="true"></span>
                                             Edit</a>
                                             <a href="#" class="print btn btn-default btn-sm quick-action-btn">
                                             <i class="fas fa-envelope-square"></i> Email to client</a>
                                             <a href="#" class="print btn btn-default btn-sm quick-action-btn">
                                             <span class="fa fa-print" aria-hidden="true"></span>
                                             Print</a>
                                             <a href="#" class="btn btn-default btn-sm quick-action-btn">
                                             <span class="far fa-file-pdf" aria-hidden="true"></span>
                                             PDF</a>
                                             <a class="btn btn-default btn-sm quick-action-btn" href="#">
                                             <span class="fa fa-credit-card" aria-hidden="true"></span>
                                             Add Payment</a>
                                             <!--    <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-default  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Vouchers <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu ">
                                                   <li><a href="#">Packing Slip</a></li>
                                                   <li><a href="#">Pick List</a></li>
                                                   <li><a href="#">Shipping Label</a></li>
                                                </ul>
                                                </div> -->
                                             <div class="clearfix"></div>
                                          </div>
                                       </div>
                                       <div class="panel-body ">
                                          <ul class="nav nav-tabs">
                                             <li><a data-toggle="tab" href="#invoice_id" class="active show">Invoice</a></li>
                                             <li><a data-toggle="tab" href="#payment_id">Payment</a></li>
                                             <li><a data-toggle="tab" href="#activitylog">Activity Log </a></li>
                                          </ul>
                                          <div class="tab-content">
                                             <div id="invoice_id" class="tab-pane fade in active show">
                                                <div class="invoice-wrap">
                                                   <div class="invoice-inner">
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                         <tbody>
                                                            <tr>
                                                               <td width="33%">
                                                                  <img src="assets/img/brand/logo.png" style="width: 70%;">
                                                               </td>
                                                               <td class="text-left" valign="top" width="33%">
                                                                  <p>
                                                                     <span class="bussines-name">Deyar</span><br>
                                                                     Fahad ibn ibrahim<br>
                                                                     Malaz<br>
                                                                     Riyadh, AL Riyadh 11242 <br>
                                                                     VAT : 3000742361400003

                                                                  </p>
                                                               </td>
                                                               <td class="text-right" valign="top">
                                                                  <h1>Invoice</h1>
                                                               </td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                      <div class="invoice-address" style="padding-top: 20px;border-top: 1px solid darkgrey;">
                                                         <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                               <tr>
                                                                  <td id="second_left" width="65%" class="text-left" valign="top">
                                                                     <p>
                                                                        <strong>Bill to:</strong><br>
                                                                        AbCD                        <br>
                                                                        Abdullah Naeem<br>
                                                                        Malaz<br>
                                                                        Riyadh, AL Riyadh 11242
                                                                     </p>
                                                                     <p>
                                                                        <strong>Ship to:</strong><br>
                                                                        AbCD                        <br>
                                                                        Abdullah Naeem<br>
                                                                        Malaz<br>
                                                                        Riyadh, AL Riyadh 11242
                                                                     </p>
                                                                  </td>
                                                                  <td id="second_right" width="35%" class="text-right" valign="top">
                                                                     <table id="invoice_fields" border="0" cellspacing="0" cellpadding="0" class="text-right float-right">
                                                                        <tbody>
                                                                           <tr>
                                                                              <td class="text-right">
                                                                                 <strong>Invoice #</strong>
                                                                              </td>
                                                                              <td style="padding-left:20px;" class="text-left">
                                                                                 00001                                        
                                                                              </td>
                                                                           </tr>
                                                                           <tr>
                                                                              <td class="text-right"><strong>Invoice Date</strong></td>
                                                                              <td style="padding-left:20px;" class="text-left">22/04/2021</td>
                                                                           </tr>
                                                                           <tr>
                                                                              <td class="text-right"><strong>Due Date</strong></td>
                                                                              <td style="padding-left:20px;" class="text-left">23/04/2021</td>
                                                                           </tr>
                                                                        </tbody>
                                                                     </table>
                                                                  </td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                      </div>
                                                      <table cellspacing="0" cellpadding="2" border="0" width="100%" id="listing_table" class="invoice-listing-table total-table" style="">
                                                         <tbody>
                                                            <tr>
                                                               <th width="" bgcolor="#E5E5E5" style="border-left:1px solid #555;">Item</th>
                                                               <th width="210" bgcolor="#E5E5E5">Description</th>
                                                               <th width="80" bgcolor="#E5E5E5">Unit Price</th>
                                                               <th width="40" bgcolor="#E5E5E5">Qty</th>
                                                               <th width="60" bgcolor="#E5E5E5">Subtotal</th>
                                                            </tr>
                                                            <tr>
                                                               <td width="">Business Card</td>
                                                               <td width="210">Business Card</td>
                                                               <td width="80">100.00</td>
                                                               <td width="40">1</td>
                                                               <td width="80">100.00</td>
                                                            </tr>
                                                            <tr>
                                                               <td width="">Letterhead</td>
                                                               <td width="210">Letterhead</td>
                                                               <td width="80">560.00</td>
                                                               <td width="40">1</td>
                                                               <td width="80">560.00</td>
                                                            </tr>
                                                            <tr class="">
                                                               <td style="border:none" bgcolor="#FFF" colspan="2"></td>
                                                               <td style="border-left:none;border-right:none;" colspan="2"><strong>Subtotal:</strong></td>
                                                               <td style="border-left:none;border-right:none;" class="text-left">660.00 SR</td>
                                                            </tr>
                                                            <tr class="">
                                                               <td style="border:none" bgcolor="#FFF" colspan="2"></td>
                                                               <td style="border-left:none;border-right:none;" colspan="2"><strong>Discount:</strong></td>
                                                               <td style="border-left:none;border-right:none;" class="text-left">-33.00 SR</td>
                                                            </tr>
                                                            <tr class="">
                                                               <td style="border:none" bgcolor="#FFF" colspan="2"></td>
                                                               <td style="border-left:none;border-right:none;" colspan="2"><strong>VAT (15%):</strong></td>
                                                               <td style="border-left:none;border-right:none;" class="text-left">99.00 SR</td>
                                                            </tr>
                                                            <tr class="total-row">
                                                               <td style="border:none" bgcolor="#FFF" colspan="2"></td>
                                                               <td style="border-left:none;border-right:none;" colspan="2"><strong>Total:</strong></td>
                                                               <td style="border-left:none;border-right:none;" class="text-left">759.00 SR</td>
                                                            </tr>
                                                            <tr>
                                                               <td style="border:none" bgcolor="#FFF" colspan="2"></td>
                                                               <td style="border-left:none;border-right:none;" colspan="2"><strong>Paid:</strong></td>
                                                               <td style="border-left:none;border-right:none;" class="text-left">759.00 SR</td>
                                                            </tr>
                                                            <tr>
                                                               <td style="border:none" bgcolor="#FFF" colspan="2"></td>
                                                               <td style="border-left:none;border-right:none;" colspan="2"><strong>Balance Due:</strong></td>
                                                               <td style="border-left:none;border-right:none;" class="text-left">0.00 SR</td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </div>
                                                </div>
                                             </div>
                                             <div id="payment_id" class="tab-pane fade">
                                                <h3>Payments for invoice #0001</h3>
                                                <div class="btn_rightcss"><a href="#" class="btn ripple btn-success mb-3 mb-xl-0">Add Payment</a></div>
                                                <div class="bordered">
                                                   <ul class="day-view-entry-list">
                                                      <li class="day-view-entry day-view-entry-label">
                                                         <table cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                               <tr>
                                                                  <td width="50%" class="clickable" data-url="#">
                                                                     <div class="invoice-row entry-info">
                                                                        <div class="project-client"><a href=""> <span class="project"></span> #1 - Customer  <span class="project sub_with_num"> Customer</span>  </a></div>
                                                                        <div class="task-notes"><a href="#"><span class="project">Receipt</span>  <span class="project">#00001</span> - <span class="expense-date"> 22/04/2021 </span></a>  </div>
                                                                        <div class="task-notes2">
                                                                           <span><i class="fa fa-user"></i> Abcd</span> <span><i class="far fa-money-bill-alt"></i> Cash</span>
                                                                        </div>
                                                                     </div>
                                                                  </td>
                                                                  <td style="" class="">
                                                                     <a href="#" class="new_seca"><i class="far fa-eye"></i> View</a>
                                                                     <a href="#" class="new_seca">   <i class="fa fa-print"></i> Print</a>
                                                                     <a href="#" class="new_seca"><i class="far fa-edit"></i> Edit</a>
                                                                     <a href="#" class="new_seca"><i class="far fa-trash-alt"></i> Delete</a>
                                                                  </td>
                                                                  <td class="entry-time">
                                                                     700.00 SAR                   
                                                                     <div class="status">
                                                                        <span class="status-symble  badge badge-danger">Pending</span>
                                                                     </div>
                                                                  </td>
                                                                  <td class="entry-button">
                                                                     <div class="dropdown mobile-options">
                                                                        <button class="btn btn-lg btn-primary dropdown-toggle new_bbtn" type="button" data-toggle="dropdown" aria-expanded="false">
                                                                        </button>
                                                                        <ul class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(41px, 46px, 0px);">
                                                                           <li><a href="#" class="View" title="View Invoice"> <i class="far fa-eye"></i> View</a></li>
                                                                           <li><a href="#" class="Edit" title="Edit"><i class="far fa-edit"></i> Edit</a></li>
                                                                           <li><a href="#" class="Print" title="Print Invoice"><i class="fas fa-print"></i> Print</a></li>
                                                                           <li><a href="#" class="Delete" title="Delete"><i class="far fa-trash-alt"></i> Delete</a></li>
                                                                        </ul>
                                                                     </div>
                                                                  </td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                      </li>
                                                      <li class="day-view-entry day-view-entry-label">
                                                         <table cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                               <tr>
                                                                  <td width="50%" class="clickable" data-url="#">
                                                                     <div class="invoice-row entry-info">
                                                                        <div class="project-client"><a href=""> <span class="project"></span> #2 - Customer  <span class="project sub_with_num"> Customer</span>  </a></div>
                                                                        <div class="task-notes"><a href="#"><span class="project">Receipt</span>  <span class="project">#00002</span> - <span class="expense-date"> 22/04/2021 </span></a>  </div>
                                                                        <div class="task-notes2">
                                                                           <span><i class="fa fa-user"></i> Abcd</span> <span><i class="far fa-money-bill-alt"></i> Cash</span>
                                                                        </div>
                                                                     </div>
                                                                  </td>
                                                                  <td style="" class="">
                                                                     <a href="#" class="new_seca"><i class="far fa-eye"></i> View</a>
                                                                     <a href="#" class="new_seca">   <i class="fa fa-print"></i> Print</a>
                                                                     <a href="#" class="new_seca"><i class="far fa-edit"></i> Edit</a>
                                                                     <a href="#" class="new_seca"><i class="far fa-trash-alt"></i> Delete</a>
                                                                  </td>
                                                                  <td class="entry-time">
                                                                     700.00 SAR                   
                                                                     <div class="status">
                                                                        <span class="status-symble  badge badge-danger">Pending</span>
                                                                     </div>
                                                                  </td>
                                                                  <td class="entry-button">
                                                                     <div class="dropdown mobile-options">
                                                                        <button class="btn btn-lg btn-primary dropdown-toggle new_bbtn" type="button" data-toggle="dropdown" aria-expanded="false">
                                                                        </button>
                                                                        <ul class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(41px, 46px, 0px);">
                                                                           <li><a href="#" class="View" title="View Invoice"> <i class="far fa-eye"></i> View</a></li>
                                                                           <li><a href="#" class="Edit" title="Edit"><i class="far fa-edit"></i> Edit</a></li>
                                                                           <li><a href="#" class="Print" title="Print Invoice"><i class="fas fa-print"></i> Print</a></li>
                                                                           <li><a href="#" class="Delete" title="Delete"><i class="far fa-trash-alt"></i> Delete</a></li>
                                                                        </ul>
                                                                     </div>
                                                                  </td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                      </li>
                                                   </ul>
                                                </div>
<br><br>
                                                  <h3>Payments Summary</h3>
<div class="table-responsive">
                                                 <table  class="table table-hover mb-0 text-md-nowrap">
                    <thead>
                      <tr>
                        <th>Receipt no</th>
                     
                        <th>Receipt total</th>
                     
                        <th>Paid amount</th>
                         <th>Unpaid amount</th>
                      </tr>
                        <tr>
                        <td>001</td>
                      
                        <td>1745 SAR</td>
                     
                        <td>700.00 SAR</td>
                        <td>1074.00 SAR</td>
                      </tr>
                       <tr>
                        <td>002</td>
                      
                        <td>1745 SAR</td>
                      
                        <td>700.00 SAR</td>
                        <td>1074.00 SAR</td>
                      </tr>
                       <tr>
                        <td>003</td>
                   
                        <td>1745 SAR</td>
                     
                        <td>700.00 SAR</td>
                        <td>1074.00 SAR</td>
                      </tr>
                    </thead>
                                                  </table>
                                                </div>
                                             </div>
                                             <div id="activitylog" class="tab-pane fade">
                                                <!-- <h3>Menu 2</h3> -->
                                                <br>
                                             <div id="timeline_content"><div id="timeline_content">
    <div class="timeline-wrapper mobile-timeline-wrapper">
        <div class="date-label">
      <p>Activity Log</p>
    </div>
        <div class="item-wrapper extended timeline_invoice timeline_add_invoice">
      <div class="timeline-item"> <span class="extend">26-04-2021</span>
        <p><strong>You</strong> created a new <strong>Receipt</strong>   <strong><a href="#" target="_blank">#00001</a></strong> for <strong><a href="#" target="_blank">abcd (#1)</a></strong> totalling <strong>222</strong>, and balance due: <strong>222</strong></p>
        <span><i class="fa fa-clock-o"></i> 15:39:52 - <i class="fa fa-user"></i> dcba</span> </div>
    </div>
      <div class="item-wrapper extended timeline_invoice timeline_add_invoice">
      <div class="timeline-item"> <span class="extend">25-04-2021</span>
        <p><strong>You</strong> created a new <strong>Receipt</strong>   <strong><a href="#" target="_blank">#00001</a></strong> for <strong><a href="#" target="_blank">abcd (#1)</a></strong> totalling <strong>222</strong>, and balance due: <strong>222</strong></p>
        <span><i class="fa fa-clock-o"></i> 15:39:52 - <i class="fa fa-user"></i> dcba</span> </div>
    </div>
      <div class="item-wrapper extended timeline_invoice timeline_add_invoice">
      <div class="timeline-item"> <span class="extend">24-04-2021</span>
        <p><strong>You</strong> created a new <strong>Receipt</strong>   <strong><a href="#" target="_blank">#00001</a></strong> for <strong><a href="#" target="_blank">abcd (#1)</a></strong> totalling <strong>222</strong>, and balance due: <strong>222</strong></p>
        <span><i class="fa fa-clock-o"></i> 15:39:52 - <i class="fa fa-user"></i> dcba</span> </div>
    </div>

  </div>
</div>

<!-- Initialize the plugin: -->

</div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!--/div-->
                     </div>
                  </div>
                  <!-- /row -->
               </div>
               <!-- /container -->
            </div>
            <!-- /main-content --></html>