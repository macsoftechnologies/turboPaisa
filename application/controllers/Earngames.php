<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Earngames extends CI_Controller {



	public function __Construct(){

		parent::__Construct();

		$this->load->model('UserModel', 'um');

		$this->admin = $this->session->userdata('admin_id');

		// is_logged_in();

	}



	public function index()

	{

		$data['page_title'] = "Spins";

		$data['earngames'] = $this->um->getEarngames("earn_games",[]);

		$this->settemplate->dashboard("earngames/index",$data);

	}

	public function create()

	{

		$data['page_title'] = "Earn Games Create";

		$this->settemplate->dashboard("earngames/create",$data);

	}





	public function insert()

	{

		$this->form_validation->set_rules('earn_game_title','Earn Game Title', 'trim|required');
		$this->form_validation->set_rules('earn_game_button_title','Earn Game Button Title', 'trim|required');

		if ($this->form_validation->run() == FALSE)

		{	

			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

			$this->create();

		}		

		else	

		{

			$image_path = "";
			//insert Image here
			if(isset($_FILES['earn_game_image']) && $_FILES['earn_game_image']['size'] > 0){
				$getFlag = 0;
				$imgName = $_FILES['earn_game_image']['name'];
				$file_size =$_FILES['earn_game_image']['size'];
				$file_tmp =$_FILES['earn_game_image']['tmp_name'];

				$temp_tr = explode(".", $_FILES["earn_game_image"]["name"]);
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

			$date = date('Y-m-d H:i:s');

			$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
        	$randstring = '';
		    if($characters > 0){ 
				 for ($j = 0; $j < 6; $j++) {
		            $randstring .= $characters[rand(0, $charactersLength - 1)];
		        }

			$userData = [

				'earn_game_title' => $this->input->post('earn_game_title'),

				'earn_game_button_title' => $this->input->post('earn_game_button_title'),

				'earn_game_amount' => $this->input->post('earn_game_amount'),

				'earn_game_desc' => $this->input->post('earn_game_desc'),

				'earn_game_url' => $this->input->post('earn_game_url'),

				'earn_game_start_date' => $this->input->post('earn_game_start_date'),

				'earn_game_end_date' => $this->input->post('earn_game_end_date'),

				'earn_game_image' => $image_path,

				'earn_game_code' => $randstring,

				'status' => 1,

				'created_at' =>  $date

			];



			$userId = $this->um->insertData("earn_games",$userData);




			if($userId > 0){

				$this->session->set_flashdata('success_msg',  "Earn Games Created Successfully.");

				redirect('earngames');

			}else{

				$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");

				redirect('earngames');

			}
		}

			

		}

	}





	public function edit($earn_game_id)

	{

		$data['page_title'] = "Scartchcard Update";

		$data['earngames'] = $this->um->getEarngames("earn_games",['earn_game_id' => $earn_game_id])->row_array();

		$this->settemplate->dashboard("earngames/edit",$data);

	}



	public function update($earn_game_id)

	{

		$this->form_validation->set_rules('earn_game_title','Earn Game Title', 'trim|required');
		$this->form_validation->set_rules('earn_game_button_title','Earn Game Button Title', 'trim|required');

		if ($this->form_validation->run() == FALSE)

		{	

			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

			$this->edit($earn_game_id);

		}		

		else	

		{

			$image_path = "";
			//insert Image here
			if(isset($_FILES['earn_game_image']) && $_FILES['earn_game_image']['size'] > 0){
				$getFlag = 0;
				$imgName = $_FILES['earn_game_image']['name'];
				$file_size =$_FILES['earn_game_image']['size'];
				$file_tmp =$_FILES['earn_game_image']['tmp_name'];

				$temp_tr = explode(".", $_FILES["earn_game_image"]["name"]);
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
				$getImg = $this->um->getEarngames("earn_games",['earn_game_id' => $earn_game_id])->row_array();
				if($getImg['earn_game_image'] != ""){
					$image_path = $getImg['earn_game_image'];
				}else{
					$image_path = "";
				}
			}


			$whr = ['earn_game_id' => $earn_game_id];

			$date = date('Y-m-d H:i:s');

			$userData = [

				
				'earn_game_title' => $this->input->post('earn_game_title'),

				'earn_game_button_title' => $this->input->post('earn_game_button_title'),

				'earn_game_amount' => $this->input->post('earn_game_amount'),

				'earn_game_desc' => $this->input->post('earn_game_desc'),

				'earn_game_url' => $this->input->post('earn_game_url'),

				'earn_game_start_date' => $this->input->post('earn_game_start_date'),

				'earn_game_end_date' => $this->input->post('earn_game_end_date'),

				'earn_game_image' => $image_path,
			];



			$userId = $this->um->updateData("earn_games",$userData,$whr);

           

			if($userId > 0){

				$this->session->set_flashdata('success_msg',  "Earn Game Updated Successfully.");

				redirect('earngames');

			}else{

				$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");

				redirect('earngames');

			}

			

		}

	}




	public function delete($earn_game_id)
	{
		$whr = ['earn_game_id' => $earn_game_id];
			$lastId = $this->um->deleteData("earn_games", $whr);
			if($lastId > 0){

				$this->session->set_flashdata('success_msg',  "Earn Game Delete Successfully.");
			}else{
				$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");
			}
		redirect('earngames');
	}

	

}