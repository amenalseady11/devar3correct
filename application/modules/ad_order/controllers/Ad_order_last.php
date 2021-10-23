<?php
class Ad_order extends MY_Controller
{
	
	
	
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main');
        $this->load->model('App');
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        $this->load->model('ion_auth_model');
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
        $this->load->library('image_CRUD');
        error_reporting(0);
		
    }
    function index()
    {
    
     if($this->ion_auth->logged_in()==1)
        {
			$adorder = new App();
            $this->app = new App();
			$data['orders'] = $adorder->orderlisting();
		 
		 foreach ($data['orders'] as $ord)
			
		{
			
			
			$ordid=$ord->order_id;

			$data['order_details'][$ordid]=$adorder->getorderdetails($ordid);
			 
			 foreach ($data['order_details'][$ordid] as $val)
			 {
				 $itemid=$val['id'];
				
				$data['farr'][$itemid]=$adorder->getitem($itemid); 
				 
				//print_r($data['filearr'][$itemid]);
				 
			 }
			 
			
			
		
			
		}
		 
		
		
		 
	
			
            $this->template->load('admin_blank', 'adorder_list',$data);
        }
        else
        {
            $this->template->load('login_master','content');
        }

       
    }
	
	
	
	
	
	
	public function update()
		{
		   $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
				if($this -> ion_auth -> logged_in()==1)
				{
					
					 $productorg = new App();
                    $this->app = new App();           
                   // $this->form_validation->set_rules('quantity', 'Quantity', 'required');
					//$this->form_validation->set_rules('quantity_price', 'Price', 'required');
            
			   $dependid               = $this->input->post('dependid');
             
             // if ($this->form_validation->run() == FALSE)
          //  {
				
                 //redirect('orgproducts/view/'.$dependid);
            //}
           // else
           // {
				 $quantity               = $this->input->post('quantity');
				    $quantityprice           = $this->input->post('quantity_price');
					$minquantity               = $this->input->post('min_quantity');
				    $perprice           = $this->input->post('per_price');
				
				$datadepend               = array(
                            'dependable_id'                   =>  $dependid,                            
                            'quantity'            =>  $quantity,
							'price'         =>  $quantityprice,
					        'min_quantity'            =>  $minquantity,
							'per_price'         =>  $perprice 
                            
                            
                        );
						   
						   $this->db->insert('dependable_quantity', $datadepend);
				
				         $data['success']="success";				       
                        redirect('orgproducts/view/'.$dependid);
				


			//}
		  }
			
	   }
	
	public function edit()
		{
		  $orgproducts = new App();
		  $this->app = new App();
		  $orgproduct_id=$this->uri->segment(3);
		  $data['result']=$orgproducts->viewdependant($orgproduct_id);
		  $data['depresult']=$orgproducts->dependantproducts($orgproduct_id);
		  $data['products'] = $orgproducts->productlisting();
		  $this->template->load('admin_blank','edit_orgproduct',$data);
		}
	
	public function view()
		{
		  $orgproducts = new App();
		  $this->app = new App();
		  $view_id=$this->uri->segment(3);
		  $data['result']=$orgproducts->viewdependant($view_id);
		  $data['depresult']=$orgproducts->dependantproducts($view_id);
		$data['products'] = $orgproducts->productlisting();
		//print_r($data['result']);
		//exit;
		  $this->template->load('admin_blank','view_orgproduct',$data);
		}
    
    
   function invoice_view()
    {
    
     if($this->ion_auth->logged_in()==1)
				{
					$adorder = new App();
					$this->app = new App();
					//$data['orders'] = $adorder->orderlisting();
					 
					 $orderid=$this->uri->segment(3);
					 
					 $data['products']=$adorder->getviewproducts(); 
					 
					 
                       $ordid=$orderid;
                    $data['order_details']=$adorder->getorderdetails($ordid); 
					 
					 $g="0";
					
		
		foreach ($data['order_details'] as $item)
			
		{
			
			
		$itemid=$item['id'];
			
			//echo $itemid;
			
		$data['filearr'][$itemid]=$adorder->getitem($itemid);
			
			
		

       //print_r($data['filearr'][$itemid]);


      


			
			
		}
		
		
		
		
		
		//print_r($data['order_details']);
		
		$data['orders'] = $adorder->getordersingle($orderid);
		
		//$data['item_files'] = $app->getitemfiles($itemid); 
		
		
		$data['orderid'] = $orderid;
		
		$data['shipping'] = $adorder->getshippingorder($orderid);
		
		$data['billing'] = $adorder->getbillingorder($orderid);
		
		
		$shipcode=$data['billing'][country_code];
		$data['countryarr']=$adorder->getcountryname($shipcode);
		
		
		$scode=$data['shipping'][country_code];
		$data['shipcountryarr']=$adorder->getcountryname($scode);
		
		$data['ordernotes']=$adorder->ordernotes($orderid);
		 
		 $data['invoicedetails']=$adorder->invoiceinfo($orderid);
		  

					$this->template->load('admin_blank', 'invoice_view',$data);
				}
				else
				{
					$this->template->load('login_master','content');
				}

    }

   
   
	
	public function delete()
		{
		  $orgproduct = new App();
		  $this->app = new App();
		  $orgproduct_id=$this->uri->segment(3);
		  $orgproduct->deleteorgproduct($orgproduct_id);
		  redirect('category/categorylist');
		}
    
    

   public function view_order()
		{
				 if($this->ion_auth->logged_in()==1)
				{
					$adorder = new App();
					$this->app = new App();
					//$data['orders'] = $adorder->orderlisting();
					 
					 $orderid=$this->uri->segment(3);
					 
					 $data['products']=$adorder->getviewproducts(); 
					 
					 
                       $ordid=$orderid;
                    $data['order_details']=$adorder->getorderdetails($ordid); 
					 
					 $g="0";
					
		
		foreach ($data['order_details'] as $item)
			
		{
			
			
		$itemid=$item['id'];
			
			//echo $itemid;
			
		$data['filearr'][$itemid]=$adorder->getitem($itemid);
			
			
		

       //print_r($data['filearr'][$itemid]);


      


			
			
		}
		
		
		
		
		
		//print_r($data['order_details']);
		
		$data['orders'] = $adorder->getordersingle($orderid);
		
		//$data['item_files'] = $app->getitemfiles($itemid); 
		
		
		$data['orderid'] = $orderid;
		
		$data['shipping'] = $adorder->getshippingorder($orderid);
		
		$data['billing'] = $adorder->getbillingorder($orderid);
		
		
		$shipcode=$data['billing'][country_code];
		$data['countryarr']=$adorder->getcountryname($shipcode);
		
		
		$scode=$data['shipping'][country_code];
		$data['shipcountryarr']=$adorder->getcountryname($scode);
		
		
		  

					$this->template->load('admin_blank', 'view_order',$data);
				}
				else
				{
					$this->template->load('login_master','content');
				}

		}
    
	
	public function order_status_edit()
		{
		
		 if($this->ion_auth->logged_in()==1)
				{
		  $adorder = new App();
		  $this->app = new App();
		   $orderid=$this->uri->segment(3);
					 
					 
                       $ordid=$orderid;
                    $data['order_details']=$adorder->getorderdetails($ordid); 
			 
			 $data['orders'] = $adorder->getordersingle($orderid);
			 
			 $this->template->load('admin_blank', 'order_status_edit',$data);
			 
		 }
		else
		{
			
			$this->template->load('login_master','content');
			
		}
		  
		}
	
	
	public function update_status()
		{
		
		 if($this->ion_auth->logged_in()==1)
				{
		  $adorder = new App();
		  $this->app = new App();
		   $orderid=$_POST['orderid'];
			 
			 $comments=$_POST['status_comments'];
			  $status=$_POST['status'];
					 
					 
           $data             = array(
                            'status'                   =>  $status,                            
                            'order_comments'            =>  $comments
							
                            
                        );
						    $this->db->where('order_id', $orderid);
						   $this->db->update('orders', $data);
			 
			
			 
			redirect('ad_order');
			 
		 }
			else
			{

				$this->template->load('login_master','content');

			}
		  
	}
	
	
	public function update_order_status()
		{
		
		 if($this->ion_auth->logged_in()==1)
				{
		  $adorder = new App();
		  $this->app = new App();
		   $orderid=$_POST['ordid'];
			 
			 
			  $status=$_POST['status'];
					 
					 
           $data             = array(
                            'status'                   =>  $status                           
                            
							
                            
                        );
						    $this->db->where('order_id', $orderid);
						   $this->db->update('orders', $data);
			 
			
			 
			redirect('ad_order');
			 
		 }
			else
			{

				$this->template->load('login_master','content');

			}
		  
	}
	
	
	
	
	
	//-----new order--------------------------
	
	function new_order()
    {
    
     if($this->ion_auth->logged_in()==1)
        {
		 
		     $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
			//$adorder = new App();
            //$this->app = new App();
		$productid=$this->uri->segment(3);
		
		$data['productid']=$productid;
		
		$data['productsname'] = $app->getproductsname($productid);
		
		$data['productsmap'] = $app->getproductsmap($productid);
		
		//print_r($data['productsmap']);
		
		$data['products'] = $app->getproducts($productid);
		
	
		
		
		
		foreach ($data['products'] as $va)
		{
			
			$dependable= json_decode($va->dependable_values);
			
			 foreach ($dependable as $k=>$v)
	                     {
				 $ab=str_replace(" ","",strtolower($v->name));
				 
				 if (!in_array($v->value, $data[$ab]))
  
				  {
					 if($v->value)
					 {
				  $data[$ab][]=$v->value;
						 
					 }
				  }
			 }
											 
			
		 
		}
		
		foreach ($data['products'] as $va)
		{
			
			$dependable= json_decode($va->non_dependable_values);
			
			 foreach ($dependable as $k=>$v)
	                     {
				 $ab=str_replace(" ","",strtolower($v->name));
				 
				 if (!in_array($v->value, $data[$ab]))
  
				  {
					 if($v->value)
					 {
						 
					 
				  $data[$ab][]=$v->value;
						 
						 }
				  }
			 }
											 
			
		 
		}
		
			
		$data['customers']=$app->getcustomers();
		 
		 
		  // String of all alphanumeric character 
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
  
    // Shufle the $str_result and returns substring 
    // of specified length 
   $random=substr(str_shuffle($str_result),  
                       0, 30); 
				
		$data['random']=$random; 
	
			
            $this->template->load('admin_blank', 'products_order',$data);
        }
        else
        {
            $this->template->load('login_master','content');
        }

       
    }
	
	
	
	
	//---end of new order---------------------
	
	
	//-----new item--------------------------
	
	function new_item()
    {
    
     if($this->ion_auth->logged_in()==1)
        {
		 
		     $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
			//$adorder = new App();
            //$this->app = new App();
		//$productid=$this->uri->segment(3);
		 
		 $productid=$_POST['product'];
		 
		  $orderid=$_POST['orderid'];
		 
		 $data['orderid']=$orderid;
		
		$data['productid']=$productid;
		  $data['userid']=$app->getuser($orderid);
		
		$data['productsname'] = $app->getproductsname($productid);
		
		$data['productsmap'] = $app->getproductsmap($productid);
		
		//print_r($data['productsmap']);
		
		$data['products'] = $app->getproducts($productid);
		
	
		
		
		
		foreach ($data['products'] as $va)
		{
			
			$dependable= json_decode($va->dependable_values);
			
			 foreach ($dependable as $k=>$v)
	                     {
				 $ab=str_replace(" ","",strtolower($v->name));
				 
				 if (!in_array($v->value, $data[$ab]))
  
				  {
					 if($v->value)
					 {
				  $data[$ab][]=$v->value;
						 
					 }
				  }
			 }
											 
			
		 
		}
		
		foreach ($data['products'] as $va)
		{
			
			$dependable= json_decode($va->non_dependable_values);
			
			 foreach ($dependable as $k=>$v)
	                     {
				 $ab=str_replace(" ","",strtolower($v->name));
				 
				 if (!in_array($v->value, $data[$ab]))
  
				  {
					 if($v->value)
					 {
						 
					 
				  $data[$ab][]=$v->value;
						 
						 }
				  }
			 }
											 
			
		 
		}
		
			
		$data['customers']=$app->getcustomers();
		 
		 
		  // String of all alphanumeric character 
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
  
    // Shufle the $str_result and returns substring 
    // of specified length 
   $random=substr(str_shuffle($str_result),  
                       0, 30); 
				
		$data['random']=$random; 
	
			
            $this->template->load('admin_blank', 'products_new_item',$data);
        }
        else
        {
            $this->template->load('login_master','content');
        }

       
    }
	
	
	
	
	//---end of new item---------------------
	
	
	function selectradios(){
     
     

     
      
          $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$sql="SELECT * FROM dependable_product,dependable_quantity WHERE dependable_product.dependable_id=dependable_quantity.dependable_id";
		
		$productid=$_POST['product'];
		
		$data['products'] = $app->getproductsmap($productid);
		$dependable= json_decode($data['products'][dependable_attributes]);
		$nondependable= json_decode($data['products'][non_dependable_attributes]);
		$dependarr=array();
		$nondependarr=array();
		
			 foreach ($dependable as $k=>$v)
	                     {
				 $dependarr[]=$v->name;
				 
			 }
				
				 foreach ($nondependable as $k=>$v)
	                     {
				 $nondependarr[]=$v->name;
				 
				 }
		

foreach($_POST as $key=>$value)
{
	
	if($key!="product")
	{
		
		$key=str_replace("_"," ",$key);
		
	if(in_array($key,$dependarr)){
		
		
	
	
// $sql.="$key=$value";
	
	//$sql.='"'.$key.'":"[[:<:]]'.$value.'[[:>:]]"'." and ";
		
	$sql.=" and dependable_product.dependable_values RLIKE ". "'".'"Name":"[[:<:]]'.$key.'[[:>:]]"'."'";
		
    $sql.=" and dependable_product.dependable_values RLIKE ". "'".'"Value":"[[:<:]]'.$value.'[[:>:]]"'."'";
		
	}
		else if(in_array($key,$nondependarr)){
			
			//$sql.=" and dependable_product.non_dependable_values RLIKE ". "'".'"Name":"[[:<:]]'.$key.'[[:>:]]"'."'";
		
   // $sql.=" and dependable_product.non_dependable_values RLIKE ". "'".'"Value":"[[:<:]]'.$value.'[[:>:]]"'."'";
			
		}
		
	}
}
		 
     // $sql=substr($sql, 0, -5);
		
		
		//echo $sql;
		//exit;
		
		
		$data['price'] = $app->getprice($sql,$productid);
		
		$count="0";
		
		foreach ($data['price'] as $pr)
		{
			$count=$count+1;
		}
		
		if($count=="1")
		{
			
			
		
		
		foreach ($data['price'] as $pr)
		{
			
			$price=$pr['min_quantity']*$pr['per_price'];
			
			//echo "bbbcccc".$pr['price'];
			
			?>
			<!--<div class="detailsPriceDisplay">
			<div class="detailsPriceBody">
							<p>
								<span>Quantity </span>
								<input class="form-control" type="text" name="quantity" id="quantityid" value="<?php echo $pr['min_quantity']?>" >
								<input type="hidden" name="perprice" id="perpriceid" value="<?php echo $pr['per_price']?>">
								<input type="hidden" name="orgprice" id="orgpriceid" value="<?php echo $pr['price']?>">
								<input type="hidden" name="min_quantity" id="min_quantityid" value="<?php echo $pr['min_quantity']?>">
								
								
							</p>
							<h4 class="price"><div id="original_price"><?php echo $price?> SAR</div></h4>
							<a class="btn animatedBtn darckBtn"  role="button" id="basket">Add to Basket</a>
				<div id="abc"></div>
						</div>
</div>-->


					<div class="detailsPriceDisplay">
						<div class="detailsPriceBody">
							<p>
								<span>Quantity </span>
								<input class="form-control" type="text" name="quantity" id="quantityid" value="<?php echo $pr['min_quantity']?>" >
								<input type="hidden" name="perprice" id="perpriceid" value="<?php echo $pr['per_price']?>">
								<input type="hidden" name="orgprice" id="orgpriceid" value="<?php echo $pr['price']?>">
								<input type="hidden" name="min_quantity" id="min_quantityid" value="<?php echo $pr['min_quantity']?>">
								
							</p>
							<h4 class="price" id="original_price">SAR <?php echo $price?> </h4>
							<a class="btn animatedBtn darckBtn"  role="button" id="basket">Add to Basket</a>
						</div>
					</div>				
				

<?php
		}
			
			
		} else {?>
			
			<div class="detailsPriceDisplay">
			<div class="detailsPriceBody">
							<p>
								No Products On selected Criteria
								
							</p>
							
						</div>
</div>
			
		<?php }
		
		
        
          
     
        
     }
	
	
	
	function selectpapertype(){
     
     

     
      
          $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$sql="SELECT * FROM dependable_product,dependable_quantity WHERE dependable_product.dependable_id=dependable_quantity.dependable_id";
		
		
		
		$productid=$_POST['product'];
		
		$data['products'] = $app->getproductsmap($productid);
		
		
		
		
		
			$dependable= json_decode($data['products'][dependable_attributes]);
		$nondependable= json_decode($data['products'][non_dependable_attributes]);
		
		
		$dependarr=array();
		$nondependarr=array();
		
			
			
			 foreach ($dependable as $k=>$v)
	                     {
				 $dependarr[]=$v->name;
				 
			 }
				
				 foreach ($nondependable as $k=>$v)
	                     {
				 $nondependarr[]=$v->name;
				 
				 }
		

//print_r($dependarr);
		
		$value=$_POST['Paper_Types'];
		$key="Paper Types";
		
		/*
		
	if($key=="Paper Types")
	{
		
		

		
	$sql.=" and dependable_product.dependable_values RLIKE ". "'".'"Name":"[[:<:]]'.$key.'[[:>:]]"'."'";
		
    $sql.=" and dependable_product.dependable_values RLIKE ". "'".'"Value":"[[:<:]]'.$value.'[[:>:]]"'."'";
		
	
	}
	
	*/
		
		//print_r($_POST);
		//exit;
		
		$countkey="0";
		
	foreach ($_POST as $key=>$value)	
	{
		$key=str_replace("_"," ",$key);
		
		$chk=$_POST['prdcount'];
		
		
		if(in_array($key,$dependarr))
					{
						
			$countkey=$countkey+1;	
			
		if($countkey<=$chk)
		   {
			   
		  
			
	$sql.=" and dependable_product.dependable_values RLIKE ". "'".'"Name":"[[:<:]]'.$key.'[[:>:]]"'."'";
		
    $sql.=" and dependable_product.dependable_values RLIKE ". "'".'"Value":"[[:<:]]'.$value.'[[:>:]]"'."'";
			
		}
						
					}
		
	}
		 
     // $sql=substr($sql, 0, -5);
		
		$check=count($dependarr);
		
		//echo $sql;
	//exit;
		
		$data['otherdepend'] = $app->getdepend($sql,$productid);  
		
		//print_r($data['otherdepend']);
		//exit;
		
		$deparr=array();
		
	
		foreach ($data['otherdepend'] as $va)
		{
			
			//echo $va['dependable_values']."<br>";
			
			
			$dependable= json_decode($va['dependable_values']);
			
			 foreach ($dependable as $k=>$v)
	                     {
				 
				 $deparr[]=$v->name;
				
				 $ab=str_replace(" ","",strtolower($v->name));
				 
				 if (!in_array($v->value, $data[$ab]))
  
				  {
					 if($v->value)
					 {
				  $data[$ab][]=$v->value;
						 
					 }
				  }
				 
			 }
											 
			
		 
		}
		
		//-----------------non dependable-----------------------------------
		
		foreach ($data['otherdepend'] as $va)
		{
			
			//echo $va['dependable_values']."<br>";
			
			
			$nondependable= json_decode($va['non_dependable_values']);
			
			 foreach ($nondependable as $k=>$v)
	                     {
				 
				 
				
				 $cd=str_replace(" ","",strtolower($v->name));
				 
				 if (!in_array($v->value, $data[$cd]))
  
				  {
					 if($v->value)
					 {
				  $data[$cd][]=$v->value;
						 
					 }
				  }
				 
			 }
											 
			
		 
		}
		
		
		
		
		
		//------------end of non dependable---------------------------------
      
		
		?>

<?php 
		$bb="0";
			
			//echo "bbb".$v->name."<br>";
		
		
				 
			foreach ($deparr as $key=>$value )	
				
			{
				
				
				//echo "$key:$value"."<br>";
				
				//echo $value."<br>";
				
				//print_r($deparr);
				
				$te=$_POST['prdcount'];
				
				
				if($key==$te)
				{
					
				
				$key=str_replace("_"," ",$value);
				
			
			
			
				 $keyname=$value;
				
				
				
				
				$ab=str_replace(" ","",strtolower($key));
					
					//echo $ab."<br>";
					
				}
				
				
		     $bb=$bb+1;
			 
			 
				
			}
				
				
			
					 
				 
				 
			 
					 
					
						  $an=$countkey+1;
					 $as=$countkey+2;
						$exp="true";
					 $collapse="collapse show"; 
						 
					
					 
					
			
			?>
		
		<div class="card">
								<div class="card-header" id="heading<?php echo $an?>" data-toggle="collapse" data-target="#collapse<?php echo $an?>" aria-expanded="<?php echo $exp ?>" aria-controls="collapse<?php echo $an?>">
									<h5 class="mb-0"><?php echo $keyname?></h5>
<span id="<?php echo $ab?>">No Select</span>
								</div>
								
									
							
							
		

								<div id="collapse<?php echo $an?>" class="<?php echo $collapse?>" aria-labelledby="heading<?php echo $an?>" data-parent="#accordion">
									<div class="card-body">
										
									<?php foreach ($data[$ab] as $b)	
					   {?>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $as;?>">
												<input type="radio" name="<?php echo $keyname?>" value="<?php echo $b?>" class="ab">
												<img src="<?php echo $main->front_end_skin('img/product/paper-type-1.png')?>" alt="">
												<span class="checkmark"></span>
											</label>
											<?php echo $b?>
										</div>
										
										<?php } ?>
										
									</div>
								</div>
							
							</div>


	
	
	

	
		


<?php
		
		
        
     }
	
	
	function nonattributes()
	{
		
		  $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$sql="SELECT * FROM dependable_product,dependable_quantity WHERE dependable_product.dependable_id=dependable_quantity.dependable_id";
		
		
		
		$productid=$_POST['product'];
		
		$data['products'] = $app->getproductsmap($productid);
		
		
		
		
		
			$dependable= json_decode($data['products'][dependable_attributes]);
		$nondependable= json_decode($data['products'][non_dependable_attributes]);
		
		
		$dependarr=array();
		$nondependarr=array();
		
			$bb="0";
			
			 foreach ($dependable as $k=>$v)
	                     {
				 $dependarr[]=$v->name;
				 
				 $bb=$bb+1;
				 
			 }
				
				 foreach ($nondependable as $k=>$v)
	                     {
				 $nondependarr[]=$v->name;
				 
				 }
		

		
		
		$countkey="0";
		$doublecheck="0";
		
	foreach ($_POST as $key=>$value)	
	{
		$key=str_replace("_"," ",$key);
		
		$chk=$_POST['prdcount'];
		
		
		if(in_array($key,$dependarr))
					{
						
			$countkey=$countkey+1;	
			
			
			
		if($countkey<=$chk)
		   {
			
			$doublecheck=$doublecheck+1;
			   
		 if($doublecheck=="1")
		 {
			 
		
			
	$sql.=" and dependable_product.dependable_values RLIKE ". "'".'"Name":"[[:<:]]'.$key.'[[:>:]]"'."'";
		
    $sql.=" and dependable_product.dependable_values RLIKE ". "'".'"Value":"[[:<:]]'.$value.'[[:>:]]"'."'";
			 
		 }
			
			
			
		}
						
					}
		
	}
		
		//echo $sql;
		
		$data['otherdepend'] = $app->getdepend($sql,$productid);
		
		//-----------------non dependable-----------------------------------
		
		foreach ($data['otherdepend'] as $va)
		{
			
			//echo $va['dependable_values']."<br>";
			
			
			$nondependable= json_decode($va['non_dependable_values']);
			
			 foreach ($nondependable as $k=>$v)
	                     {
				 
				 
				
				 $cd=str_replace(" ","",strtolower($v->name));
				 
				 if (!in_array($v->value, $data[$cd]))
  
				  {
					 if($v->value)
					 {
				  $data[$cd][]=$v->value;
						 
					 }
				  }
				 
			 }
											 
			
		 
		}
		
		
		
		
		
		//------------end of non dependable---------------------------------
      
		
		
		
		foreach ($nondependable as $k=>$v)
	                     {
			
			
			
			//echo "bbb".$v->name."<br>";
				 
				
					 
				 
				 
			 $cd=str_replace(" ","",strtolower($v->name));
					 
					 
						 
						 
					
					 
			if(count($data[$cd]) >="1"){
				
				
				$bb=$bb+1+1;
				
				
				 $an=$bb;
					 $as=$bb+1;
					 $exp="false";
					 $collapse="collapse";
				
				
			
			
			?>
		
		<div class="card" >
								<div class="card-header" id="heading<?php echo $an?>" data-toggle="collapse" data-target="#collapse<?php echo $an?>" aria-expanded="<?php echo $exp ?>" aria-controls="collapse<?php echo $an?>">
									<h5 class="mb-0"><?php echo $v->name?></h5>
<span id="<?php echo $cd;?>">No Select</span>
								</div>
								
									
							
							
		

								<div id="collapse<?php echo $an?>" class="<?php echo $collapse?>" aria-labelledby="heading<?php echo $an?>" data-parent="#accordion">
									<div class="card-body">
										
									<?php foreach ($data[$cd] as $b)	
					   {?>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $as;?>">
												<input type="radio" name="<?php echo $v->name?>" value="<?php echo $b?>" >
												<img src="<?php echo $main->front_end_skin('img/product/paper-type-1.png')?>" alt="">
												<span class="checkmark"></span>
											</label>
											<?php echo $b?>
										</div>
										
										<?php } ?>
										
									</div>
								</div>
							
							</div>
	
	
	
<?php 
				
				}
				 }
		
        
		
	
		
	}
	
	
	
	public function shipping_update()
		{
		
		 $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		 if($this->ion_auth->logged_in()==1)
				{
			 
			 $id=$this->uri->segment(3);
			 
			 if($_POST['shipid'])
			 {
				 $id=$_POST['shipid'];
				 
			 }
			 
			 
			 $data['countries'] = $app->getcountry();
			$data['editaddress'] = $app->geteditaddress($id); 
			 
			 $orderid=$data['editaddress']['order_id'];
			 
			// echo "hhhhh";
			// exit;
			 
		 $this->form_validation->set_rules('firstname', 'First Name', 'required');
			 
		 $this->form_validation->set_rules('lastname', 'Last Name', 'required');
			 
		$this->form_validation->set_rules('streetaddress', 'Street Address', 'required');
			 
		$this->form_validation->set_rules('country', 'Country', 'required');
			 
		$this->form_validation->set_rules('city', 'City', 'required');
			 
		 $this->form_validation->set_rules('state', 'State', 'required');
		
		  $this->form_validation->set_rules('zip', 'Zip', 'required');
		
		  if ($this->form_validation->run()==false)
            {
			 
			 
				
              
			  
			  $this->template->load('admin_blank','edit_shipping_address',$data);
			  
            }
            else
            {
				$pid                  = $this->input->post('shipid');
				
				$firstname               = $this->input->post('firstname');
				$lastname               = $this->input->post('lastname');
				$phone               = $this->input->post('phone');				
				$streetaddress               = $this->input->post('streetaddress');
                $city                   = $this->input->post('city');
				$state                = $this->input->post('state');               
				$zip                  = $this->input->post('zip');
				$country                  = $this->input->post('country');
				
				
				
				 $data               = array(
							
							'first_name'         =>  $firstname,
							'last_name'         =>  $lastname,
							'phone_number'         =>  $phone,
                            'address'         =>  $streetaddress,							
                            'city'        =>  $city,
							'state'     =>  $state, 
							'zip_code'       =>  $zip,
							'country_code'       =>  $country
							
                            
                        );
				
				
				$this->db->where('id', $pid);				
                $this->db->update('customer_order_shipping_address', $data);
				
				redirect('ad_order/view_order/'.$orderid);
				
			
			}
			 
		 }
			else
			{

				$this->template->load('login_master','content');

			}
		  
	}
	
	
	
	
	public function billing_update()
		{
		
		 $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		 if($this->ion_auth->logged_in()==1)
				{
			 
			 $id=$this->uri->segment(3);
			 
			 if($_POST['billid'])
			 {
				 $id=$_POST['billid'];
				 
			 }
			 
			 
			 $data['countries'] = $app->getcountry();
			$data['editaddress'] = $app->geteditbillingaddress($id); 
			 
			 $orderid=$data['editaddress']['order_id'];
			 
			// echo "hhhhh";
			// exit;
			 
		 $this->form_validation->set_rules('firstname', 'First Name', 'required');
			 
		 $this->form_validation->set_rules('lastname', 'Last Name', 'required');
			 
		$this->form_validation->set_rules('streetaddress', 'Street Address', 'required');
			 
		$this->form_validation->set_rules('country', 'Country', 'required');
			 
		$this->form_validation->set_rules('city', 'City', 'required');
			 
		 $this->form_validation->set_rules('state', 'State', 'required');
		
		  $this->form_validation->set_rules('zip', 'Zip', 'required');
		
		  if ($this->form_validation->run()==false)
            {
			 
			 
			  
			  $this->template->load('admin_blank','edit_billing_address',$data);
			  
            }
            else
            {
				$pid                  = $this->input->post('billid');
				
				$firstname               = $this->input->post('firstname');
				$lastname               = $this->input->post('lastname');
				$phone               = $this->input->post('phone');				
				$streetaddress               = $this->input->post('streetaddress');
                $city                   = $this->input->post('city');
				$state                = $this->input->post('state');               
				$zip                  = $this->input->post('zip');
				$country                  = $this->input->post('country');
				
				
				
				 $data               = array(
							
							'first_name'         =>  $firstname,
							'last_name'         =>  $lastname,
							'phone_number'         =>  $phone,
                            'address'         =>  $streetaddress,							
                            'city'        =>  $city,
							'state'     =>  $state, 
							'zip_code'       =>  $zip,
							'country_code'       =>  $country
							
                            
                        );
				
				
				
				$this->db->where('id', $pid);				
                $this->db->update('customer_order_billing_address', $data);
				
				redirect('ad_order/view_order/'.$orderid);
				
			
			}
			 
		 }
			else
			{

				$this->template->load('login_master','content');

			}
		  
	}
	
	
	//-----new order--------------------------
	
	function edit_product_order()
    {
    
     if($this->ion_auth->logged_in()==1)
        {
		 
		     $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
			//$adorder = new App();
            //$this->app = new App();
		$itemid=$this->uri->segment(3);
		 
		 $data['orderitems']=$app->getorderitems($itemid);
		 
		 
		  $data['itemid']=$itemid;
		 
		$productid=$data['orderitems']['product_id'];
		 
		 $data['orderid']=$data['orderitems']['order_id'];
		 $orderid=$data['orderitems']['order_id'];
		 
		  $data['userid']=$app->getuser($orderid);
		 
		 //$data['userid']=$data['orderitems']['customer_id'];
		
		$data['options']=json_decode($data['orderitems']['product_options']);
		
		$data['perprice']=$data['orderitems']['unit_price'];
		
		$data['comments']=$data['orderitems']['comments'];
		
		
		
		$data['qty']=$data['orderitems']['qty'];
		
		//$data['cartfiles'] = $app->getcartfiles($userid,$rowid);
		
		$data['productid']=$productid;
		
		$data['productsname'] = $app->getproductsname($productid);
		
		$data['productsmap'] = $app->getproductsmap($productid);
		
		//print_r($data['productsmap']);
		
		$data['products'] = $app->getproducts($productid);
		
	
		
		
		
		foreach ($data['products'] as $va)
		{
			
			$dependable= json_decode($va->dependable_values);
			
			 foreach ($dependable as $k=>$v)
	                     {
				 $ab=str_replace(" ","",strtolower($v->name));
				 
				 if (!in_array($v->value, $data[$ab]))
  
				  {
					 if($v->value)
					 {
				  $data[$ab][]=$v->value;
						 
					 }
				  }
			 }
											 
			
		 
		}
		
		foreach ($data['products'] as $va)
		{
			
			$dependable= json_decode($va->non_dependable_values);
			
			 foreach ($dependable as $k=>$v)
	                     {
				 $ab=str_replace(" ","",strtolower($v->name));
				 
				 if (!in_array($v->value, $data[$ab]))
  
				  {
					 if($v->value)
					 {
						 
					 
				  $data[$ab][]=$v->value;
						 
						 }
				  }
			 }
											 
			
		 
		}
		
			
		$data['customers']=$app->getcustomers();
		 
		 
		  // String of all alphanumeric character 
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
  
    // Shufle the $str_result and returns substring 
    // of specified length 
   $random=substr(str_shuffle($str_result),  
                       0, 30); 
				
		$data['random']=$random; 
	
			
            $this->template->load('admin_blank', 'products_edit_order',$data);
        }
        else
        {
            $this->template->load('login_master','content');
        }

       
    }
	
	
	
	
	//---end of new order---------------------
	
	
	
	function update_order_item(){
		
		 $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$options=array();
		
		//print_r($_POST);
		//exit;
		
		//$userid=$this->session->userdata('uid');
		
		$randomid=$_POST['randomid'];
		
		//echo "kkkk".$randomid;
		
		//exit;
		
		$data['files'] = $app->gettempfiles($randomid);
		
		//print_r($data['files']);
		$userid=$_POST['userid'];
		
		$pid=$_POST['id'];
		$orderid=$_POST['orderid'];
		
		foreach ($data['files']  as $val)
			
		{
			
			
			
			$filename=$val['file_name'];
			
			
		
			
			    $data               = array(
					
					        'customer_id'         =>  $userid,
							'order_id'         =>  $orderid,
					         'order_item_id'         =>  $pid,
					 'order_file_name'         =>  $filename
					      
					
                        );
				
				
					$complted= $this->db->insert('order_files', $data);
			
			 // echo "kkk".$this->db->last_query();
			  
			
			
			
		}
		
		
		
		
		
		
			$app->deletetempfiles($randomid);
		
		$productid=$_POST['product'];
		
		$data['products'] = $app->getproductsmap($productid);
		
		
		
		
		
			$dependable= json_decode($data['products'][dependable_attributes]);
		$nondependable= json_decode($data['products'][non_dependable_attributes]);
		
		
		$totalarr=array();
		
		
			
			
			 foreach ($dependable as $k=>$v)
	                     {
				 $totalarr[]=$v->name;
				 
				
				 
			 }
				
				 foreach ($nondependable as $k=>$v)
	                     {
				 $totalarr[]=$v->name;
				 
				 }
		
		
		
		
		foreach($_POST as $key=>$value)
{
			
			$key=str_replace("_"," ",$key);
		
		
		
		
		if(in_array($key,$totalarr))
					{
  
			$options[]=array('name'=> $key,'value'=> $value);
}
			
		}

		$options=json_encode($options);
		
		
		$pid=$_POST['id'];
		$orderid=$_POST['orderid'];
		$productid=$_POST['product'];
		$productname=$_POST['productname'];
		$perprice=$_POST['perprice'];
		$quantity=$_POST['quantity'];
		$comments=$_POST['comments'];
		// $rowid=$_POST['row_id'];
		
		//print_r($_POST);
        $data = array(
			
            'order_id' => $orderid, 
			'product_id'=>$productid,
            'product_options' => $options, 
            'comments' => $comments,
			'name' => $productname,
			'qty' =>$quantity,
			'unit_price' =>$perprice,
			'row_total' =>$quantity*$perprice
			
        );
		
		//print_r($data);
		
		$this->db->where('id', $pid);				
        $this->db->update('order_item', $data);
		
		//echo "jjj".$this->db->last_query();
		
		
			//---updating order total and vat price in order tabel---------------------				   

			$orderitems= $app->getorderitemdetails($orderid);
					
			$subtotal="0";
			
			foreach ($orderitems as $items){

			$rowtotal=$items[qty]*$items[unit_price];
			 $subtotal=$subtotal+$rowtotal;

			}
	 
	$vatprice=$subtotal*15/100;

	   $data             = array(
					'vat_price'                   =>  $vatprice,
					'price'                   =>  $subtotal                           
				   
					
					
				);
					$this->db->where('order_id', $orderid);
				   $this->db->update('orders', $data);

//---end of updating order total-----------------------------------------------		
			
			
		
		
		//echo $this->cart->total_items();
		
    }
	
	
	function update_order_new_item(){
		
		 $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$options=array();
		
		//print_r($_POST);
		//exit;
		
		//$userid=$this->session->userdata('uid');
		
		$randomid=$_POST['randomid'];
		
		echo "kkkk".$randomid;
		
		//exit;
		
		
		
		//print_r($data['files']);
		$userid=$_POST['userid'];
		
		//$pid=$_POST['id'];
		$orderid=$_POST['orderid'];
		
		
		$productid=$_POST['product'];
		
		$data['products'] = $app->getproductsmap($productid);
		
		
		
		
		
			$dependable= json_decode($data['products'][dependable_attributes]);
		$nondependable= json_decode($data['products'][non_dependable_attributes]);
		
		
		$totalarr=array();
		
		
			
			
			 foreach ($dependable as $k=>$v)
	                     {
				 $totalarr[]=$v->name;
				 
				
				 
			 }
				
				 foreach ($nondependable as $k=>$v)
	                     {
				 $totalarr[]=$v->name;
				 
				 }
		
		
		
		
		foreach($_POST as $key=>$value)
{
			
			$key=str_replace("_"," ",$key);
		
		
		
		
		if(in_array($key,$totalarr))
					{
  
			$options[]=array('name'=> $key,'value'=> $value);
}
			
		}

		$options=json_encode($options);
		
		
		$pid=$_POST['id'];
		$orderid=$_POST['orderid'];
		$productid=$_POST['product'];
		$productname=$_POST['productname'];
		$perprice=$_POST['perprice'];
		$quantity=$_POST['quantity'];
		$comments=$_POST['comments'];
		// $rowid=$_POST['row_id'];
		
		//print_r($_POST);
        $data = array(
			
            'order_id' => $orderid, 
			'product_id'=>$productid,
            'product_options' => $options, 
            'comments' => $comments,
			'name' => $productname,
			'qty' =>$quantity,
			'unit_price' =>$perprice,
			'row_total' =>$quantity*$perprice
			
        );
		
		//print_r($data);
		
		//$this->db->where('id', $pid);				
        $this->db->insert('order_item', $data);
		
		$insertid=$this->db->insert_id();
		
		//echo "nnnnn".$insertid;
		
		//echo "jjj".$this->db->last_query();
		
		$data['files'] = $app->gettempfiles($randomid);
		
		foreach ($data['files']  as $val)
			
		{
			
			
			
			$filename=$val['file_name'];
			
			
		
			
			    $data               = array(
					
					        'customer_id'         =>  $userid,
							'order_id'         =>  $orderid,
					         'order_item_id'         =>  $insertid,
					 'order_file_name'         =>  $filename
					      
					
                        );
			
			print_r($data);
				
				
					$complted= $this->db->insert('order_files', $data);
			
			 // echo "kkk".$this->db->last_query();
			  
			
			
			
		}
		
		
		
		
		
		
			$app->deletetempfiles($randomid);
		
		
			//---updating order total and vat price in order tabel---------------------				   

			$orderitems= $app->getorderitemdetails($orderid);
					
			$subtotal="0";
			
			foreach ($orderitems as $items){

			$rowtotal=$items[qty]*$items[unit_price];
			 $subtotal=$subtotal+$rowtotal;

			}
	 
	$vatprice=$subtotal*15/100;

	   $data             = array(
					'vat_price'                   =>  $vatprice,
					'price'                   =>  $subtotal                           
				   
					
					
				);
					$this->db->where('order_id', $orderid);
				   $this->db->update('orders', $data);

//---end of updating order total-----------------------------------------------			
			
		
		
		//echo $this->cart->total_items();
		
    }
 
	
 //---add order comments------------------------
	
	function add_order_comments(){
		
		 $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		
		
		
		
		 $this->form_validation->set_rules('orderid', 'Order Id', 'required');
		
		
		 if ($this->form_validation->run()==false)
            {
			 
			 
			  
			  $this->template->load('admin_blank','view_order',$data);
			  
            }
            else
            {
		
		
		
		$orderid=$_POST['orderid'];
		$comments=$_POST['comments'];
		$userid=$_POST['userid'];
		
        $data = array(
			
            'order_id' => $orderid, 
			'customer_id'=>$userid,
            'order_comments' => $comments
          
        );
		
		//print_r($data);
		
		//$this->db->where('id', $pid);
				if($comments)
				{
					  $this->db->insert('order_comments', $data);
				}
       
				
				$discount=$_POST['discount_total'];
				
				$deposit=$_POST['deposit_total'];
				
				$deposit_type=$_POST['deposit_type'];
				
				$vat_price=$_POST['vat_price'];
				
				$discount_type=$_POST['discount_type'];
				if($discount_type=="percentage")
				{
					
				 $discount_percentage=$_POST['discount'];	
				}
				
				if($deposit_type=="percentage")
				{
					
				 $deposit_percentage=$_POST['deposit'];	
				}
				
				
				if($_POST['hold']=="1")
				{
                 
					$status="Onhold";
					$confirmed="0";


				}
				else{

				
				$status="Processing";
				$confirmed="1";

				}
				
				  $data = array(
			
            'status' => $status,
			 'discount' => $discount,
		    'vat_price' => $vat_price,					  
			'discount_type' => $discount_type,
			'deposit' => $deposit,
			'deposit_type' => $deposit_type,
			'deposit_percentage' => $deposit_percentage,
			'discount_percentage' => $discount_percentage,
			'confirmed' => $confirmed
			
          
        );
				
			//print_r($data);
				//exit;
				
		$this->db->where('order_id', $orderid);				
        $this->db->update('orders', $data);
				
				
		$num=$app->checkinvoiceorder($orderid);
				
				
				
				
				
				
	
				$length = 20;
$str = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  
$random=substr(str_shuffle($str), 0, $length);
				
				$invoicedate=date('Y-m-d H:i:s');
				
				$status="UnPaid";
				
				$customerid=$_POST['userid'];
				
				$orderid=$_POST['orderid'];
				
				$balance_total=$_POST['balance_total'];
				
				
				
		//----inserting invoice---------------------------------
				
				
				$data = array(
			
            'invoice_no' => $random,
			 'invoice_date' => $invoicedate,
		    'invoice_status' => $status,					  
			'customer_id' => $customerid,
			'order_id' => $orderid,
			'payment_total' => $balance_total
			
          
        );
				
			
				
				if($num)
				{
					
				
				
		$this->db->where('order_id', $orderid);				
        $this->db->update('invoice', $data);
					
					$data['invarr']=$app->getinvoiceorder($orderid);
					
				$invid=$data['invarr']['invoice_id'];
					
					$data = array(
			
            'invoice_id' => $invid,
			 'order_activity_date' => $invoicedate,
		    'order_activity' => "Order Updated",					  
			'type' => "order"
			
			
          
        );
					$this->db->insert('invoice_activity', $data);
					
				}
				else
				{
					
				$this->db->insert('invoice', $data);
				$insert_id = $this->db->insert_id();	
					
					$data = array(
			
            'invoice_id' => $insert_id,
			 'order_activity_date' => $invoicedate,
		    'order_activity' => "Order Confirmed",					  
			'type' => "order"
			
			
          
        );
				
				$this->db->insert('invoice_activity', $data);	
					
				}
				
				
		//-------------end of inserting invoice------------------		
		
		
		
		redirect('ad_order/view_order/'.$orderid);
			
			
		}
		
		
		
		
		
		
		
		
		
			
			
		
		
		
		
    }
 
	
	
//------end of order comments-------------------------	
	
	
	 //---delete order item----------------------------
	
	public function orditemdelete()
		{
		
		
		  $adorder = new App();
		  $this->app = new App();
		  $itemid=$this->uri->segment(3);
		  $data['order']=$adorder->getorderitems($itemid);
		$orderid=$data['order']['order_id'];
		  $adorder->deleteorderitem($itemid);
		  	//---updating order total and vat price in order tabel---------------------				   

			  $orderitems= $adorder->getorderitemdetails($orderid);
					
			  $subtotal="0";
			  
			  foreach ($orderitems as $items){

			  $rowtotal=$items[qty]*$items[unit_price];
			   $subtotal=$subtotal+$rowtotal;

			  }
	   
	  $vatprice=$subtotal*15/100;

		 $data             = array(
					  'vat_price'                   =>  $vatprice,
					  'price'                   =>  $subtotal                           
					 
					  
					  
				  );
					  $this->db->where('order_id', $orderid);
					 $this->db->update('orders', $data);

  //---end of updating order total-----------------------------------------------		
		  redirect('ad_order/view_order/'.$orderid);
		}
	
//-------end of delete order item------------------------
	
	
	function payment_invoice_view()
    {
    
     if($this->ion_auth->logged_in()==1)
				{
					$adorder = new App();
					$this->app = new App();
					//$data['orders'] = $adorder->orderlisting();
					 
					 $orderid=$this->uri->segment(3);
					 
					 $data['products']=$adorder->getviewproducts(); 
					 
					 
                       $ordid=$orderid;
                    $data['order_details']=$adorder->getorderdetails($ordid); 
					 
					 $g="0";
					
		
		foreach ($data['order_details'] as $item)
			
		{
			
			
		$itemid=$item['id'];
			
			//echo $itemid;
			
		$data['filearr'][$itemid]=$adorder->getitem($itemid);
			
			
		

       //print_r($data['filearr'][$itemid]);


      


			
			
		}
		
		
		
		
		
		//print_r($data['order_details']);
		
		$data['orders'] = $adorder->getordersingle($orderid);
		
		//$data['item_files'] = $app->getitemfiles($itemid); 
		
		
		$data['orderid'] = $orderid;
		
		$data['shipping'] = $adorder->getshippingorder($orderid);
		
		$data['billing'] = $adorder->getbillingorder($orderid);
		
		
		$shipcode=$data['billing'][country_code];
		$data['countryarr']=$adorder->getcountryname($shipcode);
		
		
		$scode=$data['shipping'][country_code];
		$data['shipcountryarr']=$adorder->getcountryname($scode);
		
		$data['ordernotes']=$adorder->ordernotes($orderid);
		 
		 $data['invoicedetails']=$adorder->invoiceinfo($orderid);
		 
		$invid=$data['invoicedetails'][invoice_id];
		
		 
	$data['invoicepayments']=$adorder->paymentinfo($invid);
		 
		 foreach ($data['invoicepayments'] as $pa)
		 {
			 
			 $collect=$pa['invoice_collected_by'];
			 
			
		 
		 $data['cby'][$collect]=$adorder->getcollectedby($collect);
			 
			//echo "jjj".$data['colledtedby'][$collect][employee_name];
			 
		 }
		 
		 $data['invoiceactivity']=$adorder->paymentactivity($invid);
		  
          //exit;
					$this->template->load('admin_blank', 'payment_invoice_view',$data);
				}
				else
				{
					$this->template->load('login_master','content');
				}

    }

   
   //---delete order item----------------------------
	
	public function delete_payment()
		{
		
		
		  $adorder = new App();
		  $this->app = new App();
		  $paymentid=$this->uri->segment(3);
		  $data['order']=$adorder->getinvoice($paymentid);
		  $orderid=$data['order']['order_id'];
		
		  $adorder->deletepayment($paymentid);
		 $invoiceid=$data['order']['invoice_id'];
		
		  $data['check']=$adorder->checkpayment($invoiceid);
				
				         $invtotal="0";
				
				         foreach ($data['check'] as $ch)
						 {
							 
							$invtotal=$invtotal+$ch['invoice_payment'];
						 }
						 
								 
		
		$data['invtotal']=$adorder->invoicetotal($invoiceid);
				
				           $paymenttotal=$data['invtotal']['payment_total'];
				
				         if($invtotal=="0")
						 {
							 $status="UnPaid";
							 
							  $data               = array(
                            'invoice_status'                   =>  $status
                        );
							 
							$this->db->where('invoice_id', $invoiceid);
                           $this->db->update('invoice', $data); 
							 
						 }


						 if($invtotal>"0")
						 {
							 $status="Partially Paid";
							 
							  $data               = array(
                            'invoice_status'                   =>  $status
                        );
							 
							$this->db->where('invoice_id', $invoiceid);
                           $this->db->update('invoice', $data); 
							 
						 }
							 
		
		
		  redirect('ad_order/payment_invoice_view/'.$orderid);
		}
	
//-------end of delete order item------------------------
	
	
	public function pdfcontroller()
		{
		
		 $this->load->library('pdf');
       $adorder = new App();
					$this->app = new App();
					//$data['orders'] = $adorder->orderlisting();
					 
					 $orderid=$this->uri->segment(3);
					 
					 $data['products']=$adorder->getviewproducts(); 
					 
					 
                       $ordid=$orderid;
                    $data['order_details']=$adorder->getorderdetails($ordid); 
					 
					 $g="0";
					
		
		foreach ($data['order_details'] as $item)
			
		{
			
			
		$itemid=$item['id'];
			
			//echo $itemid;
			
		$data['filearr'][$itemid]=$adorder->getitem($itemid);
			
			
		

       //print_r($data['filearr'][$itemid]);


      


			
			
		}
		
		
		
		
		
		//print_r($data['order_details']);
		
		$data['orders'] = $adorder->getordersingle($orderid);
		
		//$data['item_files'] = $app->getitemfiles($itemid); 
		
		
		$data['orderid'] = $orderid;
		
		$data['shipping'] = $adorder->getshippingorder($orderid);
		
		$data['billing'] = $adorder->getbillingorder($orderid);
		
		
		$shipcode=$data['billing'][country_code];
		$data['countryarr']=$adorder->getcountryname($shipcode);
		
		
		$scode=$data['shipping'][country_code];
		$data['shipcountryarr']=$adorder->getcountryname($scode);
		
		$data['ordernotes']=$adorder->ordernotes($orderid);
		 
		 $data['invoicedetails']=$adorder->invoiceinfo($orderid);
		 
		$invid=$data['invoicedetails'][invoice_id];
		
		 
	$data['invoicepayments']=$adorder->paymentinfo($invid);
		 
		 foreach ($data['invoicepayments'] as $pa)
		 {
			 
			 $collect=$pa['invoice_collected_by'];
			 
			
		 
		 $data['cby'][$collect]=$adorder->getcollectedby($collect);
			 
			//echo "jjj".$data['colledtedby'][$collect][employee_name];
			 
		 }
		 
		 $data['invoiceactivity']=$adorder->paymentactivity($invid);
		
		 $root = getenv("DOCUMENT_ROOT");
		
		//echo '<img src="'.base_url().'/assets/deyar/img/brand/footer-logo.png" />';
		//exit;
		
		  $html = '
		  
		  <link rel="icon" href="http://localhost/printstore/assets/deyar/img/brand/favicon.png" type="image/x-icon"/>

		<!--- Icons css --->
		<link href="http://localhost/printstore/assets/deyar/css/icons.css" rel="stylesheet">

		<!-- Owl-carousel css-->
		<link href="http://localhost/printstore/assets/deyar/plugins/owl-carousel/owl.carousel.css" rel="stylesheet"/>

		<!--- Right-sidemenu css --->
		<link href="http://localhost/printstore/assets/deyar/plugins/sidebar/sidebar.css" rel="stylesheet">

		<!--- Style css --->
		<link href="http://localhost/printstore/assets/deyar/css/style.css" rel="stylesheet">
		<link href="http://localhost/printstore/assets/deyar/css/skin-modes.css" rel="stylesheet">

		<!--- Animations css --->
		<link href="http://localhost/printstore/assets/deyar/css/animate.css" rel="stylesheet">
		
		
		<script src="http://localhost/printstore/skin/admin/js/jquery.min.js"></script>
 
<style type="text/css">
         .invoice-actions.btn-group.dropdown-btn-group {
         /*border: 1px solid #d8d8d8;*/
         }
         .invoice-actions .btn-default {
         color: #444!important;
         background-color: #fff;
         border-color: #ddd #ddd #d8e1e3 !important;
         border: 1px solid #d8d8d8;
         font-size: 13px;
         }
         .dropdown-menu {
         border: 1px solid #ddd;
         border-radius: 2px;
         -webkit-box-shadow: 0 2px 6px rgb(0 0 0 / 10%);
         box-shadow: 0 2px 6px rgb(0 0 0 / 10%);
         }
         .dropdown-menu>li>a {
         clear: both;
         font-weight: 400;
         line-height: 1.42857143;
         color: #333;
         white-space: nowrap;
         border: 1px solid transparent;
         padding: 12px 15px;
         }
         .nav>li {
         position: relative;
         display: block;
         }
         .nav-tabs > li > a {
         position: relative;
         display: block;
         font-size: 15px;
         font-weight: 600;
         color: #000;
         padding: 10px 15px;
         border-radius: 2px 2px 0 0;
         border-bottom: 1px solid #ddd;
         /*background-color: #fff;*/
         /*border: 1px solid #ddd;*/
         color: #555;
         }
         .nav-tabs>li>a.active, .nav-tabs>li>a.active:focus, .nav-tabs>li>a.active:hover {
         color: #555;
         cursor: default;
         background-color: #fff;
         border: 1px solid #ddd;
         border-bottom-color: transparent;
         }
         .nav-tabs>li>a.active{
         border-bottom-color: #fff!important;
         }
         .tab-content {
         padding: 20px;
         border: 1px solid #dee5e7;
         border-top: none;
         }
         .tab-content {
         overflow: unset;
         }
         .nav-tabs {
         border-bottom: 1px solid #ddd;
         }
         .nav-tabs>li {
         float: left;
         margin-bottom: -2px;
         }
         .invoice-wrap {
         width: 700px;
         margin: 0 auto;
         background: #FFF;
         color: #000;
         }
         .invoice-inner {
         margin: 0 30px;
         padding: 20px 0;
         }
         #invoice_id{
         background: rgb(195, 195, 195);
         padding: 20px;
         }
         .invoice-listing-table th {
         background-color: #e5e5e5;
         border-bottom: 1px solid #555555;
         border-top: 1px solid #555555;
         font-weight: bold;
         text-align: left;
         padding: 6px 4px;
         }
         .invoice-listing-table td {
         border-bottom: 1px solid #555555;
         text-align: left;
         padding: 5px 6px;
         vertical-align: top;
         }
         .total-row {
         background-color: #e5e5e5;
         /*border-bottom: 1px solid #555555;*/
         /*border-top: 1px solid #555555;*/
         }
         .total-table td {
         border-left: 1px solid #555555;
         }
         .total-table td:last-child {
         border-right: 1px solid #555555;
         }
         .total-table th:last-child {
         border-right: 1px solid #555555;
         }
         .invoice-wrap h1 {
         font-size: 28px;
         }
         .invoice-wrap table {
         font-size: 12px;
         }
         .invoice-address {
         padding-top: 20px;
         border-top: 1px solid darkgrey;
         }
         div#payment_id {
         position: relative;
         }
         .btn_rightcss{
         position: absolute;
         right: 0;
         top: 0;
         }
         .day-view-entry table {
         line-height: 18px;
         width: 100%;
         }
         .day-view-entry-list {
         padding-left: 0;
         list-style: none;
         margin-bottom: 0px;
         /*margin-top: 30px;*/
         }
         .day-view-entry-label.day-view-entry-label {
         position: relative;
         border: none;
         border-left: 3px solid #ddd;
         }
         .day-view-entry {
         border-bottom: 1px solid #ddd !important;
         font-size: 13px;
         -webkit-transition: background 0.1s linear;
         -moz-transition: background 0.1s linear;
         -ms-transition: background 0.1s linear;
         -o-transition: background 0.1s linear;
         transition: background 0.1s linear;
         }
         .day-view-entry td {
         padding: 16px 15px 16px 30px;
         }
         .day-view-entry td {
         vertical-align: middle;
         padding: 16px 15px;
         word-wrap: break-word;
         }
         .day-view-entry .entry-info {
         word-wrap: break-word;
         }
         .day-view-entry .task-notes {
         margin-top: 8px;
         color: #777;
         overflow: hidden;
         }
         .day-view-entry .task-notes a{
         color: #777;
         overflow: hidden;
         }
         .day-view-entry .task-notes a span.project{
         color: #000;
         overflow: hidden;
         }
         .day-view-entry .project-client, .day-view-entry .start-time {
         font-size: 14px;
         font-weight: bold;
         margin-bottom: 3px;
         -webkit-font-smoothing: antialiased;
         font-smoothing: antialiased;
         }
         .day-view-entry .task-notes {
         color: #777;
         overflow: hidden;
         }
         .meta-details.tiny {
         font-size: 11px;
         line-height: 11px;
         }
         .meta-details {
         float: left;
         padding: 0;
         list-style-type: none;
         }
         .day-view-entry .entry-time {
         vertical-align: middle;
         padding: 16px 15px;
         font-size: 21px;
         font-weight: 700;
         text-align: right;
         width: 155px;
         white-space: nowrap;
         -webkit-font-smoothing: antialiased;
         font-smoothing: antialiased;
         }
         .day-view-entry .entry-button {
         line-height: 37px;
         padding-left: 0;
         text-align: right;
         width: 80px;
         text-align: right;
         }
         .project-client a {
         color: black;
         }
         .sub_with_num {
         font-size: 11px;
         color: #777;
         display: inline-block;
         font-weight: normal;
         }
         .bordered {
         margin-top: 30px;
         border: 1px solid #DDD;
         }
         .wid_ri {
         width: 410px;
         margin-top: 10px;
         }
         .wid_ri a{
         margin-top: 0px !important;
         width: 200px;
         display: inline-block;
         }
         .day-view-entry .task-notes2 {
         margin-top: 8px;
         color: #777;
         overflow: hidden;
         }
         .task-notes2 span {
         margin-right: 10px;
         }
         a.new_seca {
         padding: 0px 5px;
         color: #000;
         }
         .new_bbtn {
         color: #fff;
         background-color: #e81f8a;
         border-color: #e81f8a;
         padding: 10px 15px;
         }
         .day-view-entry .entry-button {
         line-height: 37px;
         padding-left: 0;
         text-align: right;
         width: 80px;
         }
         .new_bbtn::after {
         margin-left: 0em;
         }
         table.table.table-hover.mb-0.text-md-nowrap td{
            padding: 10px 20px;
    border-bottom: 1px solid #e5e2f5 !important;
    color: #575757;
    font-size: 13px;
    font-weight: 500;
         }
         table.table.table-hover.mb-0.text-md-nowrap th {
    padding: 10px 20px;
    font-weight: 600;
    background-color: #f2f1f9;
        font-size: 13px;
}
table.table.table-hover.mb-0.text-md-nowrap {
  margin-top: 20px;
}
#timeline_content {
    overflow: hidden;
}
.timeline-wrapper {
    position: relative;
    text-align: center;
}
.timeline-wrapper:before {
    position: absolute;
    left: 63px;
    top: 0;
    bottom: 50px;
    content: ;
    width: 3px;
    background: #e6e3f6;
}
.date-label {
    position: relative;
    z-index: 9;
    text-align: left;
    width: 100%;
    margin-bottom: 20px;
    overflow: hidden;
}
.date-label p {
 display: inline-block;
    padding: 10px 20px;
    background: #e4e1f4;
    border-radius: 4px;
    text-align: center;
    margin: 0;
    color: #000;
    min-width: 130px;
    font-weight: bold;
    text-transform: uppercase;
}
.extended .timeline-item {
    margin-left: 160px;
}
.timeline-item {
    text-align: left;
    border: 2px solid #ddd;
    background: #fff;
    border-radius: 4px;
    padding: 15px;
    position: relative;
    margin-left: 80px;
    margin-bottom: 20px;
    /* max-width: 510px; */
}
.item-wrapper .timeline-item:before {
    left: -24px;
    right: auto;
    content: ;
    border: 11px solid transparent;
    border-right: 11px solid #ddd;
}
.timeline-item:before {
    position: absolute;
    right: -24px;
    content: ;
    top: 19px;
    border: 11px solid transparent;
    border-left: 11px solid #ddd;
}
.timeline-item > span {
    font-size: 13px;
    color: #222;
}
.item-wrapper .timeline-item:after {
    left: -20px;
    right: auto;
    border: 10px solid transparent;
    border-right: 10px solid #fff;
}
.timeline-item:after {
    position: absolute;
    right: -20px;
    top: 20px;
    content: ;
    border: 10px solid transparent;
    border-left: 10px solid #fff;
}
.extended .extend {
     left: -160px;
    top: 5px;
    background: #c5176c;
    border: 0px solid #c5176c;
    border-radius: 5px;
    width: 130px;
    height: 35px;
    line-height: 35px;
    text-align: center;
    color: #fff;
    font-size: 14px;
}

.timeline-item > span {
    font-size: 13px;
    color: #222;
}
.extend {
    position: absolute;
    right: -37px;
    top: 20px;
    background: #307bb3;
    border: 4px solid #eee;
    border-radius: 50%;
    width: 20px;
    height: 20px;
}
.extended .extend i {
    color: #fff;
    line-height: 42px;
}
.timeline-item p {
    margin-bottom: 0;
}
.invoice-actions a:hover {
    color: #d61a75 !important;
}
      </style>
<div id="invoice_id" class="tab-pane fade in active show">
                                                <div class="invoice-wrap">
                                                   <div class="invoice-inner">
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                         <tbody>
                                                            <tr>
                                                               <td width="33%">
                                                                  <img src="'.$_SERVER['DOCUMENT_ROOT'].'/assets/deyar/img/brand/logo.png" style="width: 70%">
																  <img src="'.base_url().'/assets/deyar/img/brand/footer-logo.png" />
                                                               </td>
                                                               <td class="text-left" valign="top" width="33%">
                                                                  <p>
                                                                     <span class="bussines-name">Deyar</span><br>
                                                                     Fahad ibn ibrahim<br>
                                                                     Malaz<br>
                                                                     Riyadh, AL Riyadh 11242 <br>
                                                                     VAT : 3000742361400003
																	 
																	 <img src="'.base_url().'/assets/deyar/img/brand/footer-logo.png" />

                                                                  </p>
                                                               </td>
		
                                                               <td class="text-right" valign="top">
                                                                  <h1>Invoice<img src="'.base_url().'/assets/deyar/img/brand/hello.jpeg" /></h1>
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
';
		
		//$this->template->load('admin_blank','payment_invoice_view',$data);
		
		//$content = $this->output->get_output($data); 
		
		//$html=$this->load->view('payment_invoice_view', $data, true);
		
		//print $html;
		//exit;
		
		//$html = $this->load->view('pdf_view', [], true);
		
		//print $html;
		
		$this->pdf->createPDF($html, 'mypdf', false);
		}
	

	
		// File upload
	public function fileUpload(){
		
		$main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		if(!empty($_FILES['file']['name'])){
			
			
				
			// Set preference
			$config['upload_path'] = 'assets/uploads/';	
			$config['allowed_types'] = 'jpg|jpeg|png|gif|mp4|pdf|zip';
			$config['max_size']    = '10024'; // max_size in kb
			$new_name                   = time()."_".$_FILES["file"]['name'];
			$new_name                   =str_replace(" ","",$new_name);
            $config['file_name']        = $new_name;
			//$config['file_name'] = $_FILES['file']['name'];
					
			//Load upload library
			$this->load->library('upload',$config);			
				
			// File upload
			if($this->upload->do_upload('file')){
				// Get data about the file
				$uploadData = $this->upload->data();
				
				$random=$_POST['random'];
				
			//$userid=$this->session->userdata('uid');
			
			    $data               = array(
					
					        'randomid'         =>  $random,
							'file_name'         =>  $new_name
                        );
				
				
				//print_r($data);
				
				
					$complted= $this->db->insert('temp_files', $data);
		
			}
		}
		
	}


	
	
	
	
	
	public function newpdf()
		{
		
		 $this->load->library('pdf');
       $adorder = new App();
					$this->app = new App();
		
		 $orderid=$this->uri->segment(3);
					 
					 $data['products']=$adorder->getviewproducts(); 
					 
					 
                       $ordid=$orderid;
                    $data['order_details']=$adorder->getorderdetails($ordid); 
					 
					 $g="0";
					
		
		foreach ($data['order_details'] as $item)
			
		{
			
			
		$itemid=$item['id'];
			
			//echo $itemid;
			
		$data['filearr'][$itemid]=$adorder->getitem($itemid);
			
			
		

       //print_r($data['filearr'][$itemid]);


      


			
			
		}
		
		
		
		
		
		//print_r($data['order_details']);
		
		$data['orders'] = $adorder->getordersingle($orderid);
		
		//$data['item_files'] = $app->getitemfiles($itemid); 
		
		
		$data['orderid'] = $orderid;
		
		$data['shipping'] = $adorder->getshippingorder($orderid);
		
		$data['billing'] = $adorder->getbillingorder($orderid);
		
		
		$shipcode=$data['billing'][country_code];
		$data['countryarr']=$adorder->getcountryname($shipcode);
		
		
		$scode=$data['shipping'][country_code];
		$data['shipcountryarr']=$adorder->getcountryname($scode);
		
		$data['ordernotes']=$adorder->ordernotes($orderid);
		 
		 $data['invoicedetails']=$adorder->invoiceinfo($orderid);
		 
		$invid=$data['invoicedetails'][invoice_id];
		
		 
	$data['invoicepayments']=$adorder->paymentinfo($invid);
		 
		 foreach ($data['invoicepayments'] as $pa)
		 {
			 
			 $collect=$pa['invoice_collected_by'];
			 
			
		 
		 $data['cby'][$collect]=$adorder->getcollectedby($collect);
			 
			//echo "jjj".$data['colledtedby'][$collect][employee_name];
			 
		 }
		 
		 $data['invoiceactivity']=$adorder->paymentactivity($invid);
		
		
		$invdate=date("d/m/Y", strtotime($data[invoicedetails]['invoice_date']));
		
		
		
		$html_content = '<style type="text/css">
		body {
    font-family: "Open Sans", sans-serif;
}
.invoice-wrap table {
    font-size: 12px;
}
		        table.table.table-hover.mb-0.text-md-nowrap td{
            padding: 10px 20px;
    border-bottom: 1px solid #e5e2f5 !important;
    color: #575757;
    font-size: 13px;
    font-weight: 500;
         }
         table.table.table-hover.mb-0.text-md-nowrap th {
    padding: 10px 20px;
    font-weight: 600;
    background-color: #f2f1f9;
        font-size: 13px;
}
table.table.table-hover.mb-0.text-md-nowrap {
  margin-top: 20px;
}
.total-row {
         background-color: #e5e5e5;
         /*border-bottom: 1px solid #555555;*/
         /*border-top: 1px solid #555555;*/
         }
         .total-table td {
         border-left: 1px solid #555555;
         }
         .total-table td:last-child {
         border-right: 1px solid #555555;
         }
         .total-table th:last-child {
         border-right: 1px solid #555555;
         }
.invoice-listing-table th {
         background-color: #e5e5e5;
         border-bottom: 1px solid #555555;
         border-top: 1px solid #555555;
         font-weight: bold;
         text-align: left;
         padding: 6px 4px;
		
         }
         .invoice-listing-table td {
         border-bottom: 1px solid #555555;
         text-align: left;
         padding: 5px 6px;
         vertical-align: top;
		
		
         }
         .invoice-wrap h1 {
    font-size: 28px;
}


.invoice-wrap {
    width: 700px;
    margin: 0 auto;
    background: #FFF;
    color: #000;
}
	</style>
</head>
<body>


<div id="invoice_id" class="tab-pane fade in active show">
                                                <div class="invoice-wrap">
                                                   <div class="invoice-inner">
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                         <tbody>
                                                            <tr>
                                                               <td width="33%">
                                                                  <img src="'.base_url().'assets/deyar/img/brand/logo.png" style="width: 150px;">
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
																		
                                                                       '.$data['billing']['first_name'].'&nbsp;'.$data['billing']['last_name'].'<br>
											'.$data['billing']['address'].'<br>
											'.$data['billing']['city'].'<br>
											'.$data['billing']['state'].'<br>
											'.$data['countryarr']['country_name'].'<br>
											'.$data['billing']['phone_number'].'</a>

                                                                     </p>
                                                                     <p>
                                                                        <strong>Ship to:</strong><br>
                                                                        '.$data['shipping']['first_name'].'&nbsp;'.$data['shipping']['last_name'].'<br>
											'.$data['shipping']['address'].'<br>
											'.$data['shipping']['city'].'<br>
											'.$data['shipping']['state'].'<br>
											'.$data['shipcountryarr']['country_name'].'<br>
											 '.$data['shipping']['phone_number'].'</a>

                                                                     </p>
                                                                  </td>
                                                                  <td id="second_right" width="35%" class="text-right" valign="top">
                                                                     <table id="invoice_fields" border="0" cellspacing="0" cellpadding="0" class="text-right float-right">
                                                                        <tbody>
                                                                           <tr>
                                                                              <td class="text-right">
                                                                                 <strong>Invoice </strong>
                                                                              </td>
                                                                              <td style="padding-left:20px;" class="text-left">
                                                                                 #0000'.$data[invoicedetails]['invoice_id'] .'                                       
                                                                              </td>
                                                                           </tr>
                                                                           <tr>
                                                                              <td class="text-right"><strong>Invoice Date</strong></td>
                                                                              <td style="padding-left:20px;" class="text-left">'.$invdate.'</td>
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
                                                            </tr>';
		
		            
				$total="0";
				 $tot="0";
				foreach ($data[order_details] as $items)
{
					
					
					$total=$total+$item['price'];
					
					
	
					$options=json_decode($items['product_options']);
					
					$co="0";
					
										
                                                            $html_content.='<tr>
                                                               <td width="">'.$items['name'].'</td>
                                                               <td width="210">';
					
					foreach ($options as $key=>$value)
							 {
						
						if($co<=1){
							
						
						
						$subprice=$items['price']*$items['qty'];
								 
						
           
             
            
						///echo $value->name." : <b>".$value->value."</b><br>";
							
							$html_content.=''.$value->name.'&nbsp;<b>'.$value->value.'</b><br>';
						
           
			$co=$co+1; } 
			  } 
					
					 $pr=$items['qty']*$items['unit_price'];
				
				$tot=$pr+$tot;
				
					
					$html_content.='</td>
                                                               <td width="80">'.number_format($items['unit_price'],2).'</td>
                                                               <td width="40">'.$items['qty'].'</td>
                                                               <td width="80">'.number_format($pr,2).' SR</td>
                                                            </tr>';
					
				}
		
		
	
	if($data[orders]['vat_price'])
	{
	  $vat=$data[orders]['vat_price'];
		
	}
	else
	{
	  $vat=$tot*15/100;	
	}
															 
															 
	$gtotal=$data[orders]['shipping_price']+$vat+$tot-$data[orders]['discount'];
	
	$grandtotal=$data[orders]['shipping_price']+$vat+$tot-$data[orders]['discount']-$data[orders]['deposit'];
	   
	 
                                                             $html_content.='
                                                            <tr class="">
                                                               <td style="border:none" bgcolor="#FFF" colspan="2"></td>
                                                               <td style="border-left:none;border-right:none;" colspan="2"><strong>Subtotal:</strong></td>
                                                               <td style="border-left:none;border-right:none;" class="text-left">'.number_format($tot,2).' SR</td>
                                                            </tr>
                                                            <tr class="">
                                                               <td style="border:none" bgcolor="#FFF" colspan="2"></td>
                                                               <td style="border-left:none;border-right:none;" colspan="2"><strong>Discount:</strong></td>
                                                               <td style="border-left:none;border-right:none;" class="text-left">-'.number_format($data[orders]['discount'],2).' SR</td>
                                                            </tr>
                                                            <tr class="">
                                                               <td style="border:none" bgcolor="#FFF" colspan="2"></td>
                                                               <td style="border-left:none;border-right:none;" colspan="2"><strong>VAT (15%):</strong></td>
                                                               <td style="border-left:none;border-right:none;" class="text-left">'.number_format($vat,2).' SR</td>
                                                            </tr>
															 <tr class="">
                                                               <td style="border:none" bgcolor="#FFF" colspan="2"></td>
                                                               <td style="border-left:none;border-right:none;" colspan="2"><strong>Shipping :</strong></td>
                                                               <td style="border-left:none;border-right:none;" class="text-left">'.number_format($data[orders]['shipping_price'],2).' SR</td>
                                                            </tr>
                                                            <tr class="total-row">
                                                               <td style="border:none" bgcolor="#FFF" colspan="2"></td>
                                                               <td style="border-left:none;border-right:none;" colspan="2"><strong>Total:</strong></td>
                                                               <td style="border-left:none;border-right:none;" class="text-left">'.number_format($gtotal,2).' SR</td>
                                                            </tr>';
		$duepayment="0"; 
															 
															 foreach ($data[invoicepayments] as $payments) {
	
	   $duepayment=$duepayment+$payments['invoice_payment'];
	
	
}
															 
														$duepaymenttotal=$data[invoicedetails]['payment_total']-$duepayment;
															 $deposit=$data[orders]['deposit']+$duepayment;
															 
                                                           $html_content.='<tr>
                                                               <td style="border:none" bgcolor="#FFF" colspan="2"></td>
                                                               <td style="border-left:none;border-right:none;" colspan="2"><strong>Paid:</strong></td>
                                                               <td style="border-left:none;border-right:none;" class="text-left">'.$deposit.' SR</td>
                                                            </tr>
                                                            <tr>
                                                               <td style="border:none" bgcolor="#FFF" colspan="2"></td>
                                                               <td style="border-left:none;border-right:none;" colspan="2"><strong>Balance Due:</strong></td>
                                                               <td style="border-left:none;border-right:none;" class="text-left">'.$duepaymenttotal.' SR</td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </div>
                                                </div>
                                             </div>';
		$invoiceid=$data[invoicedetails]['invoice_id'];
												
			
			$this->pdf->loadHtml($html_content);
			$this->pdf->render();
			$this->pdf->stream($invoiceid.".pdf", array("Attachment"=>0));
					
		
		}
	
	
	public function product_select()
		{
		  $adorder = new App();
		  $this->app = new App();
		 $data['products'] = $adorder->productlisting();
		if($_POST['product'])
		{
			
		redirect('ad_order/new_order/'.$_POST['product']);
		}
		
		 
		  $this->template->load('admin_blank','product_select',$data);
		}
	
	
	
	function admin_add_to_cart(){
		
		 $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$user = $this->ion_auth->user()->row();
		$adminid=$user->id;
		
		$options=array();
		
		//print_r($_POST);
		//exit;
		
		//$userid=$this->session->userdata('uid');
		
		//$datatemp['tempfiles'] = $app->gettempfiles($userid);
		
		//print_r($data['tempfiles']);
		
		$productid=$_POST['product'];
		
		$randomid=$_POST['randomid'];
		
		$data['products'] = $app->getproductsmap($productid);
		
		
		
		
		
			$dependable= json_decode($data['products'][dependable_attributes]);
		$nondependable= json_decode($data['products'][non_dependable_attributes]);
		
		
		$totalarr=array();
		
		
			
			
			 foreach ($dependable as $k=>$v)
	                     {
				 $totalarr[]=$v->name;
				 
				
				 
			 }
				
				 foreach ($nondependable as $k=>$v)
	                     {
				 $totalarr[]=$v->name;
				 
				 }
		
		
		
		
		foreach($_POST as $key=>$value)
{
			
			$key=str_replace("_"," ",$key);
		
		
		
		
		if(in_array($key,$totalarr))
					{
  
			$options[]=array('name'=> $key,'value'=> $value);
}
			
		}

		$options=json_encode($options);
		
		
		$rowid=$this->session->userdata('sessionid');
		
		$productid=$_POST['product'];
		$productname=$_POST['productname'];
		$perprice=$_POST['perprice'];
		$quantity=$_POST['quantity'];
		//$comments=$_POST['comments'];
	
		
		//print_r($_POST);
        $data = array(
			
			'admin_id' => $adminid,
            'product_id' => $productid, 
			'product_name'=>$productname,
            'price' => $perprice, 
            'qty' => $quantity,			
			'options' =>$options,
			'row_id' =>$rowid
        );
		
		//print_r($data);
		//exit;
        $this->db->insert('admin_cart', $data);
		
		$admincartid=$this->db->insert_id();
		//echo $this->db->last_query();
		//exit;
		
		
		/*
		$contents = $this->cart->contents();
$last = count($contents) - 1;
$rowid=$contents[$last]['rowid'];
		
		echo "kkk".$rowid;
		
		*/
		
		
		
		//$userid=$this->session->userdata('uid');
		
		  
		
		/*
		print_r($data['tempfiles']);
		
		foreach ($datatemp['tempfiles']  as $val)
			
		{
			
			echo "nnnnn".$val['file_name'];
			
				
			echo "ppp".$val->file_name;
			
			
		}
		
		*/
		
	
		
		//$session_id = $this->session->userdata('session_id');
		
		$session_id = $this->session->session_id;
		
		
		$data['files'] = $app->gettempfiles($randomid);
		
		foreach ($data['files']  as $val)
			
		{
			
			
			
			$filename=$val['file_name'];
			
			
		
			
			    $data               = array(
					
					        'admin_id'         =>  $adminid,
							'file_name'         =>  $filename,
					         'admin_cart_id'         =>  $admincartid,
					         'row_id'         =>  $session_id
					
					      
					
                        );
			
			
				
				
					$complted= $this->db->insert('admin_files', $data);
			
			 //echo "kkk".$this->db->last_query();
			
			  
			
			
			
		}
		
		
		
		
		
		
			$app->deletetempfiles($randomid);
			
			
		
		
		
		//echo $this->cart->total_items();
		
    }
	
	
	public function new_cart()
		{
		  $adorder = new App();
		  $this->app = new App();
		$user = $this->ion_auth->user()->row();
		$adminid=$user->id;
		
		$rowid=$this->session->userdata('sessionid');
		
		 $data['cart'] = $adorder->cartlisting($adminid,$rowid);
		 $data['products'] = $adorder->productlisting();
		
		 $data['customers'] = $adorder->getcustomers();
		
		
		$data['countries'] = $adorder->getcountry();
		
		
		
		if($_POST)
			
		{
			
		    $total="0";
			
			
				foreach ($data['cart'] as $items)
				{
					$subtotal=$items['price']*$items['qty'];
					 $total=$total+$subtotal;
					
					
				}
			
			$vat=number_format($total*(15/100),2);
								   
				$grandtotal=$total+$vat;
			
			
			
			
			$date = date('Y-m-d H:i:s');
			
			/*
				$firstname               = $this->input->post('firstname');
				$lastname               = $this->input->post('lastname');
				$phone               = $this->input->post('phone');				
				$streetaddress               = $this->input->post('address');				
                $city                   = $this->input->post('city');
				$state                = $this->input->post('state');               
				$zip                  = $this->input->post('zip');
				$country                  = $this->input->post('country');
				
				*/
			
			$custatus="Pending";
			//$method="Flat Rate";
			
			$ship_price=$_POST['shippingmethod'];
			
			if($ship_price)
			{
				
				$method="Delivery";
				
			}
			else
			{
				
				$method="Pickup";
			}
			
			if($_POST['customer'])
			{
				
			  $userid=$_POST['customer'];	
				
			}
			else
			{
			   
				$firstname               = $this->input->post('firstname');
				$lastname                = $this->input->post('lastname');
                $email                   = $this->input->post('email');
				$password                = $this->input->post('password');               
				$status                  = $this->input->post('status');
				
				$name=$firstname." ".$lastname;
				$status="1";
                

                 #Category INSERT
                        $data               = array(
                            'customer_firstname'         =>  $firstname,
							'customer_lastname'         =>  $lastname, 
                            'customer_email'        =>  $email,
							'customer_password'     =>  md5($password), 
							'customer_status'       =>  $status
                            
                        );
				
				$complted= $this->db->insert('customers', $data);
						   $userid = $this->db->insert_id();
				
			}
			
			
			
				
				 $data               = array(
							
					        'customer_id'         =>  $userid,
					        'vat_price'         =>  $vat,
							'price'         =>  $grandtotal,
					        'status'         =>  $custatus,
					        'shipping_method'         =>  $method,
					        'shipping_price'         =>  $ship_price,					 
							'order_date'         =>  $date
							
                            
                        );
			
			
				 $complted= $this->db->insert('orders', $data);
				
		 
				$orderid=$this->db->insert_id();
			
		$data['cartitems'] = $adorder->cartlisting($adminid,$rowid);
			foreach ($data['cartitems'] as $items)
				{
					
				
				
				$productid=$items['product_id'];
				$name=$items['product_name'];
				$price=$items['price'];
				$qty=$items['qty'];
				$options=$items['options'];
				$subtotal=$price*$qty;
				//$comments=$items['comments'];
			
			
			    $data               = array(
							
					        'order_id'         =>  $orderid,
					        'product_id'         =>  $productid,
							'product_options'         =>  $options,
					        'name'         =>  $name,					        
					        'qty'         =>  $qty,
					        'unit_price'         =>  $price,					 
							'row_total'         => $subtotal
							
                            
                        );
				
				
					$complted= $this->db->insert('order_item', $data);
				
				  
				
				   $orderitemid= $this->db->insert_id();
				
				$cartid=$items['admin_cart_id'];
				
				
				//$rowid=$items['rowid'];
				$datacart['admincartfiles'] = $adorder->getadmincartfiles($adminid,$cartid);
				
				//print_r($datacart['admincartfiles']);
				//exit;
				
			
				foreach ($datacart['admincartfiles']  as $val)
			
		{
			
			$filename=$val['file_name'];
		
			
			    $data               = array(
					
					        'customer_id'         =>  $userid,
					        'order_id'         =>  $orderid,
					        'order_item_id'    =>  $orderitemid,
							'order_file_name'         =>  $filename
					        
					
                        );
				
				
					$complted= $this->db->insert('order_files', $data);
			
			
		}
		
		
				
				
				
				
				
					
				}
			
			
			
			//----adding address details to customer order--------------------
			
			if($_POST[shippingcustomer]!="-1")
			{
				
				$cuid=$_POST[shippingcustomer];
				
				 $shipcustomers = $adorder->getshipping($cuid);
				
				$firstname=$shipcustomers[first_name];
			$lastname=$shipcustomers[last_name];
				$phone=$shipcustomers[phone_number];
				$address=$shipcustomers[address];
				$country=$shipcustomers[country_code];
				$city=$shipcustomers[city];
				$state=$shipcustomers[state];
			   $zip=$shipcustomers[zip_code];
				
				
				 $data               = array(
							
					        'order_id'         =>  $orderid,
					        'customer_id'         =>  $userid,
							'first_name'         =>  $firstname,
					        'last_name'         =>  $lastname,
					        'phone_number'         =>  $phone,
					        'address'         =>  $address,
					        'country_code'         =>  $country,					 
							'city'         => $city,
					        'state'         =>  $state,
					        'zip_code'         =>  $zip					 
							
							
                            
                        );
				
			}
			else{
				
				
			
			
			
			
			$firstname=$_POST['sh_firstname'];
			$lastname=$_POST['sh_lastname'];
				$phone=$_POST['sh_phone'];
				$address=$_POST['sh_address'];
				$country=$_POST['sh_country'];
				$city=$_POST['sh_city'];
				$state=$_POST['sh_state'];
			   $zip=$_POST['sh_zip'];
			
			
			    $data               = array(
							
					        'order_id'         =>  $orderid,
					        'customer_id'         =>  $userid,
							'first_name'         =>  $firstname,
					        'last_name'         =>  $lastname,
					        'phone_number'         =>  $phone,
					        'address'         =>  $address,
					        'country_code'         =>  $country,					 
							'city'         => $city,
					        'state'         =>  $state,
					        'zip_code'         =>  $zip					 
							
							
                            
                        );
				
			}
			
			if($_POST['sh_firstname'])
			{
				
				$firstname=$_POST['sh_firstname'];
			$lastname=$_POST['sh_lastname'];
				$phone=$_POST['sh_phone'];
				$address=$_POST['sh_address'];
				$country=$_POST['sh_country'];
				$city=$_POST['sh_city'];
				$state=$_POST['sh_state'];
			   $zip=$_POST['sh_zip'];
			
			
			    $data               = array(
							
					        'order_id'         =>  $orderid,
					        'customer_id'         =>  $userid,
							'first_name'         =>  $firstname,
					        'last_name'         =>  $lastname,
					        'phone_number'         =>  $phone,
					        'address'         =>  $address,
					        'country_code'         =>  $country,					 
							'city'         => $city,
					        'state'         =>  $state,
					        'zip_code'         =>  $zip					 
							
							
                            
                        );
				
			}
			
			
				
					$complted= $this->db->insert('customer_order_shipping_address', $data);
			
			if($_POST['billing'])
			{
				
				$this->db->insert('customer_order_billing_address', $data);
			}
			else{
				
				
			if($_POST[billingcustomer]!="-1")
			{
				
				$cuid=$_POST[billingcustomer];
				
				 $billcustomers = $adorder->getshipping($cuid);
				
				$firstname=$billcustomers[first_name];
			$lastname=$billcustomers[last_name];
				$phone=$billcustomers[phone_number];
				$address=$billcustomers[address];
				$country=$billcustomers[country_code];
				$city=$billcustomers[city];
				$state=$billcustomers[state];
			   $zip=$billcustomers[zip_code];
				
				
				 $data               = array(
							
					        'order_id'         =>  $orderid,
					        'customer_id'         =>  $userid,
							'first_name'         =>  $firstname,
					        'last_name'         =>  $lastname,
					        'phone_number'         =>  $phone,
					        'address'         =>  $address,
					        'country_code'         =>  $country,					 
							'city'         => $city,
					        'state'         =>  $state,
					        'zip_code'         =>  $zip					 
							
							
                            
                        );
				
			}
				else{
					
					
				
			
			
			$firstname=$_POST['bill_firstname'];
			$lastname=$_POST['bill_lastname'];
				$phone=$_POST['bill_phone'];
				$address=$_POST['bill_address'];
				$country=$_POST['bill_country'];
				$city=$_POST['bill_city'];
				$state=$_POST['bill_state'];
			   $zip=$_POST['bill_zip'];
			
			
			    $data               = array(
							
					        'order_id'         =>  $orderid,
					        'customer_id'         =>  $userid,
							'first_name'         =>  $firstname,
					'last_name'         =>  $lastname,
					        'phone_number'         =>  $phone,
					        'address'         =>  $address,
					        'country_code'         =>  $country,					 
							'city'         => $city,
					        'state'         =>  $state,
					        'zip_code'         =>  $zip					 
							
							
                            
                        );
					
				}
				
				
				if($_POST['bill_firstname'])
				{
					$firstname=$_POST['bill_firstname'];
			$lastname=$_POST['bill_lastname'];
				$phone=$_POST['bill_phone'];
				$address=$_POST['bill_address'];
				$country=$_POST['bill_country'];
				$city=$_POST['bill_city'];
				$state=$_POST['bill_state'];
			   $zip=$_POST['bill_zip'];
			
			
			    $data               = array(
							
					        'order_id'         =>  $orderid,
					        'customer_id'         =>  $userid,
							'first_name'         =>  $firstname,
					'last_name'         =>  $lastname,
					        'phone_number'         =>  $phone,
					        'address'         =>  $address,
					        'country_code'         =>  $country,					 
							'city'         => $city,
					        'state'         =>  $state,
					        'zip_code'         =>  $zip					 
							
							
                            
                        );
					
				}
				
					$complted= $this->db->insert('customer_order_billing_address', $data);
			
			}
			
			//-------------end of order details--------------------------------
			
			
			//-------delete cart items--------------------------------------------
			
			$this->db->where('admin_id', $adminid);
			$this->db->where('row_id', $rowid);
            $this->db->delete('admin_cart');
		 
			
			//---------end of delete---------------------------------------------
			
			
			redirect('ad_order');
			
				
			
			
		}
		
		 
		  $this->template->load('admin_blank','new_cart',$data);
		}
	
	
	//---delete order item----------------------------
	
	public function newcart_delete()
		{
		
		
		  $adorder = new App();
		  $this->app = new App();
		  $admincartid=$this->uri->segment(3);
		  
		  $adorder->deleteadmincart($admincartid);
		  redirect('ad_order/new_cart');
		}
	
//-------end of delete order item------------------------
	
	
	//--------update quantity--------------------------------
	
	public function update_qty()
		{
		
		 if($this->ion_auth->logged_in()==1)
				{
		  $adorder = new App();
		  $this->app = new App();
		   $orderid=$_POST['oid'];
			 
			 $itemid=$_POST['itid'];
			 
			  $qty=$_POST['qty'];
			 
			 
			 
					 
					 
           $data             = array(
                            'qty'                   =>  $qty                           
                           
							
                            
                        );
						    $this->db->where('id', $itemid);
						   $this->db->update('order_item', $data);

		//---updating order total and vat price in order tabel---------------------				   

					$orderitems= $adorder->getorderitemdetails($orderid);
					
					$subtotal="0";
					
					foreach ($orderitems as $items){

                    $rowtotal=$items[qty]*$items[unit_price];
                     $subtotal=$subtotal+$rowtotal;

					}
			 
			$vatprice=$subtotal*15/100;

			   $data             = array(
                            'vat_price'                   =>  $vatprice,
							'price'                   =>  $subtotal                           
                           
							
                            
                        );
						    $this->db->where('order_id', $orderid);
						   $this->db->update('orders', $data);

		//---end of updating order total-----------------------------------------------				   
						  // echo $this->db->last_query();
						  // exit;
			redirect('ad_order/view_order/'.$orderid);
			 
		 }
			else
			{

				$this->template->load('login_master','content');

			}
		  
	}
	
	
	
	
	//----end of update quantity--------------------------

    //--------update shipping--------------------------------
	
	public function update_shipping()
	{
	
	 if($this->ion_auth->logged_in()==1)
			{
	  $adorder = new App();
	  $this->app = new App();
	  
		 
		  $customerid=$_POST['customer'];
		 
		 
		 
		
				 
	   

	//---shipping address---------------------				   

				$shippingaddress= $adorder->getshippingaddress($customerid);
		 
		 //print_r($shippingaddress);
				
				
				$shiphtml="";
		 $shiphtml.='<option value="">Select Address</option>';
				foreach ($shippingaddress as $items){

                  $shiphtml.='<option value="'.$items[id].'">'.$items[address].'</option>';

					}
		 
		           $shiphtml.='<option value="-1">New Address</option>';
				
			echo $shiphtml;	
		
		 
	 }
		else
		{

			$this->template->load('login_master','content');

		}
	  
}




//----end of update shipping--------------------------
	
	
	 //--------update billing--------------------------------
	
	public function update_billing()
	{
	
	 if($this->ion_auth->logged_in()==1)
			{
	  $adorder = new App();
	  $this->app = new App();
	  
		 
		  $customerid=$_POST['customer'];
		 
		 
		 
		
				 
	   

	//---shipping address---------------------				   

				$shippingaddress= $adorder->getbillingaddress($customerid);
		 
		 //print_r($shippingaddress);
				
				
				$shiphtml="";
		 $shiphtml.='<option value="">Select Billing Address</option>';
				foreach ($shippingaddress as $items){

                  $shiphtml.='<option value="'.$items[id].'">'.$items[address].'</option>';

					}
		 
		           $shiphtml.='<option value="-1">New Address</option>';
				
			echo $shiphtml;	
		
		 
	 }
		else
		{

			$this->template->load('login_master','content');

		}
	  
}




//----end of update billing--------------------------

	

	
	

    
}
?>