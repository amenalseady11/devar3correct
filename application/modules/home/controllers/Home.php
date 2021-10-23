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
			
			$price=$pr['min_quantity']*$pr['per_price'];
			
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
								
								
							</p>
							<h4 class="price"><div id="original_price"><?php echo $price?> SAR</div></h4>
							<a class="btn animatedBtn darckBtn"  role="button" id="basket">Add to Basket</a>
				<div id="abc"></div>
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
		
		$rand=rand();
		$random="random";
		
		$options[]=array('name'=> $random,'value'=> $rand);

		$options=json_encode($options);
		
		
		
		$productid=$_POST['product'];
		$productname=$_POST['productname'];
		$perprice=$_POST['perprice'];
		$quantity=$_POST['quantity'];
		$comments=$_POST['comments'];
		$minquantity=$_POST['min_quantity'];
		
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
		
		
		//print_r($_POST);
        $data = array(
            'id' => $productid, 
			'name'=>$productname,
            'price' => $perprice, 
            'qty' => $quantity,
			'type_price' => $typeprice,
            'min_qty' => $minquantity,
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
			
			//$data['alladdress'] = $app->getaccountaddress_all($userid);
		
		foreach ($data['adshipping'] as $val)
		{
			
			$countrycode=$val['country_code'];
			
		 $data['allname'][$countrycode]=$app->getcountryname($countrycode);
		}
		
			
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
		
		$data['addresscount'] = $app->countaddress($userid);
		
		
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
				
				
				if($data['addresscount']=="0")	 
			{
				
				$defaultbilling="1";
				$defaultshipping="1";
				
			}
				else
				{
				
				$defaultbilling="0";
				$defaultshipping="0";
					
				}
				
				
				
				 $data               = array(
							
					        'customer_id'         =>  $userid,
							'first_name'         =>  $firstname,
							'last_name'         =>  $lastname,
							'phone_number'         =>  $phone,
                            'address'         =>  $streetaddress,							
                            'city'        =>  $city,
							'state'     =>  $state, 
							'zip_code'       =>  $zip,
							'country_code'       =>  $country,
					        'def_bill'       =>  $defaultbilling,
			                'def_ship'       =>  $defaultshipping
							
                            
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
			if($_POST){
				
				
			if($_POST['billingaddress']=="-1")
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
			if($_POST['shiphere'])
			{
				
			
			$data['shipid']=$_POST['shiphere'];
			if($insertid=="")
			{
			
			$data['billid']=$_POST['shiphere'];
			
			}
				
				
            $this->session->set_flashdata('shipid', $data['shipid']);
				
				 $this->session->set_flashdata('billid', $data['billid']);
				
				
			}
			
			 if($_POST['billingaddress'])
		 {
			
				 if($_POST['billingaddress']!="-1")
				 {
					 $data['billid']=$_POST['billingaddress'];	
					 
				 }
				 
			$this->session->set_flashdata('billid', $data['billid']);
				 
		 }
				
				
			}
			if($this->session->flashdata('shipid'))
			{
				
				$this->session->set_flashdata('shipid', $this->session->flashdata('shipid'));
				
			}
			  
			  
			 if($this->session->flashdata('billid'))
			{
				
				$this->session->set_flashdata('billid', $this->session->flashdata('billid'));
				
			} 
			
          $this->template->load('frontend/home', 'checkout-shipping', $data); 
			
			//redirect('checkout-shipping');
			
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
					
					if($items['type_price']=="1")
					{
						
						$items['subtotal']=$items['price'];
					}
					
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
			
			$status="Pending";
			//$method="Flat Rate";
			
			$ship_price=$_POST['optradio'];
			
			if($ship_price)
			{
				
				$method="Delivery";
				
			}
			else
			{
				
				$method="Pickup";
			}
			
			
				
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
				if($items['type_price']=="1")
				{
					$items['subtotal']=$items['price'];
					
					$typeprice="1";
					$subtotal=$items['subtotal'];
					
				}
				else
				{
					$subtotal=$items['subtotal'];
					$typeprice="0";
					
				}
				
				$comments=$items['comments'];
			
			
			    $data               = array(
							
					        'order_id'         =>  $orderid,
					        'product_id'         =>  $productid,
							'product_options'         =>  $options,
					        'name'         =>  $name,
					        'comments'         =>  $comments,
					        'qty'         =>  $qty,
					        'unit_price'         =>  $price,					 
							'row_total'         => $subtotal,
					        'type_price'         => $typeprice
							
                            
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
			
			$firstname=$shipaddress['first_name'];
			$lastname=$shipaddress['last_name'];
				$phone=$shipaddress['phone_number'];
				$address=$shipaddress['address'];
				$country=$shipaddress['country_code'];
				$city=$shipaddress['city'];
				$state=$shipaddress['state'];
			   $zip=$shipaddress['zip_code'];
			
			
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
				
				
					$complted= $this->db->insert('customer_order_shipping_address', $data);
			
			
			$firstname=$billaddress['first_name'];
			$lastname=$billaddress['last_name'];
				$phone=$billaddress['phone_number'];
				$address=$billaddress['address'];
				$country=$billaddress['country_code'];
				$city=$billaddress['city'];
				$state=$billaddress['state'];
			   $zip=$billaddress['zip_code'];
			
			
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
	
	
	
	public function forgot_password()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$this->form_validation->set_rules('email', 'Email', 'required');
		
		
		
		  if ($this->form_validation->run()==false)
            {
			 
			 
				
              $this->template->load('frontend/home', 'forgot-password', $data);
			  
            }
            else
            {
				
			$email=$this->input->post('email');	
				
				
			$validate=$app->sendpassword($email);
				
				$customername=$validate['customer_firstname']." ".$validate['customer_lastname'];
				
		
				if($validate)
{
				
				
				 // String of all alphanumeric character 
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
  
    // Shufle the $str_result and returns substring 
    // of specified length 
   $random=substr(str_shuffle($str_result),  
                       0, 20); 


$app->createrandom($random,$email);


$to = $email;
$subject = 'Deyar reset password';
$from = 'info@deyar.com';
 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$url=base_url();
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
    $link=$url."reset_password/".$random;
    
    $imgurl=$url."img/logo.jpg";
 
// Compose a simple HTML email message
$message = '<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="format-detection" content="date=no" />
      <meta name="format-detection" content="address=no" />
      <meta name="format-detection" content="telephone=no" />
      <meta name="x-apple-disable-message-reformatting" />
      <!--[if !mso]><!-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet" />
      <!--<![endif]-->
      <title>Email</title>
      <!--[if gte mso 9]>
      <style type="text/css" media="all">
         sup { font-size: 100% !important; }
      </style>
      <![endif]-->
   </head>
   <body class="body" style="background:#fff; padding:0 !important; margin:0 !important; display:block !important; -webkit-text-size-adjust:none;">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#fff;border: 1px solid #edf0f2;" align="center">
         <tr>
            <td align="center" valign="top">
               <table width="600" border="0" cellspacing="0" cellpadding="0" class="mobile-shell">
                  <tr>
                     <td class="td container" style="width:600px; min-width:600px; font-size:0pt; line-height:0pt; margin:0; font-weight:normal; padding:55px 0px;">
                        <!-- Header -->
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tr>
                              <td class="p30-15 tbrr" style="padding: 30px; border-radius:5px 5px 0px 0px;" bgcolor="#ffffff">
                                 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                       <th class="column-top" width="245" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
                                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                             <tr>
                                                <td class="img m-center" style="font-size:0pt; line-height:0pt; text-align:center;"><img src="http://deyar.demoatcrayotech.com/img/logo-l.png" width="230" height="" border="0" alt="" /></td>
                                             </tr>
                                          </table>
                                       </th>
                                     
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                        </table>
                        <!-- END Header -->
                        <!-- Hero Image -->
                      
                        <!-- END Hero Image -->
                        <!-- Intro -->
                              <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#f1f2f4">
    <tr>
       <td style="">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
             <tr>
                <td class="p30-15" style="padding: 30px 0px;">
                   <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                         <td class="h1 pb25" style="color:#000; font-family: Open Sans,Helvetica,Arial,sans serif;font-size:30px;font-weight: 600;line-height:40px;background-color: #f1f2f4;text-align: center;padding: 5px 5px;"> Cheers '.$customername.'! </td>
                      </tr>
                       <tr>
                        <td align="center" style="padding:20px 0 20px;font-weight:400;font-size:15px;line-height:18px;color:#000000;font-family: Open Sans,Helvetica,Arial,sans serif;">
                                                            There was recently a request to change the password for your account.
                                                         
                                                            </td>
                      </tr>
                       <tr>
                        <td align="center" style="padding:0px 0 20px;font-weight:400;font-size:15px;line-height:26px;color:#000000;font-family: Open Sans,Helvetica,Arial,sans serif;">
                                                         
                                                            If you requested this password change, please reset your <br>
                                                            password here:
                                                            </td>
                      </tr>

                      <tr>
                                                                    <td align="center" style="padding-top: 10px;padding-bottom: 20px;">
                                                                        <a href="'.$link.'" style="text-decoration:none;font-size:16px;color:#fff;text-decoration:none;background-color:#e71e7d;border:1px solid #e71e7d;display:block;font-weight:400;line-height:20px;padding:10px 20px;width: 255px;font-family: Open Sans,Helvetica,Arial,sans serif;" target="_blank">
                                                                            Reset Password
                                                                        </a>
                                                                    </td>
                                                                </tr>

                                                                <tr>

                                                            <td align="center" style="padding:14px 0 20px;font-weight:400;font-size:12px;line-height:18px;color:#000000;font-family: Open Sans,Helvetica,Arial,sans serif;padding: 14px 60px 20px;">
                                                            If you did not make this request, you can ignore this message and your password will remain the same.
                                                            </td>
                                                        </tr>
                      
                       
                   </table>
                </td>
             </tr>
          </table>
       </td>
    </tr>
</table>
<!--   <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#1795d3">
    <tr>
       <td style="">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
             <tr>
              <td>
                <img src="bg.jpg" style="width: 100%;">
              </td>
              </tr>
            </table>
          </td>
        </tr>
      </table> -->


  


     
     <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
        <tr>
           <td style="padding-bottom: 10px;">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                 <tr>
                  
                 </tr>
              </table>
           </td>
        </tr>
     </table>

      



<!-- Footer -->
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background: #ffff;">
                           <tr>
                              <td class="pb10" style="padding-bottom:10px;"></td>
                           </tr>
                        
                         <tr>
   <td style="padding: 0in 0in 0in 0in">
      <p class="MsoNormal" align="center" style="text-align: center;line-height:32px;">
         <strong><span style="font-size: 11.5pt;font-family:Open Sans,Helvetica,Arial,sans serif; color: #1E3566">Contact Us</span></strong>
         <span style="font-size: 10.5pt; font-family:Open Sans,Helvetica,Arial,sans serif; color: #3C4858">
            <!-- o ignored -->
         </span>
      </p>
      <div>
 
         <p class="MsoNormal" align="center" style="text-align: center;line-height:22px;">
            <span style="font-size: 10.5pt; font-family:Open Sans,Helvetica,Arial,sans serif; color: #1E3566"><a href="mailto:deyar.dp@gmail.com" target="_blank" rel="noreferrer"><span style="color: #203469">deyar.dp@gmail.com</span></a></span><span style="font-size: 10.5pt;font-family:Open Sans,Helvetica,Arial,sans serif;color: #3C4858"> | </span><span style="font-size: 10.5pt; font-family:Open Sans,Helvetica,Arial,sans serif; color: #1E3566"><a href="tel:+966114741435" target="_blank" rel="noreferrer"><span style="color: #203469">+966 114741435</span></a></span>
            <span style="font-size: 10.5pt;font-family:Open Sans,Helvetica,Arial,sans serif; color: #3C4858">
               <!-- o ignored -->
            </span>
         </p>
      </div>
   </td>
</tr>
 <tr>
                              <td class="pb10" style="padding-bottom:10px;"></td>
                           </tr>


                        </table>


                       <table width="100%" border="0" align="center" cellspacing="0" cellpadding="0" style="background: #ffff;text-align: center;">
                            <tr>
                              <td>
                                <table width="233" border="0" align="center" cellspacing="0" cellpadding="0" style="background: #ffff;text-align: center;">
                          <tr>
    <td width="34" style="width: 25.5pt; padding: 0in 0in 0in 0in">
      <p class="MsoNormal" style="mso-line-height-alt: 0pt">
         <a href="https://www.instagram.com/deyar.dp/" target="_blank" rel="noreferrer"><span style="font-size: 1.0pt; text-decoration: none"><img border="0" width="36" height="36" style="width: .375in; height: .375in"  src="'.$url.'ico_insta.png"></span></a>
         <span style="font-size: 1.0pt">
            <!-- o ignored -->
         </span>
      </p>
   </td>
    <td width="34" style="width: 25.5pt; padding: 0in 0in 0in 0in">
      <p class="MsoNormal" style="mso-line-height-alt: 0pt">
         <a href="https://twitter.com/DeyarDp" target="_blank" rel="noreferrer"><span style="font-size: 1.0pt; text-decoration: none"><img border="0" width="36" height="36" style="width: .375in; height: .375in" id="_x0000_i1028" src="'.$url.'icon_tw.png"></span></a>
         <span style="font-size: 1.0pt">
            <!-- o ignored -->
         </span>
      </p>
   </td>
   
    <td width="34" style="width: 25.5pt; padding: 0in 0in 0in 0in">
      <p class="MsoNormal" style="mso-line-height-alt: 0pt">
         <a href="https://www.facebook.com/profile.php?id=100005133916843" target="_blank" rel="noreferrer"><span style="font-size: 1.0pt; text-decoration: none"><img border="0" width="36" height="36" style="width: .375in; height: .375in" src="'.$url.'icon_fb.png"></span></a>
         <span style="font-size: 1.0pt">
            <!-- o ignored -->
         </span>
      </p>
   </td>
</tr>
 <tr>
                              <td class="pb10" style="padding-bottom:20px;"></td>
                           </tr>
                        </table>
                              </td>
                            </tr>
                          </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background: #2e3435;">
                           <tr>
                              <td class="pb10" style="padding-bottom:0px;"></td>
                           </tr>
                           <tr>
                              <td class="pb10" style="padding:15px;">
                                 <div style="color:#ffff;font-family:Open Sans,Helvetica,Arial,sans serif;font-size:14px;line-height:160%" align="center">&copy; 2021 <a href="https://www.deyar.demoatcrayotech.com/" style="text-decoration: none;color: #fff;">Deyar</a> All Rights Reserved.</div>
                              </td>
                           </tr>
                         </table>
                        <!-- END Footer -->
                     </td>
                  </tr>
               </table>
            </td>
         </tr>
      </table>
   </body>
</html>';
//$message .= '</body></html>';
 
// Sending email
if(mail($to, $subject, $message, $headers)){
    //echo 'Your mail has been sent successfully.';
    $data['message']="success";
 $this->template->load('frontend/home', 'forgot-password', $data);

} 
					
	
				} else{
					
				$data['message']="fail";
$this->template->load('frontend/home', 'forgot-password', $data);	
					
				}
					
				
			
				
				
			}
		
		
		
		
		
        
	}
	
	public function reset_password()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('conpassword','Confirm Password','required|matches[password]');
		
		
		
		  if ($this->form_validation->run()==false)
            {
			  if(!$_POST)
				 {
					 
					 
				
			  
			        $random=$this->uri->segment(2);
			  
			      
                    $cou=$app->checkrnd($random);

					if($cou=="0")
					{

					$this->session->set_flashdata('message', 'password link expired');
					$data['rand']="";
					redirect('Login');

					}
				  
			  }
			  else
			  {
				$random=$_POST['random'];  
				  
			  }

			   $data['random']=$random;
				  
			  
				
              $this->template->load('frontend/home', 'reset-password', $data);
			  
            }
            else
            {
				
				$password=$this->input->post('password');
				$random=$this->input->post('random');
                $newpassword=md5($password);
                $app->updatepassword($newpassword,$random);
				$app->resetrandom($random);
				
				$data['message']="success";
				
			 
				 $this->template->load('frontend/home', 'reset-password', $data);
			
				
				
			}
		
		
		
		
		
        
	}
	
	
	public function products_edit()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		
		$userid=$this->session->userdata('uid');
        
	$rowid=$this->uri->segment(2);
		
		foreach ($this->cart->contents() as $items)
{
					
				if($items['rowid']==$rowid)
				{
					
					
				 $options=json_decode($items['options']);
					
					//print_r($options);
					
					$productid=$items['id'];
					$perprice=$items['price'];
					$qty=$items['qty'];
					$comments=$items['comments'];
					
				}
	
					
			
			
		}
		
		
		$data['rowid']=$rowid;
		$data['options']=$options;
		
		$data['perprice']=$perprice;
		
		$data['comments']=$comments;
		
		
		
		$data['qty']=$qty;
		
		$data['cartfiles'] = $app->getcartfiles($userid,$rowid);
		
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
		
		
		
		//exit;
		//print_r($data['coverprint']);
		//exit;
		
		
        $this->template->load('frontend/home', 'products_edit', $data);
	}
	
	
	
	function update_cart(){
		
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
		 $rowid=$_POST['row_id'];
		
		//print_r($_POST);
        $data = array(
			'rowid' => $rowid,
            'id' => $productid, 
			'name'=>$productname,
            'price' => $perprice, 
            'qty' => $quantity,
			'comments' => $comments,
			'options' =>$options
        );
		
		print_r($data);
        $this->cart->update($data);
		
		
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

