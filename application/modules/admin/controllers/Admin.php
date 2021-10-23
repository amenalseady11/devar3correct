<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main');
        $this->load->database();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(['url', 'language']);

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->load->library('grocery_CRUD');
    }

    public function index()
    {
        $this->template->load('login_master','content');
    }

    function admin_login()
    {
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $res=$this->ion_auth->login($username,$password);
       
        if($res)
        {
            /*if($this->ion_auth->in_group('admin'))
            { */
            $user=$this->session->all_userdata();
            $name=$this->ion_auth->user()->row();
            $session_id = $this->session->session_id;
			$this->session->set_userdata('sessionid', $session_id);
            echo 'r';
            /* }
             else
             {
                echo '<div class="alert alert-danger" role="alert">Invalid Username or Password</div>';
             } */
        }
        else
        {
            echo '<div class="alert alert-danger" role="alert">Invalid Username or Password</div>';
        }
    }

    public function employees_management()
    {
        if($this->ion_auth->logged_in()==1)
        {
            $crud = new grocery_CRUD();

            $crud->set_table('customers');
            $crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
            $crud->display_as('salesRepEmployeeNumber','from Employeer')
                ->display_as('customerName','Name')
                ->display_as('contactLastName','Last Name');
            $crud->set_subject('Customer');
            $crud->set_relation('salesRepEmployeeNumber','employees','lastName');

            $output = $crud->render();

            $this->template->load('admin_blank','manage_staff',$output);
        }
        else
        {
            $this->template->load('login_master','content');
        }

    }

    function logout(){
        $this->ion_auth = new Ion_auth();
        $this->ion_auth->logout();
        redirect(base_url().'admin');
    }
}
