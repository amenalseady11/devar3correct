<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main');
        $this->load->model('App');
        $this->load->database();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(['url', 'language']);
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        $this->load->library('form_validation');
        $this->load->library('Memcached_library');
		 // Load cart library
        $this->load->library('cart');
        error_reporting(0);
    }

	public function index()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
		
		
		$this->form_validation->set_rules('email', 'Email', 'required');
		
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		$this->form_validation->set_rules('conpassword', 'Confirm Password', 'required|matches[password]');
		
		
		
		  if ($this->form_validation->run()==false)
            {
			 
			 
				
               $this->template->load('frontend/registration', 'index', $data);
			  
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
				
				       if($customerid)
                        {
                           $this->db->where('customer_id', $customerid);
                           $this->db->update('customers', $data);

                        } else
					   {
                        $complted= $this->db->insert('customers', $data);
						   $insert_id = $this->db->insert_id();
						   $this->session->set_userdata('uid',$insert_id);
						    if($this->session->userdata('prev'))
					      {
								
								 redirect('checkout');
								
							}
						   else{
							   
							   
							   
							    $this->session->set_flashdata('msg', 'Registered Successfully');
							   
							  
							   redirect('myaccount');
							   
						   }
						   
						   
						   
						 
					   }
				
				 
			
				
             
			}

                   


		
		
		
		
		
        
	}
	
	
	
	public function products()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
        
	$productid=$this->uri->segment(2);
		
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
		
		
		//print_r($data['coverprint']);
		//exit;
		
		
        $this->template->load('frontend/home', 'products_dynamic', $data);
	}
	
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
			
			//echo "bbbcccc".$pr['price'];
			
			?>
			<div class="detailsPriceDisplay">
			<div class="detailsPriceBody">
							<p>
								<span>Quantity </span>
								<input class="form-control" type="text" name="quantity" id="quantityid" value="<?php echo $pr['min_quantity']?>" >
								<input type="hidden" name="perprice" id="perpriceid" value="<?php echo $pr['per_price']?>">
								<input type="hidden" name="orgprice" id="orgpriceid" value="<?php echo $pr['price']?>">
								<input type="hidden" name="min_quantity" id="min_quantityid" value="<?php echo $pr['min_quantity']?>">
								
								<input type="hidden" name="row_id" id="row_id" value="">
							</p>
							<h4 class="price"><div id="original_price"><?php echo $pr['price']?> SR</div></h4>
							<a class="btn animatedBtn darckBtn"  role="button" id="basket">Add to Basket</a>
				<div id="abc"></div>
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
	
	
	
	
	function add_to_cart(){
		
		 $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$options=array();
		
		
		
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
		
		
		
		$productid=$_POST['product'];
		$productname=$_POST['productname'];
		$perprice=$_POST['perprice'];
		$quantity=$_POST['quantity'];
		
		
		//print_r($_POST);
        $data = array(
            'id' => $productid, 
			'name'=>$productname,
            'price' => $perprice, 
            'qty' => $quantity,
			'options' =>$options
        );
		
		//print_r($data);
        $this->cart->insert($data);
		
		echo $this->cart->total_items();
		
    }
 
    function show_cart(){ 
        $output = '';
        $no = 0;
       print_r($this->cart->contents());
        $output .= '
            <tr>
                <th colspan="3">Total</th>
                <th colspan="2">'.'Rp '.number_format($this->cart->total()).'</th>
            </tr>
        ';
        return $output;
    }
 
    function load_cart(){ 
        echo $this->show_cart();
    }
 
    function delete_cart(){ 
        $data = array(
            'rowid' => $this->input->post('row_id'), 
            'qty' => 0, 
        );
        $this->cart->update($data);
        echo $this->show_cart();
    }
	
	
	



}

