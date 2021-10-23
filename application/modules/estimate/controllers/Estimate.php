<?php
class Estimate extends MY_Controller
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
		
		//$this->Main->getComments($userid);
		
        error_reporting(0);
		
    }
    function index()
    {
		
		
		$user = $this->ion_auth->user()->row();
     	$adminid=$user->id;	
		$pageacces = new Main();
		$access=$pageacces->getpageaccess($adminid);



		if($access['view_access'])
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
	else{

		redirect('error_page');

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
		  $estimate = new App();
		  $this->app = new App();
		  $order_id=$this->uri->segment(3);
		  $this->db->where('order_id', $order_id);
		  $this->db->delete('estimates');
		  redirect('estimate');
		}
    
    

   public function view_order()
		{

			$user = $this->ion_auth->user()->row();
     	$adminid=$user->id;	
		$pageacces = new Main();
		$access=$pageacces->getpageaccess($adminid);



			if($access['edit_access'])
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
			else{

				redirect('error_page');

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
			 
			
			 
			redirect('estimate');
			 
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
			 
			
			 
			redirect('estimate');
			 
		 }
			else
			{

				$this->template->load('login_master','content');

			}
		  
	}
	
	
	
	
	
	//-----new order--------------------------
	
	function new_estimate()
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
	
	function estimate_new_item()
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
			
			
		} 
		
		else if($count>"1"){
			
			foreach ($data['price'] as $pr)
		{
			if($pr['min_quantity'])
			{
				
			$minqty=$pr['min_quantity'];
			$minprice=$pr['price'];
			}
			
			


}?>
			
			<div class="detailsPriceDisplay">
						<div class="detailsPriceBody">
							<p>
								<span>Quantity </span>
							
								<select id="quantity" name="quantity"  style="width:100px">
 <?php foreach ($data['price'] as $pr)
		{?>
  <option value="<?php echo $pr['quantity']?>|<?php echo $pr['price']?>"><?php echo $pr['quantity']?></option>
      <?php } ?>
</select>
								
								<input type="hidden" name="orgprice" id="orgpriceid" value="<?php echo $minprice?>">
								
								<input type="hidden" name="typeprice" id="typeprice" value="1">
								
								
							</p>
							<h4 class="price" id="original_price">SAR <?php echo $minprice?> </h4>
							<a class="btn animatedBtn darckBtn"  role="button" id="basket">Add to Basket</a>
						</div>
					</div>				
				

			
	<?php }
		
		
		
		else {?>
			
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
                $this->db->update('customer_estimate_shipping_address', $data);
				
				redirect('estimate/view_order/'.$orderid);
				
			
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
                $this->db->update('customer_estimate_billing_address', $data);
				
				redirect('estimate/view_order/'.$orderid);
				
			
			}
			 
		 }
			else
			{

				$this->template->load('login_master','content');

			}
		  
	}
	
	
	//-----new order--------------------------
	
	function edit_product_estimate()
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
				
				
					$complted= $this->db->insert('estimate_files', $data);
			
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
        $this->db->update('estimate_item', $data);
		
		//echo "jjj".$this->db->last_query();
		
		
			//---updating order total and vat price in order tabel---------------------				   

			$orderitems= $app->getorderitemdetails($orderid);
					
			$subtotal="0";
			
			foreach ($orderitems as $items){

			$rowtotal=$items[qty]*$items[unit_price];
			 $subtotal=$subtotal+$rowtotal;

			}
		
		//---taking previous discount---------------
		
		$previous = $app->getpreviousdiscount($orderid);
		
		if($previous['discount'])
		{
			$discount=$previous['discount'];
			if($previous['discount_type']=="percentage")
			{
				$discpercentage=$previous['discount_percentage'];
				
				$discount=$subtotal*$discpercentage/100;
				
				
			}
			
		$subtotal=$subtotal-$discount;	
		}
		
		
	//----end of previous discount---------------	
	 
	$vatprice=$subtotal*15/100;

	   if($previous['discount'])
		{
			
			
			
			$data             = array(
					'vat_price'                   =>  $vatprice,
				    'discount'                   =>  $discount,
					'price'                   =>  $subtotal                           
				   
					
					
				);
			
			
		}
		else{
			
			$data             = array(
					'vat_price'                   =>  $vatprice,
					'price'                   =>  $subtotal                           
				   
					
					
				);
		}
		
	
					$this->db->where('order_id', $orderid);
				   $this->db->update('estimates', $data);

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
		
		//echo "kkkk".$randomid;
		
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
        $this->db->insert('estimate_item', $data);
		
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
			
			//print_r($data);
				
				
					$complted= $this->db->insert('estimate_files', $data);
			
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
		
		//echo "mmmmm".$subtotal."<br>";
		
	//---taking previous discount---------------
		
		$previous = $app->getpreviousdiscount($orderid);
		
		if($previous['discount'])
		{
			$discount=$previous['discount'];
			if($previous['discount_type']=="percentage")
			{
				$discpercentage=$previous['discount_percentage'];
				
				$discount=$subtotal*$discpercentage/100;
				
				
			}
			
		$subtotal=$subtotal-$discount;	
		}
		
		
		
		
		
	//----end of previous discount---------------	
	 
	 
	$vatprice=$subtotal*15/100;
		
		if($previous['discount'])
		{
			
			
			
			$data             = array(
					'vat_price'                   =>  $vatprice,
				    'discount'                   =>  $discount,
					'price'                   =>  $subtotal                           
				   
					
					
				);
			
			
		}
		else{
			
			$data             = array(
					'vat_price'                   =>  $vatprice,
					'price'                   =>  $subtotal                           
				   
					
					
				);
		}
		
	

	   
					$this->db->where('order_id', $orderid);
				   $this->db->update('estimates', $data);

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

		$estimatearr=$app->getorderdata($orderid);

		$date = date('Y-m-d H:i:s');
		
		$userid=$estimatearr['customer_id'];
		$vatprice=$estimatearr['vat_price'];
		$price=$estimatearr['price'];
		$status=$estimatearr['status'];
		$shippingmethod=$estimatearr['shipping_method'];
		$shippingprice=$estimatearr['shipping_price'];

		$discount=$estimatearr['discount'];
		$discount_type=$estimatearr['discount_type'];
		$discount_percentage=$estimatearr['discount_percentage'];
		
		//print_r($data);
		
		//$this->db->where('id', $pid);
				
       
		//---inserting orders table------------------------------		
				
		$data               = array(
							
			'customer_id'         =>  $userid,
			'vat_price'         =>  $vatprice,
			'price'         =>  $price,
			'status'         =>  $status,
			'shipping_method'         =>  $shippingmethod,
			'discount'         =>  $discount,
			'discount_type'         =>  $discount_type,
			'discount_percentage'         =>  $discount_percentage,
			'shipping_price'         =>  $shippingprice,					 
			'order_date'         =>  $date
			
			
		);
				
			//print_r($data);
				//exit;
				
					
        $this->db->insert('orders', $data);

		$ordid=$this->db->insert_id();


		//-------------end of inserting orders table--------------------------
				
				
		
			
		$itemarr=$app->getitemdata($orderid);
		
		
		//print_r($data);
		
		//$this->db->where('id', $pid);

		//---inserting orders item table and order file table------------------------------	
				
        foreach ($itemarr as $item)
		{

		$itemid=$item['order_item_id'];


		$productid=$item['product_id'];
		$options=$item['product_options'];
		$name=$item['name'];
		$qty=$item['qty'];
		$price=$item['unit_price'];
		$rowtotal=$item['row_total'];
				
				
		$data               = array(
							
			'order_id'         =>  $ordid,
			'product_id'         =>  $productid,
			'product_options'         =>  $options,
			'name'         =>  $name,					        
			'qty'         =>  $qty,
			'unit_price'         =>  $price,					 
			'row_total'         => $rowtotal
			
			
		);


		$this->db->insert('order_item', $data);

		$orderitemid=$this->db->insert_id();


		$filesarr=$app->getitemfiles($itemid);


		foreach ($filesarr as $file)
		{

			$userid=$file['customer_id'];			
			$filename=$file['order_file_name'];
			


			$data               = array(
					
				'customer_id'         =>  $userid,
				'order_id'         =>  $orderid,
				'order_item_id'    =>  $orderitemid,
				'order_file_name'         =>  $filename
				
		
			);


			$this->db->insert('order_files', $data);


		}

	}

   //-----end of order item and order file table--------------


   //---inserting customer shipping address table------------------------------	


   $shippingarr=$app->getshippingestimate($orderid);

      $userid=$shippingarr['customer_id'];
	  $firstname=$shippingarr['first_name'];
	  $lastname=$shippingarr['last_name'];
	  $phone=$shippingarr['phone_number'];
	  $address=$shippingarr['address'];
	  $country=$shippingarr['country_code'];
	  $city=$shippingarr['city'];
	  $state=$shippingarr['state'];
	  $zip=$shippingarr['zip_code'];
				

		
	$data               = array(
							
		'order_id'         =>  $ordid,
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

	$this->db->insert('customer_order_shipping_address', $data);


	//-----end of customer order shipping address--------------
		
		
   //-----inserting customer billing address--------------	
   
   $billingarr=$app->getbillingestimate($orderid);

   $userid=$billingarr['customer_id'];
   $firstname=$billingarr['first_name'];
   $lastname=$billingarr['last_name'];
   $phone=$billingarr['phone_number'];
   $address=$billingarr['address'];
   $country=$billingarr['country_code'];
   $city=$billingarr['city'];
   $state=$billingarr['state'];
   $zip=$billingarr['zip_code'];


				
	$data               = array(
							
		'order_id'         =>  $ordid,
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


	$this->db->insert('customer_order_billing_address', $data);

				
		//-------------end of inserting billing address------------------		
		
		
		
		redirect('estimate');
			
			
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
		
		//---taking previous discount---------------
		
		$previous = $adorder->getpreviousdiscount($orderid);
		
		if($previous['discount'])
		{
			$discount=$previous['discount'];
			if($previous['discount_type']=="percentage")
			{
				$discpercentage=$previous['discount_percentage'];
				
				$discount=$subtotal*$discpercentage/100;
				
				
			}
			
		$subtotal=$subtotal-$discount;	
		}
		
		
	//----end of previous discount---------------	
	   
	  $vatprice=$subtotal*15/100;

		if($previous['discount'])
		{
			
			
			
			$data             = array(
					'vat_price'                   =>  $vatprice,
				    'discount'                   =>  $discount,
					'price'                   =>  $subtotal                           
				   
					
					
				);
			
			
		}
		else{
			
			$data             = array(
					'vat_price'                   =>  $vatprice,
					'price'                   =>  $subtotal                           
				   
					
					
				);
		}
		
	
					  $this->db->where('order_id', $orderid);
					 $this->db->update('estimates', $data);

  //---end of updating order total-----------------------------------------------		
		  redirect('estimate/view_order/'.$orderid);
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
							 
		
		
		  redirect('estimate/payment_invoice_view/'.$orderid);
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
		
		  
		  
		  $markazi="Markazi Text";
		
		  $html ='<html dir="rtl" lang="ar">
<head>
      <meta charset="UTF-8">
   <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <style type="text/css">
  @font-face {
  font-family: DejaVuSansCondensed;
  font-style: normal;
  font-weight: normal;
  src: url(https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap) format("truetype");
}


  body{
  	direction:rtl;

  }
    .invoice-listing-table th {
    font-family: OpenSans-Regular;
    background-color: #e5e5e5;
    border-bottom: 1px solid #555555;
    border-top: 1px solid #555555;
    font-weight: bold;
    text-align: left;
    padding: 6px 4px;
    font-size: 13px;
     }

.total-table td {
     font-size: 13px;
    border-left: 1px solid #555555;
}
.invoice-listing-table td {
     font-size: 13px;
    border-bottom: 1px solid #555555;
    text-align: left;
    padding: 5px 6px;
    vertical-align: top;
}
.total-table td:last-child {
    border-right: 1px solid #555555;
}
.total-table th:last-child {
    border-right: 1px solid #555555;
}

  table tbody tr td p span.arabic{
 font-family: DejaVuSansCondensed;
    display: inline-block;
    direction: rtl;
  }
    table tbody tr td span.arabic{
     font-family: DejaVuSansCondensed;
    display: inline-block;
    direction: rtl;
  }
      table tbody tr td h3 span.arabic{
  font-family: DejaVuSansCondensed;
    display: inline-block;
    direction: rtl;
  }
  </style>
</head>
<body>
 <div class="" style="width: 720px;margin: 0 auto;">
                                                <div class="Quotation-wrap">
                                                   <div class="Quotation-inner">
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                         <tbody>
                                                            <tr>
                                                               <td class="text-left" valign="top" width="40%">
                                                               <p style="line-height: 1.6;font-size: 14px;font-weight: 600;">
                                                                     <span class="bussines-name">Fahad Ibn Ibrahim St. Malaz Area</span><br>
                                                                     Riyadh 2919 -14513 - K.S.A <br>
                                                                     Tel.: 00966 11 474 1435 <br>
                                                                    Mob.: 00966 53 488 4853 <br>
                                                                    Email : deyar.dp@gmail.co<br>
                                                                    VAT No. 300742361400003 : <span class="arabic" style="color:#000;direction: rtl;font-family: Amiri, serif;" dir="rtl" lang="ar">اﻟﺮﻗﻢ اﻟﻀﺮﻳﺒﻲ</span>

                                                                  </p>
                                                               </td>
                                                                <td class="text-center"  width="30%"  style="text-align: center;">
                                                                    <h3 class="arabic" style="margin-bottom: 5px;font-size: 24px;direction: rtl;font-family: Amiri, serif;"><span class="arabic" dir="rtl" lang="ar">ﻋﺮض ﺳﻌﺮ
 </span></h3>
                                                                  <h3 style="font-size: 18px;font-weight: bold;margin-top: 5px;">QUOTATION 01</h3>
                                                               </td>
                                                               <td style="text-align: right;padding-top: 15px;" valign="top">
                                                                  <img src="https://www.deyar.demoatcrayotech.com/printstore/assets/deyar/skin/img/logo-d.png" style="width: 200px;">
                                                               </td>
                                                              
                                                              
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                      <div class="Quotation-address" style="padding-top: 5px;
    padding-bottom: 5px;border-top: 1px solid #1e1e1c;">
                                                         <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                               <tr>
                                                                
                                                             <td style="line-height: 1.6;font-size: 14px;font-weight: 600;padding: 10px 0px;text-align: left; vertical-align: middle;width:70%;" >

                                                            
  <table idth="100%" border="0" cellspacing="0" cellpadding="0" >
      <tbody>
    <tr>
      <td style="line-height: 1.6;font-size: 14px;font-weight: 600;padding: 10px 0px;text-align: left; vertical-align: middle;">
          Customer Name :
          </td>
           <td style="line-height: 1.6;font-size: 14px;font-weight: 600;padding: 10px 0px;text-align: left; vertical-align: middle;width: 200px;">
          <input type="" name="" style="vertical-align: middle;height: 16px;background-color: #F1F1F2;border: 1px solid #F1F1F2;padding: 5px 8px;width: 100%;">  
          </td>
         <td style="line-height: 1.6;font-size: 18px;font-weight: 600;padding: 10px 0px;text-align: left; vertical-align: middle;"> 
          :   <span class="arabic" style="font-size: 18px;direction: rtl;" dir="rtl" lang="ar"> اﺳﻢ اﻟﻌﻤﻴﻞ</span></td>
  </tr>
  </tbody>
  </table>
    <table idth="100%" border="0" cellspacing="0" cellpadding="0" >
      <tbody>
    <tr>
      <td style="line-height: 1.6;font-size: 14px;font-weight: 600;padding: 10px 0px;text-align: left; vertical-align: middle;width: 30px;">
         Cares :
          </td>
           <td style="line-height: 1.6;font-size: 14px;font-weight: 600;padding: 10px 0px;text-align: left; vertical-align: middle;width: 200px;">
         <input type="" name="" style="vertical-align: middle;height: 16px;background-color: #F1F1F2;border: 1px solid #F1F1F2;padding: 5px 8px;width: 100%;">   
          </td>
         <td style="line-height: 1.6;font-size: 18px;font-weight: 600;padding: 10px 0px;text-align: left; vertical-align: middle;width: 50px;">
         :   <span class="arabic" style="font-size: 18px;direction: rtl;" dir="rtl" lang="ar">ﻋﻨﺎﻳﺔ</span>
  </tr>
  </tbody>
  </table>

                                                            
                                                             </td>
                                                               <td style="line-height: 1.6;font-size: 14px;font-weight: 600;padding: 10px 0px;text-align: right;vertical-align: middle;width:30%;">

  <table idth="100%" border="0" cellspacing="0" cellpadding="0" style="float: right;">
      <tbody>
    <tr>
      <td style="line-height: 1.6;font-size: 14px;font-weight: 600;padding: 10px 0px;text-align: right; vertical-align: middle;">
            Quotation No.:
          </td>
           <td style="line-height: 1.6;font-size: 14px;font-weight: 600;padding: 10px 0px;text-align: right; vertical-align: middle;">
            <input type="text" name="noquo" style="vertical-align: middle;height:16px;background-color:#F1F1F2;border: 1px solid #F1F1F2;padding: 5px 8px;width: 90px;"> 
          </td>
  </tr>
  <tr>
 <td style="line-height: 1.6;font-size: 14px;font-weight: 600;padding: 10px 0px;text-align: right; vertical-align: middle;">
    Date.: 
 </td>
 <td style="line-height: 1.6;font-size: 14px;font-weight: 600;padding: 10px 0px;text-align: right; vertical-align: middle;">
  <input type="" name="" style="height: 16px;background-color: #F1F1F2;border: 1px solid #F1F1F2;padding: 5px 8px;width: 90px;">
 </td>

    </tr>
  </tbody>
  </table>


                                                               </td>
                                                          
                                                               </tr>
                                                             
                                                            </tbody>
                                                         </table>
                                                      </div>

                                                      <div class="Quotation-body" style="border:1px solid #000; padding: 10px;">



                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                               <tr>
                                                                  <td id="second_left" width="65%" class="text-left" valign="top">
                                                                     <p  style="line-height: 1.6;font-size: 13px;font-weight: 500;margin-top: 0;">
                                                                        <b style="font-weight:700;">Bill to:</b><br>
                                                                        AbCD                        <br>
                                                                        Abdullah Naeem<br>
                                                                        Malaz<br>
                                                                        Riyadh, AL Riyadh 11242
                                                                     </p>
                                                                     <p  style="line-height: 1.6;font-family: sans-serif;font-size: 13px;font-weight: 500;margin-top: 0;">
                                                                        <strong>Ship to:</strong><br>
                                                                        AbCD                        <br>
                                                                        Abdullah Naeem<br>
                                                                        Malaz<br>
                                                                        Riyadh, AL Riyadh 11242
                                                                     </p>
                                                                  </td>
                                                                  <td id="second_right" width="35%" class="text-right" valign="top">
                                                                     <table id="invoice_fields" border="0" cellspacing="0" cellpadding="0" class="text-right float-right" style="    float: right;">
                                                                        <tbody>
                                                                           <tr>
                                                                              <td class="text-right" style="line-height: 1.6;font-family: sans-serif;font-size: 13px;font-weight: 500;margin-top: 0;">
                                                                                 <strong>Invoice #</strong>
                                                                              </td>
                                                                              <td style="line-height: 1.6;font-family: sans-serif;font-size: 13px;font-weight: 500;margin-top: 0;padding-left:20px;" class="text-left">
                                                                                 00001                                        
                                                                              </td>
                                                                           </tr>
                                                                           <tr>
                                                                              <td class="text-right" style="line-height: 1.6;font-family: sans-serif;font-size: 13px;font-weight: 500;margin-top: 0;"><strong>Invoice Date</strong></td>
                                                                              <td style="line-height: 1.6;font-family: sans-serif;font-size: 13px;font-weight: 500;margin-top: 0;padding-left:20px;" class="text-left">22/04/2021</td>
                                                                           </tr>
                                                                           <tr>
                                                                              <td class="text-right" style="line-height: 1.6;font-family: sans-serif;font-size: 13px;font-weight: 500;margin-top: 0;"><strong>Due Date</strong></td>
                                                                              <td style="line-height: 1.6;font-family: sans-serif;font-size: 13px;font-weight: 500;margin-top: 0;padding-left:20px;" class="text-left">23/04/2021</td>
                                                                           </tr>
                                                                        </tbody>
                                                                     </table>
                                                                  </td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
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
                                                       <div class="Quotation-footer" style="padding-top: 5px;
    padding-bottom: 5px;">
                                                         <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                               <tr>
                                                                
                                                             <td style="line-height: 1.6;font-family: sans-serif;font-size: 13px;font-weight: 600;padding:2px 0px;text-align: left;direction: rtl;">
                                                              <span class="arabic" dir="rtl" lang="ar">
                                                              ﻧﺎﻣﻞ ان ﻳﻨﺎل ﻋﺮﺿﻨﺎ ﻫﺬا رﺿﺎﻛﻢ واﺳﺘﺤﺴﺎﻧﻜﻢ ﻋﻠﻰ أﻣﻞ ﺗﺰوﻳﺪﻧﺎ ﺑﺎﻟﺘﻌﻤﻴﺪ اﻟﺮﺳﻤﻲ ﻟﻠﻄﺒﺎﻋﻪ ﻓﻲ اﻗﺮب وﻗﺖ وﻟﻜﻢ ﺟﺰﻳﻞ اﻟﺸﻜﺮ واﻟﺘﻘﺪﻳﺮ   </span>
                                                             </td>
                                                               </tr>
                                                                <tr>
                                                             <td style="line-height: 1.6;font-family: sans-serif;font-size: 14px;font-weight: 600;padding:2px 0px;text-align: left;">
                                                                Hope the above offer will meet your requirements:
                                                             </td>
                                                               </tr>
                                                                <tr>
                                                             <td style="line-height: 1.6;font-family: sans-serif;font-size: 14px;font-weight: 600;padding:2px 0px;text-align: left;">
                                                              look forward to receiving your Acceptance and the ofﬁcial purchase order very soon.
                                                             </td>
                                                               </tr>
                                                              
                                                            </tbody>
                                                         </table>
                                                      </div>

                                                      <div class="Quotation-footer" style="padding-top: 5px;padding-bottom: 5px;">
                                                         <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                              
                                                                 <tr>
                                                             <td style="line-height: 1.6;font-size: 15px;font-weight: 600;padding: 5px 0px;text-align: left;">
                                                              AL DEYAR AL SAUDIYAH  |
                                                              <span class="arabic" style="direction: rtl;font-size: 18px;" dir="rtl" lang="ar">ﻣﻄﺒﻌﻪ اﻟﺪﻳﺎر اﻟﺴﻌﻮدﻳﻪ </span>
                                                             </td>
                                                         </tr>
                                                         <tr>
                                                             <td class="text-left" valign="top" width="40%">
                                                               <p style="line-height: 1.6;font-size: 14px;font-weight: 500;margin-top: 0;">
                                                                   <b>Account Number at NCB:</b> 23164203000102<br>
                                                                   <b> IBAN/</b> SA15 1000 0023 1642 0300 0102 <br>
                                                               <b> Account Number at Al Rajhi BANK:</b> 125608010971109  <br>
                                                                  <b> IBAN/</b> SA63 8000 0125 6080 1097 1109 <br>
                                                                  <b> Payment Terms</b> <br>
                                                                   <b> Advance payment with P.O.: 50%</b> <br>
                                                                    "The buyer must pay the delivery of sample goods.


                                                                  </p>
                                                               </td>
                                                             
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                      </div>
                                            
                                                   </div>
                                                </div>
                                             </div>
</body>
</html>';
		
		

		$this->pdf->loadHtml($html);
			$this->pdf->render();
			$this->pdf->stream("test".".pdf", array("Attachment"=>0));


		
		//$this->pdf->createPDF($html, 'mypdf', false);

		
		//$this->template->load('admin_blank','payment_invoice_view',$data);
		
		//$content = $this->output->get_output($data); 
		
		//$html=$this->load->view('payment_invoice_view', $data, true);
		
		//print $html;
		//exit;
		
		//$html = $this->load->view('pdf_view', [], true);
		
		//print $html;
		
		//$this->pdf->createPDF($html, 'mypdf', false);
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
					
					if($items['type_price']=="1")
					{
						
					 $pr=$items['unit_price'];	
						
					}
					else
					{
						
						 $pr=$items['qty']*$items['unit_price'];
					}
					
				
				$tot=$pr+$tot;
				
					
					$html_content.='</td>
                                                               <td width="80">'.number_format($items['unit_price'],2).'</td>
                                                               <td width="40">'.$items['qty'].'</td>
                                                               <td width="80">'.number_format($pr,2).' SR</td>
                                                            </tr>';
					
				}
		
		
	
	if($orders['vat_price'])
	{
	  $vat=$orders['vat_price'];
		
	}
	else
	{
	  $vat=$tot*15/100;	
	}
															 
															 
	$gtotal=$orders['shipping_price']+$vat+$tot-$orders['discount'];
	
	$grandtotal=$orders['shipping_price']+$vat+$tot-$orders['discount']-$orders['deposit'];
	   
	 
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
         
			$user = $this->ion_auth->user()->row();
     	$adminid=$user->id;	
		$pageacces = new Main();
		$access=$pageacces->getpageaccess($adminid);



			if($access['add_access'])
			{
	

		  $adorder = new App();
		  $this->app = new App();
		 $data['products'] = $adorder->productlisting();
		if($_POST['product'])
		{
			
		redirect('estimate/new_estimate/'.$_POST['product']);
		}
		
		 
		  $this->template->load('admin_blank','product_select',$data);


	    }
		else{


			redirect('error_page');


		}


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

		//$rowid=$randomid;
		
		$productid=$_POST['product'];
		$productname=$_POST['productname'];
		$perprice=$_POST['perprice'];
		$quantity=$_POST['quantity'];
		if($_POST['typeprice'])
		{
			$typeprice=$_POST['typeprice'];
		}
		else
		{
			
		 $typeprice="0";	
		}
		
		
		$quarr=explode("|",$quantity);
		if(count($quarr) >"1")
		{
			
		$quantity=$quarr[0];
		$price=$quarr[1];
		$perprice=$price;
			
		}
		//$comments=$_POST['comments'];
	
		
		//print_r($_POST);
        $data = array(
			
			'admin_id' => $adminid,
            'product_id' => $productid, 
			'product_name'=>$productname,
            'price' => $perprice,
			'type_price' => $typeprice,
            'qty' => $quantity,			
			'options' =>$options,
			'row_id' =>$rowid
        );
		
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
		
	
		
		$session_id = $this->session->userdata('sessionid');
		
		//$session_id = $this->session->session_id;
		
		
		$data['files'] = $app->gettempfiles($randomid);

		//print_r($data['files']);
		
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
					if($items['type_price']=="1")
					{
						
					$subtotal=$items['price'];	
					}
					else{
						
					$subtotal=$items['price']*$items['qty'];	
					}
					 $total=$total+$subtotal;
					
					
				}

				if($_POST['discount_val'])
				{

                 $discountval=$_POST['discount_val'];
				 $discount_type=$_POST['discount_type'];
				 if($discount_type=="percentage")
				 {
					$discount_percentage=$_POST['discount'];
				 }
				

				 
                 $total=$total-$discountval;
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
			
			if($_POST['discount_val'])
				{

					if($discount_type=="amount")
				 {
                  $discount_percentage="0";
				 }


			
				
				 $data               = array(
							
					        'customer_id'         =>  $userid,
					        'vat_price'         =>  $vat,
							'price'         =>  $grandtotal,
					        'status'         =>  $custatus,
					        'shipping_method'         =>  $method,
							'discount'         =>  $discountval,
							'discount_type'         =>  $discount_type,
							'discount_percentage'         =>  $discount_percentage,
					        'shipping_price'         =>  $ship_price,					 
							'order_date'         =>  $date
							
                            
                        );

					}
					else{

						$data               = array(
							
					        'customer_id'         =>  $userid,
					        'vat_price'         =>  $vat,
							'price'         =>  $grandtotal,
					        'status'         =>  $custatus,
					        'shipping_method'         =>  $method,							
					        'shipping_price'         =>  $ship_price,					 
							'order_date'         =>  $date
							
                            
                        );
					}
			
			
				 $complted= $this->db->insert('estimates', $data);
				
		 
				$orderid=$this->db->insert_id();
			
		$data['cartitems'] = $adorder->cartlisting($adminid,$rowid);
			foreach ($data['cartitems'] as $items)
				{
					
				
				
				$productid=$items['product_id'];
				$name=$items['product_name'];
				$price=$items['price'];
				$qty=$items['qty'];
				$options=$items['options'];
				if($items['type_price']=="1")
					{
						
					$subtotal=$items['price'];	
					
					$typeprice="1";
					}
					else{
						
					$subtotal=$price*$qty;
						$typeprice="0";
					}
				//$comments=$items['comments'];
			
			
			     $data               = array(
							
					        'order_id'         =>  $orderid,
					        'product_id'         =>  $productid,
							'product_options'         =>  $options,
					        'name'         =>  $name,					        
					        'qty'         =>  $qty,
					        'unit_price'         =>  $price,					 
							'row_total'         => $subtotal,
					        'type_price'         => $typeprice
							
                            
                        );
				
				
				
					$complted= $this->db->insert('estimate_item', $data);
				
				  
				
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
				
				
					$complted= $this->db->insert('estimate_files', $data);
			
			
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

						$data_ship_address               = array(							
					        
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


						$complted= $this->db->insert('customer_address', $data_ship_address);
				
			}
			
			
				
					$complted= $this->db->insert('customer_estimate_shipping_address', $data);
			
			if($_POST['billing'])
			{
				
				$this->db->insert('customer_estimate_billing_address', $data);
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

						$data_bill_address               = array(							
					        
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


						$complted= $this->db->insert('customer_address', $data_bill_address);
					
				}
				
					$complted= $this->db->insert('customer_estimate_billing_address', $data);
			
			}
			
			//-------------end of order details--------------------------------
			
			
			//-------delete cart items--------------------------------------------
			
			$this->db->where('admin_id', $adminid);
			$this->db->where('row_id', $rowid);
            $this->db->delete('admin_cart');
		 
			
			//---------end of delete---------------------------------------------
			
			
			redirect('estimate');
			
				
			
			
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
		  redirect('estimate/new_cart');
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
						   $this->db->update('estimate_item', $data);

		//---updating order total and vat price in order tabel---------------------				   

					$orderitems= $adorder->getorderitemdetails($orderid);
					
					$subtotal="0";
					
					foreach ($orderitems as $items){

                    $rowtotal=$items[qty]*$items[unit_price];
                     $subtotal=$subtotal+$rowtotal;

					}
			 
			 //---taking previous discount---------------
		
		$previous = $adorder->getpreviousdiscount($orderid);
		
		if($previous['discount'])
		{
			$discount=$previous['discount'];
			if($previous['discount_type']=="percentage")
			{
				$discpercentage=$previous['discount_percentage'];
				
				$discount=$subtotal*$discpercentage/100;
				
				
			}
			
		$subtotal=$subtotal-$discount;	
		}
		
		
	//----end of previous discount---------------	
			 
			$vatprice=$subtotal*15/100;

			  if($previous['discount'])
		{
			
			
			
			$data             = array(
					'vat_price'                   =>  $vatprice,
				    'discount'                   =>  $discount,
					'price'                   =>  $subtotal                           
				   
					
					
				);
			
			
		}
		else{
			
			$data             = array(
					'vat_price'                   =>  $vatprice,
					'price'                   =>  $subtotal                           
				   
					
					
				);
		}
		
	
						    $this->db->where('order_id', $orderid);
						   $this->db->update('estimates', $data);

		//---end of updating order total-----------------------------------------------				   
						  // echo $this->db->last_query();
						  // exit;
			redirect('estimate/view_order/'.$orderid);
			 
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

	
//---emailto customer-----------------------------------


public function emailpdf()
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
	    $customerid=$data['orders']['customer_id'];
	    $estimatedate=date("d/m/Y", strtotime($data['orders']['order_date']));
	
	     $customerinfo = $adorder->getcustomerinfo($customerid);
		
		//$data['item_files'] = $app->getitemfiles($itemid); 
		
		
		$data['orderid'] = $orderid;
		
		$data['shipping'] = $adorder->getshippingorder($orderid);
		
		$data['billing'] = $adorder->getbillingorder($orderid);
		
		
		$shipcode=$data['billing'][country_code];
		$data['countryarr']=$adorder->getcountryname($shipcode);
		
		
		$scode=$data['shipping'][country_code];
		$data['shipcountryarr']=$adorder->getcountryname($scode);
		
		$data['ordernotes']=$adorder->ordernotes($orderid);
		 
		 //$data['invoicedetails']=$adorder->invoiceinfo($orderid);
		 
		//$invid=$data['invoicedetails'][invoice_id];
		
		 
	//$data['invoicepayments']=$adorder->paymentinfo($invid);
		 
		 //foreach ($data['invoicepayments'] as $pa)
		 //{
			 
			// $collect=$pa['invoice_collected_by'];
			 
			
		 
		 //$data['cby'][$collect]=$adorder->getcollectedby($collect);
			 
			//echo "jjj".$data['colledtedby'][$collect][employee_name];
			 
		 //}
		 
		// $data['invoiceactivity']=$adorder->paymentactivity($invid);
		
		
		//$invdate=date("d/m/Y", strtotime($data[invoicedetails]['invoice_date']));
		
		
		
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
                                                                  <h1>Estimation</h1>
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
                                                                                 <strong>Estimate No </strong>
                                                                              </td>
                                                                              <td style="padding-left:20px;" class="text-left">
                                                                                 #0000'.$data['orders']['order_id'].'                                     
                                                                              </td>
                                                                           </tr>
                                                                           <tr>
                                                                              <td class="text-right"><strong>Estimate Date</strong></td>
                                                                              <td style="padding-left:20px;" class="text-left">'.$estimatedate.'</td>
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
					if($items['type_price']=="1")
					{
						
					$pr=$items['unit_price'];	
					}
					else
					{
						
						$pr=$items['qty']*$items['unit_price'];
					}
					 
				
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
	
$grandtotal=$data[orders]['shipping_price']+$vat+$tot-$data[orders]['discount'];
	   
	 
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
															 
														//$duepaymenttotal=$data[invoicedetails]['payment_total']-$duepayment;
															 //$deposit=$data[orders]['deposit']+$duepayment;
															 
                                                           $html_content.='
                                                         </tbody>
                                                      </table>
                                                   </div>
                                                </div>
                                             </div>';
		//$invoiceid=$data[invoicedetails]['invoice_id'];

		$file_name="estimate_".$orderid.'.pdf';
												
			
			$this->pdf->loadHtml($html_content);
			$this->pdf->render();
			$file = $this->pdf->output();
          file_put_contents($file_name, $file);
			//$this->pdf->stream($orderid.".pdf", array("Attachment"=>0));
	
	
$customeremail=$customerinfo['customer_email'];

	$customername=$customerinfo['customer_firstname']." ".$customerinfo['customer_lastname'];

	$estimateno='#0000'.$data['orders']['order_id'];
	
	//$customeremail="hrithiknaduvil@gmail.com";

	$message = "
     <html>
       <head>
         <title>your title</title>
       </head>
       <body>
         <p>Dear ".$customername.",</p>
         <p>Thank you for your estimate request.</p>
		<p> Please find the attached estimate ".$estimateno." for your reference.</p>
		<p>We look forward to your communication.</p>
		<p>Kind Regards,</p>
		<p>Deyar</p>
       </body>
     </html>";

		$this->load->library('email');
$this->email->from('deyar@deyar.com', 'deyar');
$this->email->subject('Estimate Details');
//$this->email->message('Please check your attachemnt for estimation');
$this->email->message($message);
$this->email->to($customeremail);
$this->email->attach($file_name);
$this->email->set_mailtype('html');
$this->email->send();
	
	// Set flash data 
$this->session->set_flashdata('message_email', 'Email Send Successfully to '.$customeremail);

redirect('estimate/view_order/'.$orderid);


					
		
		}


//-----------end of email customer----------------------------------------------------		
	
	
	public function view_order_version()
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
		
		
		  

					$this->template->load('admin_blank', 'view_order_version',$data);
				}
				else
				{
					$this->template->load('login_master','content');
				}


			

		}
    

		
   public function new_pdf()
	{
     
$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/custom/font/directory',
    ]),
    'fontdata' => $fontData + [
        'winsoftpro' => [
            'R' => 'winsoft-naskh-pro-light.ttf',
            'I' => 'winsoftpro-bold.ttf',
        ]
    ],
    'default_font' => 'winsoftpro'
]);
        $html = '<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="">
      <meta name="keywords" content="">
  <style media="print">
  body{
  font-family: winsoftpro;
  }

  table{
  font-family: winsoftpro;
  }
    
    .invoice-listing-table th {
    background-color: #e5e5e5;
    border-bottom: 1px solid #555555;
    border-top: 1px solid #555555;
    font-weight: 700;
    text-align: left;
    padding: 6px 4px;
       font-size: 13.5px;
     }

.total-table td {
     font-size: 13px;
    border-left: 1px solid #555555;
}
.invoice-listing-table td {
     font-size: 13px;
    border-bottom: 1px solid #555555;
    text-align: left;
    padding: 5px 6px;
    vertical-align: top;
}
.total-table td:last-child {
    border-right: 1px solid #555555;
}
.total-table th:last-child {
    border-right: 1px solid #555555;
}

  table td span.arabic{
    display: inline-block;
  font-family: winsoftpro;
    direction: rtl;

  }
  .text-right{
  	text-align:right;
  }
    .text-left{
  	text-align:left;
  }
  </style>
</head>
<body>
 <div  class="" style="width:100%;margin: 0 auto;">
                                                <div class="Quotation-wrap">
                                                   <div class="Quotation-inner">
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 10px;">
                                                         <tbody>
                                                            <tr>
                                                               <td class="text-left" valign="top" width="42%" style="line-height:1.6;">
                                                               <p style="font-size: 14px; font-weight: bold;">
                                                                    Fahad Ibn Ibrahim St. Malaz Area<br>
                                                                     Riyadh 2919 -14513 - K.S.A <br>
                                                                     Tel.: 00966 11 474 1435 <br>
                                                                    Mob.: 00966 53 488 4853 <br>
                                                                    Email : deyar.dp@gmail.co<br>
                                                                    VAT No. 300742361400003 : <span class="arabic" style="color:#000;direction: rtl; font-weight: bold;" dir="rtl" lang="ar">اﻟﺮﻗﻢ اﻟﻀﺮﻳﺒﻲ</span>

                                                                  </p>
                                                               </td>
                                                                <td class="text-center"  width="28%"  style="text-align: center;">
                                                                   <h3 class="arabic" style="margin-bottom: 0px;font-size: 21px;direction: rtl; font-weight: bold;"><span class="arabic" dir="rtl" lang="ar"  style=" font-weight: bold;">ﻋﺮض ﺳﻌﺮ
 </span></h3>
                                                                  <h3 style="font-size: 17px;margin-top: 0px;line-height: 1;font-weight:bold;">QUOTATION </h3>
                                                               </td>
                                                               <td style="text-align: right;padding-top: 15px;" valign="top">
                                                                  <img src="https://www.deyar.demoatcrayotech.com/printstore/assets/deyar/skin/img/logo-d.png" style="width: 200px;">
                                                               </td>
                                                              
                                                              
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                      <div class="Quotation-address" style="padding-top: 5px;
    padding-bottom: 5px;border-top: 1px solid #1e1e1c;">
                                                         <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                               <tr>
                                                                
                                                             <td style="line-height: 1.6;font-size: 14px; font-weight: bold;padding: 10px 0px;text-align: left;">
                                                              Customer Name : <input type="" name="" style="    background-color: #F1F1F2;border: 1px solid #F1F1F2;padding: 5px 8px;width: 200px;border-width: 0px;"> : <span class="arabic" style="color:#000;direction: rtl; font-weight: bold;" dir="rtl" lang="ar"> اﺳﻢ اﻟﻌﻤﻴﻞ</span>
                                                             </td>
                                                             <td style="line-height: 1.6;font-size: 14px; font-weight: bold;padding: 10px 0px;text-align: right;">
                                                                Quotation No.: <input type="" name="" style="    background-color: #F1F1F2;border: 1px solid #F1F1F2;padding: 5px 8px;width: 100px;border-width: 0px;">
                                                             </td>
                                                               </tr>
                                                               <tr>
                                                                
                                                             <td style="line-height: 1.6;font-size: 14px; font-weight: bold;padding: 10px 0px;text-align: left;">
                                                              Cares : <input type="" name="" style="    background-color: #F1F1F2;border: 1px solid #F1F1F2;padding: 5px 8px;width: 200px;border-width: 0px;"> : <span class="arabic" style="color:#000;direction: rtl; font-weight: bold;" dir="rtl" lang="ar">ﻋﻨﺎﻳﺔ</span>
                                                             </td>
                                                             <td style="line-height: 1.6;font-size: 14px; font-weight: bold; padding: 10px 0px;text-align: right;"> 
                                                                Date.: <input type="" name="" style="    background-color: #F1F1F2;border: 1px solid #F1F1F2;padding: 5px 8px;width: 100px;border-width: 0px;">
                                                             </td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                      </div>

                                                      <div class="Quotation-body" style="border:1px solid #000;    padding: 10px;">



                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                               <tr>
                                                                  <td id="second_left" width="65%" class="text-left" valign="top">
                                                                     <p  style="line-height: 1.2;font-size: 14px; font-weight: bold;margin-top: 0;">
                                                                      Bill to:<br>
                                                                       <span style="font-weight:normal;">  AbCD                        <br>
                                                                        Abdullah Naeem<br>
                                                                        Malaz<br>
                                                                        Riyadh, AL Riyadh 11242</span>
                                                                     </p>
                                                                     <br>
                                                                     <p  style="line-height: 1.2;font-size: 14px; font-weight: bold;margin-top: 0;">
                                                                      Ship to:<br>
                                                                   <span style="font-weight: normal;">      AbCD                        <br>
                                                                        Abdullah Naeem<br>
                                                                        Malaz<br>
                                                                        Riyadh, AL Riyadh 11242</span>
                                                                     </p>
                                                                  </td>
                                                                  <td id="second_right" width="35%" class="text-right" valign="top">
                                                                     <table id="invoice_fields" border="0" cellspacing="0" cellpadding="0" class="text-right float-right" style="    float: right;">
                                                                        <tbody>
                                                                           <tr>
                                                                              <td class="text-right" style="line-height: 1.6;font-size: 14px; font-weight: bold;margin-top: 0;">
                                                                                 Invoice #
                                                                              </td>
                                                                              <td style="line-height: 1.6;font-size: 14px;font-weight: 400;margin-top: 0;padding-left:20px;" class="text-left">
                                                                                 00001                                        
                                                                              </td>
                                                                           </tr>
                                                                           <tr>
                                                                              <td class="text-right" style="line-height: 1.6;font-size: 14px; font-weight: bold;margin-top: 0;">Invoice Date</td>
                                                                              <td style="line-height: 1.6;font-size: 13px;font-weight: 500;margin-top: 0;padding-left:20px;" class="text-left">22/04/2021</td>
                                                                           </tr>
                                                                           <tr>
                                                                              <td class="text-right" style="line-height: 1.6;font-size: 14px; font-weight: bold;margin-top: 0;">Due Date</td>
                                                                              <td style="line-height: 1.6;font-size: 13px;font-weight: 500;margin-top: 0;padding-left:20px;" class="text-left">23/04/2021</td>
                                                                           </tr>
                                                                        </tbody>
                                                                     </table>
                                                                  </td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                         <br>
                                                                <table cellspacing="0" cellpadding="2" border="0" width="100%" id="listing_table" class="invoice-listing-table total-table" style="">
                                                         <tbody>
                                                            <tr>
                                                               <th width="" bgcolor="#E5E5E5" style="border-left:1px solid #555;">Item</th>
                                                               <th width="210" bgcolor="#E5E5E5">Description</th>
                                                               <th width="80" bgcolor="#E5E5E5">Unit Price</th>
                                                               <th width="40" bgcolor="#E5E5E5">Qty</th>
                                                               <th width="60" bgcolor="#E5E5E5" style="border-right: 1px solid #555555;">Subtotal</th>
                                                            </tr>
                                                            <tr>
                                                               <td width="">Business Card</td>
                                                               <td width="210">Business Card</td>
                                                               <td width="80">100.00</td>
                                                               <td width="40">1</td>
                                                               <td width="80" style="border-right: 1px solid #555555;">100.00</td>
                                                            </tr>
                                                            <tr>
                                                               <td width="">Letterhead</td>
                                                               <td width="210">Letterhead</td>
                                                               <td width="80">560.00</td>
                                                               <td width="40">1</td>
                                                               <td width="80" style="border-right: 1px solid #555555;">560.00</td>
                                                            </tr>
                                                            <tr class="">
                                                               <td style="border:none" bgcolor="#FFF" colspan="2"></td>
                                                               <td style="border-left:none;border-right:none;font-weight: bold;" colspan="2">Subtotal:</td>
                                                               <td style="border-left:none;border-right:none;" class="text-left">660.00 SR</td>
                                                            </tr>
                                                            <tr class="">
                                                               <td style="border:none" bgcolor="#FFF" colspan="2"></td>
                                                               <td style="border-left:none;border-right:none;font-weight: bold;" colspan="2">Discount:</td>
                                                               <td style="border-left:none;border-right:none;" class="text-left">-33.00 SR</td>
                                                            </tr>
                                                            <tr class="">
                                                               <td style="border:none" bgcolor="#FFF" colspan="2"></td>
                                                               <td style="border-left:none;border-right:none;font-weight: bold;" colspan="2">VAT (15%):</td>
                                                               <td style="border-left:none;border-right:none;" class="text-left">99.00 SR</td>
                                                            </tr>
                                                            <tr class="total-row">
                                                               <td style="border:none" bgcolor="#FFF" colspan="2"></td>
                                                               <td style="border-left:none;border-right:none;font-weight: bold;" colspan="2">Total:</td>
                                                               <td style="border-left:none;border-right:none;" class="text-left">759.00 SR</td>
                                                            </tr>
                                                            <tr>
                                                               <td style="border:none" bgcolor="#FFF" colspan="2"></td>
                                                               <td style="border-left:none;border-right:none;font-weight: bold;" colspan="2">Paid:</td>
                                                               <td style="border-left:none;border-right:none;" class="text-left">759.00 SR</td>
                                                            </tr>
                                                            <tr>
                                                               <td style="border:none" bgcolor="#FFF" colspan="2"></td>
                                                               <td style="border-left:none;border-right:none;font-weight: bold;" colspan="2">Balance Due:</td>
                                                               <td style="border-left:none;border-right:none;" class="text-left">0.00 SR</td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                      </div>
                                                       <div class="Quotation-footer" style="padding-top: 5px;
    padding-bottom: 5px;">
                                                         <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                               <tr>
                                                                
                                                             <td style="line-height: 1.6;font-size: 14px;font-weight: 600;padding:2px 0px;">
                                                              <span class="arabic" style="color:#000;direction: rtl;     text-align: left;font-size: 12px; font-weight: bold;	" dir="rtl" lang="ar">
                                                              ﻧﺎﻣﻞ ان ﻳﻨﺎل ﻋﺮﺿﻨﺎ ﻫﺬا رﺿﺎﻛﻢ واﺳﺘﺤﺴﺎﻧﻜﻢ ﻋﻠﻰ أﻣﻞ ﺗﺰوﻳﺪﻧﺎ ﺑﺎﻟﺘﻌﻤﻴﺪ اﻟﺮﺳﻤﻲ ﻟﻠﻄﺒﺎﻋﻪ ﻓﻲ اﻗﺮب وﻗﺖ وﻟﻜﻢ ﺟﺰﻳﻞ اﻟﺸﻜﺮ واﻟﺘﻘﺪﻳﺮ    </span>
                                                             </td>
                                                               </tr>
                                                                <tr>
                                                             <td style="line-height: 1.4;font-size: 14px;f font-weight: bold;padding:2px 0px;text-align: left;">
                                                                Hope the above offer will meet your requirements:
                                                             </td>
                                                               </tr>
                                                                <tr>
                                                             <td style="line-height: 1.4;font-size: 14px; font-weight: bold;padding:0px 0px;text-align: left;">
                                                              look forward to receiving your Acceptance and the ofﬁcial purchase order very soon.
                                                             </td>
                                                               </tr>
                                                              
                                                            </tbody>
                                                         </table>
                                                      </div>

                                                      <div class="Quotation-footer" style="padding-top: 5px;padding-bottom: 5px;">
                                                         <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                              
                                                                 <tr>
                                                             <td style="line-height: 1.6;font-size: 13.5px; font-weight: bold;padding: 0px 0px;text-align: left;">
                                                              AL DEYAR AL SAUDIYAH  |
                                                              <span class="arabic" style="color:#000;direction: rtl;font-weight: bold;font-size: 15px;" dir="rtl" lang="ar">ﻣﻄﺒﻌﻪ اﻟﺪﻳﺎر اﻟﺴﻌﻮدﻳﻪ </span>
                                                             </td>
                                                         </tr>
  <tr>
                                                             <td class="text-left" valign="top" width="40%" style="line-height: 1.6;">
                                                               <p style="line-height: 3;font-size: 14px;margin-top: 0; font-weight: bold;">
                                                                  Account Number at NCB:      <span style="font-weight:normal;">  23164203000102 </span><br>
                                                                   IBAN/   <span style="font-weight:normal;">  SA15 1000 0023 1642 0300 0102 </span><br>
                                                               Account Number at Al Rajhi BANK:   <span style="font-weight:normal;">  125608010971109 </span>  <br>
                                                                 IBAN/    <span style="font-weight:500;"> SA63 8000 0125 6080 1097 1109<span> <br>
                                                              <span style="font-weight:bold;">   Payment Terms </span><br>
                                                                  <span style="font-weight:bold;">  Advance payment with P.O.: 50% </span> <br>
                                                                    <span style="font-weight:normal;"> "The buyer must pay the delivery of sample goods.</span>


                                                                  </p>
                                                               </td>
                                                             
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                      </div>
                                            
                                                   </div>
                                                </div>
                                             </div>
</body>
</html>';
        $mpdf->WriteHTML($html);
        $mpdf->Output(); // opens in browser
        

	}


















   public function new_pdf2()
	{
     
$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/custom/font/directory',
    ]),
    'fontdata' => $fontData + [
        'winsoftpro' => [
            'R' => 'winsoft-naskh-pro-light.ttf',
            'I' => 'winsoftpro-bold.ttf',
        ]
    ],
    'default_font' => 'winsoftpro'
]);
        $html = '<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="">
      <meta name="keywords" content="">
  <style type="text/css">
  @font-face {
  font-family: WinSoftPro;
  src: url(winsoftpro-bold.ttf);
}
  body{
  font-family: WinSoftPro;
  }


  table{
  font-family: winsoftpro;
  }
    
    .invoice-listing-table th {
      
    background-color: #e5e5e5;
    border-bottom: 1px solid #555555;
    border-top: 1px solid #555555;
    font-weight: 700;
    text-align: left;
    padding: 6px 4px;
       font-size: 16px;
     }

.total-table td {
     font-size: 16px;
    border-left: 1px solid #555555;
}
.invoice-listing-table td {
     font-size: 16px;
    border-bottom: 1px solid #555555;
    text-align: left;
    padding: 5px 6px;
    vertical-align: top;
}
.total-table td:last-child {
    border-right: 1px solid #555555;
}
.total-table th:last-child {
    border-right: 1px solid #555555;
}

  table td span.arabic{
    display: inline-block;
  font-family: winsoftpro;
    direction: rtl;
  }
  </style>
</head>
<body>
 <div  class="" style="width:100%;margin: 0 auto;">
                                                <div class="Quotation-wrap">
                                                   <div class="Quotation-inner">
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 10px;">
                                                         <tbody>
                                                            <tr>
                                                               <td class="text-left" valign="bottom" width="79%" style="border-bottom: 1px solid #000;">
                                                               <p style="line-height: 1.1;font-size: 16px;margin: 0;">
                                                                   <span class="arabic" style="color:#000;direction: rtl;font-weight: bold;font-size: 25px;" dir="rtl" lang="ar">ﺳـﻨــﺪ ﻗــﺒـﺾ
                                                                   </span>
                                                                   <br>
                                                                   PAYMENT VOUCHER

                                                                  </p>
                                                               </td>
                                                               
                                                               <td style="text-align: right;padding-top: 15px;" width="20%" valign="top">
                                                                  <img src="https://www.deyar.demoatcrayotech.com/printstore/assets/deyar/skin/img/logo-d.png" style="width: 150px;">
                                                               </td>
                                                              
                                                              
                                                            </tr>

                                                            <tr>
                                                              <td>
                                                                <p style="margin: 4px 0px; font-size: 14px;">VAT No. 300742361400003 :  <span class="arabic" style="color:#000;direction: rtl;font-weight: normal;" dir="rtl" lang="ar">اﻟﺮﻗﻢ اﻟﻀﺮﻳﺒﻲ    </span></p>
                                                              </td>

                                                            </tr>

                                                                <tr>
                                                             <td colspan="2">
                                                               <table style="width: 100%;">
                                                                 <tr >
                                                                     <td style="width: 75%;" class="text-left" valign="bottom" width="75%">
                                                               <p style="line-height: 1.6;font-size: 20px;margin: 0;font-weight: bold;">
                                                                 No. </p>
                                                                  <p style="font-size: 14px;;margin: 0;font-weight: bold;">  <i> Date: </i> <span style="display: inline-block; width: 50px;text-align: center;">   / </span>      <span style="display: inline-block;width: 50px;text-align: center;">   / </span>    <span class="arabic" style="color:#000;direction: rtl;font-weight: normal;" dir="rtl" lang="ar">     اﻟﺘﺎرﻳﺦ
</span></p>
                                                               </td>
                                                               
                                                               <td style="text-align: right;padding-top: 15px;width: 25%;" width="25%">
                                                                <table style="width: 100%;">
                                                                  <tr>
                                                                    <td  style="width: 60%;overflow: hidden;text-align: center;">
                                                                       <div style="text-align: center;padding: 0px 8px;">
                                                                     <p style="font-size: 16px;;margin: 0;font-weight: bold;display: inline-block;">  S.R. <span class="arabic" style="color:#000;direction: rtl;font-weight: normal;" dir="rtl" lang="ar">رﻳــــﺎل   </span></p>
                                                                </div>
                                                               <div>
                                                                   <input type="" name="" style="    background-color: #fff;border: 1px solid #000;padding: 5px 8px;width: 140px;">
                                                               </div>
                                                               
                                                                    </td>
                                                                      <td  style="width: 40%;overflow: hidden;text-align: center;">
                                                                        <div style="text-align: center;display:block;padding: 0px 8px;">
                                                                     <p style="font-size: 16px;;margin: 0;font-weight: bold;display:block;"> H. <span class="arabic" style="color:#000;direction: rtl;font-weight: normal;" dir="rtl" lang="ar">ﻫ  </span></p>
                                                                </div>
                                                               <div>  <input type="" name="" style="    background-color: #fff;border: 1px solid #000;padding: 5px 8px;width: 50px;"></div>
                                                               
                                                                    </td>
                                                                  </tr>
                                                                </table>
                                                                
                                                               </td>
                                                                 </tr>
                                                               </table>
                                                             </td>
                                                              
                                                              
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                    

                                                     
                                                     

                                                   
                                            
                                                   </div>
                                                </div>
                                             </div>
</body>
</html>';
        $mpdf->WriteHTML($html);
        $mpdf->Output(); // opens in browser
        

	}
	


    
}
?>