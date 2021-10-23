<?php $admin1 = new Main();?>
<?php
$user = $this->ion_auth->user()->row();
     	$adminid=$user->id;	
       $type=$user->type;

    $pagename="order";
	$orderaccess=$admin1->getmenuaccess($adminid,$pagename);
    $pagename="estimate";
	$estimateaccess=$admin1->getmenuaccess($adminid,$pagename);
    $pagename="invoice";
	$invoiceaccess=$admin1->getmenuaccess($adminid,$pagename);
    $pagename="suppliers";
	$supplieraccess=$admin1->getmenuaccess($adminid,$pagename);
    $pagename="customers";
	$customeraccess=$admin1->getmenuaccess($adminid,$pagename);
    $pagename="category";
	$categoryaccess=$admin1->getmenuaccess($adminid,$pagename);
    $pagename="products";
	$productaccess=$admin1->getmenuaccess($adminid,$pagename);
    $pagename="attributes";
	$attributeaccess=$admin1->getmenuaccess($adminid,$pagename);
    $pagename="mapping";
	$productmapaccess=$admin1->getmenuaccess($adminid,$pagename);
    $pagename="product attributes";
	$orgproductsaccess=$admin1->getmenuaccess($adminid,$pagename);
    $pagename="employee";
	$employeeaccess=$admin1->getmenuaccess($adminid,$pagename);
    $pagename="pageaccess";
	$page_access=$admin1->getmenuaccess($adminid,$pagename);
    $pagename="department";
	$departmentaccess=$admin1->getmenuaccess($adminid,$pagename);
    $pagename="designation";
	$designationaccess=$admin1->getmenuaccess($adminid,$pagename);
    $pagename="group";
	$groupsaccess=$admin1->getmenuaccess($adminid,$pagename);
    $pagename="cms";
	$cmsaccess=$admin1->getmenuaccess($adminid,$pagename);

	$pagename="task";
	$taskaccess=$admin1->getmenuaccess($adminid,$pagename);

	?>		

<!--Horizontal-main -->
			<div class="sticky">
				<div class="horizontal-main hor-menu clearfix side-header">
					<div class="horizontal-mainwrapper container clearfix">
						<!--Nav-->
						<nav class="horizontalMenu clearfix">
							<ul class="horizontalMenu-list">
								<li aria-haspopup="true"><a href="<?php echo base_url()?>dashboard" class=""><i class="fe fe-airplay  menu-icon"></i> Dashboard</a></li>
							

								<li aria-haspopup="true"><a href="#" class="sub-icon"><img src="<?php echo $admin1->assets('img/icon/icon-01.png')?>"> Sales <i class="fe fe-chevron-down horizontal-icon"></i></a>
								<ul class="sub-menu">
									<?php	
										if($orderaccess['add_access']=="1" || $type=="Admin") {								
									?>											   
									<li aria-haspopup="true"><a href="<?php echo base_url()?>ad_order/product_select" class="slide-item"> New Order</a></li>
									<?php } ?>
									<?php	
										if($orderaccess['view_access']=="1" || $type=="Admin") {								
									?>			
									<li aria-haspopup="true"><a href="<?php echo base_url()?>ad_order" class="slide-item"> Order List </a></li>
									<?php } ?>
									<?php	
										if($estimateaccess['add_access']=="1" || $type=="Admin") {								
									?>		
									<li aria-haspopup="true"><a href="<?php echo base_url()?>estimate/product_select" class="slide-item"> New Estimate</a></li>
									<?php } ?>
									<?php	
										if($estimateaccess['view_access']=="1" || $type=="Admin") {								
									?>		
									<li aria-haspopup="true"><a href="<?php echo base_url()?>estimate" class="slide-item"> Estimates </a></li>
									<?php } ?>
								  
								    <li aria-haspopup="true"><!--<a href="?php echo base_url()?>invoice/new_payment" class="slide-item"> New Invoice</a>--></li>
									<?php	
										if($invoiceaccess['view_access']=="1" || $type=="Admin") {								
									?>		
									<li aria-haspopup="true"><a href="<?php echo base_url()?>invoice" class="slide-item"> Invoice List</a></li>
									<?php } ?>
								</ul>
							    </li>
							        <li aria-haspopup="true"><a href="#" class="sub-icon"><img src="<?php echo $admin1->assets('img/icon/icon-02.png')?>"> Stakeholders <i class="fe fe-chevron-down horizontal-icon"></i></a>
								<ul class="sub-menu">
								<?php if($customeraccess['add_access']=="1" || $type=="Admin" || $customeraccess['view_access']=="1") {	?>
									  <li aria-haspopup="true"><a href="#" class="sub-icon"> Customers <i class="fe fe-chevron-down horizontal-icon"></i></a>
									  <?php } ?>
										  
								<ul class="sub-menu">
									<?php	
										if($customeraccess['add_access']=="1" || $type=="Admin") {								
									?>		
									<li aria-haspopup="true"><a href="<?php echo base_url()?>customers" class="slide-item"> New Customer</a></li>
									<?php } ?>
									<?php	
										if($customeraccess['view_access']=="1" || $type=="Admin") {								
									?>		
									<li aria-haspopup="true"><a href="<?php echo base_url()?>customers/customer_list" class="slide-item"> Customer List</a></li>
									<?php } ?>
							    </ul>
							    </li>
								<?php if($supplieraccess['add_access']=="1" || $type=="Admin" || $supplieraccess['view_access']=="1") {	?>
                                 <li aria-haspopup="true"><a href="#" class="sub-icon">Suppliers <i class="fe fe-chevron-down horizontal-icon"></i></a>
								 <?php } ?>
								<ul class="sub-menu">
									<?php	
										if($supplieraccess['add_access']=="1" || $type=="Admin") {								
									?>		
									<li aria-haspopup="true"><a href="<?php echo base_url()?>supplier" class="slide-item"> New Supplier</a></li>
									<?php } ?>
									<?php	
										if($supplieraccess['view_access']=="1" || $type=="Admin") {								
									?>	
									<li aria-haspopup="true"><a href="<?php echo base_url()?>supplier/supplier_list" class="slide-item"> Supplier List</a></li>
									<?php } ?>
							    </ul>
							    </li>

							    </ul>
							    </li>


							    
							     <li aria-haspopup="true"><a href="#" class="sub-icon"><img src="<?php echo $admin1->assets('img/icon/icon-04.png')?>"> Category <i class="fe fe-chevron-down horizontal-icon"></i></a>
								<ul class="sub-menu">
									<?php	
										if($categoryaccess['add_access']=="1" || $type=="Admin") {								
									?>	
									<li aria-haspopup="true"><a href="<?php echo base_url()?>category" class="slide-item"> New Category</a></li>
									<?php } ?>
									<?php	
										if($categoryaccess['view_access']=="1" || $type=="Admin") {								
									?>	
									<li aria-haspopup="true"><a href="<?php echo base_url()?>category/category_list" class="slide-item"> Category List</a></li>
									<?php } ?>
									<?php	
										if($productaccess['add_access']=="1" || $type=="Admin") {								
									?>	
									<li aria-haspopup="true"><a href="<?php echo base_url()?>products/" class="slide-item"> New Products</a></li>
									<?php } ?>
									<?php	
										if($productaccess['view_access']=="1" || $type=="Admin") {								
									?>	
									<li aria-haspopup="true"><a href="<?php echo base_url()?>products/product_list" class="slide-item"> Product List</a></li>
									<?php } ?>
									<?php	
										if($attributeaccess['add_access']=="1" || $type=="Admin") {								
									?>	
									<li aria-haspopup="true"><a href="<?php echo base_url()?>dependable_attributes/add_attribute" class="slide-item"> New Attributes</a></li>
									<?php } ?>
									<?php	
										if($attributeaccess['view_access']=="1" || $type=="Admin") {								
									?>	
									<li aria-haspopup="true"><a href="<?php echo base_url()?>dependable_attributes/attribute_list" class="slide-item">Attribute List</a></li>
									<?php } ?>
									
									<?php	
										if($productmapaccess['view_access']=="1" || $type=="Admin") {								
									?>	
									
									<li aria-haspopup="true"><a href="<?php echo base_url()?>productsmap/productmap_list" class="slide-item"> Product Mapping</a></li>
									<?php } ?>
									<!--<li aria-haspopup="true"><a href="<?php echo base_url()?>non_dependable_attributes/add_attribute" class="slide-item"> New Non dependable Attributes</a></li>
								<li aria-haspopup="true"><a href="<?php echo base_url()?>non_dependable_attributes/attribute_list" class="slide-item"> Attribute List</a></li>-->
									
									<?php	
										if($orgproductsaccess['view_access']=="1" || $type=="Admin") {								
									?>	
									
									
									<li aria-haspopup="true"><a href="<?php echo base_url()?>orgproducts/orgproduct_list" class="slide-item"> Product Attribute List</a></li>
									<?php } ?>
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
									<?php	
										if($employeeaccess['add_access']=="1" || $type=="Admin") {								
									?>	
									
									<li aria-haspopup="true"><a href="<?php echo base_url()?>employee" class="slide-item"> New Employee</a></li>
									<?php } ?>
									<?php	
										if($employeeaccess['view_access']=="1" || $type=="Admin") {								
									?>	
									
									<li aria-haspopup="true"><a href="<?php echo base_url()?>employee/employee_list" class="slide-item"> Employee List</a></li>
									<?php } ?>
									<!--<li aria-haspopup="true"><a href="#" class="slide-item"> Role Master</a></li>-->
									
									<?php	
										if($page_access['view_access']=="1" || $type=="Admin") {								
									?>	
									
									
									<li aria-haspopup="true"><a href="<?php echo base_url()?>pageaccess" class="slide-item"> Page Access</a></li>
									
									<?php } ?>
									
									<?php	
										if($departmentaccess['view_access']=="1" || $type=="Admin") {								
									?>	
									
									
									<li aria-haspopup="true"><a href="<?php echo base_url()?>departments/department_list" class="slide-item"> Department </a></li>
									
									<?php } ?>
									
									<?php	
										if($designationaccess['view_access']=="1" || $type=="Admin") {								
									?>	
									
									<li aria-haspopup="true"><a href="<?php echo base_url()?>designation/designation_list" class="slide-item"> Designation</a></li>
									<?php } ?>
									<?php	
										if($groupsaccess['add_access']=="1" || $type=="Admin") {								
									?>	
									
									<li aria-haspopup="true"><a href="<?php echo base_url()?>groups" class="slide-item"> Add Group</a></li>
									<?php } ?>
									
									<?php	
										if($groupsaccess['view_access']=="1" || $type=="Admin") {								
									?>	
									
									<li aria-haspopup="true"><a href="<?php echo base_url()?>groups/group_list" class="slide-item"> Groups</a></li>
									
									<?php } ?>
									<!--<li aria-haspopup="true"><a href="#" class="slide-item"> Assign Task</a></li>-->
									<?php	
										if($taskaccess['view_access']=="1" || $type=="Admin") {								
									?>	
									
									<li aria-haspopup="true"><a href="<?php echo base_url()?>task" class="slide-item"> Task List</a></li>
									<?php } ?>
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
									<?php	
										if($cmsaccess['view_access']=="1" || $type=="Admin") {								
									?>	
								<li aria-haspopup="true"><a href="<?php echo base_url()?>cms/page_list" class="slide-item"> Pages</a></li>
									<?php } ?>
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