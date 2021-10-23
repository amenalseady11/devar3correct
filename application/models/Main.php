<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends CI_Model
{

   

    public function __construct(){
        parent::__construct();
        $this->load->library('memcached_library');

        
		
    }

    function header(){
        return $this->load->view('admin/header');
    }

    function headerFront(){
        return $this->load->view('frontend/header');
    }
	
	 function myaccountheader(){
        return $this->load->view('frontend/myaccount_header');
    }


    function sidebar(){
        return $this->load->view('admin/sidebar');
    }

    function footer(){
        return $this->load->view('admin/footer');
    }
	
	function menu(){
        return $this->load->view('admin/menu');
    }
	
	function front_end_skin($file){
         return base_url().'assets/deyar/skin/'.$file;
    }

    function footerFront(){
        return $this->load->view('frontend/footer');
    }
	
	 function footerLogin(){
        return $this->load->view('frontend/loginfooter');
    }


    function uploadPath($file)
    {
        return base_url().'assets/uploads/'.$file;
    }

    function skin($file){
        return base_url().'skin/admin/'.$file;
    }
	
	  function assets($file){
        return base_url().'assets/deyar/'.$file;
    }
	
	 function assets_new(){
        return base_url().'assets';
    }

    function skinNew($file){
        return base_url().'skin/admin2.3/'.$file;
    }

    function skinFront($file){
        return base_url().'skin/frontend/'.$file;
    }

    function uploadedImageCms($file){
        return base_url().'assets/uploads/cms/'.$file;
    }

    function staticBlock($id)
    {
        $this->db->select('*');
        $this->db->where('id',$id);
        $res = $this->db->get('static_block')->row();
        return $res;
    }

    function mainConfig()
    {
        $this->db->select('*');
        $this->db->where('id',1);
        $res = $this->db->get('configuration')->row();
        return $res;
    }

    function getLatestNews(){
        $this->db->order_by("id", "asc");
        $this->db->limit(3);
        //$this->db->where('category',$id);
        $res = $this->db->get('news')->result();
        return $res;
    }

    function getBaseCurrency($price)
    {
        $BaseCurrencyCode = $this->getConfigValue('configurations/currency_setup/basecurrency');
        if($price){
            return "$BaseCurrencyCode ".number_format($price, 2);
        }else{
            return 'No Price Available';
        }

    }

    function getBaseCurrencyCode()
    {
        $BaseCurrencyCode = $this->getConfigValue('configurations/currency_setup/basecurrency');
        return $BaseCurrencyCode;
    }

    function ProductStatus($status)
    {
        if($status==1){
            return 'Enable';
        }else{
            return 'Disable';
        }
    }

    function getConfigValue($path)
    {
        $this->db->select('value');
        $this->db->where('path',$path);
        $res = $this->db->get('config_data')->row();
        return $res->value;
    }
	
	function urllink()
    {
      
        return $this->uri->segment(1);
    }

    function getProductPrice($priceData)
    {
        $baseCurrency = $this->getConfigValue('configurations/currency_setup/basecurrency');
        $prices = json_decode($priceData,true);

        $matches = array();
        foreach($prices as $a){
            if($a['currency_code'] == $baseCurrency)
                $matches=$a;
        }
        if(!empty($matches['price'])){
            $price = $baseCurrency.' '. $matches['price'];
        }else{
            $price = '';
        }
        if(!empty($matches['special_price'])){
            $specialPrice = $baseCurrency.' '. $matches['special_price'];
        }else{
            $specialPrice = '';
        }
        $price = (object) array(
          'price' => $price,
          'price_index' => $matches['price'],
          'special_price' => $specialPrice,
          'special_price_index' => $matches['special_price']
        );

        return $price;
    }

    function getMainCategories()
    {
        $this->db->select('catalog_category.category_name,catalog_category.category_id,t2.url_ids');
        $this->db->where('parent_category', 0);
        $this->db->join('category_urls as t2', 'catalog_category.category_id = t2.category_id', 'LEFT');
        $query = $this->db->get('catalog_category');
        $res = $query->result();
        $data = [];
        foreach($res as $_category){
            $data[] = (object) array(
                'url' => $this->getCategoryUrl($_category->url_ids),
                'category_name' => $_category->category_name,
            );
        }
        return $data;
    }

    function getCategoryUrlKey($category_id)
    {
        $this->db->select('url_key');
        $this->db->where('category_id', $category_id);
        $query = $this->db->get('catalog_category');
        $res=$query->row_array();
        return $res['url_key'];
    }

    function getCategoryUrl($urlIds)
    {
        $categories = explode('/',$urlIds);
        $url = '';
        foreach($categories as $category) {
            $url .= $this->getCategoryUrlKey($category).'/';
        }
        return rtrim($url,'/');
    }

    function rootCategories()
    {
        if ( !extension_loaded('memcached')){
            $rootCategories = $this->getMainCategories();
        }else{
            $rootCategoriesCache = $this->memcached_library->get('rootCategories');
            if (!$rootCategoriesCache) {
                $rootCategories = $this->getMainCategories();
                $this->memcached_library->add('rootCategories', $rootCategories);
            }else{
                $rootCategories = $rootCategoriesCache;
            }
        }

        return $rootCategories;
    }
	
	function getCategories()
    {
		$this->db->order_by('category_order');
		 $query = $this->db->get('catalog_category');
		
		$res=$query->result_array();
		
		//echo $this->db->last_query();
        return $res;
		/*
		 $this->db->select('*');
        
       $query = $this->db->get('catalog_category');
         $res=$query->result_array();
		echo $this->db->last_query();
		return $res;
		*/
		//return "kkkk";
	}

    function getComments($userid)
    {

        $this->db->where('customer_id',$userid);
        $this->db->where('read_comment',"0");
		$this->db->order_by('comment_id');
		 $query = $this->db->get('order_comments');
		
		$res=$query->result_array();
		
		//echo $this->db->last_query();
		
        return $res;
		/*
		 $this->db->select('*');
        
       $query = $this->db->get('catalog_category');
         $res=$query->result_array();
		echo $this->db->last_query();
		return $res;
		*/
		//return "kkkk";
	}
	
    function getpageaccess($adminid)
    {
        
        $link=$this->uri->segment(1);

if($link=="ad_order"){$pagename="order";} else if($link=="estimate"){$pagename="estimate";} else if($link=="invoice"){$pagename="invoice";}
else if($link=="supplier"){$pagename="suppliers";} else if($link=="supplier_list"){$pagename="suppliers";} else if($link=="customers"){$pagename="customers";} else if($link=="customers_list"){$pagename="customers";} else if($link=="invoice"){$pagename="invoice";}
else if($link=="category"){$pagename="category";} else if($link=="products"){$pagename="products";} else if($link=="dependable_attributes"){$pagename="attributes";} else if($link=="productsmap"){$pagename="mapping";}
else if($link=="orgproducts"){$pagename="product attributes";}else if($link=="employee"){$pagename="employee";}
else if($link=="departments"){$pagename="department";}else if($link=="groups"){$pagename="group";}
else if($link=="task"){$pagename="task";}else if($link=="pageaccess"){$pagename="pageaccess";}else if($link=="designation"){$pagename="designation";}
else if($link=="cms"){$pagename="cms";}		
        
		$this->db->select('*');	
		$this->db->from('users');
		$this->db->join('page_access', 'users.designation_id = page_access.designation_id');
		 $this->db->join('menu_links', 'menu_links.menu_id=page_access.menu_id');
		$this->db->where('users.id',$adminid);
		 $this->db->where('menu_links.menu_name',$pagename);	 
		 
		 $res=$this->db->get()->row_array();
		
		 
		// echo $this->db->last_query();
		 //exit;
		
	
        return $res;
		
	}
	
	 function getmenuaccess($adminid,$pagename)
    {
        
        
		$this->db->select('*');	
		$this->db->from('users');
		$this->db->join('page_access', 'users.designation_id = page_access.designation_id');
		 $this->db->join('menu_links', 'menu_links.menu_id=page_access.menu_id');
		$this->db->where('users.id',$adminid);
		 $this->db->where('menu_links.menu_name',$pagename);	 
		 
		 $res=$this->db->get()->row_array();
		
		 
		// echo $this->db->last_query();
		 //exit;
		
	
        return $res;
		
	}
	
	
}
?>