<?php
class Dashboard extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main');
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->helper(array('url','language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        $this->load->model('ion_auth_model');
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
        error_reporting(0);
    }

    public function index()
    {
        if ($this->ion_auth->logged_in() == 1) {

            $this->template->load('dashboard_master', 'dashboard');
        } else {

            $this->template->load('login_master', 'content');
        }
    }

    function admin_login()
    {
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $res=$this->ion_auth->login($username,$password);
        if($res)
        {
            $this->session->all_userdata();
            $this->ion_auth->user()->row();

            echo 'r';
        } else {

            echo '<div class="alert alert-danger" role="alert">Invalid Username or Password</div>';
        }
    }
}
