<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addashboard extends CI_Controller {

	public function __Construct(){
		parent::__Construct();
		$this->load->model('UserModel', 'um');
		$this->admin = $this->session->userdata('admin_id');
		// is_logged_in();
	}

	public function index()
	{
		$data['page_title'] = "Admin";
		$data['users'] = $this->um->getCustomersData("users",['status' => 'Y'])->result_array();
		$data['offers'] = $this->um->getOffers("offers o",[])->result_array();
		$data['spin'] = $this->um->getSpinDetails("spin s",[])->result_array();
		$data['scartchcard'] = $this->um->getScartchcard("scratchcard",[])->result_array();
		$data['locations']=$this->um->getLocations("locations",[])->result_array();
		$data['banner']=$this->um->getBanners("banner",[])->result_array();
		$data['categories'] = $this->um->getCategories123("categories",[])->result_array();
		$data['earngames'] = $this->um->getEarngames("earn_games",[])->result_array();
		$data['goals'] = $this->um->getGoals("goals",[])->result_array();
		$this->settemplate->dashboard("admin/dashboard",$data);
	}

	public function changePassword()
	{
		$data['page_title'] = "Change Password";
		$data['adminId'] = $this->admin;
		$this->settemplate->dashboard("admin/changePassword",$data);
	}

	public function update($adminId)
	{
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
       	$this->form_validation->set_rules('new_pasword', 'New Password', 'required|matches[password]');
		if ($this->form_validation->run() == FALSE)
		{	
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
			$this->index();
		}		
		else	
		{
			$whr = ['admin_id'=> $adminId];
			$userData = [
				'password' => md5($this->input->post('password'))
			];
			
			$lastId = $this->um->updateData("tbl_admin",$userData,$whr);
			if($lastId > 0){
				$this->session->set_flashdata('success_msg', "Password Updated successfully.");
			}else{
				$this->session->set_flashdata('error_msg',  "Failed, Please try again.");
			}
			redirect('addashboard/changePassword');
		}
	}
	
}