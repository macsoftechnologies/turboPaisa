<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Spin extends CI_Controller {



	public function __Construct(){

		parent::__Construct();

		$this->load->model('UserModel', 'um');

		$this->admin = $this->session->userdata('admin_id');

		// is_logged_in();

	}



	public function index()

	{

		$data['page_title'] = "Spins";

		$data['spin'] = $this->um->getSpinDetails("spin s",[]);

		$this->settemplate->dashboard("spin/index",$data);

	}

	public function create()

	{

		$data['page_title'] = "Spin Create";

		$data['offers'] = $this->um->getOffers("offers o",[]);

		$this->settemplate->dashboard("spin/create",$data);

	}





	public function insert()

	{

		$this->form_validation->set_rules('spin_title','Spin Title', 'trim|required');
		$this->form_validation->set_rules('spin_url','Spin URL', 'trim|required');
		$this->form_validation->set_rules('spin_amount','Spin Amount', 'trim|required');

		if ($this->form_validation->run() == FALSE)

		{	

			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

			$this->create();

		}		

		else	

		{

			$image_path = "";
			//insert Image here
			if(isset($_FILES['spin_image']) && $_FILES['spin_image']['size'] > 0){
				$getFlag = 0;
				$imgName = $_FILES['spin_image']['name'];
				$file_size =$_FILES['spin_image']['size'];
				$file_tmp =$_FILES['spin_image']['tmp_name'];

				$temp_tr = explode(".", $_FILES["spin_image"]["name"]);
				$file_ext = end($temp_tr);
				$expensions= array("jpeg","jpg","png");
				if(in_array($file_ext,$expensions)=== false){
					$getFlag = 1;
					$this->session->set_flashdata(['status' => 401,'message' =>'Invalid File.Image']);
			  	}
			  	if($file_size > 10194304){
			  		$getFlag = 2;
			        $this->session->set_flashdata(['status' => 401,'message' =>'File size must be excately 10 MB.']);
			    }

			    if($getFlag == 0){
			    	$file_name = round(microtime(true)) . '.' . end($temp_tr);

			    	$img_directory =  "assets/profiles";
			    	if (!file_exists($img_directory)) {
					    mkdir($img_directory, 0777, true);
					}
							$image_path = base_url().$img_directory."/".$file_name;
					move_uploaded_file($file_tmp,$img_directory."/".$file_name);
			    }
			}



			$spin_add_image = "";
			//insert Image here
			if(isset($_FILES['spin_add_image']) && $_FILES['spin_add_image']['size'] > 0){
				$getFlag = 0;
				$imgName = $_FILES['spin_add_image']['name'];
				$file_size =$_FILES['spin_add_image']['size'];
				$file_tmp =$_FILES['spin_add_image']['tmp_name'];

				$temp_tr = explode(".", $_FILES["spin_add_image"]["name"]);
				$file_ext = end($temp_tr);
				$expensions= array("jpeg","jpg","png");
				if(in_array($file_ext,$expensions)=== false){
					$getFlag = 1;
					$this->session->set_flashdata(['status' => 401,'message' =>'Invalid File.Image']);
			  	}
			  	if($file_size > 10194304){
			  		$getFlag = 2;
			        $this->session->set_flashdata(['status' => 401,'message' =>'File size must be excately 10 MB.']);
			    }

			    if($getFlag == 0){
			    	$file_name = round(microtime(true)) . '.' . end($temp_tr);

			    	$img_directory =  "assets/profiles";
			    	if (!file_exists($img_directory)) {
					    mkdir($img_directory, 0777, true);
					}
							$spin_add_image = base_url().$img_directory."/".$file_name;
					move_uploaded_file($file_tmp,$img_directory."/".$file_name);
			    }
			}

			$date = date('Y-m-d H:i:s');

			$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
        	$randstring = '';
		    if($characters > 0){ 
				 for ($j = 0; $j < 6; $j++) {
		            $randstring .= $characters[rand(0, $charactersLength - 1)];
		        }

			$userData = [

				'offer_id' => $this->input->post('offer_id'),

				'spin_title' => $this->input->post('spin_title'),

				'spin_amount' => $this->input->post('spin_amount'),

				'spin_desc' => $this->input->post('spin_desc'),

				'spin_url' => $this->input->post('spin_url'),

				'start_date' => $this->input->post('start_date'),

				'end_date' => $this->input->post('end_date'),

				'spin_image' => $image_path,

				'spin_add_image' => $spin_add_image,

				'spin_code' => $randstring,

				'status' => 1,

				'created_at' =>  $date

			];



			$userId = $this->um->insertData("spin",$userData);




			if($userId > 0){

				$amount = $this->input->post('amount');
				$date = date('Y-m-d');

				if(count($amount) > 0){
					for ($i=0; $i < count($amount); $i++) { 


							$itObject = [
							'spin_id' => $userId,
							'amount' => $amount[$i],
						];


						$itLastId = $this->um->insertData("spin_amount",$itObject);
					}
				}

				$this->session->set_flashdata('success_msg',  "Spin Created Successfully.");

				redirect('spin');

			}else{

				$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");

				redirect('spin');

			}
		}

			

		}

	}





	public function edit($spin_id)

	{

		$data['page_title'] = "Scartchcard Update";

		$data['offers'] = $this->um->getOffers("offers o",[]);

		$data['spin'] = $this->um->getSpinDetails("spin s",['s.spin_id' => $spin_id])->row_array();

		$data['amount'] = $this->um->getSpinamoundetails("spin_amount",['spin_id' => $spin_id]);

		$this->settemplate->dashboard("spin/edit",$data);

	}



	public function update($spin_id)

	{

		$this->form_validation->set_rules('spin_title','Spin Title', 'trim|required');
		$this->form_validation->set_rules('spin_url','Spin URL', 'trim|required');
		$this->form_validation->set_rules('spin_amount','Spin Amount', 'trim|required');

		if ($this->form_validation->run() == FALSE)

		{	

			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

			$this->edit($spin_id);

		}		

		else	

		{
			$delwhr = ['spin_id' => $spin_id];
			$lastId = $this->um->deleteData("spin_amount", $delwhr);

			$image_path = "";
			//insert Image here
			if(isset($_FILES['spin_image']) && $_FILES['spin_image']['size'] > 0){
				$getFlag = 0;
				$imgName = $_FILES['spin_image']['name'];
				$file_size =$_FILES['spin_image']['size'];
				$file_tmp =$_FILES['spin_image']['tmp_name'];

				$temp_tr = explode(".", $_FILES["spin_image"]["name"]);
				$file_ext = end($temp_tr);
				$expensions= array("jpeg","jpg","png");
				if(in_array($file_ext,$expensions)=== false){
					$getFlag = 1;
					$this->session->set_flashdata(['status' => 401,'message' =>'Invalid File.Image']);
			  	}
			  	if($file_size > 10194304){
			  		$getFlag = 2;
			        $this->session->set_flashdata(['status' => 401,'message' =>'File size must be excately 10 MB.']);
			    }

			    if($getFlag == 0){
			    	$file_name = round(microtime(true)) . '.' . end($temp_tr);

			    	$img_directory =  "assets/profiles";
			    	if (!file_exists($img_directory)) {
					    mkdir($img_directory, 0777, true);
					}
						$image_path = base_url().$img_directory."/".$file_name;
					move_uploaded_file($file_tmp,$img_directory."/".$file_name);
			    }
			}else{
				$getImg = $this->um->getSpin("spin",['spin_id' => $spin_id])->row_array();
				if($getImg['spin_image'] != ""){
					$image_path = $getImg['spin_image'];
				}else{
					$image_path = "";
				}
			}


			$spin_add_image = "";
			//insert Image here
			if(isset($_FILES['spin_add_image']) && $_FILES['spin_add_image']['size'] > 0){
				$getFlag = 0;
				$imgName = $_FILES['spin_add_image']['name'];
				$file_size =$_FILES['spin_add_image']['size'];
				$file_tmp =$_FILES['spin_add_image']['tmp_name'];

				$temp_tr = explode(".", $_FILES["spin_add_image"]["name"]);
				$file_ext = end($temp_tr);
				$expensions= array("jpeg","jpg","png");
				if(in_array($file_ext,$expensions)=== false){
					$getFlag = 1;
					$this->session->set_flashdata(['status' => 401,'message' =>'Invalid File.Image']);
			  	}
			  	if($file_size > 10194304){
			  		$getFlag = 2;
			        $this->session->set_flashdata(['status' => 401,'message' =>'File size must be excately 10 MB.']);
			    }

			    if($getFlag == 0){
			    	$file_name = round(microtime(true)) . '.' . end($temp_tr);

			    	$img_directory =  "assets/profiles";
			    	if (!file_exists($img_directory)) {
					    mkdir($img_directory, 0777, true);
					}
						$spin_add_image = base_url().$img_directory."/".$file_name;
					move_uploaded_file($file_tmp,$img_directory."/".$file_name);
			    }
			}else{
				$getImg = $this->um->getSpin("spin",['spin_id' => $spin_id])->row_array();
				if($getImg['spin_add_image'] != ""){
					$spin_add_image = $getImg['spin_add_image'];
				}else{
					$spin_add_image = "";
				}
			}


			$whr = ['spin_id' => $spin_id];

			$date = date('Y-m-d H:i:s');

			$userData = [

				'offer_id' => $this->input->post('offer_id'),

				
				'spin_title' => $this->input->post('spin_title'),

				'spin_amount' => $this->input->post('spin_amount'),

				'spin_desc' => $this->input->post('spin_desc'),

				'spin_url' => $this->input->post('spin_url'),

				'start_date' => $this->input->post('start_date'),

				'end_date' => $this->input->post('end_date'),

				'spin_image' => $image_path,

				'spin_add_image' => $spin_add_image,
			];

			// echo "<pre>";
			// print_r($userData);
			// exit;



			$userId = $this->um->updateData("spin",$userData,$whr);

           

			if($userId > 0){


				$amount = $this->input->post('amount');
				$date = date('Y-m-d');

				if(count($amount) > 0){
					for ($i=0; $i < count($amount); $i++) { 

							$itObject = [
							'spin_id' => $spin_id,
							'amount' => $amount[$i],
						];


						$itLastId = $this->um->insertData("spin_amount",$itObject,$whr);
					}
				}

				$this->session->set_flashdata('success_msg',  "spin Updated Successfully.");

				redirect('spin');

			}else{

				$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");

				redirect('spin');

			}

			

		}

	}




	public function delete($spin_id)
	{
		$whr = ['spin_id' => $spin_id];
			$lastId = $this->um->deleteData("spin", $whr);
			if($lastId > 0){

				$this->session->set_flashdata('success_msg',  "Spin Delete Successfully.");
			}else{
				$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");
			}
		redirect('spin');
	}

	

}