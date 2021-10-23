<?php $admin1 = new Main();?>

<!--Horizontal-main -->
			<div class="sticky">
				<div class="horizontal-main hor-menu clearfix side-header">
					<div class="horizontal-mainwrapper container clearfix">
						<!--Nav-->
						<nav class="horizontalMenu clearfix">
							<ul class="horizontalMenu-list">
								<li aria-haspopup="true"><a href="index.html" class=""><i class="fe fe-airplay  menu-icon"></i> Dashboard</a></li>
							

								<li aria-haspopup="true"><a href="#" class="sub-icon"><img src="<?php echo $admin1->assets('img/icon/icon-01.png')?>"> Sales <i class="fe fe-chevron-down horizontal-icon"></i></a>
								<ul class="sub-menu">
									<li aria-haspopup="true"><a href="<?php echo base_url()?>ad_order/product_select" class="slide-item"> New Order</a></li>
									<li aria-haspopup="true"><a href="<?php echo base_url()?>ad_order" class="slide-item"> Order </a></li>
									<li aria-haspopup="true"><a href="<?php echo base_url()?>estimate/product_select" class="slide-item"> New Estimate</a></li>
									<li aria-haspopup="true"><a href="<?php echo base_url()?>estimate" class="slide-item"> Estimates </a></li>
								  
								    <li aria-haspopup="true"><!--<a href="?php echo base_url()?>invoice/new_payment" class="slide-item"> New Invoice</a>--></li>
									<li aria-haspopup="true"><a href="<?php echo base_url()?>invoice" class="slide-item"> Invoice List</a></li>
								</ul>
							    </li>
							        <li aria-haspopup="true"><a href="#" class="sub-icon"><img src="<?php echo $admin1->assets('img/icon/icon-02.png')?>"> Stakeholders <i class="fe fe-chevron-down horizontal-icon"></i></a>
								<ul class="sub-menu">
									  <li aria-haspopup="true"><a href="#" class="sub-icon"> Customers <i class="fe fe-chevron-down horizontal-icon"></i></a>
								<ul class="sub-menu">
									<li aria-haspopup="true"><a href="<?php echo base_url()?>customers" class="slide-item"> New Customer</a></li>
									<li aria-haspopup="true"><a href="<?php echo base_url()?>customers/customer_list" class="slide-item"> Customer List</a></li>
							    </ul>
							    </li>
                                 <li aria-haspopup="true"><a href="#" class="sub-icon">Suppliers <i class="fe fe-chevron-down horizontal-icon"></i></a>
								<ul class="sub-menu">
									<li aria-haspopup="true"><a href="<?php echo base_url()?>supplier" class="slide-item"> New Supplier</a></li>
									<li aria-haspopup="true"><a href="<?php echo base_url()?>supplier/supplier_list" class="slide-item"> Supplier List</a></li>
							    </ul>
							    </li>

							    </ul>
							    </li>


							    
							     <li aria-haspopup="true"><a href="#" class="sub-icon"><img src="<?php echo $admin1->assets('img/icon/icon-04.png')?>"> Category <i class="fe fe-chevron-down horizontal-icon"></i></a>
								<ul class="sub-menu">
									<li aria-haspopup="true"><a href="<?php echo base_url()?>category" class="slide-item"> New Category</a></li>
									<li aria-haspopup="true"><a href="<?php echo base_url()?>category/category_list" class="slide-item"> Category List</a></li>
									<li aria-haspopup="true"><a href="<?php echo base_url()?>products/" class="slide-item"> New Products</a></li>
									<li aria-haspopup="true"><a href="<?php echo base_url()?>products/product_list" class="slide-item"> Product List</a></li>
									<li aria-haspopup="true"><a href="<?php echo base_url()?>dependable_attributes/add_attribute" class="slide-item"> New Attributes</a></li>
									<li aria-haspopup="true"><a href="<?php echo base_url()?>dependable_attributes/attribute_list" class="slide-item">Attribute List</a></li>
									<li aria-haspopup="true"><a href="<?php echo base_url()?>productsmap/productmap_list" class="slide-item"> Product Mapping</a></li>
									<!--<li aria-haspopup="true"><a href="<?php echo base_url()?>non_dependable_attributes/add_attribute" class="slide-item"> New Non dependable Attributes</a></li>
								<li aria-haspopup="true"><a href="<?php echo base_url()?>non_dependable_attributes/attribute_list" class="slide-item"> Attribute List</a></li>-->
									
									<li aria-haspopup="true"><a href="<?php echo base_url()?>orgproducts/orgproduct_list" class="slide-item"> Product Attribute List</a></li>
							    </ul>
							    </li>
							      <li aria-haspopup="true"><a href="#" class="sub-icon"><img src="<?php echo $admin1->assets('img/icon/icon-05.png')?>"> Inventory <i class="fe fe-chevron-down horizontal-icon"></i></a>
								<ul class="sub-menu">
									<li aria-haspopup="true"><a href="#" class="slide-item"> New Item</a></li>
									<li aria-haspopup="true"><a href="#" class="slide-item"> Stocks</a></li>
							    </ul>
							    </li>
							    <li aria-haspopup="true"><a href="#" class="sub-icon"><img src="<?php echo $admin1->assets('img/icon/icon-06.png')?>"> Staffs <i class="fe fe-chevron-down horizontal-icon"></i></a>
								<ul class="sub-menu">
									<li aria-haspopup="true"><a href="<?php echo base_url()?>employee" class="slide-item"> New Employee</a></li>
									<li aria-haspopup="true"><a href="<?php echo base_url()?>employee/employee_list" class="slide-item"> Employee List</a></li>
									<li aria-haspopup="true"><a href="#" class="slide-item"> Role Master</a></li>
									<li aria-haspopup="true"><a href="<?php echo base_url()?>pageaccess" class="slide-item"> Page Access</a></li>
									<li aria-haspopup="true"><a href="<?php echo base_url()?>departments/department_list" class="slide-item"> Department </a></li>
									<li aria-haspopup="true"><a href="<?php echo base_url()?>designation/designation_list" class="slide-item"> Designation</a></li>
									<li aria-haspopup="true"><a href="<?php echo base_url()?>groups" class="slide-item"> Add Group</a></li>
									<li aria-haspopup="true"><a href="<?php echo base_url()?>groups/group_list" class="slide-item"> Groups</a></li>
									<li aria-haspopup="true"><a href="#" class="slide-item"> Assign Task</a></li>
									<li aria-haspopup="true"><a href="#" class="slide-item"> Task List</a></li>
							    </ul>
							    </li>
                                <li aria-haspopup="true"><a href="#" class="sub-icon"> <img src="<?php echo $admin1->assets('img/icon/icon-07.png')?>"> Reports <i class="fe fe-chevron-down horizontal-icon"></i></a>
								<ul class="sub-menu">
									<li aria-haspopup="true"><a href="#" class="slide-item"> Order Details</a></li>
									<li aria-haspopup="true"><a href="#" class="slide-item"> Payment Details</a></li>
							    </ul>
							    </li>
							
								
								 <li aria-haspopup="true"><a href="#" class="sub-icon"><img src="<?php echo $admin1->assets('img/icon/icon-08.png')?>"> CMS Management <i class="fe fe-chevron-down horizontal-icon"></i></a>
								<ul class="sub-menu">
								<li aria-haspopup="true"><a href="<?php echo base_url()?>cms/page_list" class="slide-item"> Pages</a></li>
									<!--<li aria-haspopup="true"><a href="#" class="slide-item"> About Us</a></li>
									<li aria-haspopup="true"><a href="#" class="slide-item"> Who We are </a></li>
										<li aria-haspopup="true"><a href="#" class="slide-item"> Clients </a></li>
											<li aria-haspopup="true"><a href="#" class="slide-item"> Contact Page </a></li>-->
							    </ul>
							    </li>
								</ul>
						</nav>
						<!--Nav-->
					</div>
				</div>
			</div>
			<!--Horizontal-main -->