<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Categories extends CI_Controller {



	public function __Construct(){

		parent::__Construct();

		$this->load->model('UserModel', 'um');

		$this->admin = $this->session->userdata('admin_id');

		// is_logged_in();

	}



	public function index()

	{

		$data['page_title'] = "Categories";

		$data['categories'] = $this->um->getCategories123("categories",[]);

		$this->settemplate->dashboard("category/index",$data);

	}

	public function insert()

	{

		$this->form_validation->set_rules('category','Category', 'trim|required');

		if ($this->form_validation->run() == FALSE)

		{	

			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

			$this->index();

		}		

		else	

		{

			
			$userData = [

				'category' => $this->input->post('category')

			];



			$userId = $this->um->insertData("categories",$userData);




			if($userId > 0){

				$this->session->set_flashdata('success_msg',  "Category Created Successfully.");

				redirect('categories');

			}else{

				$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");

				redirect('categories');

			}
		}

	}


	public function update($category_id)

	{

		$this->form_validation->set_rules('category','Category', 'trim|required');

		if ($this->form_validation->run() == FALSE)

		{	

			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

			$this->index();

		}		

		else	

		{

			$whr = ['category_id' => $category_id];

			
			$userData = [

				'category' => $this->input->post('category')

			];



			$userId = $this->um->updateData("categories",$userData,$whr);




			if($userId > 0){

				$this->session->set_flashdata('success_msg',  "Category Updated Successfully.");

				redirect('categories');

			}else{

				$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");

				redirect('categories');

			}
		}

	}




	public function delete($category_id)
	{
		$whr = ['category_id' => $category_id];
			$lastId = $this->um->deleteData("categories", $whr);
			if($lastId > 0){

				$this->session->set_flashdata('success_msg',  "Category Delete Successfully.");
			}else{
				$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");
			}
		redirect('categories');
	}

	

}