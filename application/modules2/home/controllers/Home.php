<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

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
		
		$categoryid="14";
		
		//$categoryid=$this->uri->segment(2);
      
		$data['categoryproducts'] = $app->getcategoryproducts($categoryid);
		
		//$data['category'] = $app->getCategories();
		
		//print_r($data['category'])
		
		//$data['allproducts'] = $app->getallproducts();
		
		//print_r($data['allproducts']);
		
		
		
		
		
		
		
        $this->template->load('frontend/home', 'index', $data);
	}
	
	public function category()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		//$categoryid="14";
		
		$categoryid=$this->uri->segment(2);
		//echo $categoryid."<br>";
      
		$data['categoryproducts'] = $app->getcategoryproducts($categoryid);
		
		
		
		
        $this->template->load('frontend/home', 'index', $data);
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
		
		//print_r($_POST);
		//exit;
		
		$userid=$this->session->userdata('uid');
		
		$datatemp['tempfiles'] = $app->gettempfiles($userid);
		
		//print_r($data['tempfiles']);
		
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
		$comments=$_POST['comments'];
		
		
		//print_r($_POST);
        $data = array(
            'id' => $productid, 
			'name'=>$productname,
            'price' => $perprice, 
            'qty' => $quantity,
			'comments' => $comments,
			'options' =>$options
        );
		
		//print_r($data);
        $this->cart->insert($data);
		
		
		/*
		$contents = $this->cart->contents();
$last = count($contents) - 1;
$rowid=$contents[$last]['rowid'];
		
		echo "kkk".$rowid;
		
		*/
		
		foreach ($this->cart->contents() as $items)
{
			$itemid=$items['rowid'];
		}
		
		 //print_r($this->cart->contents());
		
		$userid=$this->session->userdata('uid');
		
		/*
		print_r($data['tempfiles']);
		
		foreach ($datatemp['tempfiles']  as $val)
			
		{
			
			echo "nnnnn".$val['file_name'];
			
				
			echo "ppp".$val->file_name;
			
			
		}
		
		*/
		
		foreach ($datatemp['tempfiles']  as $val)
			
		{
			
			$filename=$val['file_name'];
		
			
			    $data               = array(
					
					        'customer_id'         =>  $userid,
							'file_name'         =>  $filename,
					        'row_id'         =>  $itemid
					
                        );
				
				
					$complted= $this->db->insert('cart_files', $data);
			
			
		}
		
		
			$app->deletetempfiles($userid);
		
		
		//echo $this->cart->total_items();
		
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
	
	
	public function checkout()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$userid=$this->session->userdata('uid');
		
		
		if($userid)
		{
			
			$this->session->unset_userdata('prev');
			
		 $data['adshipping'] = $app->getcheckout_addressshipping($userid);
			
		 $data['countries'] = $app->getcountry();
			
         $this->template->load('frontend/home', 'checkout', $data); 
			
		}
		else
		{
			$this->session->set_userdata('prev','cart');		
			redirect('login');
		}
		
        
	}
	
	public function checkout_save_address()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$userid=$this->session->userdata('uid');
		
		
		$this->form_validation->set_rules('address', 'Address', 'required');
		
		$this->form_validation->set_rules('city', 'City', 'required');
		
		$this->form_validation->set_rules('state', 'State', 'required');
		
		$this->form_validation->set_rules('zip', 'Zipcode', 'required');
		
		$this->form_validation->set_rules('country', 'Country', 'required');
		
		
		
		  if ($this->form_validation->run()==false)
            {
			 
			 
				
              $this->template->load('frontend/myaccount', 'checkout', $data);
			  
            }
            else
            {
				
				
				$firstname               = $this->input->post('firstname');
				$lastname               = $this->input->post('lastname');
				$phone               = $this->input->post('phone');				
				$streetaddress               = $this->input->post('address');				
                $city                   = $this->input->post('city');
				$state                = $this->input->post('state');               
				$zip                  = $this->input->post('zip');
				$country                  = $this->input->post('country');
				
				
				
				 $data               = array(
							
					        'customer_id'         =>  $userid,
							'first_name'         =>  $firstname,
							'last_name'         =>  $lastname,
							'phone_number'         =>  $phone,
                            'address'         =>  $streetaddress,							
                            'city'        =>  $city,
							'state'     =>  $state, 
							'zip_code'       =>  $zip,
							'country_code'       =>  $country
							
                            
                        );
				
				 $complted= $this->db->insert('customer_address', $data);
				
				redirect('checkout');
				
				
			}
				
		
        
	}
	
	
	
	public function checkout_shipping()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$userid=$this->session->userdata('uid');
		
		
		if($userid)
		{
			
			
		 if(!$_POST['billing'])
		 {
			
			 
		
				
				$firstname               = $this->input->post('firstname');
				$lastname               = $this->input->post('lastname');
				$phone               = $this->input->post('phone');				
				$streetaddress               = $this->input->post('address');				
                $city                   = $this->input->post('city');
				$state                = $this->input->post('state');               
				$zip                  = $this->input->post('zip');
				$country                  = $this->input->post('country');
				
				
				
				 $data               = array(
							
					        'customer_id'         =>  $userid,
							'first_name'         =>  $firstname,
							'last_name'         =>  $lastname,
							'phone_number'         =>  $phone,
                            'address'         =>  $streetaddress,							
                            'city'        =>  $city,
							'state'     =>  $state, 
							'zip_code'       =>  $zip,
							'country_code'       =>  $country
							
                            
                        );
				
				
				
				 $complted= $this->db->insert('customer_address', $data);
				
		 
				$insertid=$this->db->insert_id();
				 
				$data['billid']=$insertid;
				
				
			
				
				
			
		 }
			
			$data['shipid']=$_POST['shiphere'];
			if($insertid=="")
			{
			
			$data['billid']=$_POST['shiphere'];
			
			}
			
			
          $this->template->load('frontend/home', 'checkout-shipping', $data); 
			
		}
		else
		{
				
			redirect('login');
		}
		
        
	}
	
	
	public function checkout_completed()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$userid=$this->session->userdata('uid');
		
		
		if($userid)
		{
			
			$shipid=$_POST['shipid'];
		    $billid=$_POST['billid'];
			
			$shipaddress=$app->getorder_addressship($shipid);
			$billaddress=$app->getorder_addressbill($billid);
			
			
			
			
			$total="0";
			
				foreach ($this->cart->contents() as $items)
				{
					
					 $total=$total+$items['subtotal'];
					
					
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
			
			$status="pending";
			$method="Flat Rate";
			
			$ship_price=$_POST['optradio'];
			
			
				
				 $data               = array(
							
					        'customer_id'         =>  $userid,
					        'vat_price'         =>  $vat,
							'price'         =>  $grandtotal,
					        'status'         =>  $status,
					        'shipping_method'         =>  $method,
					        'shipping_price'         =>  $ship_price,					 
							'order_date'         =>  $date
							
                            
                        );
			
			
				 $complted= $this->db->insert('orders', $data);
				
		 
				$orderid=$this->db->insert_id();
			
			
			foreach ($this->cart->contents() as $items)
				{
					
				
				
				$productid=$items['id'];
				$name=$items['name'];
				$price=$items['price'];
				$qty=$items['qty'];
				$options=$items['options'];
				$subtotal=$items['subtotal'];
				$comments=$items['comments'];
			
			
			    $data               = array(
							
					        'order_id'         =>  $orderid,
					        'product_id'         =>  $productid,
							'product_options'         =>  $options,
					        'name'         =>  $name,
					        'comments'         =>  $comments,
					        'qty'         =>  $qty,
					        'unit_price'         =>  $price,					 
							'row_total'         => $subtotal
							
                            
                        );
				
				
					$complted= $this->db->insert('order_item', $data);
				
				   $orderitemid= $this->db->insert_id();
				
				
				$rowid=$items['rowid'];
				$datacart['cartfiles'] = $app->getcartfiles($userid,$rowid);
				
				
				foreach ($datacart['cartfiles']  as $val)
			
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
			
			$name=$shipaddress['first_name'];
				$phone=$shipaddress['phone_number'];
				$address=$shipaddress['address'];
				$country=$shipaddress['country_code'];
				$city=$shipaddress['city'];
				$state=$shipaddress['state'];
			   $zip=$shipaddress['zip_code'];
			
			
			    $data               = array(
							
					        'order_id'         =>  $orderid,
					        'customer_id'         =>  $userid,
							'name'         =>  $name,
					        'phone_number'         =>  $phone,
					        'address'         =>  $address,
					        'country_code'         =>  $country,					 
							'city'         => $city,
					        'state'         =>  $state,
					        'zip_code'         =>  $zip					 
							
							
                            
                        );
				
				
					$complted= $this->db->insert('customer_order_shipping_address', $data);
			
			
			$name=$billaddress['first_name'];
				$phone=$billaddress['phone_number'];
				$address=$billaddress['address'];
				$country=$billaddress['country_code'];
				$city=$billaddress['city'];
				$state=$billaddress['state'];
			   $zip=$billaddress['zip_code'];
			
			
			    $data               = array(
							
					        'order_id'         =>  $orderid,
					        'customer_id'         =>  $userid,
							'name'         =>  $name,
					        'phone_number'         =>  $phone,
					        'address'         =>  $address,
					        'country_code'         =>  $country,					 
							'city'         => $city,
					        'state'         =>  $state,
					        'zip_code'         =>  $zip					 
							
							
                            
                        );
				
				
					$complted= $this->db->insert('customer_order_billing_address', $data);
			
			
			
			//-------------end of order details--------------------------------
			
			
			
			
			
		
			
			$app->deletecartfiles($userid);
			$this->cart->destroy();
			
			$data['orderid']=$orderid;	
		
			
         $this->template->load('frontend/home', 'checkout-completed', $data); 
			
		}
		else
		{
				
			redirect('login');
		}
		
        
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
            $config['file_name']        = $new_name;
			//$config['file_name'] = $_FILES['file']['name'];
					
			//Load upload library
			$this->load->library('upload',$config);			
				
			// File upload
			if($this->upload->do_upload('file')){
				// Get data about the file
				$uploadData = $this->upload->data();
				
			$userid=$this->session->userdata('uid');
			
			    $data               = array(
					
					        'customer_id'         =>  $userid,
							'file_name'         =>  $new_name
                        );
				
				
					$complted= $this->db->insert('temp_files', $data);
		
			}
		}
		
	}




}

