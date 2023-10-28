<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminlogin extends CI_Controller {

	public function __Construct(){
		parent::__Construct();
		$this->load->model('UserModel', 'um');
	}
	
	public function index()
	{
		$data['title'] = "Login";
		if($this->session->userdata('ad_logged')){
			redirect('dashboard');
		}
		$this->settemplate->login("",$data);
	}

	public function login()
	{
		$date = date('Y-m-d h:i:s');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{	
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
			$this->index();
		}		
		else	
		{
			$email = $this->input->post('email');
			$inputPwd = $this->input->post('password');
			$pwd = md5($inputPwd);


			
			//$whr = ['email' => $email,'password' => $pwd , 'status' => 1];
			$result = $this->um->checkAdminLogin("tbl_admin",$email,$pwd);

			if($result['status'] > 0){
				$this->session->set_userdata('admin_id',$result['admin_id']);
				$this->session->set_userdata('admin_name',$result['admin_name']);
				$this->session->set_userdata('email',$result['email']);
				$this->session->set_userdata('mobile_number',$result['mobile_number']);
				$this->session->set_userdata('adkon_logged',TRUE);
			
				$this->session->set_flashdata('success_msg',"Welcome! ".$result['admin_name']);
				redirect('addashboard');
			}else{
				$this->session->set_flashdata('error_msg',"Invalid Email/Password");
				redirect('adminlogin');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->unset_userdata('admin_id');
		$this->session->unset_userdata('admin_name');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('mobile_number');
		$this->session->unset_userdata('adkon_logged');
		redirect('/');
	}
}

