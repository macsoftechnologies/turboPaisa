<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Goals extends CI_Controller {



	public function __Construct(){

		parent::__Construct();

		$this->load->model('UserModel', 'um');

		$this->admin = $this->session->userdata('admin_id');

		// is_logged_in();

	}



	public function index()

	{

		$data['page_title'] = "Goals";

		$data['goals'] = $this->um->getGoals("goals",[]);

		$this->settemplate->dashboard("goals/index",$data);

	}

	public function insert()

	{

		$this->form_validation->set_rules('goal','Goal', 'trim|required');

		if ($this->form_validation->run() == FALSE)

		{	

			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

			$this->index();

		}		

		else	

		{

			
			$userData = [

				'goal' => $this->input->post('goal'),

				'value' => $this->input->post('value')

			];



			$userId = $this->um->insertData("goals",$userData);




			if($userId > 0){

				$this->session->set_flashdata('success_msg',  "Goal Created Successfully.");

				redirect('goals');

			}else{

				$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");

				redirect('goals');

			}
		}

	}


	public function update($goal_id)

	{

		$this->form_validation->set_rules('goal','Goal', 'trim|required');

		if ($this->form_validation->run() == FALSE)

		{	

			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

			$this->index();

		}		

		else	

		{

			$whr = ['goal_id' => $goal_id];

			
			$userData = [

				'goal' => $this->input->post('goal'),

				'value' => $this->input->post('value')

			];



			$userId = $this->um->updateData("goals",$userData,$whr);




			if($userId > 0){

				$this->session->set_flashdata('success_msg',  "Goal Updated Successfully.");

				redirect('goals');

			}else{

				$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");

				redirect('goals');

			}
		}

	}




	public function delete($goal_id)
	{
		$whr = ['goal_id' => $goal_id];
			$lastId = $this->um->deleteData("goals", $whr);
			if($lastId > 0){

				$this->session->set_flashdata('success_msg',  "Goal Delete Successfully.");
			}else{
				$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");
			}
		redirect('goals');
	}

	

}