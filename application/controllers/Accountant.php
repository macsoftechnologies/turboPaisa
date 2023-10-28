<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Accountant extends CI_Controller {



	public function __Construct(){

		parent::__Construct();

		$this->load->model('UserModel', 'um');

		$this->admin = $this->session->userdata('admin_id');

		// is_logged_in();

	}



	public function index()

	{

		$data['page_title'] = "Coupons";

		$data['accountant'] = $this->um->getAdminDetails("admin",[]);

		$this->settemplate->dashboard("accountant/index",$data);

	}

	public function create()

	{

		$data['page_title'] = "Accountant Create";

		$data['types'] = $this->um->getTypes("types",[]);

		$this->settemplate->dashboard("accountant/create",$data);

	}





	
		// public function insert()
		// {
		// 	$this->form_validation->set_rules('name', 'name', 'trim|required');
		// 	$this->form_validation->set_rules('email', 'email', 'trim|required');
		
		// 	if ($this->form_validation->run() == FALSE) {
		// 		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		// 		$this->create();
		// 	} else {
		// 		// Define $date or use a valid date string
		// 		$date = date('Y-m-d H:i:s');
		
		// 		$userData = [
		// 			'name' => $this->input->post('name'),
		// 			'description' => $this->input->post('description'),
		// 			'email'=>$this->input->post('email'),
		// 			'password'=>$this->input->post('password'),
		// 			'address'=>$this->input->post('address'),
		// 			'phone'=>$this->input->post('phone'),
		// 			'created_at' => $date
		// 		];
		
		// 		$userId = $this->um->insertData("accountant", $userData);
		
		// 		if ($userId > 0) {
		// 			$this->session->set_flashdata('success_msg', "accountant Created Successfully.");
		// 			redirect('accountant');
		// 		} else {
		// 			$this->session->set_flashdata('error_msg', "Failed, Something went wrong.");
		// 			redirect('accountant');
		// 		}
		// 	}
		// }
		
	

		public function insert()
		{
			$this->form_validation->set_rules('type_id', 'Select Type', 'trim|required');
			$this->form_validation->set_rules('name', 'name', 'trim|required');
			$this->form_validation->set_rules('email', 'email', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
				$this->create();
			} else {
				$date = date('Y-m-d H:i:s');
				$types = $this->um->getTypes("types",['type_id' => $this->input->post('type_id')])->row_array();
			  $userData = [
			  	    'type_id' => $this->input->post('type_id'),
			  	    'type_name' => $types['type_name'],
					'name' => $this->input->post('name'),
					'email'=>$this->input->post('email'),
					'password'=>$this->input->post('password'),
					'address'=>$this->input->post('address'),
					'phone'=>$this->input->post('phone'),
					'created_at' => $date

					 
				];
		
				$userId = $this->um->insertData("admin", $userData);
		
				if ($userId > 0) {
					$this->session->set_flashdata('success_msg', "accountant Created Successfully.");
					redirect('accountant');
				} else {
					$this->session->set_flashdata('error_msg', "Failed, Something went wrong.");
					redirect('accountant');
				}
			}
			
		}
		
	

	public function edit($admin_id)

	{

		$data['page_title'] = "Update";

		$data['types'] = $this->um->getTypes("types",[]);
		$data['accountant'] = $this->um->getAdminDetails("admin",['admin_id' => $admin_id])->row_array();


		$this->settemplate->dashboard("accountant/edit",$data);

	}



	public function update($admin_id)

	{

		// $this->form_validation->set_rules('name','name', 'trim|required');
		// $this->form_validation->set_rules('description','description', 'trim|required');

		// if ($this->form_validation->run() == FALSE)

		// {	

		// 	$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

		// 	$this->edit($accountant_id);

		// }		

		// else	

		// {
 

			$whr = ['admin_id' => $admin_id];

			// $date = date('Y-m-d H:i:s');

			$types = $this->um->g